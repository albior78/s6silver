<!--
* Symfony c'est quoi
    Symfony est un framework PHP open source avec une architecture logiciel design pattern MVC.
    C’est l’un des framework les plus populaires parmi la communauté des développeurs open source.
    Il est utilisé pour construire des applications web complexes et performantes.
    L’idée de base du framework Symfony est de supprimer le codage fastidieux et de gagner du temps dans le développement.
    Il est basé sur une philosophie de création de logiciels par les utilisateurs pour leurs propres besoins.
    Les développeurs peuvent ajouter des modules supplémentaires à mesure que le produit se développe.
    Il facilite la vie du développeur grâce à des composants de frameworks facilement disponibles et à une configuration haut de gamme.
    Tirant le meilleur parti de PHP, Symfony Framework est le squelette de votre application.
    Il définit le style et l’architecture de votre produit.
    & Quelles sont les avantages de Symfony ?
        Le principal avantage de Symfony réside tout simplement dans le fait qu’il s’agit d’un framework permettant de gagner un temps de développement important. Une fois que l’on maitrise Symfony, on comprend rapidement à quel point il est indispensable.
        Il s’agit également d’une aide non négligeable dans l’organisation de notre projet.
        Le framework Symfony prépare le terrain en en apportant une certaine structure nous permettant ainsi d’avoir un code organisé, bien structuré et donc « bien rangé ».
        Une architecture correcte et organisée est aujourd’hui plus que nécessaire d’autant plus si vous n’êtes pas seul à travailler sur le projet.
        Enfin un point important à ne surtout pas négliger : la communauté.
        Tous les développeurs le savent, lorsque l’on code, internet est notre plus fidèle ami.
        En l’occurrence avec Symfony aucun problème.
        Il s’agit d’un des frameworks les plus utilisés, la communauté est très active. Dès lors que vous rencontrerez un problème que vous ne parvenez pas à corriger, vous pourrez interroger la communauté utilisant le framework vous permettant normalement d’être débloqué assez rapidement.
    & Quelles sont les inconvénients de Symfony ?
        Effectivement pour le moment cela donne envie, mais attention, s’il y a bien un inconvénient avec Symfony, c’est l’apprentissage.
        Dès le début, cet inconvénient peut rapidement vous décourager.
        Il est plus compliqué d’apprendre ce framework que le langage sur lequel il fonctionne.
        Le langage est assez lourd et complexe à prendre en main.
        Il faut tout de même savoir qu’il existe aujourd’hui une agence symfony pouvant vous accompagner dans le développement de votre projet web.
        Enfin, tout le monde n’aura pas d’intérêt à utiliser ce framework.
        Il est de par sa taille, plutôt destiné aux gros projets et sur mesures.
        Vous n’allez par exemple pas l’utiliser si vous souhaitez réaliser un simple site web.

* installer un environnement web local
     - xampp
      - wamp
      - laragon

* version 6 de symfony accésible si vous utilisez php 8.0.2 minimun
    - allez sur https://windows.php.net/download#php-8.1
    - télécharger la derniere version de PHP (la version safe : VS16 x64 Thread Safe)
    - implemter cette version dans votre environnement web
     
    ! NE PAS OUBLIER DE METTRE A JOUR LES VARIABLES D'ENVIRONNEMENTS DE VOTRE SYSTEME D'EXPOITATION
        -exemple pour windows 10 :
            clique droit sur le symbole windows en bas à droite -> système -> à droite -> paramètre avancé du système -> en bas de la nouvelle petite fenêtre, cliquez sur variables d'environnements -> dans la partie du bas de la nouvelle fenètre 'variables système', clique sur la ligne 'PATH' -> clique sur modifier en bas -> clique sur la ligne où se trouve php -> modifier le chemin d'accès à php 8.1.xxx qui pointera sur le dossier php dernière version dans votre environnement web.

* installer composer, qui va vous permttre d'aller rapatrier dans votre projet des dépendances ou bundles ou package php :
    - aller sur https://getcomposer.org/
    - choisir 'DOWNLOAD' -> choisir Composer-Setup-exe
    - choisir l'emplacement du téléchargement
    - clique sur Composer-Setup.exe
        Next
        cliquer sur Browse... si composer vous indique pas le bon chemin de votre dernière version de php (mais comme vous avez mis à jour les variables d'environnement de votre système d'exploitation, composer doit savoir où aller)
        Next
        Next
        Install
        Finish

* installer symfony CLI (Command Line Interface) https://symfony.com/download
    - ouvrir le PowerShell Windows en NON ADMIN EN NORMAL
        - clique droit sur le symbole windows en bas à droite -> clique Windows PowerShell
            ?   scoop install symfony-cli
            - si scoop n'est pas reconnu dans le terminal de visual studio
            - aller sur https://github.com/ScoopInstaller/Install#for-admin
                - faire :
                    ?   iwr -useb get.scoop.sh | iex
                    scoop s'nstalle sur windows et dans les variables d'environement
                    ?   scoop install symfony-cli
                    symfony-cli s'installe, une fois terminé, fermer le terminal windows
                    - pour mettre à jour symfony-cli (powershell admin)
                        ? scoop update symfony-cli
    - ouvrir visual studio
        - ouvrez le dossier où vous créez généralement vos projets (www, htdocs, etc...)
        - pour avoir des informations sur php ou symfony
            - faire :
                ?   php -v
                ?   symfony
                    - avec la dernière commande on voit bien que l'on peut gérer un projet sur le cloud (c'est une autre façon de travailler ,en mode developpement et production en même temp, mais cela implique un abonnement sur un cloud qui est relativement à prix élevé)
                ?   symfony list
* génération d'un projet :
https://symfony.com/doc/current/setup.html
    ? symfony check:requirements
    initialisation d'un projet en dernière version 6 avec le webpack si l'on veut travailler avec npm et utiliser
    react
    ? symfony new my_project_directory --version="6.2.*" --webapp
    ou
    initialisation d'un projet en dernière version 6 sans webpack et complet
    ? symfony new venteVoitureS6 --full
    le projet s'initialise et symfony va créer un dossier venteVoitureS6 dans www ou htdocs
    relancer VScode en ouvrant le dossier de votre projet
    rendez-vous dans le dossier...
    
-->