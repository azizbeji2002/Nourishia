package org.example.Services;

import org.example.Entities.ActiviteSportif;
import org.example.Entities.PlanNutritionnels;
import org.example.Utils.DataSource;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 * Service class for managing ActiviteSportif entities
 */
public class ActiviteSportifService {
    private Connection connection;

    public ActiviteSportifService() {
        connection = DataSource.getInstance().getCnx();
    }

    // 1️⃣ Add a Sports Activity
    public void addActiviteSportif(ActiviteSportif activite) throws SQLException {
        String query = "INSERT INTO activite_sportif (type, duree, frequence, plan_id) VALUES (?, ?, ?, ?)";
        PreparedStatement statement = connection.prepareStatement(query, Statement.RETURN_GENERATED_KEYS);
        statement.setString(1, activite.getType());

        if (activite.getDuree() != null) {
            statement.setInt(2, activite.getDuree());
        } else {
            statement.setNull(2, java.sql.Types.INTEGER);
        }

        if (activite.getFrequence() != null) {
            statement.setInt(3, activite.getFrequence());
        } else {
            statement.setNull(3, java.sql.Types.INTEGER);
        }

        if (activite.getPlan() != null) {
            statement.setInt(4, activite.getPlan().getIdplan());
        } else {
            throw new SQLException("Plan is required for ActiviteSportif");
        }

        statement.executeUpdate();

        ResultSet rs = statement.getGeneratedKeys();
        if (rs.next()) {
            activite.setIdActivite(rs.getInt(1));
        }
    }

    // 2️⃣ Retrieve All Sports Activities
    public List<ActiviteSportif> getAllActivitesSportif() {
        List<ActiviteSportif> activites = new ArrayList<>();
        String query = "SELECT a.*, p.idplan, p.aliment_recommende, p.aliment_evite " +
                "FROM activite_sportif a " +
                "JOIN plan_nutritionnels p ON a.plan_id = p.idplan";

        try (Statement statement = connection.createStatement();
             ResultSet resultSet = statement.executeQuery(query)) {

            while (resultSet.next()) {
                ActiviteSportif activite = new ActiviteSportif();
                activite.setIdActivite(resultSet.getInt("id_activite"));
                activite.setType(resultSet.getString("type"));

                int duree = resultSet.getInt("duree");
                if (!resultSet.wasNull()) {
                    activite.setDuree(duree);
                }

                int frequence = resultSet.getInt("frequence");
                if (!resultSet.wasNull()) {
                    activite.setFrequence(frequence);
                }

                // Set the plan
                PlanNutritionnels plan = new PlanNutritionnels();
                plan.setIdplan(resultSet.getInt("idplan"));
                plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                plan.setAlimentEvite(resultSet.getString("aliment_evite"));
                activite.setPlan(plan);

                activites.add(activite);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return activites;
    }

    // 3️⃣ Get Sports Activity by ID
    public ActiviteSportif getActiviteSportifById(int id) {
        ActiviteSportif activite = null;
        String query = "SELECT a.*, p.idplan, p.aliment_recommende, p.aliment_evite " +
                "FROM activite_sportif a " +
                "JOIN plan_nutritionnels p ON a.plan_id = p.idplan " +
                "WHERE a.id_activite = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setInt(1, id);

            try (ResultSet resultSet = statement.executeQuery()) {
                if (resultSet.next()) {
                    activite = new ActiviteSportif();
                    activite.setIdActivite(resultSet.getInt("id_activite"));
                    activite.setType(resultSet.getString("type"));

                    int duree = resultSet.getInt("duree");
                    if (!resultSet.wasNull()) {
                        activite.setDuree(duree);
                    }

                    int frequence = resultSet.getInt("frequence");
                    if (!resultSet.wasNull()) {
                        activite.setFrequence(frequence);
                    }

                    // Set the plan
                    PlanNutritionnels plan = new PlanNutritionnels();
                    plan.setIdplan(resultSet.getInt("idplan"));
                    plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                    plan.setAlimentEvite(resultSet.getString("aliment_evite"));
                    activite.setPlan(plan);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return activite;
    }

    // 4️⃣ Update a Sports Activity
    public void updateActiviteSportif(ActiviteSportif activite) throws SQLException {
        String query = "UPDATE activite_sportif SET type = ?, duree = ?, frequence = ?, plan_id = ? WHERE id_activite = ?";
        PreparedStatement statement = connection.prepareStatement(query);

        statement.setString(1, activite.getType());

        if (activite.getDuree() != null) {
            statement.setInt(2, activite.getDuree());
        } else {
            statement.setNull(2, java.sql.Types.INTEGER);
        }

        if (activite.getFrequence() != null) {
            statement.setInt(3, activite.getFrequence());
        } else {
            statement.setNull(3, java.sql.Types.INTEGER);
        }

        if (activite.getPlan() != null) {
            statement.setInt(4, activite.getPlan().getIdplan());
        } else {
            throw new SQLException("Plan is required for ActiviteSportif");
        }

        statement.setInt(5, activite.getIdActivite());

        statement.executeUpdate();
    }

    // 5️⃣ Delete a Sports Activity
    public void deleteActiviteSportif(int id) throws SQLException {
        String query = "DELETE FROM activite_sportif WHERE id_activite = ?";
        PreparedStatement statement = connection.prepareStatement(query);
        statement.setInt(1, id);
        statement.executeUpdate();
    }

    // 6️⃣ Get Activities by Plan ID
    public List<ActiviteSportif> getActivitiesByPlanId(int planId) {
        List<ActiviteSportif> activites = new ArrayList<>();
        String query = "SELECT * FROM activite_sportif WHERE plan_id = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setInt(1, planId);

            try (ResultSet resultSet = statement.executeQuery()) {
                while (resultSet.next()) {
                    ActiviteSportif activite = new ActiviteSportif();
                    activite.setIdActivite(resultSet.getInt("id_activite"));
                    activite.setType(resultSet.getString("type"));

                    int duree = resultSet.getInt("duree");
                    if (!resultSet.wasNull()) {
                        activite.setDuree(duree);
                    }

                    int frequence = resultSet.getInt("frequence");
                    if (!resultSet.wasNull()) {
                        activite.setFrequence(frequence);
                    }

                    activites.add(activite);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return activites;
    }

    // 7️⃣ Count Activities by Type
    public int countActivitiesByType(String type) {
        int count = 0;
        String query = "SELECT COUNT(*) FROM activite_sportif WHERE type = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setString(1, type);

            try (ResultSet resultSet = statement.executeQuery()) {
                if (resultSet.next()) {
                    count = resultSet.getInt(1);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return count;
    }
    public int countAllActivities() {
        int count = 0;
        String query = "SELECT COUNT(*) FROM activite_sportif";

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
}