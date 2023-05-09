1-
/ADMIN
- Sur le bouton "Retour à l'accueil" le texte sort du bouton
- en 360px sur le responsive il manque de l'espace à droite et à gauche au niveau des boutons


/ADMIN/FAQ
- le delete et update ne fonctionne pas mais renvoie une erreur 404
- vers 370px (en responsive) il y a un bloc blanc à droite qui s'ajoute
- et en responsive les boutons ne sont pas aligner et prenent plus de 50% de l'écran donc pour lire le texte à gauche c'est pas très pratique


/ADMIN/PARTENAIRE
- pourquoi avoir ici un footer sur le formualaire d'ajout et le fomulaire de modification et pas ailleur ?
- quand j'essaye d'ajouter j'ai une erreur "undefined array key 'image'"
- le tableau ne s'ajuste pas à la taille de l'écran, c'est pas responsive et a 600px les boutons ne sont plus aligner

/ADMIN/EVENT
- le tableau ne s'ajuste pas à la taille de l'écran, c'est pas responsive et a 600px les boutons ne sont plus aligner
- je crois pas que mettre index dans l'URL soir necessaire 

PARTOUT
- c'est pas très jolie d'avoir du blanc en bas de chaque page même les plus longue
- il manque un moyen de retourner à la page /admin quand on est sur une page du syle /admin/event ou /admin/faq...
- Après avoir ajouter un élément personnellement je préférerais revenir vers la page qui les listes (donc /admin/faq ou admin/partenaire...)(mais après c'est personel)
- je trouve qu'on voit mal les démarcations entre les lignes et le colonnes des tableaux
- le bouton ajouter n'est pas le même sur les page partenaire, et faq que sur la page event. sur les pages partenaires et faq, les bouton ont une sorte de border bleu que celui de event n'a pas.


2- 
Page d’accueil :
scroll bar X qui est disponible, à retirer,
navbar est trop grosse, si possible rétrécir le logo et la taille de la navbar,
mentions légales c’est bizarre qui soit entre les logos, les logos sont trop écartés, mentions légales doit être en dessous des logos sans écarter les légos. En 360x, mentions légales passe à la ligne, peut-être ajouter un text-align
menu burger est trop petit,
pas de bouton qui permet de replier la navbar en mode responsive,
l’image du header en mode responsive, n’est pas centré quand on rétrécit l’écran,
attention le header en responsive ! La valeur est en vh ! Si la hauteur de l’écran est trop petit, ça casse votre header.
dans la page d’accueil, il y a un problème de margin entre les sections
Page Apiculture :
dans la section histoire, dommage le paragraphe ne soit pas aligné à l’image,
pareil pour la section miel,
en 360px, les images sont décalés à cause du margin, j’aurai changé le margin en margin-right,
Page Ressources :
la section FAQ, les lignes qui séparent les accordéons ne sont pas très esthétique,
y’a encore du lorem ipsum dans la FAQ
Le bouton login ne marche pas, comme le nôtre !
Page côté admin :
page admin photo ne trouve pas la page, attention l’URL affiche votre-site/admin/admin/image. Il y a un problème sur votre chemin,
dans la page admin/photo, le body ne pas la totalité de l’écran, ça fait bizarre un fond jaune pâle et le blanc. Vous voudriez mettre une height à 100vh pour régler ce problème.
dommage qu’il y’a pas de padding du coup tous vos éléments quand on passe au format tablette ou mobile sont collés aux bordures du site
du coup cette partie, elle sert à quoi ? Côté visiteur on ne voit aucun changement
dans admin les liens ne renvoie vers rien
la route admin/lien/supprimer ne sert à rien vu qu’il n’y a pas le vue sur le liens

3- 
Le margin sélectionnée pour la première image n’est pas bonne.
De la version desktop à 768px, le texte commence à droite de l’image. À partir de 767 jusqu’en 576px, l’image et le texte sont positionné de manière verticale. Lorsqu’on réduis jusqu’en 360px l’image repasse sur la gauche avec le texte sur le coté.