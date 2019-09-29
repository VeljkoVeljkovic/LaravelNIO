@extends('basic')
@section('content')
<div class="row">
  <div class="col-4 offset-4 mt-5">
     {{ Form::open(array('url' => 'pozivi')) }}
      <div class="form-group">
           {{Form::label('naziv', 'Poziv')}}
           {{Form::text('naziv', '', ['class' => 'form-control', 'placeholder'=>'Unesite poziv'])}}
      </div>
      <div class="">
          {{Form::submit('Dodaj',['class' => 'btn dugme'] )}}
      </div>
    {{ Form::close() }}
  </div>
</div>
<div class="row">
    <div class="offset-1  col-sm-2 col-11">
      @foreach($pozivi as $poziv)
        <div class="row card card-body mb-2" onclick="prikazi({{$poziv->idPoziv}})">
            <div>
                <p>{{$poziv->naziv}}</p>
            </div>
           </div>
    @endforeach
    </div>

    <div class="col-sm-8 col-12" style="margin-right: 5px;">
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
