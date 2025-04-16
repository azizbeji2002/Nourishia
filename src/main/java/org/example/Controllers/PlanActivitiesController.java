package org.example.Controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import org.example.Entities.ActiviteSportif;
import org.example.Entities.PlanNutritionnels;
import org.example.Services.ActiviteSportifService;

import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;

public class PlanActivitiesController implements Initializable {

    @FXML
    private Label planTitleLabel;

    @FXML
    private VBox activitiesContainer;

    private PlanNutritionnels plan;
    private ActiviteSportifService activiteService;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        activiteService = new ActiviteSportifService();
    }

    public void setPlanData(PlanNutritionnels plan) {
        this.plan = plan;
        planTitleLabel.setText("Activities for Plan #" + plan.getIdplan());
        loadActivities();
    }

    private void loadActivities() {
        activitiesContainer.getChildren().clear();

        List<ActiviteSportif> activities = activiteService.getActivitiesByPlanId(plan.getIdplan());

        if (activities.isEmpty()) {
            Label noActivitiesLabel = new Label("No activities found for this plan.");
            noActivitiesLabel.getStyleClass().add("no-activities");
            activitiesContainer.getChildren().add(noActivitiesLabel);
        } else {
            for (ActiviteSportif activity : activities) {
                VBox activityCard = createActivityCard(activity);
                activitiesContainer.getChildren().add(activityCard);
            }
        }
    }

    private VBox createActivityCard(ActiviteSportif activity) {
        VBox card = new VBox();
        card.getStyleClass().add("activity-card");

        Label typeLabel = new Label(activity.getType());
        typeLabel.getStyleClass().add("activity-type");

        Label durationLabel = new Label("Duration: " + activity.getDuree() + " minutes");
        durationLabel.getStyleClass().add("activity-detail");

        Label frequencyLabel = new Label("Frequency: " + activity.getFrequence() + " times per week");
        frequencyLabel.getStyleClass().add("activity-detail");

        card.getChildren().addAll(typeLabel, durationLabel, frequencyLabel);

        return card;
    }

    @FXML
    private void handleCloseAction() {
        Stage stage = (Stage) planTitleLabel.getScene().getWindow();
        stage.close();
    }
}