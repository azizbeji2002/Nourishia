package org.example.Controllers;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.stage.Stage;
import org.example.Entities.ActiviteSportif;
import org.example.Entities.PlanNutritionnels;
import org.example.Services.ActiviteSportifService;
import org.example.Services.PlanNutritionnelsService;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class EditActiviteSportifController implements Initializable {

    @FXML
    private ComboBox<String> typeComboBox;

    @FXML
    private Spinner<Integer> dureeSpinner;

    @FXML
    private Spinner<Integer> frequenceSpinner;

    @FXML
    private ComboBox<PlanNutritionnels> planComboBox;

    private ActiviteSportifService activiteService;
    private PlanNutritionnelsService planService;
    private ActiviteSportifController mainController;
    private ActiviteSportif activite;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        activiteService = new ActiviteSportifService();
        planService = new PlanNutritionnelsService();

        // Initialize type combobox
        ObservableList<String> activityTypes = FXCollections.observableArrayList(
                "Running", "Swimming", "Cycling", "Yoga", "Weight Training", "Cardio", "Stretching", "Other"
        );
        typeComboBox.setItems(activityTypes);

        // Initialize spinners
        SpinnerValueFactory<Integer> dureeValueFactory = new SpinnerValueFactory.IntegerSpinnerValueFactory(5, 240, 30, 5);
        dureeSpinner.setValueFactory(dureeValueFactory);

        SpinnerValueFactory<Integer> frequenceValueFactory = new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 30, 3, 1);
        frequenceSpinner.setValueFactory(frequenceValueFactory);

        // Load plans for the combobox
        loadPlans();

        // Configure plan combobox cell factory
        planComboBox.setCellFactory(lv -> new ListCell<PlanNutritionnels>() {
            @Override
            protected void updateItem(PlanNutritionnels item, boolean empty) {
                super.updateItem(item, empty);
                setText(empty ? "" : "Plan #" + item.getIdplan() +
                        (item.getAlimentRecommende() != null ? " - " + item.getAlimentRecommende().substring(0, Math.min(20, item.getAlimentRecommende().length())) + "..." : ""));
            }
        });

        // Configure plan combobox button cell
        planComboBox.setButtonCell(new ListCell<PlanNutritionnels>() {
            @Override
            protected void updateItem(PlanNutritionnels item, boolean empty) {
                super.updateItem(item, empty);
                setText(empty ? "" : "Plan #" + item.getIdplan());
            }
        });
    }

    private void loadPlans() {
        List<PlanNutritionnels> plans = planService.getAllPlansNutritionnels();
        planComboBox.setItems(FXCollections.observableArrayList(plans));
    }

    public void setMainController(ActiviteSportifController controller) {
        this.mainController = controller;
    }

    public void setActivite(ActiviteSportif activite) {
        this.activite = activite;
        populateFields();
    }

    private void populateFields() {
        if (activite != null) {
            // Set type
            if (activite.getType() != null) {
                typeComboBox.setValue(activite.getType());
            }

            // Set duree
            if (activite.getDuree() != null) {
                SpinnerValueFactory<Integer> dureeValueFactory = new SpinnerValueFactory.IntegerSpinnerValueFactory(5, 240, activite.getDuree(), 5);
                dureeSpinner.setValueFactory(dureeValueFactory);
            }

            // Set frequence
            if (activite.getFrequence() != null) {
                SpinnerValueFactory<Integer> frequenceValueFactory = new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 30, activite.getFrequence(), 1);
                frequenceSpinner.setValueFactory(frequenceValueFactory);
            }

            // Set plan
            if (activite.getPlan() != null) {
                for (PlanNutritionnels plan : planComboBox.getItems()) {
                    if (plan.getIdplan().equals(activite.getPlan().getIdplan())) {
                        planComboBox.setValue(plan);
                        break;
                    }
                }
            }
        }
    }

    @FXML
    private void handleSaveAction(ActionEvent event) {
        if (activite == null) {
            showAlert(Alert.AlertType.ERROR, "Error", "No Activity", "No activity data available for update.");
            return;
        }

        String type = typeComboBox.getValue();
        Integer duree = dureeSpinner.getValue();
        Integer frequence = frequenceSpinner.getValue();
        PlanNutritionnels selectedPlan = planComboBox.getValue();

        if (type == null || type.isEmpty()) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Missing Information", "Please select an activity type.");
            return;
        }

        if (selectedPlan == null) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Missing Information", "Please select a nutritional plan.");
            return;
        }

        try {
            activite.setType(type);
            activite.setDuree(duree);
            activite.setFrequence(frequence);
            activite.setPlan(selectedPlan);

            activiteService.updateActiviteSportif(activite);
            showAlert(Alert.AlertType.INFORMATION, "Success", "Activity Updated", "The sport activity has been updated successfully.");

            if (mainController != null) {
                mainController.refreshData();
            }

            // Close the window
            Stage stage = (Stage) typeComboBox.getScene().getWindow();
            stage.close();

        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not update the activity", e.getMessage());
        }
    }

    @FXML
    private void handleCancelAction(ActionEvent event) {
        Stage stage = (Stage) typeComboBox.getScene().getWindow();
        stage.close();
    }

    private void showAlert(Alert.AlertType alertType, String title, String headerText, String contentText) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(headerText);
        alert.setContentText(contentText);
        alert.showAndWait();
    }
}