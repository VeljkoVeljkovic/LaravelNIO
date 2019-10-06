@extends('basic')
@section('content')

<div class="row">
  <div class="offset-3 col-6 offset-3 mt-5">
     {{ Form::open(array('url' => 'adminanketa')) }}
      <div class="form-group">
           <!-- {{Form::label('naziv', 'Naziv')}} -->
           {{Form::text('naziv', '', ['class' => 'form-control', 'placeholder'=>'Unesite naziv Ankete'])}}
      </div>
      <div class="">
          {{Form::submit('Dodaj',['class' => 'btn dugme'] )}}
      </div>
    {{ Form::close() }}
  </div>
</div>
<br><br><hr><br><br>
<div class="row">
    <div class="offset-1  col-sm-2 col-11">
      @foreach($ankete as $anketa)
        <div class="row card card-body mb-2" onclick="prikazi_anketu({{$anketa->idAnketa}})">
            <div>
                <p>{{$anketa->naziv}}</p>
            </div>
           </div>
    @endforeach
    </div>

    <div class="col-sm-8 col-12 proba" style="margin-right: 5px;">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
         <div id="projekat">

         </div>
     </div>
 </div>


@endsection
