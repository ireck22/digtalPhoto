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

    public function insert($theme_name,$file_data)
    {
        $theme_db = new theme;
        $theme_db->theme_name = $theme_name;
        $theme_db->file_name = $file_data;
        $theme_db->save();
        return 1;
    }
}
