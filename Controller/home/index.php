<?php

$conn = new Database( config() );


if( empty($_GET['type']) )
{
    header("location: ?type=food");
}

try {

    $result = $conn->query("SELECT * FROM product_items WHERE product_type = :product_type", [
        'product_type' => $_GET['type']
    ])->fetchAll();

}catch (Exception $e) {
    echo $e;
}

view('home/index.php', [
    'product' => $result
]);