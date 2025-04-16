package org.example.Entities;



import java.util.Objects;

/**
 * Entity representing a patient
 */
public class Patient {
    private Integer idPatient;
    private String name;
    private String email;
    private PlanNutritionnels plan;

    /**
     * Default constructor
     */
    public Patient() {
    }

    /**
     * Parameterized constructor
     * @param idPatient The patient ID
     * @param name The patient name
     * @param email The patient email
     */
    public Patient(Integer idPatient, String name, String email) {
        this.idPatient = idPatient;
        this.name = name;
        this.email = email;
    }

    /**
     * Get the patient ID
     * @return The patient ID
     */
    public Integer getIdPatient() {
        return idPatient;
    }

    /**
     * Set the patient ID
     * @param idPatient The patient ID to set
     */
    public void setIdPatient(Integer idPatient) {
        this.idPatient = idPatient;
    }

    /**
     * Get the patient name
     * @return The patient name
     */
    public String getName() {
        return name;
    }

    /**
     * Set the patient name
     * @param name The patient name to set
     * @return This Patient object for method chaining
     */
    public Patient setName(String name) {
        this.name = name;
        return this;
    }

    /**
     * Get the patient email
     * @return The patient email
     */
    public String getEmail() {
        return email;
    }

    /**
     * Set the patient email
     * @param email The patient email to set
     * @return This Patient object for method chaining
     */
    public Patient setEmail(String email) {
        this.email = email;
        return this;
    }

    /**
     * Get the nutritional plan associated with this patient
     * @return The PlanNutritionnels object
     */
    public PlanNutritionnels getPlan() {
        return plan;
    }

    /**
     * Set the nutritional plan associated with this patient
     * @param plan The PlanNutritionnels object to set
     * @return This Patient object for method chaining
     */
    public Patient setPlan(PlanNutritionnels plan) {
        this.plan = plan;
        return this;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Patient patient = (Patient) o;
        return Objects.equals(idPatient, patient.idPatient);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idPatient);
    }

    @Override
    public String toString() {
        return "Patient{" +
                "idPatient=" + idPatient +
                ", name='" + name + '\'' +
                ", email='" + email + '\'' +
                '}';
    }
}