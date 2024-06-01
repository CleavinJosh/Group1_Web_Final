<?php

Middleware::admin();

if( empty($_GET['type']) ) header("location: ?type=REPORT");

$conn = new Database( config() );

try {

    $result = $conn->query("SELECT * FROM reports WHERE type_report = :type_report", [
        "type_report" => $_GET['type']
    ])->fetchAll();

}catch (Exception $e) {

    displayError([
        "error" => 404,
        "description" => $e,
        "redirect" => "/index.php/reports"
    ]);

}

view("_admin-reports/index.view.php", [
    "results" => $result ?? ''
]);