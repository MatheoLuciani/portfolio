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
                    'description' => 'Spécialité Mathématique et Sciences économiques et sociales',
                    'highlights' => []
                ],
            ],
            
            // Expériences
            'experience' => [
                [
                    'title' => 'Technicien Réseau - Alternance',
                    'company' => 'Entreprise X',
                    'location' => 'Ville, France',
                    'period' => 'Sept 2023 - Présent',
                    'description' => 'Administration et maintenance de l\'infrastructure réseau de l\'entreprise.',
                    'tasks' => [
                        'Configuration et maintenance des équipements réseau Cisco',
                        'Support technique niveau 2 et 3',
                        'Gestion des accès VPN et sécurité périmétrique',
                        'Documentation technique et procédures'
                    ]
                ],
                [
                    'title' => 'Stage - Administration Système',
                    'company' => 'Entreprise Y',
                    'location' => 'Ville, France',
                    'period' => 'Avril 2023 - Juin 2023',
                    'description' => 'Stage de 8 semaines en administration système Linux.',
                    'tasks' => [
                        'Installation et configuration de serveurs Linux',
                        'Automatisation avec Bash et Ansible',
                        'Surveillance et monitoring avec Nagios',
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
                        ['name' => 'Bash Scripting', 'level' => 80],
                        ['name' => 'Apache / Nginx', 'level' => 75],
                        ['name' => 'Docker', 'level' => 65],
                    ]
                ],
                [
                    'category' => 'Cybersécurité',
                    'items' => [
                        ['name' => 'Firewall (iptables, pfSense)', 'level' => 80],
                        ['name' => 'Tests d\'intrusion', 'level' => 65],
                        ['name' => 'Analyse de vulnérabilités', 'level' => 70],
                        ['name' => 'SSL/TLS', 'level' => 75],
                        ['name' => 'SIEM', 'level' => 60],
                    ]
                ],
                [
                    'category' => 'Développement',
                    'items' => [
                        ['name' => 'Python', 'level' => 80],
                        ['name' => 'PHP / Symfony', 'level' => 70],
                        ['name' => 'SQL (MySQL, PostgreSQL)', 'level' => 75],
                        ['name' => 'Git / GitLab', 'level' => 80],
                        ['name' => 'API REST', 'level' => 70],
                    ]
                ],
                [
                    'category' => 'Virtualisation & Cloud',
                    'items' => [
                        ['name' => 'VMware ESXi / vSphere', 'level' => 75],
                        ['name' => 'Proxmox', 'level' => 70],
                        ['name' => 'Ansible', 'level' => 65],
                        ['name' => 'Terraform', 'level' => 50],
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