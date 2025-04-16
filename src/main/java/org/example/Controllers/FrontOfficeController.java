package org.example.Controllers;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import org.example.Entities.PlanNutritionnels;
import org.example.Services.PlanNutritionnelsService;

import java.io.IOException;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;

public class FrontOfficeController implements Initializable {

    @FXML
    private FlowPane planCardsContainer;

    private PlanNutritionnelsService planService;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        planService = new PlanNutritionnelsService();
        loadPlans();
    }

    private void loadPlans() {
        List<PlanNutritionnels> plans = planService.getAllPlansNutritionnels();

        planCardsContainer.getChildren().clear();

        for (PlanNutritionnels plan : plans) {
            VBox card = createPlanCard(plan);
            planCardsContainer.getChildren().add(card);
        }
    }

    private VBox createPlanCard(PlanNutritionnels plan) {
        VBox card = new VBox();
        card.getStyleClass().add("plan-card");

        Label titleLabel = new Label("Nutritional Plan #" + plan.getIdplan());
        titleLabel.getStyleClass().add("card-title");

        Label recommendedLabel = new Label("Recommended Foods");
        recommendedLabel.getStyleClass().add("card-subtitle");

        String recommendedText = plan.getAlimentRecommende();
        // Limit text length for display
        if (recommendedText.length() > 100) {
            recommendedText = recommendedText.substring(0, 97) + "...";
        }

        Label recommendedContent = new Label(recommendedText);
        recommendedContent.getStyleClass().add("card-content");
        recommendedContent.setWrapText(true);

        Label avoidLabel = new Label("Foods to Avoid");
        avoidLabel.getStyleClass().add("card-subtitle");

        String avoidText = plan.getAlimentEvite();
        // Limit text length for display
        if (avoidText != null && avoidText.length() > 100) {
            avoidText = avoidText.substring(0, 97) + "...";
        }

        Label avoidContent = new Label(avoidText != null ? avoidText : "None specified");
        avoidContent.getStyleClass().add("card-content");
        avoidContent.setWrapText(true);

        Button activitiesButton = new Button("View Activities");
        activitiesButton.getStyleClass().add("activities-button");
        activitiesButton.setOnAction(event -> showActivities(plan));

        card.getChildren().addAll(titleLabel, recommendedLabel, recommendedContent,
                avoidLabel, avoidContent, activitiesButton);

        return card;
    }

    private void showActivities(PlanNutritionnels plan) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/FrontOffice/PlanActivities.fxml"));
            Parent root = loader.load();

            PlanActivitiesController controller = loader.getController();
            controller.setPlanData(plan);

            Stage stage = new Stage();
            stage.setTitle("Activities for Plan #" + plan.getIdplan());
            stage.setScene(new Scene(root));
            stage.show();

        } catch (IOException e) {
            e.printStackTrace();
            // Show error alert
        }
    }

    @FXML
    private void handleBackToAdminAction() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/Backoffice/Backoffice.fxml"));
            Stage stage = (Stage) planCardsContainer.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}