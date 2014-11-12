<?php

return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Dashboard',
                'route' => 'dashboard',
                'class' => 'fa fa-home',
                'id'    => 2,
            ),
            array(
                'label' => 'Menu',
                'route' => 'fake',
                'class' => 'fa fa-bars',
                'id'    => 4,
                'pages' => array(
                    array(
                        'label' => 'Lista menu',
                        'route' => 'menu-list',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Edycja menu',
                        'route' => 'menu-edit',
                        'visibleInPrimary' => false
                    ),
                ),
            ),
            array(
                'label' => 'Strony',
                'route' => 'page-main',
                'class' => 'fa fa-file-text-o',
                'id'    => 2,
                'pages' => array(
                    array(
                        'label' => 'Dodaj nową',
                        'route' => 'page/create',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Lista stron',
                        'route' => 'page',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Edycja strony',
                        'route' => 'page/edit',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Usuwanie strony',
                        'route' => 'page/delete',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                ),
            ),
            array(
                'label' => 'Wpisy',
                'route' => 'fake-post',
                'class' => 'fa fa-quote-right',
                'id'    => 2,
                'pages' => array(
                    array(
                        'label' => 'Lista newsów',
                        'route' => 'post-list',
                        'params' => array('category' => 'news'),
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Tworzenie newsa',
                        'route' => 'post-list/post-create',
                        'params' => array('category' => 'news'),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Edycja newsa',
                        'route' => 'post-list/post-edit',
                        'params' => array('category' => 'news'),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Podgląd newsa',
                        'route' => 'post-list/post-preview',
                        'params' => array('category' => 'news'),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Lista wydarzeń',
                        'route' => 'post-list',
                        'params' => array('category' => 'event'),
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Tworzenie wydarzenia',
                        'route' => 'post-list/post-create',
                        'params' => array('category' => 'event'),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Edycja wydarzenia',
                        'route' => 'post-list/post-edit',
                        'params' => array('category' => 'event'),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Podgląd wydarzenia',
                        'route' => 'post-list/post-preview',
                        'params' => array('category' => 'event'),
                        'visibleInPrimary' => false
                    ),
                ),
            ),
            array(
                'label' => 'Slider',
                'route' => 'slider-main',
                'class' => 'fa fa-picture-o',
                'id'    => 2,
                'pages' => array(
                    array(
                        'label' => 'Dodaj nowy',
                        'route' => 'slider/create',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Lista sliderów',
                        'route' => 'slider',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Edycja slidera',
                        'route' => 'slider/edit',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Usuwanie slidera',
                        'route' => 'slider/delete',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Lista elementów',
                        'route' => 'slider/items',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Dodaj nowy element',
                        'route' => 'slider/items/create',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Edycja elementu',
                        'route' => 'slider/items/edit',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                ),
            ),
            array(
                'label' => 'Użytkownicy',
                'route' => 'fake',
                'class' => 'fa fa-users',
                'id'    => 4,
                'pages' => array(
                    array(
                        'label' => 'Dodaj nowy',
                        'route' => 'user-create',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Lista użytkowników',
                        'route' => 'users-list',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Edycja użytkownika',
                        'route' => 'user-edit',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Podgląd użytkownika',
                        'route' => 'user-preview',
                        'params' => array(),
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Usuwanie użytkownika',
                        'route' => 'user-delete',
                        'params' => array(),
                        'visibleInPrimary' => false
                    )
                ),
            ),
            array(
                'label' => 'Newsletter',
                'route' => 'fake-newsletter',
                'class' => 'fa fa-envelope-o',
                'id'    => 4,
                'pages' => array(
                    array(
                        'label' => 'Wiadomości',
                        'route' => 'newsletter',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Tworzenie wiadomości',
                        'route' => 'create-newsletter',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Edycja wiadomości',
                        'route' => 'edit-newsletter',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Podgląd wiadomości',
                        'route' => 'preview-newsletter',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Subskrybenci',
                        'route' => 'subscriber-list',
                        'visibleInPrimary' => true
                    ),
                    array(
                        'label' => 'Tworzenie subskrybenta',
                        'route' => 'subscriber-list/create-subscriber',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Edycja subskrybenta',
                        'route' => 'subscriber-list/edit-subscriber',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Podgląd subskrybenta',
                        'route' => 'subscriber-list/preview-subscriber',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Grupy subskrybentów',
                        'route' => 'subscriber-group',
                        'visibleInPrimary' => true,
                    ),
                    array(
                        'label' => 'Tworzenie grupy',
                        'route' => 'subscriber-group/create-group',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Edycja grupy',
                        'route' => 'subscriber-group/edit-group',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Podgląd grupy',
                        'route' => 'subscriber-group/preview-group',
                        'visibleInPrimary' => false
                    ),
                    array(
                        'label' => 'Ustawienia',
                        'route' => 'newsletter-settings',
                        'visibleInPrimary' => true
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
    ),
);