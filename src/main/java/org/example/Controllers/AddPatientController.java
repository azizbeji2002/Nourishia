package org.example.Controllers;

import javafx.collections.FXCollections;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.stage.Stage;
import org.example.Entities.Patient;
import org.example.Entities.PlanNutritionnels;
import org.example.Services.PatientService;
import org.example.Services.PlanNutritionnelsService;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class AddPatientController implements Initializable {

    @FXML
    private TextField nameField;

    @FXML
    private TextField emailField;

    @FXML
    private ComboBox<PlanNutritionnels> planComboBox;

    private PatientService patientService;
    private PlanNutritionnelsService planService;
    private PatientController mainController;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        patientService = new PatientService();
        planService = new PlanNutritionnelsService();

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

    public void setMainController(PatientController controller) {
        this.mainController = controller;
    }

    @FXML
    private void handleSaveAction(ActionEvent event) {
        String name = nameField.getText();
        String email = emailField.getText();
        PlanNutritionnels selectedPlan = planComboBox.getValue();

        if (name == null || name.isEmpty()) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Missing Information", "Please enter patient name.");
            return;
        }

        if (email == null || email.isEmpty() || !isValidEmail(email)) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Invalid Email", "Please enter a valid email address.");
            return;
        }

        if (selectedPlan == null) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Missing Information", "Please select a nutritional plan.");
            return;
        }

        // Check if email already exists
        Patient existingPatient = patientService.getPatientByEmail(email);
        if (existingPatient != null) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Duplicate Email", "A patient with this email already exists.");
            return;
        }

        try {
            Patient patient = new Patient();
            patient.setName(name);
            patient.setEmail(email);
            patient.setPlan(selectedPlan);

            patientService.addPatient(patient);
            showAlert(Alert.AlertType.INFORMATION, "Success", "Patient Added", "The patient has been added successfully.");

            if (mainController != null) {
                mainController.refreshData();
            }

            // Close the window
            Stage stage = (Stage) nameField.getScene().getWindow();
            stage.close();

        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not add the patient", e.getMessage());
        }
    }

    @FXML
    private void handleCancelAction(ActionEvent event) {
        Stage stage = (Stage) nameField.getScene().getWindow();
        stage.close();
    }

    private boolean isValidEmail(String email) {
        String emailRegex = "^[a-zA-Z0-9_+&*-]+(?:\\.[a-zA-Z0-9_+&*-]+)*@(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,7}$";
        return email.matches(emailRegex);
    }

    private void showAlert(Alert.AlertType alertType, String title, String headerText, String contentText) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(headerText);
        alert.setContentText(contentText);
        alert.showAndWait();
    }
}