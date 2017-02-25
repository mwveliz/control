@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show comando
    </h1>
    <br>
    <form method = 'get' action = '{!!url("comando")!!}'>
        <button class = 'btn btn-primary'>comando Index</button>
    </form>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>orden : </i></b>
                </td>
                <td>{!!$comando->orden!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fecha : </i></b>
                </td>
                <td>{!!$comando->fecha!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>mac : </i></b>
                </td>
                <td>{!!$comando->mac!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection