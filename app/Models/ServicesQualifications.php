<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesQualifications extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "access_maintain",
        "support_worker",
        "personalcare_safety",
        "personal_activities",
        "specialisations",
        "Life_stage",
        "travel_transport",
        "vehicle_modification",
        "home_modification",
        "positive_behaviour_support",
        "equipment_receration",
        "vision_equipment",
        "nursing_care",
        "tasks_shared_living",
        "innovative_community",
        "development_life_skill",
        "childhood_supports",
        "specialised_hearing",
        "household_tasks",
        "interpreting_translating",
        "hearing_equipement",
        "Products_household_tasks",
        "communication_information",
        "participation_community",
        "physiology_personalWellbeing",
        "plan_managment",
        "therapeutic_support",
        "driver_training",
        "assistance_animals",
        "specialist_disability_accommodation",
        "support_coordination",
        "supported_employment",
        "hearing_services",
        "custom_prosthetics",
        "centre_based_activities",
        "administering_medication",
        "infectious_hazardous_substances",
    ];
}