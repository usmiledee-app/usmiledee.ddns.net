<?php

use Config\Controller;

class Home extends Controller
{
    public function index()
    {
        $data["title"] = "usmiledee.net";
        self::get_view("home/index", $data);
    }
}
