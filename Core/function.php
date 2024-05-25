<?php

const BASEPATH = __DIR__;

function dd( $test )
{
    echo "<pre>";
    var_dump( $test );
    echo "<pre>";
    die();
}

function view( $path, $attribute = [] )
{   
    extract($attribute);
    return require "View/" . $path;
}

function config()
{
    return require 'config.php';
}