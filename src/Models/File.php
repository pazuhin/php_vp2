<?php

class File extends Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['user_id', 'image'];

    public function loadImage($fileName, $id)
    {
        File::query()->create([
            'user_id' => intval($id),
            'image' => $fileName
        ]);
    }

    public function loadImageFromReg($fileName, $id)
    {
        File::query()->create([
            'user_id' => intval($id),
            'image' => $fileName
        ]);
    }

    public function getImages($id)
    {
        $imageList = File::query()
            ->leftJoin('users', 'files.user_id', '=', 'users.id')
            ->where('files.user_id', '=', $id)
            ->get()
            ->toArray();
        return $imageList;
    }

}
//{
//    public function saveToDb($lastUserId, $fileName)
//    {
//        $STH = self::$pdo->prepare("INSERT INTO photos (user_id, image) values (:user_id, :image)");
//        $STH->execute(['user_id' => $lastUserId, 'image' => $fileName]);
//    }
//
//    public function loadImage($image, $id)
//    {
//        $STH = self::$pdo->prepare("INSERT INTO photos (user_id, image) values (:user_id, :image)");
//        $STH->execute(['user_id' => $id, 'image' => $image]);
//    }
//
//    public function getImages($id)
//    {
//        $imageList = self::$pdo->prepare("SELECT users.name, photos.image from photos LEFT JOIN users on users.id = photos.user_id where users.id =:user_id");
//        $imageList->execute(['user_id' => $id]);
//        $imageListResult = $imageList->fetchAll(PDO::FETCH_ASSOC);
//        return $imageListResult;
//    }
//}