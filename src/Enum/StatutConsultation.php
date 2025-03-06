<?php

namespace App\Enum;

enum StatutConsultation: string {
    case PLANIFIEE = 'Planifiée';
    case ANNULEE = 'Annulée';
    case TERMINEE = 'Terminée';
}

