<?php

Middleware::restrict();

$conn = new Database( config() );

try {

    $conn->query("INSERT INTO reports(type_report, name, email, suggestion, date_created) VALUES(:type_report, :name, :email, :suggestion, :date_created)", [
        "type_report" => $_POST['type_suggestion'],
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "suggestion" => $_POST['message'],
        "date_created" => date("Y/m/d")

    ]);

}catch (Exception $e){

    displayError([
        "error" => 406,
        "description" => $e,
        "redirect" => "/suggestion"
    ]);

}

redirect("/suggestion");