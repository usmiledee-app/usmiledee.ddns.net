<?php

$input = $data["input"];
$model = $data["model"];
$response = [];

switch ($data["method"]) {
    case "GET":
        if ($result = $model->select($data["id"])) {
            $response = $result;
        }
        break;
    case "POST":
        if ($model->test($input)) {
            http_response_code(302);
            $response["message"] = "Account already exists";
            break;
        }
        if ($model->insert($input)) {
            http_response_code(201);
            $response["message"] = "New record created successfully";
        }
        break;
    case "PUT":
        if ($current = $model->test($input)) {
            if ($current["id"] !== $input->id) {
                http_response_code(302);
                $response["message"] = "Account already exists";
                break;
            }
        }
        if ($model->update($input)) {
            $response["message"] = "Records updated successfully";
        }
        break;
    case "DELETE":
        if ($model->delete($data["id"])) {
            $response["message"] = "Record deleted successfully";
        }
        break;
    default:
        http_response_code(405);
        $response["message"] = "Method Not Allowed";
}

echo json_encode($response);
