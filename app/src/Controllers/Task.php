<?php

use Config\Controller;

class Task extends Controller
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET,POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }

    public function index()
    {
        echo json_encode(["message" => "Hello, world!"]);
    }

    public function upload()
    {
        echo json_encode(["message" => $_FILES]);
    }
}
