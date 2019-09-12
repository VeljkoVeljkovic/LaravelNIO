@foreach($sviProjekti as $s)
    <div class="row card">
        <div>
            {{--<p><a class="link1" href="#" onclick="prikaziProjekat({{$s->idProjekat}}, {{$s->idPoziv}})">{{$s->nazivProjekta}} </a></p>--}}
            <p class="link1">{{$s->rukovodiocProjekta}}</p>
            <p class="link1">{{$s->oblastProjekta}}</p>
        </div>
    </div>
@endforeach