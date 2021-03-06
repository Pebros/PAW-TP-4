 <?php

    $router->get('', 'PagesController@home');

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');

    $router->get('turnos', 'TurnosController@index');
    $router->get('turnos/create', 'TurnosController@create');
    $router->post('turnos/save', 'TurnosController@save');
    $router->get('turnos/resumen', 'TurnosController@resumen');