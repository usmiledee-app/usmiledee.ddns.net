<?php

use Config\Database;

class Resources extends Database
{
    public function select($id = 0)
    {
        $sql = "SELECT * FROM tbl_resources";
        $result = self::query($sql)->fetchAll();
        if ($id > 0) {
            $sql .= " WHERE id=:id";
            $params[":id"] = $id;
            $result = self::query($sql, $params)->fetch();
        }
        return $result;
    }

    public function insert($data = null)
    {
        $sql = "INSERT INTO tbl_resources (res_name, res_note, res_encoded) VALUES (:rname, :rnote, :rpasscode)";
        $params[":rname"] = self::test_input($data->name);
        $params[":rnote"] = self::test_input($data->note);
        $params[":rpasscode"] = $data->secret;
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function update($data = null)
    {
        $sql = "UPDATE tbl_resources SET res_name=:rname, res_note=:rnote, res_encoded=:rpasscode WHERE id=:id";
        $params[":rname"] = self::test_input($data->name);
        $params[":rnote"] = self::test_input($data->note);
        $params[":rpasscode"] = $data->secret;
        $params[":id"] = $data->id;
        if (self::query($sql, $params)) {
            return true;
        }
    }

    // public function patch($data = null)
    // {
    //     $sql = "UPDATE tbl_resources SET  WHERE id=:id";
    //     $params[":id"] = $data->id;
    //     if (self::query($sql, $params)) {
    //         return true;
    //     }
    // }

    public function delete($id = 0)
    {
        $sql = "DELETE FROM tbl_resources WHERE id=:id";
        $params[":id"] = $id;
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function test($data = null)
    {
        $sql = "SELECT * FROM tbl_resources WHERE res_name=:rname";
        $params[":rname"] = self::test_input($data->name);
        if ($result = self::query($sql, $params)) {
            return $result->fetch();
        }
    }
}
