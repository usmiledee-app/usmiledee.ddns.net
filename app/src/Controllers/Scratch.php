<?php

use Config\Controller;

class Scratch extends Controller
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }

    public function index()
    {
        echo json_encode(["message" => "Hello, world!"]);
    }

    public function user($id = 0)
    {
        global $method;
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        $users = self::get_model("Users");

        switch ($method) {
            case "GET":
                if ($result = $users->select($id)) {
                    $response = $result;
                }
                break;
            case "POST":
                if ($users->test($input)) {
                    http_response_code(302);
                    $response["message"] = "Account already exists";
                    break;
                }
                if ($users->insert($input)) {
                    http_response_code(201);
                    $response["message"] = "New record created successfully";
                }
                break;
            case "PUT":
                if ($current = $users->test($input)) {
                    if ($current["id"] !== $input->id) {
                        http_response_code(302);
                        $response["message"] = "Account already exists";
                        break;
                    }
                }
                if ($users->update($input)) {
                    $response["message"] = "Records updated successfully";
                }
                break;
            case "DELETE":
                if ($users->delete($id)) {
                    $response["message"] = "Record deleted successfully";
                }
                break;
            default:
                http_response_code(405);
                $response["message"] = "Method Not Allowed";
        }

        echo json_encode($response);
    }
}
