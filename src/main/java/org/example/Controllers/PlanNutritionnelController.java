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
import org.example.Entities.PlanNutritionnels;
import org.example.Services.PlanNutritionnelsService;

import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;

public class PlanNutritionnelController implements Initializable {

    @FXML
    private TableView<PlanNutritionnels> planTable;

    @FXML
    private TableColumn<PlanNutritionnels, Integer> idColumn;

    @FXML
    private TableColumn<PlanNutritionnels, String> alimentRecommendeColumn;

    @FXML
    private TableColumn<PlanNutritionnels, String> alimentEviteColumn;

    @FXML
    private TextField searchField;

    @FXML
    private Label totalPlansLabel;

    private PlanNutritionnelsService planService;
    private ObservableList<PlanNutritionnels> plansList;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        planService = new PlanNutritionnelsService();
        plansList = FXCollections.observableArrayList();

        // Configure table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("idplan"));
        alimentRecommendeColumn.setCellValueFactory(new PropertyValueFactory<>("alimentRecommende"));
        alimentEviteColumn.setCellValueFactory(new PropertyValueFactory<>("alimentEvite"));

        // Load data
        loadPlans();

        // Configure search functionality
        searchField.textProperty().addListener((obs, oldValue, newValue) -> {
            if (newValue == null || newValue.isEmpty()) {
                loadPlans();
            } else {
                searchPlans(newValue);
            }
        });
    }

    private void loadPlans() {
        plansList.clear();
        List<PlanNutritionnels> plans = planService.getAllPlansNutritionnels();
        plansList.addAll(plans);
        planTable.setItems(plansList);

        // Update statistics
        int totalPlans = planService.countPlansNutritionnels();
        totalPlansLabel.setText("Total Plans: " + totalPlans);
    }

    private void searchPlans(String keyword) {
        plansList.clear();
        List<PlanNutritionnels> plans = planService.searchPlansByRecommendedFood(keyword);
        plansList.addAll(plans);
        planTable.setItems(plansList);
    }

    @FXML
    private void handleAddAction(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Backoffice/AddPlanNutritionnel.fxml"));
            Parent root = loader.load();

            AddPlanNutritionnelController controller = loader.getController();
            controller.setMainController(this);

            Stage stage = new Stage();
            stage.setTitle("Add Nutritional Plan");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not load the add form", e.getMessage());
        }
    }

    @FXML
    private void handleEditAction(ActionEvent event) {
        PlanNutritionnels selectedPlan = planTable.getSelectionModel().getSelectedItem();

        if (selectedPlan == null) {
            showAlert(Alert.AlertType.WARNING, "No Selection", "No Plan Selected", "Please select a plan to edit.");
            return;
        }

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Backoffice/EditPlanNutritionnel.fxml"));
            Parent root = loader.load();

            EditPlanNutritionnelController controller = loader.getController();
            controller.setMainController(this);
            controller.setPlan(selectedPlan);

            Stage stage = new Stage();
            stage.setTitle("Edit Nutritional Plan");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Could not load the edit form", e.getMessage());
        }
    }

    @FXML
    private void handleDeleteAction(ActionEvent event) {
        PlanNutritionnels selectedPlan = planTable.getSelectionModel().getSelectedItem();

        if (selectedPlan == null) {
            showAlert(Alert.AlertType.WARNING, "No Selection", "No Plan Selected", "Please select a plan to delete.");
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirm Delete");
        confirmAlert.setHeaderText("Delete Nutritional Plan");
        confirmAlert.setContentText("Are you sure you want to delete this plan?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                planService.deletePlanNutritionnel(selectedPlan.getIdplan());
                loadPlans();
                showAlert(Alert.AlertType.INFORMATION, "Success", "Plan Deleted", "The nutritional plan has been deleted successfully.");
            } catch (SQLException e) {
                showAlert(Alert.AlertType.ERROR, "Error", "Delete Failed", "Failed to delete the nutritional plan: " + e.getMessage());
            }
        }
    }

    @FXML
    private void handleBackAction(ActionEvent event) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/Backoffice/Backoffice.fxml"));
            Stage stage = (Stage) planTable.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            showAlert(Alert.AlertType.ERROR, "Error", "Navigation Error", "Could not load the home page: " + e.getMessage());
        }
    }

    public void refreshData() {
        loadPlans();
    }

    private void showAlert(Alert.AlertType alertType, String title, String headerText, String contentText) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(headerText);
        alert.setContentText(contentText);
        alert.showAndWait();
    }
}