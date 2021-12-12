<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\RegistrationEmailSender;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{

//    /**
//     * @Route(path="/send-email", name="app.send_email")
//     */
////    public function indexAction(UserRepository $userRepository, RegistrationEmailSender $emailSender): Response
////    {
//////
//////        $user = $userRepository->findOneBy(['id' => 1]);
//////
//////        $email = (new TemplatedEmail())
//////            ->to('student@test.ru')
//////            ->subject('Тестовое письмо')
//////            ->text('Sending emails is fun again!');
//////
//////        try {
//////            $emailSender->sendSuccessUserRegistration($user);
//////        } catch (\Throwable $exception) {
//////            return new Response('Не удалось отправить письмо');
//////        }
//////
//////        return new Response('Письмо отправлено');
//////
////    }

}