# 🐕 Les Croquettes du Chef

## 📋 À propos du projet

**Les Croquettes du Chef** est un site web complet proposant une gamme de croquettes et aliments pour chiens de haute qualité. Le projet inclut des interfaces pour clients, administrateurs et livreurs avec des fonctionnalités de gestion de commandes et de profil.

### Caractéristiques principales

✅ **Interface Client**
- Catalogue produits avec recherche et filtrage
- Panier et gestion des commandes
- Profil utilisateur avec historique et programme de fidélité
- Authentification (inscription, connexion, mot de passe oublié)

✅ **Espace Administrateur**
- Gestion des utilisateurs
- Filtrage par rôle (clients, livreurs, administrateurs)
- Consultation des statuts

✅ **Espace Cuisine/Commandes**
- Suivi en temps réel des commandes à préparer
- Gestion de l'état des commandes
- Interface pour passage de commandes à l'état "livraison"

✅ **Espace Livreur**
- Affichage des livraisons en cours
- Intégration Google Maps
- Informations détaillées sur les adresses de livraison

✅ **Design Responsive**
- Interface adaptée à tous les appareils (mobile, tablette, desktop)
- Design moderne et attrayant avec variables CSS centralisées

## 🏗️ Structure du projet

```
Yumland/
├── index.html              # Page d'accueil
├── menu.html               # Catalogue des produits
├── profil.html             # Profil utilisateur
├── commandes.html          # Gestion des commandes (cuisine)
├── admin.html              # Panel administrateur
├── livraisons.html         # Gestion des livraisons
├── login.html              # Page de connexion
├── inscription.html        # Page d'inscription
├── mdp_oublie.html         # Récupération mot de passe
├── code_mdp_oublie.html    # Définition nouveau mot de passe
│
├── css/                    # Feuilles de style
│   ├── variables.css       # Variables et thème global
│   ├── client.css          # Styles header/footer communs
│   ├── accueil.css         # Styles page d'accueil
│   ├── menu.css            # Styles catalogue
│   ├── profil.css          # Styles profil
│   ├── commandes.css       # Styles gestion commandes
│   ├── admin.css           # Styles admin
│   ├── livraisons.css      # Styles livraisons
│   ├── login.css           # Styles authentification
│   └── inscription.css     # Styles inscription
│
└── assets/                 # Ressources (images, logo)
    ├── Logo projet.png
    ├── Boeuf wagyu.png
    ├── Dinde.png
    ├── terrine.png
    └── ... (autres images de produits)
```

## 🎨 Palette de couleurs

Les couleurs sont centralisées dans `css/variables.css` :

- **Fond principal** : `#E2ECE9` (vert clair)
- **Primaire** : `#FAD2E1` (rose pastel)
- **Cartes** : `#9ACBD5` (bleu ciel)
- **Texte** : `#2C3E50` (gris foncé)
- **Accent** : `#ad115c` (rose foncé/magenta)

## 🚀 Comment démarrer

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/DiegoDelvig/Yumland.git
   cd Yumland
   ```

2. **Ouvrir le projet**
   - Ouvrir `index.html` dans votre navigateur
   - Ou aller sur le lien [https://diegodelvig.github.io/Yumland/index.html](https://diegodelvig.github.io/Yumland/index.html)

## 📱 Responsive Design

Le site est entièrement responsive pour adaptabilité mobile.

## 👤 Auteurs

**Imane Bateoui** **EVINA Nathan** **Diego Delvig**
