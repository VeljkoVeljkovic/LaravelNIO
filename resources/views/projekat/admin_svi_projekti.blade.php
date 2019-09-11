@extends('layouts/app')
@section('content')
    <div class="row">
        <div class="ml-5 mt-5">

            <form action="/projekatpretraga"  method="post">
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
                    <button type="submit" class="btn btn-small" name="pretraga">Pretraga</button>

                </div>
            </form>
        </div>
    </div>
    <div  class="row">

        <div class="offset-1 col-sm-2 col-11" id="pretraga">


            @foreach($sviProjekti as $s)
                <div class="row card">
                    <div>
                        {{--<p><a class="link1" href="#" onclick="prikaziProjekat({{$s->idProjekat}}, {{$s->idPoziv}})">{{$s->nazivProjekta}} </a></p>--}}
                        <p class="link1">{{$s->rukovodiocProjekta}}</p>
                        <p class="link1">{{$s->oblastProjekta}}</p>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="offset-1 col-2" id="rezultat" style="display: none">



        </div>

        <div class="col-sm-8 col-12" style="margin-right: 5px;">
            <div id="projekat">

            </div>
        </div>
    </div>

@endsection