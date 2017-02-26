@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit tabla
    </h1>
    <form method = 'get' action = '{!!url("tabla")!!}'>
        <button class = 'btn btn-danger'>tabla Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("tabla")!!}/{!!$tabla->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="orden">orden</label>
            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$tabla->
            orden!!}"> 
        </div>
        <div class="form-group">
            <label for="fecha">fecha</label>
            <input id="fecha" name = "fecha" type="text" class="form-control" value="{!!$tabla->
            fecha!!}"> 
        </div>
        <div class="form-group">
            <label for="mac">mac</label>
            <input id="mac" name = "mac" type="text" class="form-control" value="{!!$tabla->
            mac!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection