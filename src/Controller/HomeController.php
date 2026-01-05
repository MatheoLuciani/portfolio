<?php
// src/Controller/HomeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $data = [
            'name' => 'Mathéo Luciani',
            'title' => 'Étudiant en BUT Réseaux & Télécommunications',
            'school' => 'IUT de Roanne',
            'description' => 'Passionné par les réseaux, la cybersécurité et l\'administration système.',
            'github' => 'https://github.com/MatheoLuciani',
            'linkedin' => 'https://www.linkedin.com/in/matheo-luciani-800bb6396',
            
            // Projets mis en avant (3 derniers)
            'featured_projects' => [
                [
                    'id' => 1,
                    'title' => 'Infrastructure Réseau Entreprise',
                    'description' => 'Conception et déploiement d\'une infrastructure réseau complète avec segmentation VLAN et sécurisation.',
                    'technologies' => ['Cisco', 'VLANs', 'ACL'],
                    'image' => 'project1.jpg'
                ],
                [
                    'id' => 2,
                    'title' => 'Serveur Web Sécurisé',
                    'description' => 'Mise en place d\'un serveur LAMP sécurisé avec certificat SSL/TLS et durcissement système.',
                    'technologies' => ['Linux', 'Apache', 'SSL'],
                    'image' => 'project2.jpg'
                ],
                [
                    'id' => 3,
                    'title' => 'Script Monitoring Réseau',
                    'description' => 'Automatisation du monitoring réseau avec alertes et génération de rapports.',
                    'technologies' => ['Python', 'Bash', 'Ansible'],
                    'image' => 'project3.jpg'
                ],
            ],
            
            // Statistiques
            'stats' => [
                'projects' => 12,
                'technologies' => 15,
                'experience' => '1.5 ans'
            ]
        ];

        return $this->render('home/index.html.twig', [
            'data' => $data,
        ]);
    }
}