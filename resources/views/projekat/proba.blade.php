
</div>
</div>

<div class="row ">
    <div class="offset-1 col-5 mt-3">

        <h5>Angazovanje recenzenta:</h5>
        $if(count($angazovanje)>0)
        @foreach($angazovanje as $a)

            <p>Naziv projekta: {{$a->nazivProjekta}}</p>
            <p>Rok za izveštaj: {{$a->rokZaIzvestaj}}</p>

        @endforeach
        @endif
    </div>
</div>
<div class="row mb-3">
    <h5>Dodela projekta: </h5>


    <select id="idProjekat">
        <option value="Izaberi projekta" selected></option>
        @if(count()>0)
            @foreach($projekti as $p)

                <option value="{{$p->idProjekat}}">{{$p->nazivProjekta}}</option>
            @endforeach
        @endif
    </select>

    <input type="date" id="rokZaIzvestaj" />
    <input type="hidden" name="idKorisnik" id ="idKorisnik" value="{{$recenzent->idRecenzent??""}}" />




    <button type="submit" class='btn mt-2' onclick='dodela_projekta()'>Dodaj</button>


</div>

<div class="row">


    @if($recenzent->statusPrijave!='registrovan')
        <h4>Status prijave: </h4>&nbsp;&nbsp;
        <input type="text"  value="{{$recenzent->statusPrijave}}" disabled />
        <select id="status">
            <option>razmatra_se</option>
            <option>registrovan</option>
        </select>&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="idKorisnik" id ="idRecenzent" value="{{$recenzent->idRecenzent}}" />
        <button class='btn' onclick='statusPrijave()'>Promeni</button>

    @endif
</div>





