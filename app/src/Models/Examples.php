<?php

use Config\Database;

class Examples extends Database
{
    public function select($id = 0)
    {
        $sql = "SELECT * FROM tbl_examples";
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
        $sql = "INSERT INTO tbl_examples (ex_title, ex_note) VALUES (:etitle, :enote)";
        $params[":etitle"] = self::test_input($data->title);
        $params[":enote"] = self::test_input($data->note);
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function update($data = null)
    {
        $sql = "UPDATE tbl_examples SET ex_title=:etitle, ex_note=:enote WHERE id=:id";
        $params[":etitle"] = self::test_input($data->title);
        $params[":enote"] = self::test_input($data->note);
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
        $sql = "DELETE FROM tbl_examples WHERE id=:id";
        $params[":id"] = $id;
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function test($data = null)
    {
        $sql = "SELECT * FROM tbl_examples WHERE ex_title=:etitle";
        $params[":etitle"] = self::test_input($data->title);
        if ($result = self::query($sql, $params)) {
            return $result->fetch();
        }
    }
}
