<?php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserVerifiedVoter extends Voter
{
    // Cette méthode indique si ce voter est concerné par un attribut spécifique et un sujet donné.
    protected function supports(string $attribute, $subject): bool
    {
        // Nous supportons l'attribut "IS_VERIFIED" et un sujet de type User
        return $attribute === 'IS_VERIFIED' && $subject instanceof User;
    }

    // Cette méthode est appelée pour décider si l'accès est autorisé ou non.
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        // Récupérer l'utilisateur
        /** @var User $user */
        $user = $subject;

        // Vérifier si l'utilisateur est vérifié (champ `isVerified`)
        return $user->isVerified(); // Retourne true si l'utilisateur est vérifié, sinon false
    }
}
