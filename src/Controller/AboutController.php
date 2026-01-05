<?php
// src/Controller/AboutController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController extends AbstractController
{
    #[Route('/parcours', name: 'app_about')]
    public function index(): Response
    {
        $data = [
            'name' => 'Mathéo Luciani',
            'title' => 'Étudiant en BUT Réseaux & Télécommunications',
            'bio' => 'Étudiant passionné par les technologies réseaux et la cybersécurité. Fort d\'une expérience pratique en administration système Linux, virtualisation et développement, je recherche constamment à approfondir mes compétences techniques.',
            
            // Formation
            'education' => [
                [
                    'degree' => 'BUT Réseaux & Télécommunications',
                    'school' => 'IUT de Roanne',
                    'location' => 'Roanne, France',
                    'period' => "2025 - Aujourd'hui",
                    'description' => 'Formation en alternance axée sur l\'administration réseaux, la cybersécurité, la virtualisation et le développement. Approche par compétences avec projets professionnels.',
                    'highlights' => [
                        'Administration de réseaux locaux et étendus',
                        'Sécurisation d\'infrastructures informatiques',
                        'Virtualisation et cloud computing',
                        'Développement web et scripting'
                    ]
                ],
                [
                    'degree' => 'Baccalauréat Général',
                    'school' => 'Lycée Jean-Puy',
                    'location' => 'Roanne, France',
                    'period' => '2022 - 2025',
                    'description' => 'Spécialité Mathématique et Sciences économiques et sociales ( - Physique-Chimie abandonné en Première)',
                    'highlights' => []
                ],
            ],
            
            // Expériences
            'experience' => [
                [
                    'title' => 'Technicien Réseau - Stage',
                    'company' => "Collège St Thérèse Jeanne D'Arc",
                    'location' => 'Thizy, France',
                    'period' => 'juin 2024',
                    'description' => 'Administration et maintenance de l\'infrastructure réseau du collège.',
                    'tasks' => [
                        'Configuration et maintenance des équipements réseau',
                        'Gestion des accès VPN et sécurité périmétrique',
                        'Documentation technique et procédures'
                    ]
                ],
                [
                    'title' => 'Stage - Administration Web',
                    'company' => 'Entreprise Indépendante',
                    'location' => 'Montagny, France',
                    'period' => 'Juin 2022',
                    'description' => "Stage d'une semaine en administration web html + découverte des serveurs.",
                    'tasks' => [
                        "Création d'un site web de zéro en HTML 5",
                        "Mise en ligne via un hebergeur",
                        'Gestion des sauvegardes'
                    ]
                ],
            ],
            
            // Compétences techniques
            'skills' => [
                [
                    'category' => 'Réseaux & Télécoms',
                    'items' => [
                        ['name' => 'Routage & Commutation', 'level' => 85],
                        ['name' => 'VLANs & Spanning Tree', 'level' => 80],
                        ['name' => 'VPN (IPSec, OpenVPN)', 'level' => 75],
                        ['name' => 'Protocoles (TCP/IP, OSPF, BGP)', 'level' => 80],
                        ['name' => 'Wireshark', 'level' => 70],
                    ]
                ],
                [
                    'category' => 'Administration Système',
                    'items' => [
                        ['name' => 'Linux (Debian, Ubuntu, CentOS)', 'level' => 85],
                        ['name' => 'Windows Server', 'level' => 70],
                        ['name' => 'Bash Scripting', 'level' => 20],
                        ['name' => 'Apache / Nginx', 'level' => 0],
                        ['name' => 'Docker', 'level' => 25],
                    ]
                ],
                [
                    'category' => 'Cybersécurité',
                    'items' => [
                        ['name' => 'Firewall (iptables, pfSense)', 'level' => 50],
                        ['name' => 'Tests d\'intrusion', 'level' => 10],
                        ['name' => 'Analyse de vulnérabilités', 'level' => 60],
                        ['name' => 'SSL/TLS', 'level' => 50],
                        ['name' => 'SIEM', 'level' => 0],
                    ]
                ],
                [
                    'category' => 'Développement',
                    'items' => [
                        ['name' => 'Python', 'level' => 80],
                        ['name' => 'PHP / Symfony', 'level' => 70],
                        ['name' => 'SQL (MySQL, PostgreSQL)', 'level' => 50],
                        ['name' => 'Git / GitLab', 'level' => 80],
                        ['name' => 'API REST', 'level' => 0],
                    ]
                ],
                [
                    'category' => 'Virtualisation & Cloud',
                    'items' => [
                        ['name' => 'VMware ESXi / vSphere', 'level' => 15],
                        ['name' => 'Proxmox', 'level' => 0],
                        ['name' => 'Ansible', 'level' => 0],
                        ['name' => 'Terraform', 'level' => 0],
                    ]
                ],
            ],
            
            // Certifications
            'certifications' => [
                [
                    'name' => 'CCNA',
                    'organization' => 'Cisco',
                    'date' => '2024',
                    'credential' => null
                ],
                // Ajoutez vos certifications ici
            ],
            
            // Centres d'intérêt
            'interests' => [
                'Veille technologique et cybersécurité',
                'Participation à des CTF (Capture The Flag)',
                'Open Source et contributions GitHub',
                'Homelab et expérimentations réseau'
            ]
        ];

        return $this->render('about/index.html.twig', [
            'data' => $data,
        ]);
    }
}