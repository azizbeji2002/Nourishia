package org.example.Entities;

import java.util.Objects;

/**
 * Entity representing a sports activity
 */
public class ActiviteSportif {
    private Integer idActivite;
    private String type;
    private Integer duree;
    private Integer frequence;
    private PlanNutritionnels plan;

    /**
     * Default constructor
     */
    public ActiviteSportif() {
    }


    public ActiviteSportif(Integer idActivite, String type, Integer duree, Integer frequence) {
        this.idActivite = idActivite;
        this.type = type;
        this.duree = duree;
        this.frequence = frequence;
    }


    public Integer getIdActivite() {
        return idActivite;
    }

    /**
     * Set the activity ID
     * @param idActivite The activity ID to set
     */
    public void setIdActivite(Integer idActivite) {
        this.idActivite = idActivite;
    }

    /**
     * Get the type of activity
     * @return The type of activity
     */
    public String getType() {
        return type;
    }

    /**
     * Set the type of activity
     * @param type The type of activity to set
     * @return This ActiviteSportif object for method chaining
     */
    public ActiviteSportif setType(String type) {
        this.type = type;
        return this;
    }

    /**
     * Get the duration of activity
     * @return The duration of activity
     */
    public Integer getDuree() {
        return duree;
    }

    /**
     * Set the duration of activity
     * @param duree The duration to set
     * @return This ActiviteSportif object for method chaining
     */
    public ActiviteSportif setDuree(Integer duree) {
        this.duree = duree;
        return this;
    }

    /**
     * Get the frequency of activity
     * @return The frequency of activity
     */
    public Integer getFrequence() {
        return frequence;
    }

    /**
     * Set the frequency of activity
     * @param frequence The frequency to set
     * @return This ActiviteSportif object for method chaining
     */
    public ActiviteSportif setFrequence(Integer frequence) {
        this.frequence = frequence;
        return this;
    }

    /**
     * Get the nutritional plan associated with this activity
     * @return The PlanNutritionnels object
     */
    public PlanNutritionnels getPlan() {
        return plan;
    }

    /**
     * Set the nutritional plan associated with this activity
     * @param plan The PlanNutritionnels object to set
     * @return This ActiviteSportif object for method chaining
     */
    public ActiviteSportif setPlan(PlanNutritionnels plan) {
        this.plan = plan;
        return this;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        ActiviteSportif that = (ActiviteSportif) o;
        return Objects.equals(idActivite, that.idActivite);
    }

    @Override
    public int hashCode() {
        return Objects.hash(idActivite);
    }

    @Override
    public String toString() {
        return "ActiviteSportif{" +
                "idActivite=" + idActivite +
                ", type='" + type + '\'' +
                ", duree=" + duree +
                ", frequence=" + frequence +
                '}';
    }
}