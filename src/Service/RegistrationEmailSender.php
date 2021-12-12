<?php

namespace App\Service;

use App\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class RegistrationEmailSender
{
    private const SUBJECT_TITLE = 'Вы успешно зарегистрированы';
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendSuccessUserRegistration(User $user): void
    {
        $preparedEmail = $this->prepareEmail($user);

        $this->mailer->send($preparedEmail);
    }

    private function prepareEmail(User $user): TemplatedEmail
    {
        $email = new TemplatedEmail();
        $email->addTo(new Address($user->getEmail(), $user->getFullName()))
            ->subject(self::SUBJECT_TITLE)
            ->htmlTemplate('email/email-success-registration.html.twig')
            ->context([
                'name' => $user->getFullName(),
                'login' => $user->getEmail()
            ]);

        return $email;
    }

}