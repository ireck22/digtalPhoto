<?php

use Intervention\Image\Facades\Image;
Route::get('/test2', function()
{
    $img = Image::make('https://images.pexels.com/photos/4273439/pexels-photo-4273439.jpeg')->resize(300, 200); // 這邊可以隨便用網路上的image取代
    return $img->response('jpg');
});
Route::get('/photo', "PhotoController@index");
Route::get('/photo/upload', "PhotoController@upload");
Route::post('/photo/import', "PhotoController@import");
Route::get('/photo/test', "PhotoController@test");



