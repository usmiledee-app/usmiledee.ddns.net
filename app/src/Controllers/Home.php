<?php

use Config\Controller;

class Home extends Controller
{
    public function index()
    {
        $data["title"] = "usmiledee.net";
        self::get_view("home/index", $data);
    }

    public function test()
    {
        $encrypted = self::secret("testnaja");
        echo $encrypted . "<br/>";
        $decrypted = self::secret($encrypted, "decrypt");
        echo $decrypted;
        // var_dump($decrypted);
        // echo self::secret($encrypted, "decrypt");
    }
}
