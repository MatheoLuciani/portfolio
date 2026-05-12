<?php

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
        return $this->render('project/index.html.twig', [
            'projects' => $this->getProjectsData(),
        ]);
    }

    #[Route('/{id}', name: 'app_project_show', requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        $projects = $this->getProjectsData();
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

    private function getProjectsData(): array
    {
        return [
            [
    'id' => 1,
    'title' => 'Infrastructure Réseau Entreprise',
    'short_description' => 'Conception et déploiement d\'une infrastructure réseau complète.',
    'description' => "L’analyse réflexive est basée sur le modèle de GIBBS :

Étape 1 – EXPÉRIENCE : Ce projet consistait à concevoir de bout en bout l'architecture réseau d'une PME. J'ai dû segmenter le réseau pour isoler les services (VLANs), sécuriser les accès via des listes de contrôle (ACL) et mettre en place un serveur de transfert de fichiers (FTP) pour le partage de ressources internes, le tout configuré sur des équipements Cisco.

Étape 2 – SENTIMENTS : J'ai ressenti une grande responsabilité en manipulant les ACL, car une seule erreur de règle peut paralyser l'accès aux ressources critiques d'une entreprise. La réussite du déploiement du service FTP et la vérification des droits d'accès m'ont donné un sentiment d'accomplissement technique.

Étape 3 – ÉVALUATION : La segmentation par VLAN a parfaitement fonctionné, améliorant la fluidité du trafic. Le point plus complexe a été la configuration fine des ACL pour autoriser le flux FTP (ports 20/21) tout en bloquant les accès non autorisés, ce qui a demandé plusieurs phases de tests et de corrections.

Étape 4 – ANALYSE : J'ai mobilisé mes connaissances sur le modèle OSI et le filtrage par paquets. J'ai compris que la sécurité réseau ne se limite pas à fermer des ports, mais à comprendre précisément les besoins des protocoles (comme le mode actif/passif du FTP) pour ne pas bloquer les services légitimes.

Étape 5 – CONCLUSION : Je retiens que la sécurité et la disponibilité sont un équilibre fragile. Si c'était à refaire, j'utiliserais une approche de 'moindre privilège' plus stricte dès le début de la configuration pour limiter les vecteurs d'attaque potentiels.

Étape 6 – PLAN D'ACTION : Je vais approfondir mes connaissances sur la sécurisation des protocoles de transfert (comme SFTP ou FTPS) pour remplacer le FTP standard. Je compte également me former sur la mise en place de pare-feu (Firewalls) dédiés pour compléter les configurations réalisées sur routeurs.



Document de preuve :
· Le contexte : Mise en place d'un réseau local sécurisé pour une structure d'entreprise avec services partagés.
· Les savoirs mis en œuvre : Commutation (VLANs), filtrage de paquets (ACL), protocoles de transfert de fichiers (FTP).
· Les savoir-faire mis en œuvre : Configuration d'interfaces Cisco IOS, création de règles de sécurité IP, gestion de services réseau.
· Les savoir-être mis en œuvre : Rigueur méthodologique et capacité à tester systématiquement chaque barrière de sécurité.
· La tâche réalisée et les résultats : Un réseau segmenté et sécurisé où chaque service accède uniquement aux ressources nécessaires, avec un serveur FTP opérationnel.",
    'technologies' => ['Cisco IOS', 'VLANs', 'ACL', 'FTP'],
    'date' => '2026',
    'category' => 'Réseaux',
],
            [
                'id' => 6,
                'title' => 'Site Web Symfony',
                'short_description' => 'Développement d\'un site web avec Symfony.',
                'description' => 'L’analyse réflexive est basée sur le modèle de GIBBS :

Étape 1 – EXPÉRIENCE : Dans le cadre de la centralisation de mes compétences, j\'ai entrepris de développer un e-portfolio dynamique. Le projet a été réalisé en 2026 en utilisant le framework Symfony 7. J\'ai dû concevoir l\'architecture MVC, gérer le templating avec Twig et assurer la migration de mon environnement de travail complet lors de mon passage sur macOS.

Étape 2 – SENTIMENTS : Au départ, j\'ai ressenti une certaine appréhension face à la complexité de Symfony et aux défis techniques liés au changement de système d\'exploitation (Mac). Cependant, la structure rigoureuse du framework m\'a apporté un sentiment de maîtrise et de satisfaction professionnelle au fur et à mesure que les composants devenaient fonctionnels.

Étape 3 – ÉVALUATION : Ce qui a bien fonctionné : la modularité du code grâce aux templates Twig et la fluidité de l\'interface "Dark Mode". Ce qui a moins bien marché : la gestion initiale des dépendances lors de la migration Git, qui a nécessité une réinstallation complète des outils (Homebrew, Composer) pour retrouver un environnement stable.

Étape 4 – ANALYSE : J\'ai mobilisé des savoirs en programmation orientée objet (PHP 8+) et en intégration web (Bootstrap 5). Le passage sur macOS a exigé une compréhension approfondie de la gestion des paquets via terminal. L\'utilisation d\'une architecture MVC a été l\'outil clé pour séparer la logique de données de l\'affichage, rendant le site beaucoup plus évolutif qu\'un site statique.

Étape 5 – CONCLUSION : Je retiens que la préparation de l\'environnement de développement est aussi cruciale que le code lui-même. Si c\'était à refaire, j\'anticiperais davantage la configuration Docker pour isoler l\'environnement dès le début du projet, ce qui aurait facilité la migration entre Windows et Mac.

Étape 6 – PLAN D\'ACTION : Pour mes prochains projets, je vais automatiser le déploiement de ma base de données via Doctrine ORM. Je compte également intégrer un service d\'envoi d\'emails (Mailer) et sécuriser un espace administration. Mon objectif est de passer d\'une gestion de données statique à un backend totalement administrable sous 3 mois.



Document de preuve :
· Le contexte : Création d\'un support de communication professionnel pour valoriser mon parcours en R&T.
· Les savoirs mis en œuvre : Architecture MVC, Framework Symfony 7, moteur de rendu Twig, programmation orientée objet (POO).
· Les savoir-faire mis en œuvre : Installation d\'un environnement de développement sous macOS, gestion du routage dynamique, création de templates hérités.
· Les savoir-être mis en œuvre : Autonomie dans l\'apprentissage d\'un nouveau framework et rigueur dans l\'organisation du code.
· La tâche réalisée et les résultats : Site web fonctionnel avec affichage dynamique des projets, design responsive "Dark Mode" et navigation sécurisée.',
                'technologies' => ['PHP', 'Symfony', 'MySQL', 'Bootstrap'],
                'date' => '2025',
                'category' => 'Développement Web',
            ],
            [
            'id' => 7,
            'title' => 'Déploiement WordPress sous Docker',
            'short_description' => 'Mise en place d\'une architecture conteneurisée pour un CMS.',
            'description' => "L’analyse réflexive est basée sur le modèle de GIBBS :

Étape 1 – EXPÉRIENCE : Dans le cadre de la SAÉ 2.03, j'ai dû déployer une solution CMS WordPress complète en utilisant la conteneurisation Docker. L'objectif était de créer une infrastructure reproductible comprenant trois services interconnectés : WordPress pour le contenu, MariaDB pour la base de données et phpMyAdmin pour l'administration SQL, le tout orchestré par un fichier Docker-Compose.

Étape 2 – SENTIMENTS : J'ai d'abord été impressionné par la puissance de Docker, qui permet de monter une infrastructure entière en quelques secondes. Cependant, j'ai ressenti de la frustration face aux erreurs de connexion entre les conteneurs et aux problèmes de droits d'écriture sur les volumes, ce qui a mis à l'épreuve ma patience et ma rigueur logique.

Étape 3 – ÉVALUATION : Ce qui a très bien fonctionné, c'est l'aspect 'Infrastructure as Code' : une fois le fichier YAML stabilisé, le déploiement est devenu instantané et fiable. Ce qui a été plus complexe, c'est la gestion de la persistance des données (volumes) et la sécurisation des accès, qui demandent une compréhension précise du cycle de vie des conteneurs.

Étape 4 – ANALYSE : J'ai mobilisé des compétences en administration système Linux et en réseaux virtuels. J'ai compris que Docker ne se limite pas à 'lancer des logiciels', mais nécessite une vraie stratégie de réseau (Docker Bridge) pour isoler la base de données et de gestion de l'environnement (fichiers .env) pour sécuriser les mots de passe.

Étape 5 – CONCLUSION : Je retiens que la conteneurisation est indispensable pour garantir qu'un projet fonctionne de la même manière sur mon Mac que sur un serveur de production. Si c'était à refaire, je structurerais mes volumes de manière plus granulaire dès le départ pour éviter les conflits de permissions entre l'hôte et le conteneur.

Étape 6 – PLAN D'ACTION : Fort de cette expérience, je vais désormais systématiser l'usage de Docker pour tous mes développements locaux, y compris pour mon portfolio Symfony. À l'avenir, je souhaite explorer Docker Swarm ou Kubernetes pour apprendre à gérer la montée en charge et la haute disponibilité de ces conteneurs.



Document de preuve :
· Le contexte : Mise en place d'une infrastructure web isolée et reproductible pour le déploiement d'un CMS.
· Les savoirs mis en œuvre : Conteneurisation, orchestration Docker-Compose, gestion des volumes et des réseaux virtuels (Bridge).
· Les savoir-faire mis en œuvre : Rédaction d'un fichier docker-compose.yml, interconnexion WordPress/MariaDB, persistance des données SQL via volumes.
· Les savoir-être mis en œuvre : Logique systémique pour comprendre les interactions entre services et persévérance face aux erreurs de permissions.
· La tâche réalisée et les résultats : Infrastructure complète lancée en une seule commande, site WordPress fonctionnel avec base de données sécurisée et administrable.",
            'technologies' => ['Docker', 'MariaDB', 'WordPress', 'phpMyAdmin'],
            'date' => '2026',
            'category' => 'Administration Système',
            ],
        ];
    }
}