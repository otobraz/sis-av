<table id="index-table" class="table table-striped table-col-condensed table-bordered table-responsive">

   <thead>
      <tr>
         <th>Matrícula</th>
         <th>Nome</th>
         <th>E-mail</th>
         <th>Curso</th>
      </tr>
   </thead>

   <tbody>
      @foreach($students as $student)

         <tr>
            <td>{{$student->matricula}}</td>
            <td>{{$student->nome . " " . $student->sobrenome}}</td>
            <td>{{$student->email}}</td>
            <td>
                  {{$student->curso->curso}}
                  <a class="pull-right btn btn-primary-ufop btn-xs" role="button" style="color: white" href="{{route('guidance.create', encrypt($student->id))}}">Orientar</a>
            </td>
         </tr>

      @endforeach

   </tbody>

   <tfoot>
      <tr>
         <th>Matrícula</th>
         <th>Nome</th>
         <th>E-mail</th>
         <th>Curso</th>
      </tr>
   </tfoot>

</table>
