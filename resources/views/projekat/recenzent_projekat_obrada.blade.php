<div class="row">

    <div class="offset-1 col-md-5 col-11 mt-5">
        <table class="table-hover link1" style="margin-top:2px;">

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
    <div class="offset-1 col-md-5 col-11 mt-5">
        <h5 class="link1">Dokumentacija Projekta:</h5>
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
</div>
<br>
<hr>
<br>
<?php
$zakljucano = 0;
foreach($ocena as $o)
  {
   if($o->statusOcene=='zakljucana')
    {
       $zakljucano++;
    }
  }
  ?>
  <div class="row mt-5">
    @if($zakljucano==count($ocena))
    <form method="POST" enctype="multipart/form-data"  action="{{ route('ocenjivanjeprojekta.update', $projekat->idProjekat) }}">
        @csrf
        {{ method_field('patch') }}
       <div class="col-12 mt-3">
         <input type="hidden" name="projekatRadi" id ="projekatRadi" value="{{$radi->first()->id}}" />
         <input type="hidden" name="kraj" id ="kraj" value="zavrseno_ocenjivanje" />
         @if($radi->first()->stanjePrijave == "zavrseno_ocenjvanje")
         <p>Recenzija projekta je uspešno završena i predat je izveštaj.</p><br><br><hr>
         @else
         <button type="submit"  class="btn dugme btn-block">Predaj izvestaj</button>
         @endif
         <!-- <button class='btn dugme' onclick='predaj_izvestaj({{$projekat->idProjekat}})'>Predaj izvestaj</button> -->
        </div>
      </form>
    @endif
    @foreach($ocena as $o)
      @if(empty($o->idOcene))
         <div class="row form-group mt-5">
            <div class="col-md-4 col-sm-6 col-12 ">
                <textarea cols="200" class="form-control" disabled>{{$o->pitanje}}</textarea>
            </div>
            <div class="col-md-4 col-sm-6 col-12 ">
                 <textarea cols="100" class="form-control" id="ocena{{$o->idPitanja}}"></textarea>
             </div>
             <div class="col-md-2 col-sm-6 col-12 ">
             <select id="ocenaProjekta{{$o->idPitanja}}">
                @for($i=1; $i<=10; $i++)
                 <option value="<?php echo $i ?>"><?php echo $i ?></option>
                @endfor
             </select>
             </div>
             <div class="col-md-4 col-sm-6 col-12 mt-3">
                <input type="hidden" name="idProjekat" id ="idProjekat{{$o->idPitanja}}" value="{{$projekat->idProjekat}}" />
                <input type="hidden" name="projekatRadi" id ="projekatRadi{{$o->idPitanja}}" value="{{$radi->first()->id}}" />
                <button class='btn dugme btn-sm' onclick='dodavanje_ocene({{$o->idPitanja}})'>Unesi</button>
             </div>
         </div>
         <br><br>
       @endif
       @if(!empty($o->idOcene))
       <input type="hidden" name="idProjekat" id ="idProjekat{{$o->idPitanja}}" value="{{$projekat->idProjekat}}" />
       <input type="hidden" name="idProjekat" id ="idOcene{{$o->idPitanja}}" value="{{$o->idOcene}}" />
       <input type="hidden" name="zakljucavanje" id ="zakljucavanje{{$o->idPitanja}}" value="zakljucana" />
          <div class="row form-group mt-5">
             <div class="col-md-4 col-sm-6 col-12 ">
                 <textarea cols="200" class="form-control" disabled>{{$o->pitanje}}</textarea>
             </div>
            <div class="col-md-4 col-sm-6 col-12">
                  <textarea class="form-control" id="ocena{{$o->idPitanja}}"  <?= $o->statusOcene=="zakljucana"?"disabled":""?>>{{$o->komentarOcene}}</textarea>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
            <select id="ocenaProjekta{{$o->idPitanja}}" <?=  $o->statusOcene=="zakljucana"?"disabled":""?>>
                 <option value="{{$o->ocenaProjekta}}" selected>{{$o->ocenaProjekta}}</option>
               @for($i=1; $i<=10; $i++)
                 <option value="<?php echo $i ?>"><?php echo $i ?></option>
               @endfor
            </select>
            </div>
          </div>
          @if($o->statusOcene!='zakljucana')
           <div class="row form-group">
               <div class="col-md-4 col-sm-6 col-12 mt-3">
                   <button class='btn dugme btn-sm' onclick='izmena_ocene({{$o->idPitanja}})'>Izmeni</button>
               </div>
               <div class="col-md-4 col-sm-6 col-12 mt-3">
                   <button class="btn dugme btn-sm" onclick='zakljucaj_ocenu({{$o->idPitanja}})'>Zaključaj</button>
               </div>
               <div class="col-md-4 col-sm-6 col-12 mt-3">
                   <button class="btn dugme btn-sm" onclick='obrisi_ocenu({{$o->idPitanja}})'>Obrisi</button>
               </div>
            </div>
            <br><br>
          @endif
        @endif
      @endforeach
  </div>
