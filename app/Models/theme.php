<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class theme extends Model
{
    public function list()
    {
        $post = theme::all();
        return $post;
    }

    public function find($key_name)
    {
        $result = theme::where('theme_name', '=', $key_name)
            ->get();
        
        return $result;
    }

    public function insert($data)
    {
        file_put_contents("test33.txt","23124".PHP_EOL,FILE_APPEND);
        $theme_db = new theme;
        $theme_db->theme_name = $data['theme_name'];
        $theme_db->file_name = $data['file_name'];
        $theme_db->save();
        return 1;
    }
}
