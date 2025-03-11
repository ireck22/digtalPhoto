@extends('layout.default')
@section('content')

<div class="upload_main">
   <form method="POST" action="/photo/import" enctype="multipart/form-data">
      相簿主題名:<input type="text" name="theme_name"><br>
      <label for="po_image" class="block text-sm leading-5 font-medium text-gray-700">
          檔案上傳
          <input type="file"  accept=".jpg,.png" name="image[]" multiple="multiple">
      </label>
      <input class="btn btn-success" type="submit"></button>
   </form>
</div>
@stop