<?php

use Config\Controller;

class Admin extends Controller
{
    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data["title"] = "Dashboard";
        self::get_view("admin/dashboard", $data);
        // 
    }
}
