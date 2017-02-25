@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit comando
    </h1>
    <form method = 'get' action = '{!!url("comando")!!}'>
        <button class = 'btn btn-danger'>comando Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("comando")!!}/{!!$comando->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="orden">orden</label>
            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$comando->
            orden!!}"> 
        </div>
        <div class="form-group">
            <label for="fecha">fecha</label>
            <input id="fecha" name = "fecha" type="text" class="form-control" value="{!!$comando->
            fecha!!}"> 
        </div>
        <div class="form-group">
            <label for="mac">mac</label>
            <input id="mac" name = "mac" type="text" class="form-control" value="{!!$comando->
            mac!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection