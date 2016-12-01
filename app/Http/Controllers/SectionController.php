<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Turma;
use App\Models\Professor;
use App\Models\Aluno;
use App\Models\Disciplina;

class SectionController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {

      switch (session()->get('role')) {
         case '0':
         $sections = Turma::orderBy('ano', 'desc')->orderBy('semestre', 'desc')->get();
         return  view ('section.admin.index', compact('sections'));
         break;

         case '1':
         $student = Aluno::find(session()->get('id'));
         $sections = $student->turmas()->orderBy('ano', 'desc')->get();
         return view ('section.student.index', compact('sections'));;
         break;

         case '2':
         $professor = Professor::find(session()->get('id'));
         $sectionsGroup = $professor->turmas->groupBy('ano')->transform(function($item, $k) {
            return $item->groupBy('semestre');
         });
         return view ('section.professor.index', compact('sectionsGroup'));
         break;
      }

   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      // Waiting for UFOP DB access to be implemented
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      // Waiting for UFOP DB access to be implemented
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {

      $section = Turma::find(decrypt($id));
      $students = $section->alunos()->orderBy('nome', 'asc')->orderBy('sobrenome', 'asc')->get();

      switch (session()->get('role')) {
         case '0':
         return view('section.show', compact('section', 'students'));
         break;

         case '1':
         return view('section.student.show', compact('section', 'students'));
         break;

         case '2':
         return view('section.professor.show', compact('section', 'students'));;
         break;
      }


   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      Turma::find(decrypt($id))->delete();
      return redirect()->route('questionType.index')->with('successMessage', 'Registro deletado com sucesso.');
   }

   public function import(){
      return view('section.admin.import');
   }

   public function storeFromCsv(Request $request){


      if($request->file('sections-csv')->isValid()){

         $sectionsCsv = (array_map('str_getcsv', file($request->file('sections-csv'))));

         $header = [
            "ANO",
            "SEMESTRE",
            "DISCIPLINA",
            "DESCRICAO",
            "DEPARTAMENTO",
            "TURMA",
            "CARGA HORARIA",
            "AULA TEORICA",
            "AULA PRATICA",
            "VAGAS",
            "RESTO",
            "PROFESSORES",
            "SEGUNDA",
            "TERCA",
            "QUARTA",
            "QUINTA",
            "SEXTA",
            "SABADO",
            "APROVACOES",
            "MATRICULAS",
            "REPROVACOES FALTA",
            "REPROVACOES NOTA",
            "REPROVACOES NOTA FALTA",
            "TRANCAMENTOS",
            "COD PREDIO",
            "PREDIO",
            "RESERVA CURSO",
            "RESERVA HABILITACAO",
            "IDIOMA"
         ];

         if($header == array_shift($sectionsCsv)){
            $professors = Professor::all()->lists('id', 'nome_completo');
            foreach ($sectionsCsv as $sectionCsv){

               $section = [
                  'cod_turma' => $sectionCsv[5],
                  'disciplina' => $sectionCsv[3],
                  'cod_disciplina' => $sectionCsv[2],
                  'professor' => preg_split("/\//", $sectionCsv[11]),
                  'ano' => $sectionCsv[0],
                  'semestre' => $sectionCsv[1]
               ];

               $courseId = Disciplina::where('cod_disciplina', $section['cod_disciplina'])->first()->id;

               $newSection = Turma::where('ano', $section['ano'])
               ->where('semestre', $section['semestre'])
               ->where('cod_turma', $section['cod_turma'])
               ->where('disciplina_id', $courseId)->first();

               if(!isset($newSection)){
                  $newSection = new Turma([
                     'ano' => $section['ano'],
                     'semestre' => $section['semestre'],
                     'disciplina_id' => $courseId,
                     'cod_turma' => $section['cod_turma']
                  ]);
                  $newSection->save();
                  foreach ($section['professor'] as $key => $professor){
                     $professor = ltrim($professor);
                     $section['professor'][$key] = strtok($professor, '(');
                  }
                  foreach ($section['professor'] as $professor){
                     $professorId = $professors->get($professor);
                     $newSection->professores()->attach($professorId);
                  }
               }
            }
            return redirect()->route('section.index')->with('successMessage', 'Importação realizada com sucesso');
         }else{
            return redirect()->back()->with('errorMessage', 'Arquivo inválido');
         }
      }else{
         return redirect()->back()->with('errorMessage', 'Erro ao importar CSV');
      }
   }

}