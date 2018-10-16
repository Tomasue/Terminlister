<?php

use Models\Database;
use Models\Groups;
use Models\Tables;

$app->get('/', function($request, $response, $args) {

    $stmt = Database::get()->prepare("SELECT * FROM tables");
    $stmt->execute();

    $rows = $stmt->FetchAll(PDO::FETCH_ASSOC);
    $items = array();

    foreach ($rows as $row){
        $items[] = $row;
    }


    return $this->view->render($response, '/index.twig', array('row' => $rows));
});

$app->get('/spider', function($request, $response, $args) {
    return $this->view->render($response, '/spider.twig');
});

$app->post('/', function($request, $response, $args) {
    if (isset($_POST['date_start']) && isset($_POST['time_start']) && isset($_POST['event_description'])) {
        Tables::addTableRow($_POST['date_start'], $_POST['date_end'], $_POST['time_start'], $_POST['time_end'], $_POST['event_description']);
    }
    return $response->withRedirect('/');
});

$app->post('/table/{id}/delete', function($request, $response, $args) {
    \Models\Table::delete('tables',['id' => $args['id']]);

    return $response->withRedirect('/');
});