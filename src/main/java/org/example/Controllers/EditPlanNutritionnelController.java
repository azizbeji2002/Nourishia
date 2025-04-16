package org.example.Controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.TextArea;
import javafx.stage.Stage;
import org.example.Entities.PlanNutritionnels;
import org.example.Services.PlanNutritionnelsService;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class EditPlanNutritionnelController implements Initializable {

    @FXML
    private TextArea alimentRecommendeField;

    @FXML
    private TextArea alimentEviteField;

    private PlanNutritionnelsService planService;
    private PlanNutritionnelController mainController;
    private PlanNutritionnels plan;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        planService = new PlanNutritionnelsService();
    }

    public void setMainController(PlanNutritionnelController controller) {
        this.mainController = controller;
    }

    public void setPlan(PlanNutritionnels plan) {
        this.plan = plan;
        populateFields();
    }

    private void populateFields() {
        if (plan != null) {
            alimentRecommendeField.setText(plan.getAlimentRecommende());
            alimentEviteField.setText(plan.getAlimentEvite());
        }
    }

    @FXML
    private void handleSaveAction(ActionEvent event) {
        if (plan == null) {
            showAlert(Alert.AlertType.ERROR, "Error", "No Plan", "No plan data available for update.");
            return;
        }

        String alimentRecommende = alimentRecommendeField.getText();
        String alimentEvite = alimentEviteField.getText();

        if (alimentRecommende.isEmpty()) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Missing Information", "Please provide recommended food information.");
            return;
        }

        try {
            plan.setAlimentRecommende(alimentRecommende);
            plan.setAlimentEvite(alimentEvite);

            planService.updatePlanNutritionnel(plan);
            showAlert(Alert.AlertType.INFORMATION, "Success", "Plan Updated", "The nutritional plan has been updated successfully.");

            if (mainController != null) {
                mainController.refreshData();
            }

            // Close the window
            Stage stage = (Stage) alimentRecommendeField.getScene().getWindow();
            stage.close();

        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not update the plan", e.getMessage());
        }
    }

    @FXML
    private void handleCancelAction(ActionEvent event) {
        Stage stage = (Stage) alimentRecommendeField.getScene().getWindow();
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