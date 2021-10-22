<?php

namespace App\core;



class Application
{
    public Request $request;
    public function __construct()
    {
        echo "app";
    }
}
