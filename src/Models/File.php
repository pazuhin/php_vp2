<?php

class File extends BaseModel
{
    public function saveToDb($lastUserId, $fileName)
    {
        $STH = self::$pdo->prepare("INSERT INTO photos (user_id, image) values (:user_id, :image)");
        $STH->execute(['user_id' => $lastUserId, 'image' => $fileName]);
    }

    public function loadImage($image, $id)
    {
        $STH = self::$pdo->prepare("INSERT INTO photos (user_id, image) values (:user_id, :image)");
        $STH->execute(['user_id' => $id, 'image' => $image]);
    }

    public function getImages($id)
    {
        $imageList = self::$pdo->prepare("SELECT users.name, photos.image from photos LEFT JOIN users on users.id = photos.user_id where users.id =:user_id");
        $imageList->execute(['user_id' => $id]);
        $imageListResult = $imageList->fetchAll(PDO::FETCH_ASSOC);
        return $imageListResult;
    }
}