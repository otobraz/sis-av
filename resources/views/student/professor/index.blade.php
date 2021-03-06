@extends('layout.professor.base')

@section('title')
   Alunos
@endsection

@section('extraCss')
   <link href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

   <div class="box box-primary-ufop">
      <div class="box-header with-border">
         <h3 class="box-title">Alunos</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
         @include('alert-message.success')
         @include('alert-message.error')
         @include('student.professor.students-list')
      </div><!-- /.box-body -->
   </div><!-- /.box -->

@endsection

@section('myScripts')

   <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

   <script>
   $(document).ready(function () {
      $("#index-table").DataTable( {
         "language": {
            "lengthMenu": "Mostrar  _MENU_  registros por página",
            "zeroRecords": "Nada encontrado.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ registros)",
            "search": "Procurar: ",
            "paginate": {
               "next": "Próximo",
               "previous": "Anterior"
            }
         },
         "order": [[1, 'asc']],
         "autoWidth": true,
         "aLengthMenu": [[25, 50, 100, 200, 300, -1], [25, 50, 100, 200, 300, "Tudo"]],
         "columnDefs": [{
            "orderable": false,
            "targets": 4
         }]
      });
   });
   </script>

@endsection
