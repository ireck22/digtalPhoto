<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use App\Models\theme;

class PhotoService extends Model
{
    /**
     * @params $request 上傳的檔案資料
     */
    public function import_file($request)
    {

        if ($request->hasFile('image')) {
            $destinationPath = 'upload';
            $files = $request->file('image'); // will get all files
            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName(); //圖片檔名
                // $file->move(public_path($destinationPath) , $file_name); // move files to destination folder
                $file->move("C:\\file", $file_name); // move files to destination folder
            }

            $file_name = "C:\\file\\" . $file_name;       //檔案名子加上路徑
            return [
                "status" => 1,
                "file_name" => $file_name
            ];
        } else {
            return 0;
        }
    }

    public function insert_db($data)
    {
        $theme = new theme;
        file_put_contents("test33.txt", "22" . PHP_EOL, FILE_APPEND);
        $result = $theme->insert($data);
        return 1;
    }
}
