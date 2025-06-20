<?php

$admin = [
    [
       'type' => 'header',
        'text' => 'Cadastrar',
    ],
    [
        'text' => 'IPs',
        'url' =>  '/conrede/nip/create',
        'can' => 'manager',
    ],
    [
        'text' => 'Cadastrar Divisões',
        'url' =>  '/conrede/divisas/create',
        'can' => 'admin',
    ],
    [
        'type' => 'divider',
    ],
    [
        'type' => 'header',
         'text' => 'Listagens',
     ],
     [
        'text' => 'IPs',
        'url' =>  '/conrede',
        'can' => 'admin',
    ],
    [
        'text' => 'Divisões',
        'url' =>  'conrede/divisas',
        'can' => 'admin',
    ],
];

$submenu2 = [
    [
        'text' => 'SubItem 1',
        'url' => 'subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' => 'subitem2',
        'can' => 'admin',
    ],
];

$menu = [

    [
        # este item de menu será substituido no momento da renderização
        'key' => 'menu_dinamico',
    ],
    [
        'text' => 'Menu admin',
        'submenu' => $admin,
        'can' => 'admin',
    ],
];

$right_menu = [
    [
        // menu utilizado para views da biblioteca senhaunica-socialite.
        'key' => 'senhaunica-socialite',
    ],
    [
        'key' => 'laravel-tools',
    ],
    [
        'text' => '<i class="fas fa-cog"></i>',
        'title' => 'Configurações',
        'target' => '_blank',
        'url' => config('app.url') . '/item1',
        'align' => 'right',
    ],
];


return [
    # valor default para a tag title, dentro da section title.
    # valor pode ser substituido pela aplicação.
    'title' => config('app.name'),

    # USP_THEME_SKIN deve ser colocado no .env da aplicação
    'skin' => env('USP_THEME_SKIN', 'uspdev'),

    # chave da sessão. Troque em caso de colisão com outra variável de sessão.
    'session_key' => 'laravel-usp-theme',

    # usado na tag base, permite usar caminhos relativos nos menus e demais elementos html
    # na versão 1 era dashboard_url
    'app_url' => config('app.url'),

    # login e logout
    'logout_method' => 'POST',
    'logout_url' => 'logout',
    'login_url' => 'login',

    # menus
    'menu' => $menu,
    'right_menu' => $right_menu,

    # mensagens flash - https://uspdev.github.io/laravel#31-mensagens-flash
    'mensagensFlash' => true,

    # container ou container-fluid
    'container' => 'container-fluid',
];
