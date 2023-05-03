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
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'partner' => ['PartnerController', 'index'],
    'resource' => ['ResourceController', 'index',],
    'admin/partenaire' => ['AdminPartnerController', 'index',],
    'admin/partenaire/ajouter' => ['AdminPartnerController', 'create',],
    'admin/partenaire/modifier' => ['AdminPartnerController', 'update',['id'] ],
    'admin/faq/ajouter' => ['AdminFaqController', 'add',],
    'admin/faq/index' => ['AdminFaqController', 'index',],
    'admin/event/index' => ['AdminEventController', 'index',],
    'admin/faq/supprimer' => ['AdminFaqController', 'delete', ['id']],
    'admin/faq/modifier' => ['AdminFaqController', 'update', ['id']],
    'abeilles' => ['BeesController', 'index'],
];
