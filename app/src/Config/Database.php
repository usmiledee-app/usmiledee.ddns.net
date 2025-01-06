<?php

namespace Config;

use PDO;
use PDOException;

class Database
{
    private static $conn = null;

    public function __construct()
    {
        self::connect("usmiledee_gallery_db");
    }

    private static function connect(string $dbname)
    {
        global $dbhost;
        global $dbuser;
        global $dbpass;
        try {
            $dsn = "mysql:host=$dbhost;dbname=$dbname";
            self::$conn = new PDO($dsn, $dbuser, $dbpass);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            http_response_code(500);
            die(json_encode(["status" => "Connection Failed", "message" => $e->getMessage()]));
        }
    }

    protected static function query(string $sql, array $params = [])
    {
        if (http_response_code() !== 500) {
            try {
                $stmt = self::$conn->prepare($sql);
                $stmt->execute($params);
                return $stmt;
            } catch (PDOException $e) {
                $error["sql"] =  $sql;
                $error["params"] = $params;
                $error["message"] = $e->getMessage();
                die(json_encode($error));
            }
        }
    }

    protected static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
