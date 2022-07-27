<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\theme;
use App\Models\Service\PhotoService;


class PhotoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index2()
    // {
    //     $test=["相簿1",'相簿2','相簿3'];

    //     return View::make('page.index')
    //         ->with('posts',$test);
    // }

    //呼叫上傳頁面
    public function upload()
    {
        return View::make('page.upload');
    }

    public function index()
    {
        $list = new theme();
        $result = $list->list();
        $theme_array = [];

        //整理所有的相簿名子
        foreach ($result as $row) {
            $theme_array[] = $row['theme_name'];
        }

        return View::make('page.index')
            ->with('posts', $theme_array);
    }

    public function find($key)
    {
        $list = new theme();
        $result = $list->find($key);
        return View::make('page.index')
            ->with('posts', $result);
    }

    public function back()
    {
        return redirect()->back()->getTargetUrl();
    }

    public function import(Request $request)
    {
        $theme_name = $request->theme_name;             //相簿名稱
        //--------------處理圖片上傳到隨身碟 start-----------------------
        $photoService = new PhotoService;
        $import_file = $photoService->import_file($request);
        if (empty($import_file)) {              //沒有上傳檔案跑這裡
            return View::make('page.upload');   //回上傳頁面
        }
        //--------------處理圖片上傳到隨身碟 end-------------------------

        //-----------------把圖片檔名和相簿存入資料庫 start---------------
        $save_data = [
            "theme_name" => $theme_name,                //相簿名子
            "file_name" => $import_file['file_name'],   //檔案名子
        ];

        $photoService = new PhotoService;
        $import_file = $photoService->insert_db($save_data);
        //-----------------把圖片檔名和相簿存入資料庫 end---------------

        return View::make('page.upload');   //回上傳頁面
    }
}
