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

    public function example($id = 0)
    {
        global $method;
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        $target_model = self::get_model("Examples");

        switch ($method) {
            case "GET":
                if ($result = $target_model->select($id)) {
                    $response = $result;
                }
                break;
            case "POST":
                if ($target_model->test($input)) {
                    http_response_code(302);
                    $response["message"] = "Account already exists";
                    break;
                }
                if ($target_model->insert($input)) {
                    http_response_code(201);
                    $response["message"] = "New record created successfully";
                }
                break;
            case "PUT":
                if ($current = $target_model->test($input)) {
                    if ($current["id"] !== $input->id) {
                        http_response_code(302);
                        $response["message"] = "Account already exists";
                        break;
                    }
                }
                if ($target_model->update($input)) {
                    $response["message"] = "Records updated successfully";
                }
                break;
            case "DELETE":
                if ($target_model->delete($id)) {
                    $response["message"] = "Record deleted successfully";
                }
                break;
            default:
                http_response_code(405);
                $response["message"] = "Method Not Allowed";
        }

        echo json_encode($response);
    }

    public function resource($id = 0)
    {
        global $method;
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        $target_model = self::get_model("Resources");

        switch ($method) {
            case "GET":
                if ($result = $target_model->select($id)) {
                    $response = $result;
                }
                break;
            case "POST":
                if ($target_model->test($input)) {
                    http_response_code(302);
                    $response["message"] = "Account already exists";
                    break;
                }
                $input->secret = self::secret($input->secret);
                if ($target_model->insert($input)) {
                    http_response_code(201);
                    $response["message"] = "New record created successfully";
                }
                break;
            case "PUT":
                if ($current = $target_model->test($input)) {
                    if ($current["id"] !== $input->id) {
                        http_response_code(302);
                        $response["message"] = "Account already exists";
                        break;
                    }
                }
                $input->secret = self::secret($input->secret);
                if ($target_model->update($input)) {
                    $response["message"] = "Records updated successfully";
                }
                break;
            case "DELETE":
                if ($target_model->delete($id)) {
                    $response["message"] = "Record deleted successfully";
                }
                break;
            default:
                http_response_code(405);
                $response["message"] = "Method Not Allowed";
        }

        echo json_encode($response);
    }

    public function user($id = 0)
    {
        global $method;
        $input = json_decode(file_get_contents("php://input"));
        $response = [];
        $target_model = self::get_model("Users");

        switch ($method) {
            case "GET":
                if ($result = $target_model->select($id)) {
                    $response = $result;
                }
                break;
            case "POST":
                if ($target_model->test($input)) {
                    http_response_code(302);
                    $response["message"] = "Email account already exists";
                    break;
                }
                $input->secret = self::secret($input->secret);
                if ($target_model->insert($input)) {
                    http_response_code(201);
                    $response["message"] = "New record created successfully";
                }
                break;
            case "PUT":
                if ($current = $target_model->test($input)) {
                    if ($current["id"] !== $input->id) {
                        http_response_code(302);
                        $response["message"] = "Email account already exists";
                        break;
                    }
                }
                $input->secret = self::secret($input->secret);
                if ($target_model->update($input)) {
                    $response["message"] = "Records updated successfully";
                }
                break;
            case "DELETE":
                if ($target_model->delete($id)) {
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
