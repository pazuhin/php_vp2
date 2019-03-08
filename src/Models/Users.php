<?php

class Users extends BaseModel
{
    public function setUser($userData)
    {
        $STH = self::$pdo->prepare("INSERT INTO users (name, age, description, password, avatar) values (:name, :age, :description, :password, :avatar)");
        $STH->execute(['name' => $userData['name'], 'age' => $userData['age'], 'description' => $userData['description'], 'password' => $userData['password'], 'avatar' => $userData['file']]);
    }

    public function getUser($checkData)
    {
        $users = self::$pdo->prepare("Select id from users where name =:name_user and password =:password");
        $users->execute(['name_user' => $checkData['name'], 'password' => $checkData['password']]);
        $result = $users->fetchColumn();
        if ($result > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function getLastId()
    {
        $lastID = self::$pdo->lastInsertId();
        return $lastID;
    }

    public function getDbId()
    {
        $lastID = self::$pdo->lastInsertId();
        return $lastID;
    }

    public function getAll()
    {
        $users = self::$pdo->prepare("Select name, age from users");
        $users->execute();
        $dataUsers = $users->fetchAll(PDO::FETCH_ASSOC);
        return $dataUsers;
    }
}
