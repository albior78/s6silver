<!--  
* dans les entités il faut rajouter
//----------------------------------------------------------------------------------------
    crée cette méthode si vous obtenez le message d'erreur converte to string
    public function __toString(): string
    {
        return $this->getNom();
    }
//----------------------------------------------------------------------------------------
pour les liaisons: , cascade:['persist']
 #[ORM\OneToMany(mappedBy: 'champions', targetEntity: Familiers::class, cascade:['persist'])]


* avec easyadmin 4
-dans les vues twig field représente le champs : faire un boucle for sur field.value pour récupérer element.nom
par exemple
- pour utiliser sa vue ->setTemplatePath('admin/collectionFamiliersCh.html.twig')
- pour une liaison de many vers one :
? AssociationField::new('champions', 'Le champion')
?                ->renderAsNativeWidget(),
- pour une liaison de one vers many :
? //! utiliser CollectionField pour une relation vers many
    https://symfony.com/bundles/EasyAdminBundle/current/fields/CollectionField.html
    CollectionField::new('familiers', 'Les familiers')
        ->useEntryCrudForm()
        ->showEntryLabel()
        ->allowAdd(false)
        ->allowDelete(false)
        template perso pour le rendu des collections avec le champs nom
        ->setTemplatePath('admin/collectionFamiliersCh.html.twig'),

-->