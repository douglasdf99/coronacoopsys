@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Coop
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($coop, ['route' => ['coops.update', $coop->id], 'method' => 'patch']) !!}

                        @include('coops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection