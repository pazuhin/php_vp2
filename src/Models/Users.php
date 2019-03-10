<?php

class User extends Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['name', 'age', 'password', 'info', 'avatar'];

    public function createUser($userData)
    {
        $user = User::query()->create([
            'name' => htmlspecialchars($userData['name']),
            'age' => intval($userData['age']),
            'info' => htmlspecialchars($userData['description']),
            'password' => md5(trim($userData['password'])),
            'avatar' => htmlspecialchars($userData['file'])
        ]);
        return $user->id;
    }

    public function getUserId($checkData)
    {
        $id = User::query()
            ->where([
                ['name', '=', $checkData['name']],
                ['password', '=', $checkData['password']],
            ])
            ->get()
            ->toArray();
        return $id[0]['id'];
    }

    public function getAll()
    {
        $dataUsers = User::query()
            ->get()
            ->toArray();
        return $dataUsers;
    }

    public function updateUser($currentId, $newUser)
    {

        $user = User::query()->find($currentId)->update([
            'name' => htmlspecialchars($newUser['name']),
            'info' => htmlspecialchars($newUser['info']),
            'password' => md5(trim($newUser['password'])),
        ]);
        return true;
    }
}

//class Users extends BaseModel
//{
//    public function setUser($userData)
//    {
//        $STH = self::$pdo->prepare("INSERT INTO users (name, age, description, password, avatar) values (:name, :age, :description, :password, :avatar)");
//        $STH->execute(['name' => $userData['name'], 'age' => $userData['age'], 'description' => $userData['description'], 'password' => $userData['password'], 'avatar' => $userData['file']]);
//    }
//
//    public function getUser($checkData)
//    {
//        $users = self::$pdo->prepare("Select id from users where name =:name_user and password =:password");
//        $users->execute(['name_user' => $checkData['name'], 'password' => $checkData['password']]);
//        $result = $users->fetchColumn();
//        if ($result > 0) {
//            return $result;
//        } else {
//            return null;
//        }
//    }
//
//    public function getLastId()
//    {
//        $lastID = self::$pdo->lastInsertId();
//        return $lastID;
//    }
//
//    public function getDbId()
//    {
//        $lastID = self::$pdo->lastInsertId();
//        return $lastID;
//    }
//
//    public function getAll()
//    {
//        $users = self::$pdo->prepare("Select name, age from users");
//        $users->execute();
//        $dataUsers = $users->fetchAll(PDO::FETCH_ASSOC);
//        return $dataUsers;
//    }
//}
