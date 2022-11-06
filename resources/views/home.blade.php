@extends('layouts.welcome')
@section('content')




<div class="row m-0 vh-100">
    <div class="col-md-6 bg-image d-flex align-items-center justify-content-center flex-column text-center position-relative">
        <h1 class="text-center text-green">Hello Friend!</h1>
        <span class="text-white">Enter your personal<br>details and start journey<br>with us!</span>

        <div class="arrow-right text-white">
            <i class="fa-solid fa-caret-right"></i>
        </div>

    </div>
    <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="main-container">
            <h1 class="text-center text-light-green ">Add a User</h1>
            <p class="text-center">Type in your info</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/registration" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="name" name="name" value="" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="email" value="" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password " placeholder="password" required>
                </div>
                <div class="mb-3">
                    <select name="country" style="color:#4B4F4E" name="country" class="form-select" placeholder="country" required>
                        <option value="" selected="selected" hidden>Country</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-solid fa-caret-down"></i>
                </div>
                <div class="mb-3">
                    <input class="form-control date-input" name="birthday" type="text" onfocus="(this.type='date')" placeholder="Date of Birth" required>
                    <i class="fa fa-solid fa-calendar-days"></i>
                </div>
                <div class="mt-5 d-grid gap-2">
                    <button type="submit" class="btn btn-accent btn-block text-white border-0">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>






<!-- <div class="container">
    <div class="left">
        <div class="info">
            <h1>Hello Friend!</h1>
            <p>Enter your personal </br>details and start jurney</br> with us!</p>
        </div>
    </div>
    <div class="right">
        <div class="user-info">
            <h1>Add a User</h1>
            <p>Type in your info</p>
        </div>
        <div class="form"></div>
        <form class="form" action="/register">
            <div>
                <input type="text" id="name" name="name" placeholder="name" required>
            </div>
            <div>
                <input type="email" id="email" name="lastname" placeholder="email" required>
            </div>
            <div>
                <input type="password" id="password" name="password" placeholder="password" required>
            </div>
            <div>
                <select id="country" name="country" required>
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
            </div>
            <div>
                <input type="date" id="date" name="date" placeholder="date" required>
            </div>
            <div>
                <input type="submit" id="submit" value="Submit">
            </div>
        </form>

    </div>
</div> -->
@endsection