@extends('layout.admin.base')

@section('title')
   Importar | Ajustes
@endsection

@section('content-header')
   <h1>
      Importar Ajustes
   </h1>
   <hr class="hr-ufop">
@endsection

@section('content')

   <div class="col-md-offset-3 col-md-6">
      <div class="panel panel-default">
         <div class="panel-body">
            @include('alert-message.error')
            <form class="form-signin" method="POST" autocomplete="off" enctype="multipart/form-data" action="{{action('SectionController@storeRegistrationsFromCsv')}}">

               {{ csrf_field() }}

               <fieldset>

                  <div class="form-group">
                     <label for="registrations-csv">Selecione o arquivo:</label>
                     <input type="file" accept=".csv" id="registrations-csv" name="registrations-csv">
                     <p class="help-block">Apenas arquivos do tipo .csv</p>
                  </div>

                  <button class="btn btn-default"  type="reset"><i class="glyphicon glyphicon-erase"></i> Limpar</button>
                  <button class="btn btn-primary-ufop" type="submit"><i class="fa fa-check-square-o"></i> Importar</button>
               </fieldset>
            </form>
         </div>
      </div>
   </div>

@endsection
