<?php

use Models\Database;
use Models\Users;
use Models\Tables;

$app->get('/', function ($request, $response, $args) {


    $stmt = Database::get()->prepare("SELECT * FROM terminliste ORDER BY date_end, time_start");
    $stmt->execute();

    $rows = $stmt->FetchAll(PDO::FETCH_OBJ);


    setlocale(LC_ALL , 'nor');
    \Carbon\Carbon::setLocale('nb_NO');

   foreach ($rows as &$row) {
       $row->date_start = \Carbon\Carbon::createFromTimestamp(strtotime($row->date_start));
       $row->date_end = \Carbon\Carbon::createFromTimestamp(strtotime($row->date_end));
       $row->time_start = \Carbon\Carbon::createFromTimestamp(strtotime($row->time_start));
    }

    $online = Users::online();

        return $this->view->render($response, '/index.twig', ['row' => $rows, 'online' => $online]);

});


$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, '/login.twig');
});

$app->get('/logout', function ($request, $response, $args) {
    Users::logout();
    return $response->withRedirect('/');
});

$app->post('/login', function ($request, $response, $args) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        Users::login($_POST['username'], $_POST['password']);
    }
    return $response->withRedirect('/');
});

$app->get('/register', function ($request, $response, $args) {
    return $this->view->render($response, '/register.twig');
});

$app->post('/register', function ($request, $response, $args) {
   if (isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])) {
       Users::register($_POST['username'], $_POST['password1'], $_POST['password2']);
   }
    return $response->withRedirect('/');
});

$app->post('/', function ($request, $response, $args) {
    $subcheck = (isset($_POST['hoved'])) ? 1 : 0;
    $subcheck1 = (isset($_POST['junior'])) ? 1 : 0;
    $subcheck2 = (isset($_POST['aspirant'])) ? 1 : 0;
    if (isset($_POST['date_start']) && isset($_POST['time_start']) && isset($_POST['description'])) {
        Tables::addTableRow($_POST['date_start'], $_POST['date_end'], $_POST['time_start'], $_POST['time_end'], $subcheck, $subcheck1, $subcheck2, $_POST['description']);
    }
    return $response->withRedirect('/');
});

$app->post('/terminliste/{id}/delete', function ($request, $response, $args) {
    \Models\Table::delete('terminliste', ['id' => $args['id']]);

    return $response->withRedirect('/');
});

$app->post('/terminliste/{id}/update', function ($request, $response, $args) {
    $subcheck = (isset($_POST['hoved'])) ? 1 : 0;
    $subcheck1 = (isset($_POST['junior'])) ? 1 : 0;
    $subcheck2 = (isset($_POST['aspirant'])) ? 1 : 0;
    \Models\Table::update('terminliste', [
        'date_start' => $_POST['date_start'],
        'date_end' => $_POST['date_end'],
        'time_start' => $_POST['time_start'],
        'time_end' => $_POST['time_end'],
        'description' => $_POST['description'],
        'hoved' => $subcheck,
        'junior' => $subcheck1,
        'aspirant' => $subcheck2
    ], ['id' => $args['id']

    ]);

    return $response->withRedirect('/');
});

