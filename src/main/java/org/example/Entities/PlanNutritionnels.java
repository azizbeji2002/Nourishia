package org.example.Entities;


import java.util.ArrayList;
import java.util.List;
import java.util.Objects;

/**
 * Entity representing a nutritional plan
 */
public class PlanNutritionnels {
    private Integer idplan;
    private String alimentRecommende;
    private String alimentEvite;
    private List<ActiviteSportif> activites;
    private List<Patient> patients;

    /**
     * Default constructor
     */
    public PlanNutritionnels() {
        this.activites = new ArrayList<>();
        this.patients = new ArrayList<>();
    }

    /**
     * Parameterized constructor
     * @param idplan The plan ID
     * @param alimentRecommende Recommended foods
     * @param alimentEvite Foods to avoid
     */
    public PlanNutritionnels(Integer idplan, String alimentRecommende, String alimentEvite) {
        this.idplan = idplan;
        this.alimentRecommende = alimentRecommende;
        this.alimentEvite = alimentEvite;
        this.activites = new ArrayList<>();
        this.patients = new ArrayList<>();
    }

    /**
     * Get the plan ID
     * @return The plan ID
     */
    public Integer getIdplan() {
        return idplan;
    }

    /**
     * Set the plan ID
     * @param idplan The plan ID to set
     */
    public void setIdplan(Integer idplan) {
        this.idplan = idplan;
    }

    /**
     * Get recommended foods
     * @return String of recommended foods
     */
    public String getAlimentRecommende() {
        return alimentRecommende;
    }

    /**
     * Set recommended foods
     * @param alimentRecommende The recommended foods to set
     * @return This PlanNutritionnels object for method chaining
     */
    public PlanNutritionnels setAlimentRecommende(String alimentRecommende) {
        this.alimentRecommende = alimentRecommende;
        return this;
    }

    /**
     * Get foods to avoid
     * @return String of foods to avoid
     */
    public String getAlimentEvite() {
        return alimentEvite;
    }

    /**
     * Set foods to avoid
     * @param alimentEvite The foods to avoid to set
     * @return This PlanNutritionnels object for method chaining
     */
    public PlanNutritionnels setAlimentEvite(String alimentEvite) {
        this.alimentEvite = alimentEvite;
        return this;
    }

    /**
     * Get the list of activities associated with this plan
     * @return List of ActiviteSportif objects
     */
    public List<ActiviteSportif> getActivites() {
        return activites;
    }

    /**
     * Set the list of activities associated with this plan
     * @param activites List of ActiviteSportif objects
     */
    public void setActivites(List<ActiviteSportif> activites) {
        this.activites = activites;
    }

    /**
     * Add an activity to this plan
     * @param activite The activity to add
     * @return This PlanNutritionnels object for method chaining
     */
    public PlanNutritionnels addActivite(ActiviteSportif activite) {
        if (!this.activites.contains(activite)) {
            this.activites.add(activite);
            activite.setPlan(this);
        }
        return this;
    }

    /**
     * Remove an activity from this plan
     * @param activite The activity to remove
     * @return This PlanNutritionnels object for method chaining
     */
    public PlanNutritionnels removeActivite(ActiviteSportif activite) {
        if (this.activites.remove(activite)) {
            if (activite.getPlan() == this) {
                activite.setPlan(null);
            }
        }
        return this;
    }

    /**
     * Get the list of patients associated with this plan
     * @return List of Patient objects
     */
    public List<Patient> getPatients() {
        return patients;
    }

    /**
     * Set the list of patients associated with this plan
     * @param patients List of Patient objects
     */
    public void setPatients(List<Patient> patients) {
        this.patients = patients;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        PlanNutritionnels that = (PlanNutritionnels) o;
        return Objects.equals(idplan, that.idplan);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idplan);
    }

    @Override
    public String toString() {
        return "PlanNutritionnels{" +
                "idplan=" + idplan +
                ", alimentRecommende='" + alimentRecommende + '\'' +
                ", alimentEvite='" + alimentEvite + '\'' +
                '}';
    }
}