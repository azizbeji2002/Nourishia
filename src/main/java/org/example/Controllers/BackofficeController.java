package org.example.Controllers;


import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.stage.Stage;
import org.example.Services.ActiviteSportifService;
import org.example.Services.PatientService;
import org.example.Services.PlanNutritionnelsService;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;

public class BackofficeController implements Initializable {

    @FXML
    private Label totalPlansLabel;

    @FXML
    private Label totalActivitiesLabel;

    @FXML
    private Label totalPatientsLabel;

    private PlanNutritionnelsService planService;
    private ActiviteSportifService activiteService;
    private PatientService patientService;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        planService = new PlanNutritionnelsService();
        activiteService = new ActiviteSportifService();
        patientService = new PatientService();

        loadStatistics();
    }

    private void loadStatistics() {
        int totalPlans = planService.countPlansNutritionnels();
        totalPlansLabel.setText("Total Nutritional Plans: " + totalPlans);

        int totalActivities = activiteService.countAllActivities();
        totalActivitiesLabel.setText("Total Sport Activities: " + totalActivities);

        int totalPatients = patientService.countPatients();
        totalPatientsLabel.setText("Total Patients: " + totalPatients);
    }

    @FXML
    private void handleManagePlansAction(ActionEvent event) {
        loadPage("/Backoffice/PlanNutritionnel.fxml", "Manage Nutritional Plans");
    }

    @FXML
    private void handleManageActivitiesAction(ActionEvent event) {
        loadPage("/Backoffice/ActiviteSportif.fxml", "Manage Sport Activities");
    }

    @FXML
    private void handleManagePatientsAction(ActionEvent event) {
        loadPage("/Backoffice/Patient.fxml", "Manage Patients");
    }

    private void loadPage(String fxmlFile, String title) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource(fxmlFile));
            Stage stage = (Stage) totalPlansLabel.getScene().getWindow();
            stage.setTitle(title);
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Navigation Error", "Could not load the page", e.getMessage());
        }
    }

    private void showAlert(Alert.AlertType alertType, String title, String headerText, String contentText) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(headerText);
        alert.setContentText(contentText);
        alert.showAndWait();
    }
}