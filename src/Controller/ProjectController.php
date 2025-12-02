<?php
// src/Controller/ProjectController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/projets')]
class ProjectController extends AbstractController
{
    #[Route('', name: 'app_projects')]
    public function index(): Response
    {
        $projects = [
            [
                'id' => 1,
                'title' => 'Infrastructure Réseau Entreprise',
                'short_description' => 'Conception et déploiement d\'une infrastructure réseau complète.',
                'description' => 'Mise en place d\'une infrastructure réseau d\'entreprise comprenant la segmentation en VLANs, le routage inter-VLAN, la mise en place de listes de contrôle d\'accès (ACL) et la sécurisation des accès distants via VPN.',
                'technologies' => ['Cisco IOS', 'VLANs', 'ACL', 'VPN', 'OSPF'],
                'date' => '2024',
                'category' => 'Réseaux',
                'image' => 'network.jpg',
                'github' => null,
                'demo' => null
            ],
            [
                'id' => 2,
                'title' => 'Serveur Web Sécurisé LAMP',
                'short_description' => 'Déploiement et sécurisation d\'un serveur web sous Linux.',
                'description' => 'Installation et configuration complète d\'un serveur LAMP (Linux, Apache, MySQL, PHP). Mise en place d\'un certificat SSL/TLS avec Let\'s Encrypt, durcissement système, configuration de pare-feu (iptables), et mise en place de sauvegardes automatiques.',
                'technologies' => ['Linux', 'Apache', 'MySQL', 'PHP', 'SSL/TLS', 'Let\'s Encrypt'],
                'date' => '2024',
                'category' => 'Administration Système',
                'image' => 'server.jpg',
                'github' => 'https://github.com/username/lamp-secure',
                'demo' => null
            ],
            [
                'id' => 3,
                'title' => 'Script Monitoring Réseau Python',
                'short_description' => 'Automatisation du monitoring réseau avec Python.',
                'description' => 'Développement d\'un script Python pour le monitoring automatisé de l\'infrastructure réseau. Vérification de disponibilité, collecte de métriques, génération d\'alertes par email, et création de rapports au format PDF.',
                'technologies' => ['Python', 'Bash', 'SNMP', 'Ansible', 'Cron'],
                'date' => '2024',
                'category' => 'Développement',
                'image' => 'monitoring.jpg',
                'github' => 'https://github.com/username/network-monitor',
                'demo' => null
            ],
            [
                'id' => 4,
                'title' => 'Infrastructure Virtualisée VMware',
                'short_description' => 'Création d\'une infrastructure virtualisée complète.',
                'description' => 'Mise en place d\'une infrastructure virtualisée avec VMware ESXi. Configuration de plusieurs serveurs virtuels, stockage partagé via NAS, haute disponibilité avec vMotion, et gestion centralisée avec vSphere.',
                'technologies' => ['VMware ESXi', 'vSphere', 'vMotion', 'NAS', 'iSCSI'],
                'date' => '2023',
                'category' => 'Virtualisation',
                'image' => 'vmware.jpg',
                'github' => null,
                'demo' => null
            ],
            [
                'id' => 5,
                'title' => 'Audit de Sécurité Réseau',
                'short_description' => 'Réalisation d\'un audit de sécurité complet.',
                'description' => 'Audit de sécurité d\'une infrastructure réseau : tests d\'intrusion, analyse de vulnérabilités avec Nessus, capture et analyse de trafic avec Wireshark, tests de pénétration avec Metasploit, et rédaction d\'un rapport de recommandations.',
                'technologies' => ['Kali Linux', 'Nmap', 'Wireshark', 'Metasploit', 'Nessus'],
                'date' => '2023',
                'category' => 'Cybersécurité',
                'image' => 'security.jpg',
                'github' => null,
                'demo' => null
            ],
            [
                'id' => 6,
                'title' => 'Application Web Symfony',
                'short_description' => 'Développement d\'une application web avec Symfony.',
                'description' => 'Création d\'une application web de gestion avec Symfony : authentification utilisateur, système CRUD complet, API REST, intégration de base de données MySQL, et interface responsive avec Bootstrap.',
                'technologies' => ['PHP', 'Symfony', 'MySQL', 'API REST', 'Bootstrap'],
                'date' => '2024',
                'category' => 'Développement Web',
                'image' => 'symfony.jpg',
                'github' => 'https://github.com/username/symfony-app',
                'demo' => 'https://demo.example.com'
            ],
        ];

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[Route('/{id}', name: 'app_project_show', requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        // Récupérer les détails d'un projet spécifique
        // Pour l'instant on simule avec un tableau
        $projects = $this->getProjects();
        
        $project = null;
        foreach ($projects as $p) {
            if ($p['id'] === $id) {
                $project = $p;
                break;
            }
        }

        if (!$project) {
            throw $this->createNotFoundException('Projet non trouvé');
        }

        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    private function getProjects(): array
    {
        // Même liste que dans index() - à centraliser plus tard
        return [
            [
                'id' => 1,
                'title' => 'Infrastructure Réseau Entreprise',
                'short_description' => 'Conception et déploiement d\'une infrastructure réseau complète.',
                'description' => 'Mise en place d\'une infrastructure réseau d\'entreprise comprenant la segmentation en VLANs, le routage inter-VLAN, la mise en place de listes de contrôle d\'accès (ACL) et la sécurisation des accès distants via VPN.',
                'technologies' => ['Cisco IOS', 'VLANs', 'ACL', 'VPN', 'OSPF'],
                'date' => '2024',
                'category' => 'Réseaux',
            ],
            // ... autres projets
        ];
    }
}