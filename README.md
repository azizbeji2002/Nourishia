# 🌸 Noursihia App – Application Web (Symfony)

## 📌 Présentation

**Noursihia App** est une plateforme web développée avec **Symfony 6.4**, dédiée à l’accompagnement des femmes enceintes. Elle centralise des services médicaux, sociaux et commerciaux pour faciliter la grossesse à travers une interface fluide, sécurisée et intelligente.

---

## 🎯 Objectifs

- Offrir un accompagnement numérique complet et sécurisé aux patientes.
- Simplifier les interactions entre patientes et professionnels de santé.
- Favoriser l’inclusion numérique et la prévention en santé maternelle.
- Proposer une expérience interactive et personnalisée.

---

## 🌍 Objectifs de Développement Durable (ODD)

Ce projet contribue activement à plusieurs ODD définis par l’ONU :

| ODD 3 – Santé et bien-être | ODD 5 – Égalité entre les sexes | ODD 9 – Innovation | ODD 13 – Lutte contre le changement climatique | ODD 15 – Vie terrestre |
|----------------------------|-------------------------------|--------------------|------------------------------------------------|--------------------------|

---

## 🧩 Fonctionnalités principales

- 🔐 **Gestion des utilisateurs** : inscription, connexion, rôles (Admin, Docteur, Patiente)
- 💬 **Forum communautaire** entre patientes et professionnels
- 📅 **Événements** : création, réservation, participation
- 🛒 **E-commerce intégré** : gestion des produits, commandes et paiements
- 🩺 **Suivi médical** : dossiers patients, régimes, consultations
- 📥 **Espace personnel** pour chaque profil

---

## 🚀 Fonctionnalités avancées

- 🤖 Chatbot médical intelligent
- 🌤️ API météo avec recommandations adaptées
- 📧 Notifications par e-mail et SMS (Twilio)
- 📄 Export **PDF** des dossiers médicaux
- 📊 Export **Excel** pour les statistiques et rapports
- 🧠 **Connexion avec reconnaissance faciale** (OpenCV)
- 🛒 Recommandation intelligente de produits
- 🔐 Authentification à deux facteurs (2FA)

---

## 🛠️ Outils & technologies

- **Symfony 6.4**, Twig, Doctrine ORM
- **MySQL / MariaDB**
- **Bootstrap 5**, JavaScript
- **Composer**, Symfony CLI
- **OpenCV**, TCPDF, PhpSpreadsheet
- **API Twilio**, **OpenWeather**, **OAuth2 (Google, GitHub)**

---

## 🗂️ Structure du projet

noursihia-symfony/
├── config/ → fichiers de configuration Symfony
├── public/ → assets publics (CSS, JS, images)
├── src/ → logique métier (contrôleurs, services, entités)
├── templates/ → vues Twig
├── migrations/ → gestion de la base de données
├── uploads/ → fichiers uploadés (photos, documents)
└── .env → configuration des variables d’environnement


---

## 📦 Installation

### Prérequis

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Symfony CLI

### Clonage & configuration

```bash
git clone https://github.com/shahd-ai/noursihia-symfony.git
cd noursihia-symfony
composer install
cp .env.example .env
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console server:run

```

👥 Contact
Si vous avez des questions, suggestions ou souhaitez collaborer :

📧 Email : noursihia.dev@gmail.com

🌐 Site web : https://nourishia.com

💼 LinkedIn : linkedin.com/in/nourishia

🧑‍💻 GitHub : github.com/shahd-ai

© Licence
Projet académique réalisé dans le cadre de la formation à l'ESPRIT.
Tous droits réservés © 2025 – Noursihia App – Symfony
