<?php

use Config\Controller;

class Scratch extends Controller
{
    private $input;
    private $response;
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $this->input = json_decode(file_get_contents("php://input"));
    }

    public function index()
    {
        $this->response["message"] = "Hello, world!";
    }

    public function user($id = 0)
    {
        global $method;
        $model = self::get_model("Users");
        switch ($method) {
            case "GET":
                $this->response = $model->select($id);
                break;
            case "POST":
                if (!$model->test($this->input)) {
                    if ($model->insert($this->input)) {
                        http_response_code(201);
                        $this->response["message"] = "Created";
                        exit;
                    }
                }
                $this->response["message"] = "Already";
                break;
            case "PUT":
                if ($current = $model->test($this->input)) {
                    if ($current["id"] !== $this->input->id) {
                        $this->response["message"] = "Already";
                        exit;
                    }
                }
                if ($model->update($this->input)) {
                    $this->response["message"] = "Updated";
                }
                break;
            case "DELETE":
                if ($model->delete($id)) {
                    $this->response["message"] = "Deleted";
                }
                break;
            default:
                http_response_code(405);
                $this->response["message"] = "Method Not Allowed";
        }
    }

    public function __destruct()
    {
        if (http_response_code() !== 500) {
            echo json_encode($this->response);
        }
    }
}
