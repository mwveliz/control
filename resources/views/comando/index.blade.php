@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Comando Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("comando")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New comando</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>orden</th>
            <th>fecha</th>
            <th>mac</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($comandos as $comando) 
            <tr>
                <td>{!!$comando->orden!!}</td>
                <td>{!!$comando->fecha!!}</td>
                <td>{!!$comando->mac!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/comando/{!!$comando->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/comando/{!!$comando->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/comando/{!!$comando->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $comandos->render() !!}

</section>
@endsection