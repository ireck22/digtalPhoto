@extends('layout.default')
@section('content')
    <!-- <a href="" @click="test()">test</a> -->
    
    @foreach($posts as $row)
        <div class="col-xs-6 col-md-4">
            <span class="badge badge-secondary sm-2 btn btn-primary btn-lg" @click="test()"><h1>{{$row}}</h1></span>
        </div>
        <!-- <div>&nbsp;&nbsp;</div> -->
    @endforeach 
    <br>
    <br>
    <!-- <input type="submit" value="立即送出" @click="test()"> -->
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="col-sm-12">
        <img src="https://onepage.nownews.com/sites/default/files/styles/crop_thematic_mobile_banner_img/public/2021-04/FotoJet%20-%202021-04-07T152231.955.jpg?h=3bb414f3&itok=2O262YcA" alt="貴濱狗">   
    </div>
    
   

@stop