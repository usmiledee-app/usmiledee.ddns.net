<?php

use Config\Database;

class Users extends Database
{
    private static $result;
    public function select($id = 0)
    {
        $sql = "SELECT * FROM tbl_users";
        $params = [];
        if ($id > 0) {
            $sql .= " WHERE id=:id";
            $params[":id"] = $id;
            return self::query($sql, $params)->fetch();
        }
        return self::query($sql)->fetchAll();
    }

    public function insert($data = null)
    {
        $sql = "INSERT INTO tbl_users (first_name, last_name, user_role, user_email, user_encoded) VALUES (:fname, :lname, :urole, :email, :passcode)";
        $params[":fname"] = self::test_input($data->first);
        $params[":lname"] = self::test_input($data->last);
        $params[":urole"] = self::test_input($data->role);
        $params[":email"] = self::test_input($data->email);
        $params[":passcode"] = password_hash($data->secret, PASSWORD_DEFAULT);
        if (self::query($sql, $params)) {
            return true;
        }
    }
}
