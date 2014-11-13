<?php

return array(
    'home' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route'    => '/',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'home',
            ),
        ),
    ),
    'viewPage' => array(
        'type' => 'Zend\Mvc\Router\Http\Segment',
        'options' => array(
            'route'    => '/strona/:slug',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'viewPage',
            ),
        ),
    ),
    'newsList' => array(
        'type' => 'Segment',
        'options' => array(
            'route'    => '/aktualnosci[/strona/:number]',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'newsList',
            ),
            'constraints' => array(
                'number' => '[0-9_-]+'
            ),
        ),
    ),
    'viewNews' => array(
        'type' => 'Segment',
        'options' => array(
            'route'    => '/aktualnosci/:slug',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'viewNews',
            ),
            'constraints' => array(
                'slug' => '[a-zA-Z0-9_-]+'
            ),
        ),
    ),
    'eventList' => array(
        'type' => 'Segment',
        'options' => array(
            'route'    => '/wydarzenia',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'eventList',
            ),
        ),
    ),
    'viewEvent' => array(
        'type' => 'Segment',
        'options' => array(
            'route'    => '/wydarzenia/:slug',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'viewEvent',
            ),
            'constraints' => array(
                'slug' => '[a-zA-Z0-9_-]+'
            ),
        ),
    ),
    'viewPlan' => array(
        'type' => 'Segment',
        'options' => array(
            'route'    => '/planowanie-imprezy/:slug',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'viewPlan',
            ),
            'constraints' => array(
                'slug' => '[a-zA-Z0-9_-]+'
            ),
        ),
    ),
    'save-subscriber' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route'    => '/save-new-subscriber',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'saveSubscriberAjax',
            ),
        ),
    ),
    'contact-form' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route'    => '/contact-form',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'contactForm',
            ),
        ),
    ),
    'newsletter-confirmation' => array(
        'type' => 'Segment',
        'options' => array(
            'route'    => '/newsletter-confirmation/:code',
            'defaults' => array(
                'controller' => 'Page\Controller\Page',
                'action'     => 'confirmationNewsletter',
            ),
            'constraints' => array(
                'code' => '[a-zA-Z0-9_-]+'
            ),
        ),
    ),
);