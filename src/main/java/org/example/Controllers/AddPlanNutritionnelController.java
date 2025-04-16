package org.example.Controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextArea;
import javafx.stage.Stage;
import org.example.Entities.PlanNutritionnels;
import org.example.Services.PlanNutritionnelsService;

import java.sql.SQLException;

public class AddPlanNutritionnelController {

    @FXML
    private TextArea alimentRecommendeField;

    @FXML
    private TextArea alimentEviteField;

    private PlanNutritionnelsService planService;
    private PlanNutritionnelController mainController;

    public AddPlanNutritionnelController() {
        planService = new PlanNutritionnelsService();
    }

    public void setMainController(PlanNutritionnelController controller) {
        this.mainController = controller;
    }

    @FXML
    private void handleSaveAction(ActionEvent event) {
        String alimentRecommende = alimentRecommendeField.getText();
        String alimentEvite = alimentEviteField.getText();

        if (alimentRecommende.isEmpty()) {
            showAlert(Alert.AlertType.ERROR, "Validation Error", "Missing Information", "Please provide recommended food information.");
            return;
        }

        try {
            PlanNutritionnels plan = new PlanNutritionnels();
            plan.setAlimentRecommende(alimentRecommende);
            plan.setAlimentEvite(alimentEvite);

            planService.addPlanNutritionnel(plan);
            showAlert(Alert.AlertType.INFORMATION, "Success", "Plan Added", "The nutritional plan has been added successfully.");

            if (mainController != null) {
                mainController.refreshData();
            }

            // Close the window
            Stage stage = (Stage) alimentRecommendeField.getScene().getWindow();
            stage.close();

        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not add the plan", e.getMessage());
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