<div class="form-group">

   <div class="btn-div">
      <a class="remove-question" href=""><span class="glyphicon glyphicon-trash fa-lg"></span></a>
   </div>

   <div class="row">
      <div class="col-md-12">
         <select name="question-{{$count}}[]" id="question-{{$count}}" class="form-control select-question-type" required>
            @foreach ($questionTypes as $questionType)
               @if ($questionType->id == 2)
                  <option selected value="{{$questionType->id}}">{{$questionType->tipo}}</option>
               @else
                  <option value="{{$questionType->id}}">{{$questionType->tipo}}</option>
               @endif
            @endforeach
         </select>
      </div>
   </div>
   
</div>

<div class="form-group">
   <input type="text" class="form-control" id="question-{{$count}}[]" name="question-{{$count}}[]" placeholder="Questão" required>
</div>
