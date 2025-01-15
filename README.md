<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## OCD Genealogy

### 1. Concevez la structure d'une base de données répondant au problème
- [Structure de la base de données répondant au problème](https://dbdiagram.io/d/ocd_genealogy-678800fe6b7fa355c300cf48).

### 2. Décrivez comment les données évolues

#### Propositions de Modifications : 
Lors de la proposition de modifications, on enregistre les informations dans 
la table de proposals, 
dont par défaut les attributs accepted_count et
refused_count sont à 0, et people_id conserve la valeur de la personne concernée.
Dans proposal_relationships, renseignez les relations concernées.


#### Validation des Modifications : 
Quand une personne consulte une proposition, en donnant sa position en acceptant ou refusant, on enregistre 
dans la table history l'utilisateur (user_id), la propositon (proposal_id) et l'action (accepted ou refused).
Dans la table proposals, on incremente accepted_count s'il  a accepté ou
refused_count s'il refuse. Si refused_count égale 3, on change le "final_status" à "refused".
Sinon, si accepted_count égale 3, on change le "final_status" à "accepted". Ensuite, retrouver
les "proposal_relationships" et les déverser dans "relationships"
