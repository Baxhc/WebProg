@extends('navbarfooter')
@section('title', 'Book Now')

@section('content')

<div class="container">
    <div class = "info-container">
        <h2>Payment Successful</h2>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Eo_circle_green_white_checkmark.svg/800px-Eo_circle_green_white_checkmark.svg.png?20200417133735" alt="">
        <p><strong>Thank You</strong></p>
    </div>
    
    <div class="button-container">
        <div class="hehe" style="height: 100px; text-align: center; color: #821616; padding:10px">
            <a href="{{ route('home') }}" class="btn" style="background-color: #821616; font-size:24px; color: #fff; padding:10px 100px">OK</a>
        </div>
    </div>
</div>
@endsection

<style>
    .info-container{
        margin:10%;
        padding:20px;
        background-color:#EAEAEA;
        position: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .info-container h2{
        color: #821616
    }

    .info-container img{
            height: 20%;
            padding: 20px;
    }
</style>
