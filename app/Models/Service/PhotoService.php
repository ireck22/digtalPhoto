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
            $files2=[];                       //存所有的圖片檔案名子
            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName(); //圖片檔名
                //以下是上傳到網頁資料夾外的
                // $file->move("C:\\file", $file_name); // move files to destination folder
                //end
                // file_put_contents("test22.txt",$file_name.PHP_EOL,FILE_APPEND); //除錯用
                //先傳到可以讀到的位置
                $file->move(public_path("../storage/app"), $file_name); // move files to destination folder
                $files2[]=$file_name;
            }

            return [
                "status" => 1,
                "file_name" => $files2
            ];
        } else {
            return 0;
        }
    }

    public function insert_db($data)
    {
        $theme_name=$data['theme_name'];      //相簿名子
        $theme = new theme;
        foreach ($data['file_name'] as $key) {
            $result = $theme->insert($theme_name,$key);
        }

        return 1;
    }

    /**
     * 拿所有的相簿名子，不重複
     */
    public function list()
    {
        $list = new theme();
        $result = $list->list();    //拿所有相簿名子
        $theme_array = [];          //結果陣列初始化

        //去重複的相簿名子
        foreach ($result as $row) {
            if (in_array($row['theme_name'], $theme_array)) {
                continue;
            } else {
                $theme_array[] = $row['theme_name'];
            }
        }

        return $theme_array;
    }

    /**
     * @param $key 相簿名子
     */
    public function find($key)
    {
        $list = new theme();
        $result_one = $list->find($key);   //個別相簿的圖片
        return $result_one;
    }
}
