<?php

class Middleware {

    public static function auth()
    {  
        return empty($_SESSION) ? redirect("/login") : '';
    }

    public static function admin()
    {  

        if(!empty($_SESSION['role']))
        {
            return $_SESSION['role'] != 'admin' ? redirect('/') : '';   
        }

        return redirect('/login');

    }

    public static function restrict()
    {
        switch($_SESSION['role'] ?? '')
        {
            case 'admin': 
                redirect('/admin');
                break;
            case 'cashier': 
                redirect('/');
                break;
            default:
                break;
        }
    }

}