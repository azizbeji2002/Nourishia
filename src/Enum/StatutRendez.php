<?php

namespace App\Enum;

enum StatutRendez: string {
    case En_Attente = 'en attente';
    case ANNULEE = 'annulée';
    case CONFIMEE = 'confirmée';
}
