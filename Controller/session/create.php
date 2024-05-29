<?php

$conn = new Database( config() );

if($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    
    $_SESSION['role'] = 'admin';
    redirect('/admin');

}

try {

    $result = $conn->query("SELECT * FROM users WHERE username = :username", [
        'username' => $_POST['username']
    ])->fetch();
    
    $password = $result['password'] ?? 'none';

    if(password_verify($_POST['password'], $password))
    {
        Validation::unsetAttributes('login');

        $_SESSION['role'] = 'cashier';
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['fullName'] = $result['full_name'];

        redirect("/");

    }else {

        Validation::setAttributes('login', [
            'error' => 'Wrong username or password',
            'oldUsername' => $_POST['username']
        ]);

        redirect('/login');

    }

}catch(Exception $e) {
    
    displayError([
        "error" => 404,
        "description" => $e,
        "redirect" => "/index.php/login"
    ]);
    
}