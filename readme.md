# Projet Flashcards – Programmation Web Avancé 2025‑2026

## Contexte du projet
Ce projet est réalisé dans le cadre du module Programmation Web Avancé de l’année 2025‑2026.  
L’objectif est de concevoir une application web dynamique combinant :

- **Symfony 7.4** pour le backend (API, gestion des données, backoffice)
- **VueJS 3** pour le frontend (affichage dynamique, interactions utilisateur)

Le thème du site est libre. J’ai choisi de développer une **application de révision basée sur un système de flashcards**, permettant aux utilisateurs de créer, organiser et réviser leurs propres questions de cours. J'aimerais que ce site soit accessible à toute la promotion de L2 2025 afin que ca soit une plateforme assez collaborative avec la possibilité de participer à la création des questions

---

## Objectif général
Créer une application moderne, intuitive et efficace pour aider à la mémorisation active grâce à des flashcards personnalisables.

L’utilisateur pourra :
- créer ses propres cartes (question / réponse)
- organiser ses cartes dans des “decks”
- ajouter des images aux cartes (schémas, formules…)
- réviser ses cartes via une interface dédiée
- suivre sa progression (statistiques simples)
- filtrer les cartes par tags ou catégories

---

##  Objectifs techniques (exigences du projet)

### 🔵 **Symfony 7.4**
- Minimum **4 entités** (Deck, Flashcard, Tag, User)
- Relations entre entités clairement définies
- Gestion de **dates affichées en français**
- Mise en place d’une **API REST minimale** pour VueJS
- Création d’un **backoffice** avec EasyAdmin
- Suivi du projet via Git

### 🟢 **VueJS 3**
- Une partie du site doit utiliser l’API Symfony pour afficher des données dynamiques

---

##  Fonctionnalités prévues
- Création, modification et suppression de flashcards
- Organisation des cartes en decks
- Système de tags pour filtrer les cartes
- Mode révision (question → réponse)
- Statistiques simples (taux de réussite, nombre de cartes révisées)
- Backoffice complet pour administrer les données
- API REST pour communiquer avec le frontend VueJS

---

## Éco‑conception
Le projet intégrera un chapitre dédié à l’éco‑conception, incluant :
- audit RGAA et RGESN
- bonnes pratiques d’accessibilité
- optimisation des ressources (images, scripts)
- réduction des requêtes inutiles
- interface légère et sobre

---

##  Technologies utilisées
- **Symfony 7.4**
- **Doctrine**
- **EasyAdmin**
- **VueJS 3**
- **MySQL**
- **Git / GitHub**

---

##  Planning
- **27 mars** : rendu de la partie Symfony  
- **24 avril** : rendu de la partie VueJS (avec données JSON en dur)  
- **15 mai** : rendu final Symfony + VueJS  
- **Semaine du 18 mai** : soutenance individuelle

---

## Objectif final
Livrer une application complète, fonctionnelle et bien structurée, démontrant :
- la maîtrise du framework Symfony
- la compréhension des bonnes pratiques d’éco‑conception
- une architecture claire et évolutive
- la mise en ligne du site pour qu'il soit accessible à tous

---

## Idées d'ajouts

- fonctionnalité qui permet à l'utilisateur de corriger une question si elle est incorrecte et a un admin de review cette modification et la valider si elle est pertinente

- ajouter des stats (nombre total de cartes, decks, nombre de cartes repondues par le joueur, leaderboard possible? )



---

## Où en est le projet?

- 4 entités présentes, multiples relations entre ces entités
- users avec des roles et une gestion des mots de passes avec UserPasswordHasherInterface 
- BackOffice utilisant EasyAdmin uniquement accessible en etant rôle admin (via un système de connexion)
- Api fonctionnelle et documentation pour l'utiliser (debugManual.md)
- upload de fichier pour la miniature des decks
- gestion des dates de créations des decks et des flashcards

