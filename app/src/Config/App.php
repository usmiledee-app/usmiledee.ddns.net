<?php

class App
{
    private static $controller = "Home";
    private static $method = "index";

    public function start()
    {
        if ($url = self::parse_uri()) {
            // var_dump($url);
            $controller = ucfirst($url[0]);
            if (file_exists(CTRL_DIR . $controller . ".php")) {
                self::$controller = $controller;
                unset($url[0]);
            }
        }

        require_once CTRL_DIR . self::$controller . ".php";
        self::$controller = new self::$controller();

        // var_dump(self::$controller);
        // echo json_encode()

        if (isset($url[1]) && method_exists(self::$controller, $url[1])) {
            self::$method = $url[1];
            unset($url[1]);
        }

        $params = $url ? array_values($url) : [];
        call_user_func_array([self::$controller, self::$method], $params);
    }

    private static function parse_uri()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $uri = rtrim($uri);
        $path = explode("/", $uri);
        $path = array_filter($path);
        return array_values($path);
    }
}
