<?php

class Database 
{
    protected $conn;
    protected $statement;

    public function __construct( $config, $username = 'root', $password = '')
    {
        try {

            $dsn = 'mysql:' . http_build_query( $config, '', ';');

            $this->conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); 

        }catch(Exception $e) {

            displayError([
                "error" => 404,
                "description" => $e,
                "redirect" => "/index.php/login"
            ]);

        }
        
    }


    public function query( $statement, $param = [])
    {
        $this->statement = $this->conn->prepare( $statement );

        $this->statement->execute( $param );

        return $this;
    }

    function fetchAll ()
    {
        return $this->statement->fetchAll();
    }

    function fetch ()
    {
        return $this->statement->fetch();
    }
    
}