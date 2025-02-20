<?php

namespace App\Enum;

enum StatutConsultation: string {
    case PLANIFIEE = 'planifiée';
    case ANNULEE = 'annulée';
    case TERMINEE = 'terminée';
}
