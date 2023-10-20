@extends('layouts.loginregister.app')
@section('content')
    <div class="container"><br>
        <a href="/">
                        <button class="bi bi-arrow-left-circle-fill btn" style="background-color: limegreen; color:white;"> Kembali</button>
                    </a>
        <br />
        <center><img src="{{ URL::asset('assets/images/1logors.png'); }}" width="150" height="100" alt="" /></center>
        <h1 class="text-center" style="color: white;"><b>&nbsp; Sistem Pengecekkan Data Tempat Tidur</b></h1>
                <br/>
             <br/>
             <h3 align="center" style="color: white;"><b>Login</b></h3>
        <div class="col-md-4 col-md-offset-4">
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label style="color: white;">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label style="color: white;">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group mb-3">
                    <div class="checkbox">
                        <label style="color: white;"><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                </div>
                <button style="background-color: limegreen; color: white;" type="submit" class="btn btn-block">Log In</button>
                <hr>
            </form>
        </div>
    </div>
@endsection