@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show tabla
    </h1>
    <br>
    <form method = 'get' action = '{!!url("tabla")!!}'>
        <button class = 'btn btn-primary'>tabla Index</button>
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
                <td>{!!$tabla->orden!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fecha : </i></b>
                </td>
                <td>{!!$tabla->fecha!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>mac : </i></b>
                </td>
                <td>{!!$tabla->mac!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection