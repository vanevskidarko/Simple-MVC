<?php

namespace mvc;


class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();
        return $result;
    }

    public function get_user_by_id($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function get_all_users()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function create_user($username, $password, $email)
    {
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function update_user($id, $username, $password, $email)
    {
        $sql = "UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id, 'username' => $username, 'password' => $password, 'email' => $email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function delete_user($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }
}
