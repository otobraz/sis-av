@extends('layout.student.base')

@section('title')
   Orientações
@endsection

@section('content')

   <div class="box box-primary-ufop">
      <div class="box-header with-border">
         <h3 class="box-title">ORIENTAÇÕES</h3>
         <div class="box-tools pull-right">
         </div><!-- /.box-tools -->
      </div><!-- /.box-header -->

      <div class="box-body">
         @include('alert-message.success')
         @include('alert-message.error')
         @include('guidance.student.guidances-list')
      </div>
   </div>

@endsection

@section('myScripts')

@endsection
