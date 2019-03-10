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
