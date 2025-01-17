<?php

namespace Config;

class Controller
{
    protected static function secret(string $input, string $action = "")
    {
        if ($action == "decrypt") {
            return hex2bin(base64_decode($input));
        }
        return base64_encode(bin2hex($input));
    }

    protected static function get_model(string $model)
    {
        if (file_exists(DATA_DIR . $model . ".php")) {
            require_once DATA_DIR . $model . ".php";
            return new $model();
        }
    }

    protected static function get_view(string $view, array $data = [])
    {
        if (file_exists(VIEW_DIR . $view . ".php")) {
            require_once VIEW_DIR . $view . ".php";
        }
    }
}
