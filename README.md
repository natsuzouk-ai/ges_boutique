# 🛍️ Boutique De Ali

## 📌 Description

**Boutique De Ali** est une application web développée avec **Laravel** permettant de gérer une boutique commerciale. Elle facilite la gestion des clients, des produits, des commandes et des factures grâce à une interface simple, moderne et intuitive.

---

## 👨‍💻 Etudiant

**Nom :** David Zoukalne

**Projet :** Gestion de Boutique

**Année :** 2026

---

## 🚀 Technologies utilisées

- Laravel
- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap
- JavaScript (pour quelques interactions)
- DomPDF (génération des factures PDF)

---
### 📊 Tableau de bord

- Affichage du nombre de clients
- Affichage du nombre de produits
- Affichage du nombre de commandes
- Affichage du nombre de factures

---

### 👥 Gestion des clients

- Ajouter un client
- Modifier un client
- Supprimer un client
- Rechercher un client
- Pagination des clients

---

### 📦 Gestion des produits

- Ajouter un produit
- Modifier un produit
- Supprimer un produit
- Rechercher un produit
- Gestion du stock

---

### 🛒 Gestion des commandes

- Créer une commande
- Sélection d'un client
- Sélection d'un ou plusieurs produits
- Calcul automatique du montant total
- Diminution automatique du stock
- Suppression d'une commande

---

### 🧾 Gestion des factures

- Génération automatique d'une facture après la création d'une commande
- Affichage des informations de la facture
- Impression de la facture
- Téléchargement de la facture au format PDF

---

## 🗃️ Base de données

Le projet utilise les tables suivantes :

- clients
- produits
- commandes
- detail_commandes
- factures

---

## ⚙️ Installation

1. Cloner le projet

```bash
git clone <url-du-projet>
```

2. Se placer dans le dossier

```bash
cd boutique-de-ali
```

3. Installer les dépendances

```bash
composer install
```

4. Copier le fichier `.env`

```bash
cp .env.example .env
```

5. Générer la clé Laravel

```bash
php artisan key:generate
```

6. Configurer la base de données dans le fichier `.env`

```env
DB_DATABASE=ges_boutique
DB_USERNAME=root
DB_PASSWORD=
```

7. Exécuter les migrations

```bash
php artisan migrate
```

8. Lancer le serveur

```bash
php artisan serve
```

Puis ouvrir :

```
http://127.0.0.1:8000
```

---

## 📁 Organisation du projet

```
app/
├── Http/
│   └── Controllers/

app/
└── Models/

resources/
└── views/

routes/
└── web.php

public/
└── css/
```

---

## 📸 Modules disponibles

- 🏠 Tableau de bord
- 👥 Clients
- 📦 Produits
- 🛒 Commandes
- 🧾 Factures
- 📄 Téléchargement PDF
- 🖨️ Impression

---

## 🎯 Objectif du projet

Ce projet a été réalisé dans le cadre d'un mini-projet de développement web afin de mettre en pratique :

- Laravel
- Les modèles MVC
- Les migrations
- Les relations entre les tables
- Les opérations CRUD
- La génération de PDF
- La gestion d'une base de données MySQL


---

# Merci d'utiliser Boutique De Ali.
