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
