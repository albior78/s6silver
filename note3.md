<!--
* installation de symfony sans le bundle web-pack
    ouvrir Vscode dans le dossier Htdocs
    faire un check de symfony :
    -> symfony check:requirements (pour voir si il faut retoucher php.ini)
    installation du projet avec le nom symf6voiture avec tous les fichiers necéssaire au fonctionnement de symfony
    -> symfony new symf6voiture --full
    cela génère notre projet en version 6.xxx si vous êtes en PHP 8.0.2 (mini)
    cela génère notre projet en version 5.4 si vous êtes en PHP 7.xxxx
* installation du certificat pour travailler en https://
    ? -> symfony server:ca:install
    activation tls
    ? -> composer config --global disable-tls false
    si on veut desactiver tls :
    ? -> composer config --global disable-tls true
* modification du fichier .env pour la connexion à la bdd
    ? DATABASE_URL="mysql://root:""@127.0.0.1:3306/symf6jour2?serverVersion=5.7&charset=utf8mb4"
* création de la base de données par default, ici symf6jour2
    ? -> symfony console doctrine:database:create
* lancement du serveur symfony
    ? -> symfony server:start
    on laisse tourner ce serveur en terminal de fond et on ouvre un autre terminal pour travailler
    -> au niveau du navigateur aller sur https://127.0.0.1:8000
    vous devriez voir la version de votre projet
* créer les différents dossiers habituels dans le dossier public
    -> js
    -> styles -> avec le fichier style.css
    -> fonts
    -> images -> sous-dossier upload
* retoucher le fichier vue templates/base.html.twig qui correspondra à notre head+header+footer (comme inc et include en PHP)
    rajouter le thème boostrap dans le fichier config/packages/twig.yaml en dessous default_path:
    ? -> form_themes: ['bootstrap_5_layout.html.twig']
    -> voir fichier
* création du controller + vue de la page d'accueil
    ? -> symfony console make:controller
    .retoucher le nom de la vue si nécéssaire :
    dans le dossier templates/accueil/index.html.twig
    index.html.twig en accueil.html.twig pour plus de visibilité dans notre code
    .retouche du contrôleur accueil, classe src/controller/AccueilController.php
    -> voir fichier
* création d'un 1ère table dans notre bdd.
    - création d'une table voiture
        voiture
            modele -> varchar(255)
            marque -> varchar(255)
            couleur -> varchar(255)
            image -> varchar(255)
            prix -> decimal(10,2)
            active -> boolean

    - création de la table
        -> symfony console make:entity
        donner un nom à la table : ici Voiture (attention la 1ère lettre en majuscule)
        symfony vous installe 2 fichiers :
        created: src/Entity/Voiture.php
        created: src/Repository/VoitureRepository.php

        puis, remplir les différents champs de la table en suivant les instruction de symfony, quand il n'y a plus de champs à rajouter faire enter à nouveau

        le terminal affiche success en vert
        et vous propose de préparer le fichier de migration vers la base de données
            -> php bin/console make:migration
        !obsolete
        ? composer remove sensio/framework-extra-bundle
*Mettre en place une protection de l'administration du projet
1- suivre https://symfony.com/doc/current/security.html
    - faire :
        ?   composer require symfony/security-bundle
    - faire :
        ?   php bin/console make:user
        répondres aux 4 questions par la touche enter
    - préparer une migration
        ?   php bin/console make:migration
    - confirmation de la migration en base de données (écriture)
        ?   php bin/console doctrine:migrations:migrate
* utilisation du bundle fixture pour placer un administrateur dans la table user
    - faire
        ?   composer require doctrine/doctrine-fixtures-bundle
    - faire
        ?   php bin/console make:fixtures
* génération d'un password avec protection argon2
    - faire
        ?   php bin/console security:hash-password
    - remplir le fichier UserFixtures.php (voir le fichier)
    ATTENTION TRES IMPORTANT SAUVEGARDER LES TABLES DEJAS RENSEIGNEES DANS LA BDD avec PhpMyAdmin
    - faire
        ? php bin/console doctrine:fixtures:load
        cette fonction va effecer le contenu des tables de la bdd et va  écrire l'utilisateur configuré dans la table user
        * ensuite vous pouvez réinjecter vos tables sauvegardées dans la BDD
* création d'un formulaire d'authentification
    - faire
        ? php bin/console make:auth
        1 ([1] Login form authenticator)
        Loginxxx (ATTENTION sans Authenticator au bout, sinon on a un fichier qui resemble à LoginxxxAuthenticatorAuthenticator.php)
        exemple:
            - user
            - la touche enter
            - la touche enter
    - modifier le fichier /src/Security/UserAuthenticaror.php
        au niveau de la public function onAuthenticatorSucess(...)
        modifier la ligne de retour:
?        return new RedirectResponse($this->urlGenerator->generate('home'));
        supprimer la ligne throw new .....TODO:
        au niveau de la protected function getLoginURL()
        modifier la ligne de retour
?        return $this->urlGenerator->generate('app_login');
    - modifier le fichier /config/packages/security.yaml
        en dessous
        path: app_logout
        rajouter
?        target: /home

* créer le dashboard easyadmin
    - installer le bundle easyAdmin
        - faire
        ? composer require easycorp/easyadmin-bundle
    - faire un dashboard
        ? php bin/console make:admin:dashboard
        répondre par la touche entrer aux questions
        cela génère le fichier classe coutrôleur DashboardController.php dans src/Controller/Admin/
        rajouter -> ? #[IsGranted('ROLE_ADMIN')] au-dessus de la route admin
* pour mofifier un entity (un modèle ou une table de la bdd) existant comme User
        - faire
            ? php bin/console make:entity
            écrire le nom de l'entity existant
            symfony reconnaitra qu'elle existe déjà et proposera de rejouter des champs
            une fois les champs rajoutés, faire la migration et vérifier l'existance des champs avec PhpMyAdmin.
* créer le fichier UsercrudController.php
    - faire :
        ? php bin/console make:admin:crud
        ---------------------------------
        pour configurer les champs crud
        https://symfony.com/bundles/EasyAdminBundle/current/fields.html
        ---------------------------------
        maintenant il faut modifier le fichier généré UserCrudController.php dans src/Controller/Admin/, voir modification dans ce fichier.
        Ensuite modifier le fichier DashboardController.php voir les modifications dans le fichier
!---------------------------------------------ici
* créer un contrôleur AccueilController.php
    - faire :
        ? php bin/console make:controller
        rentrer le non du contrôleur ici AccueilController
        cela crée 2 fichiers :
        src/Controller/AccueilController.php
        templates/accueil/index.html.twig
        renommer la vue index.html.twig en accueil.html.twig
* créer les différents dossiers dans le dossier public
    - js
    - images
        -upload
    - css
        - fichier style.css
    - fonts
    renseigner le fichier style.css
* retouche du fichier base.html.twig qui sera appelé par chaque pages du front
    voir modification dans le fichier
* installation de npm qui permet comme composer d'aller chercher des bundles, mais javascript cette fois(commité 11 millions de développeurs à travers le monde) car l'installation du projet avec le flag --webapp nous impose obligatoirement utiliser encore-webpack.
    - faire (installer sur votre pc node.js auparavant si npm n'est pas reconnue):
        ? npm install
* lancer dans un terminal
        ? symfony server:start
* Dans un autre terminal lancer
        ? npm run watch
* on va créer une entité vehicule
    - faire :
        ? php bin/console make:entity
        vehicule
        chaque champs sont obligatoire (non null) sauf active
        nom string 255
        marque string 255
        couleur string 255
        image string 255
        prix decimal(10,2)
        active boolean non obligatoire
        préparer la migration
        écrire en bdd cette table (entitée ou modele)

* créer un formulaire de création de compte user
    - faire :
        ? composer require symfonycasts/verify-email-bundle
        ? php bin/console make:registration-form
        la touche entrer 3 fois
        s'enregistrer sur https://mailtrap.io/register/signup?ref=header
        sur mail trap, intégration choisir symfony 5+ et copier le MAILER_DSN=
        dans .env
        ensuite placer un adresse email quelconque ici contact@free.fr
        placer le nom de l'envoyeur
        1 fois la touche entrer
        .cela va créer 5 fichiers:
            src/Controller/RegistrationController.php
            src/Form/RegistrationFormType.php
            src/Security/EmailVerifier.php
            templates/registration/confirmation_email.html.twig
            templates/registration/register.html.twig
        . cela va mettre à jour 1 fichiers 2x
            src/Entity/User.php
    pour tester une inscription il nous faut symfony/message:
        ? -> composer require symfony/messenger
        ? -> php bin/console messenger:consume async

 -->





 -->