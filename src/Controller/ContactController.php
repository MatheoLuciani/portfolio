<?php
// src/Controller/ContactController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        $data = [
            'name' => 'Mathéo Luciani',
            'email' => 'matheo.luciani@etu.univ-st-etienne.fr',
            'phone' => '+33 7 45 24 29 41',
            'location' => 'Roanne, France',
            'github' => 'https://github.com/MatheoLuciani',
            'linkedin' => 'https://linkedin.com/in/tonusername',
            'twitter' => null, // Optionnel
        ];

        return $this->render('contact/index.html.twig', [
            'data' => $data,
        ]);
    }

    #[Route('/contact/send', name: 'app_contact_send', methods: ['POST'])]
    public function send(Request $request): Response
    {
        // Récupération des données du formulaire
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $subject = $request->request->get('subject', 'Nouveau message');
        $message = $request->request->get('message');

        // Validation basique
        if (empty($name) || empty($email) || empty($message)) {
            $this->addFlash('error', 'Tous les champs sont obligatoires.');
            return $this->redirectToRoute('app_contact');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addFlash('error', 'Adresse email invalide.');
            return $this->redirectToRoute('app_contact');
        }

        // TODO: Implémenter l'envoi d'email
        // Pour l'instant, on simule juste le succès
        // Vous pouvez utiliser symfony/mailer pour envoyer des emails
        
        // Exemple de ce qu'il faudra faire :
        // $email = (new Email())
        //     ->from($email)
        //     ->to('ton.email@etu.univ-st-etienne.fr')
        //     ->subject('Portfolio - ' . $subject)
        //     ->text("Nom: $name\nEmail: $email\n\nMessage:\n$message");
        // 
        // $mailer->send($email);

        $this->addFlash('success', 'Votre message a été envoyé avec succès ! Je vous répondrai dans les plus brefs délais.');
        
        return $this->redirectToRoute('app_contact');
    }
}