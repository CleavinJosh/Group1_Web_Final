<?php

$conn = new Database( config() );

try {

    $result = $conn->query("SELECT * FROM users WHERE username = :username", [
        'username' => $_POST['username']
    ])->fetch();


    if(password_verify($_POST['password'], $result['password']))
    {
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['fullName'] = $result['full_name'];

        redirect("/");

    }else {

        displayError([
            "error" => "NONE",
            "description" => "WRONG PASSWORD",
            "redirect" => "/index.php/login"
        ]);

    }

}catch(Exception $e) {
    
    displayError([
        "error" => "NONE",
        "description" => $e,
        "redirect" => "/index.php/login"
    ]);
    
}