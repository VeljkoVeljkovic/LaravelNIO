<div class="row">
    <div id="proj"></div>
    <div class="offset-1 col-sm-5 col-11">
        <table class="table table-hover link1" style="margin-top:2px;">


            <tr>
                <td>Naziv projekta:</td>
                <td>{{$projekat->nazivProjekta}}</td>
            </tr>
            <tr>
                <td>Rukovodioc projekta:</td>
                <td>{{$projekat->rukovodiocProjekta}}</td>
            </tr>
            <tr>
                <td>Oblast projekta:</td>
                <td>{{$projekat->oblastProjekta}}</td>
            </tr>
            <tr>
                <td>Datum podnošenja</td>
                <td>{{$projekat->datumPodnosenja}}</td>
            </tr>

        </table>
    </div>
    <div class="offset-1 col-sm-5 col-11">
        <div>

              @if(isset($projekat))
                 <?php   $nazivDirektorijuma=$projekat->nazivProjekta;
               //   backshlesh
                $dirname = public_path('\uploads\\'.$nazivDirektorijuma);
                // Pojavljivale su se  .  i .. ispred svakog naziva fajla zato treba da se izbace
                $images = array_diff(scandir($dirname), array(".", ".."));
                ?>

                @foreach ($images as $slika)
                    @if(!empty($dirname))

                        <a  target="_blank" href="{{$dirname.'\\'.$slika}}">{{$slika}}</a>&nbsp;&nbsp;&nbsp;
                    @endif
                @endforeach
              @endif


        </div>
        <br>
        <br>
        <div>
            <form method="POST" action="{{ route('projekat.destroy', $projekat->idProjekat) }}">
        @csrf

            {{ method_field('delete') }}
            <button type="submit" class="btn dugme">Obrisi projekat</button>

            </form>
        </div>
        <br>
        <div>

            <a class="btn dugme" href="projekat/{{$projekat->idProjekat}}/edit">Promeni podatke</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="offset-1 col-5">
        <table class="table table-hover" style="margin-top:2px;">
            <tr><td><h5>Recezenti projekta:</h5></td></tr>
          @if(count($recenzenti)>0)
            @foreach($recenzenti as $r)
               @if($r!=null)
            <tr><td ><a href="">{{$r->ime." ".$r->prezime}}</a></td></tr>
               @endif
            @endforeach
            @endif
        </table>
    </div>
</div>
<div class="row">
  @if(isset($pitanja))
    @foreach($pitanja as $p)

        <div class="row">
            <div class="col-4">
                <textarea class="form-control" disabled>{{$p->pitanje}}</textarea>
        </div>


        <div class="8">
         @if(isset($ocena))
            @foreach($ocena as $o)

               @if($o->pitanjaPoziv_idPitanja==$p->idPitanja)


                <div class="row" >
                    <div class="col-4">
                        <textarea class="form-control" id="ocenaKomentar" disabled >{{$o->komentarOcene??""}}</textarea>
                    </div>
                    <div class="col-2">

                        <textarea class="form-control" id="ocena" disabled >{{$o->ocenaProjekta??""}}</textarea>

                    </div>
                    <div class="col-4">

                        {{$o->ime??""." ".$o->prezime??""}}

                    </div>

                </div>


                <br><br>


                   @elseif($o->pitanjaPoziv_idPitanja==$p->idPitanja)
                       <br><br>
                   @endif

            @endforeach
          @endif

        </div><br><br>
    </div>

@endforeach
    @endif
    <script>
    </script>
</div>
