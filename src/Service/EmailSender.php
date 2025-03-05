<?php

namespace App\Service;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\Reservation;

class EmailSender
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Envoie un email contenant les détails de la réservation.
     *
     * @param string $email L'email du destinataire.
     * @param Reservation $reservation L'objet de réservation.
     *
     * @throws TransportExceptionInterface
     */
    public function sendReservationDetailsEmail(string $email, Reservation $reservation): void
    {
        // Création de l'email
        $email = (new Email())
            ->from('adam.lassidi@esprit.tn') // L'email de l'expéditeur
            ->to($email) // L'email du destinataire
            ->subject('Détails de votre réservation') // Le sujet du mail
            ->html(sprintf('
            <div style="font-family: Arial, sans-serif; color: #333; padding: 20px; background-color: #f7f7f7;">
                <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                    <h2 style="color: #2F80EC; text-align: center;">Détails de votre réservation</h2>
                    <hr style="border: none; border-top: 2px solid #AC9CBD; margin: 20px 0;">
                    <p style="font-size: 16px; line-height: 1.6;">
                        Bonjour %s,
                    </p>
                    <p style="font-size: 16px; line-height: 1.6;">
                        Vous avez effectué une réservation pour l\'événement "%s". Voici les détails de votre réservation :
                    </p>
                    <ul style="font-size: 16px; line-height: 1.6;">
                        <li><strong>Nom de la réservation :</strong> %s</li>
                        <li><strong>Date de réservation :</strong> %s</li>
                        <li><strong>Nombre de places réservées :</strong> %d</li>
                        <li><strong>Événement :</strong> %s</li>
                    </ul>

                    <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">
                    <p style="font-size: 12px; line-height: 1.4; text-align: center; color: #aaa;">
                    </p>
                </div>
            </div>',
                $reservation->getName(),
                $reservation->getEvent()->getName(),
                $reservation->getName(),
                $reservation->getDateReservation()->format('d/m/Y'),
                $reservation->getNbrPlaceReserve(),
                $reservation->getEvent()->getName()
            ));

        // Envoi de l'email
        $this->mailer->send($email);
    }
}
