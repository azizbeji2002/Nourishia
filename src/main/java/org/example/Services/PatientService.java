package org.example.Services;

import org.example.Entities.Patient;
import org.example.Entities.PlanNutritionnels;
import org.example.Utils.DataSource;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 * Service class for managing Patient entities
 */
public class PatientService {
    private Connection connection;

    public PatientService() {
        connection = DataSource.getInstance().getCnx();
    }

    // 1️⃣ Add a Patient
    public void addPatient(Patient patient) throws SQLException {
        String query = "INSERT INTO patient (name, email, plan_id) VALUES (?, ?, ?)";
        PreparedStatement statement = connection.prepareStatement(query, Statement.RETURN_GENERATED_KEYS);
        statement.setString(1, patient.getName());
        statement.setString(2, patient.getEmail());

        if (patient.getPlan() != null) {
            statement.setInt(3, patient.getPlan().getIdplan());
        } else {
            throw new SQLException("Plan is required for Patient");
        }

        statement.executeUpdate();

        ResultSet rs = statement.getGeneratedKeys();
        if (rs.next()) {
            patient.setIdPatient(rs.getInt(1));
        }
    }

    // 2️⃣ Retrieve All Patients
    public List<Patient> getAllPatients() {
        List<Patient> patients = new ArrayList<>();
        String query = "SELECT p.*, pn.idplan, pn.aliment_recommende, pn.aliment_evite " +
                "FROM patient p " +
                "JOIN plan_nutritionnels pn ON p.plan_id = pn.idplan";

        try (Statement statement = connection.createStatement();
             ResultSet resultSet = statement.executeQuery(query)) {

            while (resultSet.next()) {
                Patient patient = new Patient();
                patient.setIdPatient(resultSet.getInt("id_patient"));
                patient.setName(resultSet.getString("name"));
                patient.setEmail(resultSet.getString("email"));

                // Set the plan
                PlanNutritionnels plan = new PlanNutritionnels();
                plan.setIdplan(resultSet.getInt("idplan"));
                plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                plan.setAlimentEvite(resultSet.getString("aliment_evite"));
                patient.setPlan(plan);

                patients.add(patient);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return patients;
    }

    // 3️⃣ Get Patient by ID
    public Patient getPatientById(int id) {
        Patient patient = null;
        String query = "SELECT p.*, pn.idplan, pn.aliment_recommende, pn.aliment_evite " +
                "FROM patient p " +
                "JOIN plan_nutritionnels pn ON p.plan_id = pn.idplan " +
                "WHERE p.id_patient = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setInt(1, id);

            try (ResultSet resultSet = statement.executeQuery()) {
                if (resultSet.next()) {
                    patient = new Patient();
                    patient.setIdPatient(resultSet.getInt("id_patient"));
                    patient.setName(resultSet.getString("name"));
                    patient.setEmail(resultSet.getString("email"));

                    // Set the plan
                    PlanNutritionnels plan = new PlanNutritionnels();
                    plan.setIdplan(resultSet.getInt("idplan"));
                    plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                    plan.setAlimentEvite(resultSet.getString("aliment_evite"));
                    patient.setPlan(plan);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return patient;
    }

    // 4️⃣ Update a Patient
    public void updatePatient(Patient patient) throws SQLException {
        String query = "UPDATE patient SET name = ?, email = ?, plan_id = ? WHERE id_patient = ?";
        PreparedStatement statement = connection.prepareStatement(query);

        statement.setString(1, patient.getName());
        statement.setString(2, patient.getEmail());

        if (patient.getPlan() != null) {
            statement.setInt(3, patient.getPlan().getIdplan());
        } else {
            throw new SQLException("Plan is required for Patient");
        }

        statement.setInt(4, patient.getIdPatient());

        statement.executeUpdate();
    }

    // 5️⃣ Delete a Patient
    public void deletePatient(int id) throws SQLException {
        String query = "DELETE FROM patient WHERE id_patient = ?";
        PreparedStatement statement = connection.prepareStatement(query);
        statement.setInt(1, id);
        statement.executeUpdate();
    }

    // 6️⃣ Get Patient by Email
    public Patient getPatientByEmail(String email) {
        Patient patient = null;
        String query = "SELECT p.*, pn.idplan, pn.aliment_recommende, pn.aliment_evite " +
                "FROM patient p " +
                "JOIN plan_nutritionnels pn ON p.plan_id = pn.idplan " +
                "WHERE p.email = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setString(1, email);

            try (ResultSet resultSet = statement.executeQuery()) {
                if (resultSet.next()) {
                    patient = new Patient();
                    patient.setIdPatient(resultSet.getInt("id_patient"));
                    patient.setName(resultSet.getString("name"));
                    patient.setEmail(resultSet.getString("email"));

                    // Set the plan
                    PlanNutritionnels plan = new PlanNutritionnels();
                    plan.setIdplan(resultSet.getInt("idplan"));
                    plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                    plan.setAlimentEvite(resultSet.getString("aliment_evite"));
                    patient.setPlan(plan);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return patient;
    }

    // 7️⃣ Get Patients by Plan ID
    public List<Patient> getPatientsByPlanId(int planId) {
        List<Patient> patients = new ArrayList<>();
        String query = "SELECT * FROM patient WHERE plan_id = ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setInt(1, planId);

            try (ResultSet resultSet = statement.executeQuery()) {
                while (resultSet.next()) {
                    Patient patient = new Patient();
                    patient.setIdPatient(resultSet.getInt("id_patient"));
                    patient.setName(resultSet.getString("name"));
                    patient.setEmail(resultSet.getString("email"));

                    patients.add(patient);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return patients;
    }

    // 8️⃣ Count Patients
    public int countPatients() {
        int count = 0;
        String query = "SELECT COUNT(*) FROM patient";

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

    // 9️⃣ Search Patients by Name
    public List<Patient> searchPatientsByName(String keyword) {
        List<Patient> patients = new ArrayList<>();
        String query = "SELECT p.*, pn.idplan, pn.aliment_recommende, pn.aliment_evite " +
                "FROM patient p " +
                "JOIN plan_nutritionnels pn ON p.plan_id = pn.idplan " +
                "WHERE p.name LIKE ?";

        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setString(1, "%" + keyword + "%");

            try (ResultSet resultSet = statement.executeQuery()) {
                while (resultSet.next()) {
                    Patient patient = new Patient();
                    patient.setIdPatient(resultSet.getInt("id_patient"));
                    patient.setName(resultSet.getString("name"));
                    patient.setEmail(resultSet.getString("email"));

                    // Set the plan
                    PlanNutritionnels plan = new PlanNutritionnels();
                    plan.setIdplan(resultSet.getInt("idplan"));
                    plan.setAlimentRecommende(resultSet.getString("aliment_recommende"));
                    plan.setAlimentEvite(resultSet.getString("aliment_evite"));
                    patient.setPlan(plan);

                    patients.add(patient);
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return patients;
    }
}