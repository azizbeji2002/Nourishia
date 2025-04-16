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
import org.example.Entities.Patient;
import org.example.Services.PatientService;

import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;

public class PatientController implements Initializable {

    @FXML
    private TableView<Patient> patientTable;

    @FXML
    private TableColumn<Patient, Integer> idColumn;

    @FXML
    private TableColumn<Patient, String> nameColumn;

    @FXML
    private TableColumn<Patient, String> emailColumn;

    @FXML
    private TableColumn<Patient, String> planColumn;

    @FXML
    private TextField searchField;

    @FXML
    private Label totalPatientsLabel;

    private PatientService patientService;
    private ObservableList<Patient> patientsList;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        patientService = new PatientService();
        patientsList = FXCollections.observableArrayList();

        // Configure table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("idPatient"));
        nameColumn.setCellValueFactory(new PropertyValueFactory<>("name"));
        emailColumn.setCellValueFactory(new PropertyValueFactory<>("email"));
        planColumn.setCellValueFactory(cellData -> {
            if (cellData.getValue().getPlan() != null) {
                return new javafx.beans.property.SimpleStringProperty(
                        "Plan #" + cellData.getValue().getPlan().getIdplan()
                );
            }
            return new javafx.beans.property.SimpleStringProperty("No Plan");
        });

        // Load data
        loadPatients();

        // Configure search functionality
        searchField.textProperty().addListener((obs, oldValue, newValue) -> {
            if (newValue == null || newValue.isEmpty()) {
                loadPatients();
            } else {
                searchPatients(newValue);
            }
        });
    }

    private void loadPatients() {
        patientsList.clear();
        List<Patient> patients = patientService.getAllPatients();
        patientsList.addAll(patients);
        patientTable.setItems(patientsList);

        // Update statistics
        int totalPatients = patientService.countPatients();
        totalPatientsLabel.setText("Total Patients: " + totalPatients);
    }

    private void searchPatients(String keyword) {
        patientsList.clear();
        List<Patient> patients = patientService.searchPatientsByName(keyword);
        patientsList.addAll(patients);
        patientTable.setItems(patientsList);
    }

    @FXML
    private void handleAddAction(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Backoffice/AddPatient.fxml"));
            Parent root = loader.load();

            AddPatientController controller = loader.getController();
            controller.setMainController(this);

            Stage stage = new Stage();
            stage.setTitle("Add Patient");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not load the add form", e.getMessage());
        }
    }

    @FXML
    private void handleEditAction(ActionEvent event) {
        Patient selectedPatient = patientTable.getSelectionModel().getSelectedItem();

        if (selectedPatient == null) {
            showAlert(Alert.AlertType.WARNING, "No Selection", "No Patient Selected", "Please select a patient to edit.");
            return;
        }

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Backoffice/EditPatient.fxml"));
            Parent root = loader.load();

            EditPatientController controller = loader.getController();
            controller.setMainController(this);
            controller.setPatient(selectedPatient);

            Stage stage = new Stage();
            stage.setTitle("Edit Patient");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not load the edit form", e.getMessage());
        }
    }

    @FXML
    private void handleDeleteAction(ActionEvent event) {
        Patient selectedPatient = patientTable.getSelectionModel().getSelectedItem();

        if (selectedPatient == null) {
            showAlert(Alert.AlertType.WARNING, "No Selection", "No Patient Selected", "Please select a patient to delete.");
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirm Delete");
        confirmAlert.setHeaderText("Delete Patient");
        confirmAlert.setContentText("Are you sure you want to delete this patient?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                patientService.deletePatient(selectedPatient.getIdPatient());
                loadPatients();
                showAlert(Alert.AlertType.INFORMATION, "Success", "Patient Deleted", "The patient has been deleted successfully.");
            } catch (SQLException e) {
                showAlert(Alert.AlertType.ERROR, "Error", "Delete Failed", "Failed to delete the patient: " + e.getMessage());
            }
        }
    }

    @FXML
    private void handleBackAction(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/Backoffice/Backoffice.fxml"));
            Stage stage = (Stage) patientTable.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Navigation Error", "Could not load the home page: " + e.getMessage());
        }
    }

    @FXML
    private void handleRefreshAction(ActionEvent event) {
        loadPatients();
        searchField.clear();
    }

    public void refreshData() {
        loadPatients();
    }

    private void showAlert(Alert.AlertType alertType, String title, String headerText, String contentText) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(headerText);
        alert.setContentText(contentText);
        alert.showAndWait();
    }
}