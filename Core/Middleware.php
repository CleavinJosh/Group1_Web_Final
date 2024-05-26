<?php

class Middleware {

    public static function auth()
    {  
        return empty($_SESSION) ? redirect("/login") : '';
    }

    public static function admin()
    {  
        switch($_SESSION['role'])
        {

            case 'cashier': redirect("/"); break;
            case 'admin': redirect("/admin"); break;
            default: redirect("/login"); break;

        }

    }

}