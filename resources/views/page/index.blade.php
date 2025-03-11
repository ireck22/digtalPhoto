@extends('layout.default')
@section('content')
<!-- <a href="" @click="back()">test</a> -->

<!-- 點擊相簿名子時會把所有的圖片找出來 start-->
@foreach($posts as $row)
<div class="col-xs-6 col-md-4 theme_div">
  <!-- 用js的方式可以用下面的 start-->
  <!-- <span class="badge badge-secondary sm-2 btn btn-primary btn-lg" @click="photo_find()"> -->
    <!-- <h1>{{$row}}</h1> -->
  <!-- </span> -->
  <!-- 用js的方式可以用下面的 end -->
  <span class="badge badge-secondary sm-2 btn btn-primary btn-lg" @click="photo_find()">
    <a class="btn btn-info" href="/photo/find/{{$row}}"><h1>{{$row}}</h1></a>
  </span>
</div>
@endforeach
<!-- 點擊相簿名子時會把所有的圖片找出來 end-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!--當相簿有相片時才會顯示  start-->
@if(count($result_one)>0)
      <!-- <div class="w-100 h-100 text-center"> -->
      <!-- text-center -->
      <!-- 這邊會放上面點下相簿撈出來的照片，跑回圈  start-->
      <div class="container">
        <div class="carousel slide" data-ride="carousel" id="carousel-demo">
          <ol class="carousel-indicators">
            @for($i=1; $i<=count($result_one);$i++) 
              <li data-target="#carousel-demo" data-slide-to="{{$i}}" class="active">{{$i}}</li>
            @endfor
          </ol>
        <div class="carousel-inner">  
        @foreach($result_one as $row2=>$value)
          @if($row2==0)
            <div class="carousel-item active">
              <img class="d-block w-100" src="http://localhost/digtalphoto/storage/app/{{$value['file_name']}}" alt="">
            </div> 
            @continue
          @endif
          <div class="carousel-item">
            <img class="d-block w-100" src="http://localhost/digtalphoto/storage/app/{{$value['file_name']}}" alt="">
          </div>
        @endforeach
        <a href="#carousel-demo" class="carousel-control-prev" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="#carousel-demo" class="carousel-control-next" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </div>
      <!-- 這邊會放上面點下相簿撈出來的照片，跑回圈 end-->
      <!-- </div> -->
@endif
<!--當相簿有相片時才會顯示  end-->

@stop