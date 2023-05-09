<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)

return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/delete' => ['ItemController', 'delete',],
    'association' => ['AssociationController', 'index'],
    'partner' => ['PartnerController', 'index'],
    'apiculture' => ['BeekeepingController', 'index',],
    'admin' => ['AdminController', 'index'],
    'admin/image' => ['AdminPictureController', 'index'],
    'admin/image/ajouter' => ['AdminPictureController', 'add'],
    'admin/image/modifier' => ['AdminPictureController', 'update', ['id']],
    'admin/event/index' => ['AdminEventController', 'index',],
    'admin/event/ajouter' => ['AdminEventController', 'add'],
    'admin/event/modifier' => ['AdminEventController', 'update', ['id']],
    'admin/event/supprimer' => ['AdminEventController', 'delete', ['id']],
    'admin/partenaire' => ['AdminPartnerController', 'index',],
    'admin/partenaire/ajouter' => ['AdminPartnerController', 'create',],
    'admin/partenaire/modifier' => ['AdminPartnerController', 'update',['id'] ],
    'admin/partenaire/supprimer' => ['AdminPartnerController', 'delete',['id'] ],
    'admin/faq' => ['AdminFaqController', 'index',],
    'admin/faq/ajouter' => ['AdminFaqController', 'add',],
    'admin/faq/modifier' => ['AdminFaqController', 'update', ['id']],
    'admin/lien/ajouter' => ['AdminLinkController', 'add'],
    'admin/faq/supprimer' => ['AdminFaqController', 'delete', ['id']],
    'abeilles' => ['BeeController', 'index'],
    'contact' => ['ContactController', 'index'],
    'ressource' => ['ResourceController', 'index',],
    'admin/image/supprimer' => ['AdminPictureController', 'delete', ['id']],
    'admin/lien' => ['AdminLinkController', 'index'],
];
