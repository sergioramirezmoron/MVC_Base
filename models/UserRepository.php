<?php
class UserRepository
{
    public static function register($username, $password, $password2)
    {
        $db = Connection::connect();
        if (!$db) die('Error de conexión');
        if ($password == $password2) {
            $q = "INSERT INTO user (username, password) VALUES ('$username','" . md5($password) . "')";
            if ($result = $db->query($q)) {
                return $db->insert_id;
            } else {
                return false;
            }
        }
        return false;
    }

    public static function login($username, $password)
    {
        $db = Connection::connect();
        $q = 'SELECT * FROM user WHERE username="' . $username . '" AND password="' . md5($password) . '"';
        $result = $db->query($q);

        if ($row = $result->fetch_assoc()) {
            return new User($row['id'], $row['username'], $row['password'], $row['rol']);
        } else {
            return false;
        }
    }

    public static function getUserById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM user WHERE id=" . $id;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new User($row['id'], $row['username'], $row['password'], $row['rol']);
        } else {
            return false;
        }
    }
}
