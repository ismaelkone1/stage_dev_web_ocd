# stage_dev_web_ocd

## Préambule - Application Dockerisée

Cette application est entièrement conteneurisée avec Docker, ce qui permet un déploiement simple et cohérent dans n'importe quel environnement. L'architecture Docker comprend :

- **Application PHP** : Conteneur principal exécutant l'application Laravel (PHP 8.2, Laravel 11)
- **Base de données MySQL** : Conteneur pour le stockage des données (MySQL 8.0) 
- **Adminer** : Interface web pour la gestion de la base de données

### Configuration requise

Le fichier `.env` du projet doit contenir les variables suivantes pour la connexion à la base de données :

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=genealogy
DB_USERNAME=stage_svp
DB_PASSWORD=stage_svp
```

Pour démarrer l'application :

```bash
docker-compose up -d
```

- L'application sera accessible sur :

- Application web : http://localhost:8000
- Interface Adminer : http://localhost:8080

## Structure de la Base de Données pour la Gestion des Modifications

### Tables Principales
- `users` : Stockage des utilisateurs inscrits
- `people` : Fiches des personnes dans l'arbre généalogique
- `relationships` : Relations de parenté entre les personnes
- `person_user` : Association entre utilisateurs et leurs fiches personnes
- `change_proposals` : Propositions de modifications
- `proposal_votes` : Votes sur les propositions de modifications

![Diagramme de la base de données](/docs/images/diagram.png)


### Exemple de Workflow pour les Modifications

Prenons l'exemple où Rose veut se déclarer comme fille de Jean :

1. **Création de la proposition** :
   - Rose (`rose03`) crée une proposition de type "relationship_add"
   - La proposition est stockée avec le statut "pending"
   - Les données incluent l'ID de Jean (parent) et l'ID de Rose (enfant)

2. **Phase de vote** :
   - Jean (`jean01`) approuve → +1 vote positif
   - Marie (`marie02`) approuve → +2 votes positifs
   - Paul (`paul20`) refuse → +1 vote négatif
   - Marc (`marc10`) approuve → +3 votes positifs

3. **Validation finale** :
   - Le système détecte les 3 votes positifs
   - La proposition passe en statut "approved"
   - La relation parent-enfant est créée dans la table `relationships`
   - L'historique des votes est conservé dans `proposal_votes`

### Avantages de cette Structure
- Traçabilité complète des modifications
- Validation communautaire des changements
- Conservation de l'historique des votes
- Protection contre les modifications malveillantes
- Flexibilité pour différents types de modifications (informations personnelles, relations)
