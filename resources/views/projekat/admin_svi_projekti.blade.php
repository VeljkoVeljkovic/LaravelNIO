@extends('basic')
@section('content')
    <div class="row">
        <div class="ml-5 mt-5">

            {{--<form action="/projekatpretraga"  method="post">--}}
                @csrf
                <h4>Pretraga: </h4>
                <div class="form-group">
                    <input name="naziv" id="naziv" type="text" class="" placeholder="Pretraga po nazivu"/>


                    <select  class="" name="oblastProjekta" id="oblastProjekta">
                        <option value="" selected>Oblast projekta</option>
                        @foreach($sviProjekti as $s)
                            <option value="{{$s->oblastProjekta}}">{{$s->oblastProjekta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group rowml-5">
                    <button type="submit" class="btn btn-small" name="pretraga" onclick="pretraga()">Pretraga</button>

                </div>
            {{--</form>--}}
        </div>
    </div>
    <div  class="row">

        <div class="offset-1 col-sm-2 col-11" id="pretraga">


            @foreach($sviProjekti as $s)
                <div class="row card" onclick="prikaziProjekat({{$s->idProjekat}})">
                    <div>
                        <p>{{$s->nazivProjekta}}</p>
                        <p class="link1">{{$s->rukovodiocProjekta}}</p>
                        <p class="link1">{{$s->oblastProjekta}}</p>
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