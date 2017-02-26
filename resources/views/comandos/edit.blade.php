@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comando
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comando, ['route' => ['comandos.update', $comando->id], 'method' => 'patch']) !!}

                        @include('comandos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection