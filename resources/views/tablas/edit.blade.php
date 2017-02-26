@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tablas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tablas, ['route' => ['tablas.update', $tablas->id], 'method' => 'patch']) !!}

                        @include('tablas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection