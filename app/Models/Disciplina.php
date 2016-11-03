<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
   protected $table = 'disciplinas';

   protected $fillable = [
      'cod_disciplina',
      'disciplina'
   ];

   /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
   protected $hidden = [

   ];

   public function turmas(){
      return $this->hasMany('App\Models\Turma');
   }

   public function departamento(){
      return $this->belongsToMany('App\Models\Departamento');
   }
}
