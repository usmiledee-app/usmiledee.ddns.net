<?php

use Config\Database;

class Users extends Database
{
    public function select($id = 0)
    {
        $sql = "SELECT * FROM tbl_users";
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
        $sql = "INSERT INTO tbl_users (user_first, user_last, user_role, user_email, user_encoded) VALUES (:fname, :lname, :urole, :email, :passcode)";
        $params[":fname"] = self::test_input($data->first);
        $params[":lname"] = self::test_input($data->last);
        $params[":urole"] = self::test_input($data->role);
        $params[":email"] = self::test_input($data->email);
        $params[":passcode"] = password_hash($data->secret, PASSWORD_DEFAULT);
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function update($data = null)
    {
        $sql = "UPDATE tbl_users SET user_first=:fname, user_last=:lname, user_role=:urole, user_email=:email, user_encoded=:passcode WHERE id=:id";
        $params[":fname"] = self::test_input($data->first);
        $params[":lname"] = self::test_input($data->last);
        $params[":urole"] = self::test_input($data->role);
        $params[":email"] = self::test_input($data->email);
        $params[":passcode"] = password_hash($data->secret, PASSWORD_DEFAULT);
        $params[":id"] = $data->id;
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function delete($id = 0)
    {
        $sql = "DELETE FROM tbl_users WHERE id=:id";
        $params[":id"] = $id;
        if (self::query($sql, $params)) {
            return true;
        }
    }

    public function test($data = null)
    {
        $sql = "SELECT * FROM tbl_users WHERE user_email=:email";
        $params[":email"] = self::test_input($data->email);
        if ($result = self::query($sql, $params)) {
            return $result->fetch();
        }
    }
}
