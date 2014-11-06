<?php
return array(
    'modules' => array(
        'Application',
        'Page',

        'AssetManager',

        'CmsIr\Authentication',
        'CmsIr\Authorize',
        'CmsIr\System',
        'CmsIr\Dashboard',
        'CmsIr\Menu',
        'CmsIr\Users',
        'CmsIr\Slider',
        'CmsIr\Newsletter',
        'CmsIr\Page',
        'CmsIr\Post',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
    ),
);
