@extends('basic')
@section('content')

    <div  class="row">

        <div class="offset-1 col-sm-2 col-11" id="recenzenti">

            @if(count($sviRecenzenti)>0)
                @foreach($sviRecenzenti as $s)
                    <div class="row card card-body mb-2" onclick="prikaziRecenzenta({{$s->idRecenzent}})">
                        <div>
                            <p>{{$s->nazivProjekta}}</p>
                            <p class="link1">{{$s->ime}} {{$s->prezime}}</p>
                            <p class="link1">{{$s->naucnoZvanje}}</p>
                        </div>
                    </div>
                @endforeach
            @endif

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
