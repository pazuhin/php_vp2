<?php

class Users extends BaseModel
{
    public function setUser($userData)
    {
        $STH = self::$pdo->prepare("INSERT INTO users (name, age, description, password) values (:name, :age, :description, :password)");
        $STH->execute(['name' => $userData['name'], 'age' => $userData['age'], 'description' => $userData['description'], 'password' => $userData['password']]);
    }

    public function getUser($checkData)
    {
        $users = self::$pdo->prepare("Select id from users where name =:name_user and password =:password");
        $users->execute(['name_user' => $checkData['name'], 'password' => $checkData['password']]);
        $result = $users->fetchColumn();
        if ($result > 0) {
            return true;
        } else {
            return null;
        }
    }
}
