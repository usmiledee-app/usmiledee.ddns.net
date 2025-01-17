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

    public function system()
    {
        $data["title"] = "System";
        self::get_view("admin/system", $data);
        // 
    }

    public function test()
    {
        $data["title"] = "Tests";
        self::get_view("admin/tests", $data);
    }
}
