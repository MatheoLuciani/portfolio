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
                'description' => 'Étude de cas : Déploiement Sécurisé d\'une Architecture Multi-Sites (SAÉ 2.01)

1. Objectifs et Périmètre du Projet
L\'objectif principal de ce projet était de concevoir et de déployer une topologie réseau interconnectant 4 sites géographiques distincts (LAN 1 à 4) via un cœur de réseau opérateur central en boucle. Le défi consistait à assurer une connectivité totale tout en garantissant une isolation stricte des flux inter-services.

2. Méthodologie et Mise en œuvre
L\'architecture a été structurée pour répondre à des besoins réels d\'entreprise :
- Plan d\'adressage : Utilisation du bloc IP 172.16.0.0/16 avec un découpage VLSM optimisé pour chaque sous-réseau.
- Segmentation : Mise en place de VLANs spécifiques (VLAN 10 Administration, VLAN 20 Services, VLAN 30/40 Formations).
- Routage : Configuration du protocole de routage dynamique RIPv2 pour l\'échange des tables de routage entre les sites et utilisation du "Router-on-a-Stick" pour le routage inter-VLAN local.

3. Défis Techniques et Problématiques
- Convergence : Assurer que chaque site puisse joindre les autres à travers le cœur de réseau sans latence ni boucle.
- Sécurisation : Mise en place de la translation d\'adresses (NAT) et de listes de contrôle d\'accès (ACL) pour filtrer les trafics entrants et sortants.
- Réalisation Physique : Passage de la simulation Packet Tracer à la configuration sur du matériel Cisco réel.

4. Solutions Appliquées
- Optimisation : Application de masques de sous-réseau variables pour économiser les adresses IP.
- Validation technique : Utilisation systématique des commandes "show ip route" pour vérifier la propagation des routes et tests de connectivité (ping/tracert) validant le succès de l\'interconnexion.

5. Conclusion et Perspectives
Ce projet a consolidé mes compétences en administration réseau Cisco. Il m\'a permis de maîtriser les fondamentaux de la commutation et du routage dynamique, essentiels pour des infrastructures de plus grande envergure.',
                'technologies' => ['Cisco IOS', 'VLANs', 'ACL', 'FTP'],
                'date' => '2026',
                'category' => 'Réseaux',
            ],
            [
                'id' => 6,
                'title' => 'Site Web Symfony',
                'short_description' => 'Développement d\'un site web avec Symfony.',
                'description' => 'Étude de cas : Développement d\'un E-Portfolio Dynamique avec Symfony

1. Objectifs et Périmètre du Projet
L\'objectif principal de ce projet était de concevoir et de déployer une plateforme web professionnelle permettant de centraliser mes compétences en réseaux, cybersécurité et développement. Contrairement à un simple site statique, j\'ai choisi d\'utiliser le framework Symfony 7 pour bénéficier d\'une architecture robuste, d\'une gestion efficace des templates avec Twig et d\'une structure MVC (Modèle-Vue-Contrôleur) évolutive.

2. Méthodologie et Mise en œuvre
Pour la réalisation, j\'ai suivi un cycle de développement structuré :

Architecture logicielle : Mise en place d\'un Controller dédié (ProjectController) pour gérer la logique de navigation et le passage de données aux vues.

Templating dynamique : Utilisation de Twig pour créer un système de templates hérités (base.html.twig). Cela m\'a permis de modulariser les composants répétitifs comme la barre de navigation et le footer.

Gestion des données : Dans cette phase de développement, j\'ai implémenté une structure de données sous forme de tableaux PHP structurés afin de simuler une base de données, permettant une transition facile vers Doctrine ORM et MySQL à l\'avenir.

Design et UX : J\'ai opté pour une approche "Dark Mode" moderne en utilisant CSS3 (variables personnalisées) et Bootstrap 5. L\'accent a été mis sur l\'interactivité, notamment en transformant chaque carte de projet en un bouton global cliquable pour améliorer le parcours utilisateur.

3. Défis Techniques et Problématiques
Le passage à un environnement de développement sous macOS et l\'utilisation d\'un framework professionnel ont apporté plusieurs défis :

Migration d\'environnement : Réinstaller l\'intégralité de la pile technique (Homebrew, PHP, Composer, Symfony CLI) sur une nouvelle architecture système tout en récupérant les sources via Git sans corrompre les dépendances.

Cohérence de l\'UI : Le défi était de maintenir un design épuré tout en rendant l\'interface intuitive. Transformer des éléments complexes (cartes avec badges, textes et dates) en éléments entièrement cliquables sans briser la sémantique HTML a nécessité une attention particulière sur le CSS.

Routage dynamique : Gérer l\'affichage de pages de détails uniques à partir d\'un identifiant (ID) passé dans l\'URL, tout en s\'assurant que si un projet n\'existe pas, l\'utilisateur est redirigé proprement.

4. Solutions Appliquées
Normalisation du CSS : Utilisation de variables :root pour une gestion centralisée des couleurs (gris anthracite, blanc pur et bordures sombres), garantissant une harmonie visuelle sur toutes les pages.

Optimisation du Routage : Mise en place de restrictions par expressions régulières dans le Controller (ex: requirements: [\'id\' => \'\d+\']) pour sécuriser les URLs.

Architecture centralisée : Création d\'une méthode privée getProjectsData() pour centraliser la source de vérité des données, évitant la redondance de code entre la page d\'accueil et la page de détails.

5. Conclusion et Perspectives
Ce projet m\'a permis de consolider mes bases sur l\'écosystème PHP moderne. La prochaine étape sera l\'intégration d\'une base de données SQL pour rendre le contenu administrable via un backend sécurisé, ainsi que l\'ajout d\'une interface de contact liée à un service d\'envoi d\'emails.',
                'technologies' => ['PHP', 'Symfony', 'MySQL', 'Bootstrap'],
                'date' => '2025',
                'category' => 'Développement Web',
            ],
            [
            'id' => 7,
            'title' => 'Déploiement WordPress sous Docker',
            'short_description' => 'Mise en place d\'une architecture conteneurisée pour un CMS.',
            'description' => 'Étude de cas : Mise en place d\'une solution informatique pour l\'entreprise (SAÉ 23)

                1. Objectifs et Périmètre du Projet
                L\'objectif de cette SAÉ était de créer un environnement de travail reproductible et isolé utilisant la conteneurisation. Il s\'agissait de déployer un CMS WordPress fonctionnel interconnecté avec une base de données MariaDB, tout en permettant une gestion simplifiée via phpMyAdmin.

                2. Méthodologie et Mise en œuvre
                Pour ce projet, j\'ai utilisé une approche Infrastructure as Code (IaC) :
                - Orchestration : Utilisation de Docker et Docker-Compose pour définir et lancer plusieurs conteneurs simultanément (WordPress, MariaDB, phpMyAdmin).
                - Persistance des données : Configuration de volumes Docker pour garantir que les données de la base de données et les fichiers WordPress ne soient pas perdus lors de l\'arrêt des conteneurs.
                - Gestion SQL : Création et manipulation de bases de données via phpMyAdmin, incluant l\'import/export de sauvegardes SQL et la gestion des utilisateurs.
                - Sécurisation : Analyse des failles potentielles comme les injections SQL et mise en place de bonnes pratiques de configuration.

                3. Défis Techniques et Problématiques
                - Communication Inter-Conteneurs : Configurer correctement le réseau Docker pour que le conteneur WordPress puisse communiquer de manière isolée et sécurisée avec le conteneur MariaDB.
                - Gestion des Permissions : Résoudre les problèmes de droits d\'écriture sur les volumes montés pour permettre les mises à jour et l\'installation de thèmes WordPress.
                - Optimisation des Ressources : Apprendre à limiter l\'empreinte mémoire des conteneurs tout en conservant une fluidité de navigation sur le site.

                4. Solutions Appliquées
                - Réseaux Docker : Création d\'un réseau privé (bridge) dédié pour isoler le trafic de la base de données de l\'extérieur.
                - Automatisation : Écriture de scripts YAML (docker-compose.yml) permettant de recréer l\'intégralité de l\'infrastructure en une seule commande.
                - Sécurisation des accès : Utilisation de variables d\'environnement pour masquer les mots de passe root de la base de données.

                5. Conclusion et Perspectives
                Cette SAÉ m\'a permis de maîtriser les bases de la conteneurisation, un standard actuel de l\'industrie. Cela constitue une base solide pour évoluer vers des outils d\'orchestration plus complexes comme Kubernetes ou pour le déploiement continu (CI/CD).',
            'technologies' => ['Docker', 'MariaDB', 'WordPress', 'phpMyAdmin'],
            'date' => '2024',
            'category' => 'Administration Système',
        ],
        ];
    }
}