<?php
namespace App\Service;

use App\Entity\User;

class Mailer
{
    private $swiftMailer;

    private $twig;

    public function __construct(\Swift_Mailer $swiftMailer, \Twig\Environment $twig)
    {
        $this->swiftMailer = $swiftMailer;
        $this->twig = $twig;
    }

    public function orderConfirmation(User $user)
    {
        $message = (new \Swift_Message('Confirmation de commande'))
            ->setFrom('wbrstore.noreply@gmail.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->twig->render('emails/order_confirmation.html.twig'),
                'text/html'
            );

        $this->swiftMailer->send($message);
    }
}
