package org.example.Controllers;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.example.Entities.ActiviteSportif;
import org.example.Services.ActiviteSportifService;

import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;

public class ActiviteSportifController implements Initializable {

    @FXML
    private TableView<ActiviteSportif> activiteTable;

    @FXML
    private TableColumn<ActiviteSportif, Integer> idColumn;

    @FXML
    private TableColumn<ActiviteSportif, String> typeColumn;

    @FXML
    private TableColumn<ActiviteSportif, Integer> dureeColumn;

    @FXML
    private TableColumn<ActiviteSportif, Integer> frequenceColumn;

    @FXML
    private TableColumn<ActiviteSportif, String> planColumn;

    @FXML
    private ComboBox<String> filterTypeComboBox;

    @FXML
    private Label totalActivitiesLabel;

    private ActiviteSportifService activiteService;
    private ObservableList<ActiviteSportif> activitesList;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        activiteService = new ActiviteSportifService();
        activitesList = FXCollections.observableArrayList();

        // Configure table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("idActivite"));
        typeColumn.setCellValueFactory(new PropertyValueFactory<>("type"));
        dureeColumn.setCellValueFactory(new PropertyValueFactory<>("duree"));
        frequenceColumn.setCellValueFactory(new PropertyValueFactory<>("frequence"));
        planColumn.setCellValueFactory(cellData -> {
            if (cellData.getValue().getPlan() != null) {
                return new javafx.beans.property.SimpleStringProperty(
                        "" + cellData.getValue().getPlan().getAlimentRecommende()
                );
            }
            return new javafx.beans.property.SimpleStringProperty("No Plan");
        });

        // Initialize filter combobox
        ObservableList<String> activityTypes = FXCollections.observableArrayList();
        activityTypes.add("All Types");
        activityTypes.add("Running");
        activityTypes.add("Swimming");
        activityTypes.add("Cycling");
        activityTypes.add("Yoga");
        activityTypes.add("Weight Training");
        filterTypeComboBox.setItems(activityTypes);
        filterTypeComboBox.getSelectionModel().select(0);

        // Configure filter listener
        filterTypeComboBox.getSelectionModel().selectedItemProperty().addListener((obs, oldValue, newValue) -> {
            if (newValue.equals("All Types")) {
                loadActivities();
            } else {
                filterActivitiesByType(newValue);
            }
        });

        // Load data
        loadActivities();
    }

    private void loadActivities() {
        activitesList.clear();
        List<ActiviteSportif> activities = activiteService.getAllActivitesSportif();
        activitesList.addAll(activities);
        activiteTable.setItems(activitesList);

        // Update statistics
        updateActivityCount();
    }

    private void filterActivitiesByType(String type) {
        activitesList.clear();
        List<ActiviteSportif> allActivities = activiteService.getAllActivitesSportif();
        for (ActiviteSportif activite : allActivities) {
            if (activite.getType() != null && activite.getType().equalsIgnoreCase(type)) {
                activitesList.add(activite);
            }
        }
        activiteTable.setItems(activitesList);

        // Update count
        totalActivitiesLabel.setText("Total Activities: " + activitesList.size());
    }

    private void updateActivityCount() {
        totalActivitiesLabel.setText("Total Activities: " + activitesList.size());
    }

    @FXML
    private void handleAddAction(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Backoffice/AddActiviteSportif.fxml"));
            Parent root = loader.load();

            AddActiviteSportifController controller = loader.getController();
            controller.setMainController(this);

            Stage stage = new Stage();
            stage.setTitle("Add Sport Activity");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not load the add form", e.getMessage());
        }
    }

    @FXML
    private void handleEditAction(ActionEvent event) {
        ActiviteSportif selectedActivite = activiteTable.getSelectionModel().getSelectedItem();

        if (selectedActivite == null) {
            showAlert(Alert.AlertType.WARNING, "No Selection", "No Activity Selected", "Please select an activity to edit.");
            return;
        }

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Backoffice/EditActiviteSportif.fxml"));
            Parent root = loader.load();

            EditActiviteSportifController controller = loader.getController();
            controller.setMainController(this);
            controller.setActivite(selectedActivite);

            Stage stage = new Stage();
            stage.setTitle("Edit Sport Activity");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not load the edit form", e.getMessage());
        }
    }

    @FXML
    private void handleDeleteAction(ActionEvent event) {
        ActiviteSportif selectedActivite = activiteTable.getSelectionModel().getSelectedItem();

        if (selectedActivite == null) {
            showAlert(Alert.AlertType.WARNING, "No Selection", "No Activity Selected", "Please select an activity to delete.");
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirm Delete");
        confirmAlert.setHeaderText("Delete Sport Activity");
        confirmAlert.setContentText("Are you sure you want to delete this activity?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                activiteService.deleteActiviteSportif(selectedActivite.getIdActivite());
                loadActivities();
                showAlert(Alert.AlertType.INFORMATION, "Success", "Activity Deleted", "The sport activity has been deleted successfully.");
            } catch (SQLException e) {
                showAlert(Alert.AlertType.ERROR, "Error", "Delete Failed", "Failed to delete the sport activity: " + e.getMessage());
            }
        }
    }

    @FXML
    private void handleBackAction(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/Backoffice/Backoffice.fxml"));
            Stage stage = (Stage) activiteTable.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Navigation Error", "Could not load the home page: " + e.getMessage());
        }
    }

    @FXML
    private void handleRefreshAction(ActionEvent event) {
        loadActivities();
        filterTypeComboBox.getSelectionModel().select(0);
    }

    public void refreshData() {
        loadActivities();
    }

    private void showAlert(Alert.AlertType alertType, String title, String headerText, String contentText) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(headerText);
        alert.setContentText(contentText);
        alert.showAndWait();
    }
}