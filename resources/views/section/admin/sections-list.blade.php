<table id="index-table" class="table table-ufop table-bordered table-striped table-col-condensed table-responsive">

   <thead>
      <tr>
         <th>Id</th>
         <th>Disciplina</th>
         <th>Cód. Turma</th>
         <th>Departamento</th>
         <th>Semestre</th>
         <th>Detalhes</th>
         <th>Excluir</th>
      </tr>
   </thead>


   <tbody>
      @foreach($sections as $section)
         <tr>
            <td align="center">{{$section->id}}</td>
            <td>{{$section->disciplina->cod_disciplina . " - " . $section->disciplina->disciplina}}</td>
            <td align="center">{{$section->cod_turma}}</td>
            <td align="center">{{$section->departamento->cod_departamento}}</td>
            <td align="center">{{$section->ano . "/" . $section->semestre}}</td>
            <td align="center">
               <a class="btn btn-info btn-xs" role="button" style="color: white" href="{{route('section.show', encrypt($section->id))}}">
                  Detalhes
               </a>
            </td>
            <td align="center">
               <a  role="button" class="btn btn-danger btn-xs" data-toggle="modal" href="#deleteModal" data-action="tipo/{{encrypt($section->id)}}">Excluir</a>
            </td>
         </tr>
      @endforeach
   </tbody>

</table>

@include('section.admin.delete_modal')
