<?php

class Middleware {

    public static function auth( $middleware )
    {
        if( !empty($middleware) )
        {
            if(empty($_SESSION))
            {
                redirect("/login");
            }
        }
        
        return;
    }

}