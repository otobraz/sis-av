@extends('layout.admin.base')

@section('title')
   Editar Tipo de Pergunta
@endsection

@section('content-header')
   <h1>Editar Tipo de Pergunta</h1>
   <hr class="hr-ufop">
@endsection

@section('content')

   <div class="col-md-offset-3 col-md-6">
      <div class="panel panel-default">
         <div class="panel-body">

            @include('alert-message.success')
            @include('alert-message.error')

            <form class="form-signin" method="POST" action="{{action('QuestionTypeController@update', encrypt($questionType->id))}}">

               {{ csrf_field() }}
               {{ method_field('PUT') }}

               <input type="hidden" name="id" value="{{encrypt($questionType->id)}}">

               <fieldset>

                  <div class="form-group">
                     <label for="questionType">Tipo:</label>
                     <input class="form-control input-xlarge" type="text" name="type" id="type"
                     placeholder="Nome do tipo" value="{{$questionType->tipo}}" autofocus required
                     oninvalid="setCustomValidity('Informe o tipo.')"
                     oninput="setCustomValidity('')"
                     >
                  </div>

                  <button class="btn btn-danger pull-left"  type="button" data-toggle="modal" data-action="http://localhost:8000/perguntas/tipo/{{encrypt($questionType->id)}}" href="#deleteModal"> Excluir</button>
                  <div class="pull-right">
                     <button class="btn btn-default" type="button" onclick="history.go(-1)"> Cancelar</button>
                     <button class="btn btn-primary-ufop" type="submit"><i class="fa fa-pencil-square-o"></i> Editar</button>
                  </div>

               </fieldset>
            </form>

         </div>
      </div>
   </div>

   @include('question-type.delete-modal')

@endsection

@section('myScripts')
   <script type="text/javascript" src="{{URL::asset('/js/deleteModal.js')}}"></script>
@endsection
