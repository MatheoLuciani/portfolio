<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PortfolioController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Données du portfolio (à personnaliser)
        $portfolioData = [
            'name' => 'Mathéo Luciani',
            'title' => 'Étudiant en BUT Réseaux & Télécommunications',
            'school' => 'IUT de Roanne',
            'email' => 'matheo.luciani@etu.univ-st-etienne.fr',
            'phone' => '+33 7 45 24 29 41',
            'location' => 'Roanne, France',
            'github' => 'https://github.com/MatheoLuciani',
            'linkedin' => 'https://linkedin.com/in/matheo-luciani-800bb6396',
            
            'projects' => [
                [
                    'title' => 'Configuration Réseau d\'Entreprise',
                    'description' => 'Mise en place d\'une infrastructure réseau complète avec VLANs, routage inter-VLAN et sécurisation des accès.',
                    'technologies' => ['Cisco', 'VLANs', 'ACL']
                ],
                [
                    'title' => 'Serveur Web Sécurisé',
                    'description' => 'Déploiement et sécurisation d\'un serveur web sous Linux avec Apache, PHP et MySQL. Configuration SSL/TLS.',
                    'technologies' => ['Linux', 'Apache', 'SSL']
                ],
                [
                    'title' => 'Script d\'Administration Réseau',
                    'description' => 'Automatisation des tâches réseau avec Python : monitoring, sauvegarde de configurations, alertes.',
                    'technologies' => ['Python', 'Bash', 'Ansible']
                ],
                [
                    'title' => 'Infrastructure Virtualisée',
                    'description' => 'Création d\'une infrastructure virtualisée avec VMware : serveurs, stockage partagé et haute disponibilité.',
                    'technologies' => ['VMware', 'ESXi', 'vSphere']
                ],
                [
                    'title' => 'Audit de Sécurité',
                    'description' => 'Réalisation d\'un audit de sécurité complet : tests d\'intrusion, analyse de vulnérabilités, recommandations.',
                    'technologies' => ['Kali', 'Nmap', 'Wireshark']
                ],
                [
                    'title' => 'Plateforme Web PHP',
                    'description' => 'Développement d\'une application web de gestion avec Symfony : authentification, CRUD, API REST.',
                    'technologies' => ['PHP', 'Symfony', 'MySQL']
                ],
            ],
            
            'skills' => [
                'Réseaux & Télécoms',
                'Administration Linux',
                'Virtualisation',
                'Cybersécurité',
                'Python/Bash',
                'PHP/Symfony',
                'Docker',
                'Git/GitLab'
            ],
            
            'education' => [
                'degree' => 'BUT Réseaux & Télécommunications',
                'school' => 'IUT de Roanne',
                'period' => '2022-2025',
                'description' => 'Approche par compétences couvrant l\'administration réseaux, la cybersécurité, la virtualisation et le pilotage de projets informatiques.'
            ]
        ];

        return $this->render('portfolio/index.html.twig', [
            'data' => $portfolioData,
        ]);
    }
    
    #[Route('/contact', name: 'app_contact', methods: ['POST'])]
    public function contact(): Response
    {
        // Logique de traitement du formulaire de contact
        // À implémenter selon vos besoins (envoi d'email, etc.)
        
        $this->addFlash('success', 'Message envoyé avec succès !');
        return $this->redirectToRoute('app_home');
    }
}