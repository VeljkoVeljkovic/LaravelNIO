<div class="row ml-2">
    <div id="proj"></div>
    <div class="offset-1 col-sm-5 col-11">
        <table class="table table-hover link1" style="margin-top:2px;">


            <tr>
                <td>Ime i prezime:</td>
                <td>{{$recenzent->ime}} {{$recenzent->prezime}}</td>
            </tr>
            <tr>
                <td>NIO:</td>
                <td>{{$recenzent->NIO}}</td>
            </tr>
            <tr>
                <td>Naucno Zvanje:</td>
                <td>{{$recenzent->naucnoZvanje}}</td>
            </tr>
            <tr>
                <td>Angazovanje:</td>
                <td>{{$recenzent->angazovanje}}</td>
            </tr>

        </table>
    </div>
    <div class="offset-1 col-sm-5 col-11">


        <?php   $nazivDirektorijuma=$korIme;
        //   backshlesh
        $dirname = public_path('\recenzenti\\'.$nazivDirektorijuma);
        // Pojavljivale su se  .  i .. ispred svakog naziva fajla zato treba da se izbace
        $images = array_diff(scandir($dirname), array(".", ".."));
        ?>

        @foreach ($images as $slika)
            @if(!empty($dirname))

                <a  target="_blank" href="{{$dirname.'\\'.$slika}}">{{$slika}}</a>
            @endif
        @endforeach

    </div>
</div>
    <div class="row mb-3 ml-2">


            <h5>Angazovanje recenzenta:</h5><br>
            @if(count($angazovanje)>0)
            @foreach($angazovanje as $a)

                Naziv projekta: {{$a->nazivProjekta}}<br>
                Rok za izveštaj: {{$a->pivot->rokZaIzvestaj}}

            @endforeach
            @endif

    </div>
    <div class="row mb-3 ml-2">
        <h5>Dodela projekta: </h5>


        <select id="idProjekat">
            <option value="Izaberi projekta" selected></option>
            @if(count($projekti)>0)
                @foreach($projekti as $p)

                    <option value="{{$p->idProjekat}}">{{$p->nazivProjekta}}</option>
                @endforeach
            @endif
        </select>

        <input type="date" id="rokZaIzvestaj" />
        <input type="hidden" name="idKorisnik" id ="idKorisnik" value="{{$recenzent->idRecenzent??""}}" />&nbsp;&nbsp;&nbsp;




        <button type="submit" class='btn mt-2' onclick='dodela_projekta()'>Dodaj</button>


    </div>

    <div class="row ml-2">


        @if($recenzent->stanjePrijave!='registrovan')
            <h5>Status prijave: </h5>&nbsp;&nbsp;
            <input type="hidden"  value="{{$recenzent->statusPrijave}}" disabled />
            <select id="status">
                <option>razmatra_se</option>
                <option>registrovan</option>
            </select>&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="idKorisnik" id ="idRecenzent" value="{{$recenzent->idRecenzent}}" />
            <button class='btn' onclick='statusPrijave()'>Promeni</button>

        @endif
    </div>
