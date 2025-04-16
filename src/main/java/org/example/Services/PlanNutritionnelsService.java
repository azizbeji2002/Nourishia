package org.example.Services;



import org.example.Entities.ActiviteSportif;
import org.example.Entities.Patient;
import org.example.Entities.PlanNutritionnels;
import org.example.Utils.DataSource;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 * Service class for managing PlanNutritionnels entities
 */
public class PlanNutritionnelsService {
    private Connection connection;

    public PlanNutritionnelsService() {
        connection = DataSource.getInstance().getCnx();
    }

    // 1️⃣ Add a Nutritional Plan
    public void addPlanNutritionnel(PlanNutritionnels plan) throws SQLException {
        String query = "INSERT INTO plan_nutritionnels (aliment_recommende, aliment_evite) VALUES (?, ?)";
        PreparedStatement statement = connection.prepareStatement(query, Statement.RETURN_GENERATED_KEYS);
        statement.setString(1, plan.getAlimentRecommende());
        statement.setString(2, plan.getAlimentEvite());

        statement.executeUpdate();

        ResultSet rs = statement.getGeneratedKeys();
        if (rs.next()) {
            plan.setIdplan(rs.getInt(1));
        }
    }

    // 2️⃣ Retrieve All Nutritional Plans
    public List<PlanNutritionnels> getAllPlansNutritionnels() {
        List<PlanNutritionnels> plans = new ArrayList<>();
        String query = "SELECT * FROM plan_nutritionnels";

        try (Statement statement = connection.createStatement();
             ResultSet resultSet = statement.executeQuery(query)) {

            while (resultSet.next()) {
                PlanNutritionnels plan = new PlanNutritionnels();
                plan.setIdplan(resultSet.getInt("idplan"));
                plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                plan.setAlimentEvite(resultSet.getString("aliment_evite"));

                // Load related activities
                ActiviteSportifService activiteService = new ActiviteSportifService();
                List<ActiviteSportif> activites = activiteService.getActivitiesByPlanId(plan.getIdplan());
                plan.setActivites(activites);

                // Load related patients
                PatientService patientService = new PatientService();
                List<Patient> patients = patientService.getPatientsByPlanId(plan.getIdplan());
                plan.setPatients(patients);

                plans.add(plan);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return plans;
    }

    // 3️⃣ Get Nutritional Plan by ID
    public PlanNutritionnels getPlanNutritionnelById(int id) {
        PlanNutritionnels plan = null;
        String query = "SELECT * FROM plan_nutritionnels WHERE idplan = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setInt(1, id);

            try (ResultSet resultSet = statement.executeQuery()) {
                if (resultSet.next()) {
                    plan = new PlanNutritionnels();
                    plan.setIdplan(resultSet.getInt("idplan"));
                    plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                    plan.setAlimentEvite(resultSet.getString("aliment_evite"));

                    // Load related activities
                    ActiviteSportifService activiteService = new ActiviteSportifService();
                    List<ActiviteSportif> activites = activiteService.getActivitiesByPlanId(plan.getIdplan());
                    plan.setActivites(activites);

                    // Load related patients
                    PatientService patientService = new PatientService();
                    List<Patient> patients = patientService.getPatientsByPlanId(plan.getIdplan());
                    plan.setPatients(patients);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return plan;
    }

    // 4️⃣ Update a Nutritional Plan
    public void updatePlanNutritionnel(PlanNutritionnels plan) throws SQLException {
        String query = "UPDATE plan_nutritionnels SET aliment_recommende = ?, aliment_evite = ? WHERE idplan = ?";
        PreparedStatement statement = connection.prepareStatement(query);

        statement.setString(1, plan.getAlimentRecommende());
        statement.setString(2, plan.getAlimentEvite());
        statement.setInt(3, plan.getIdplan());

        statement.executeUpdate();
    }

    // 5️⃣ Delete a Nutritional Plan
    public void deletePlanNutritionnel(int id) throws SQLException {
        String query = "DELETE FROM plan_nutritionnels WHERE idplan = ?";
        PreparedStatement statement = connection.prepareStatement(query);
        statement.setInt(1, id);
        statement.executeUpdate();
    }

    // 6️⃣ Count Nutritional Plans
    public int countPlansNutritionnels() {
        int count = 0;
        String query = "SELECT COUNT(*) FROM plan_nutritionnels";

        try (Statement statement = connection.createStatement();
             ResultSet resultSet = statement.executeQuery(query)) {

            if (resultSet.next()) {
                count = resultSet.getInt(1);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return count;
    }

    // 7️⃣ Search Nutritional Plans by Recommended Food
    public List<PlanNutritionnels> searchPlansByRecommendedFood(String keyword) {
        List<PlanNutritionnels> plans = new ArrayList<>();
        String query = "SELECT * FROM plan_nutritionnels WHERE aliment_recommende LIKE ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setString(1, "%" + keyword + "%");

            try (ResultSet resultSet = statement.executeQuery()) {
                while (resultSet.next()) {
                    PlanNutritionnels plan = new PlanNutritionnels();
                    plan.setIdplan(resultSet.getInt("idplan"));
                    plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                    plan.setAlimentEvite(resultSet.getString("aliment_evite"));

                    plans.add(plan);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return plans;
    }
}