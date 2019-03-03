<?php

class Users extends BaseModel
{
    public function setUser($userData)
    {
        $users = self::$pdo->prepare("Select id from users where name =:name_user and password =:password");
        $users->execute(['name_user' => $userData['name'], 'password' => $userData['password']]);
        $result = $users->fetchColumn();
        if ($result > 0) {
            $renderError = new AdminControllers();
            $renderError->renderError();
            return null;
        }
        $STH = self::$pdo->prepare("INSERT INTO users (name, age, description, password) values (:name, :age, :description, :password)");
        $STH->execute(['name' => $userData['name'], 'age' => $userData['age'], 'description' => $userData['description'], 'password' => $userData['password']]);
        $success = new AdminControllers();
        $success->successForm();
    }

    public function getUser()
    {
        // $users = self::$pdo->prepare("Select from users where name =: name, password =:password");

        return [];
    }
}