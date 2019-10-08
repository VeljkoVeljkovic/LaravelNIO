@extends('basic')
@section('content')
  <div id="projekat" class="mt-5">
  </div>
  <div class="row">
     <div class="offset-2 col-8 offset-2  mt-5">
         <input type="text" id="naslov" class="form-control" placeholder="Uneti naslov obaveštenja" />
     </div>
     <div class="offset-2 col-8 offset-2  mt-5">
         <textarea id="obavestenje" class="form-control" placeholder="Uneti tekst obaveštenja"></textarea>
     </div>
  </div>
  <br><hr><br>
   <div class="row justify-content-center">
      <div class="col-sm-4 col-12 mt-5 ">
        <select name="sviRecenzenti" id="sviRecenzenti" class="btn btn-sm r" )>
           <option value="" selected>Svi Recenzenti</option>
        @foreach($sviRecenzenti as $s)
           <option value="{{$s->idRecenzent}}">{{$s->ime}} {{$s->prezime}}</option>
        @endforeach
        </select>
      </div>
      <div class="col-sm-4 col-12 mt-5">
         <select name="oblastStrucnost" id="oblastStrucnost" class="btn btn-sm" )>
          <option value="" selected>Oblasti strucnosti</option>
        @foreach($sveOblasti as $o)
          <option value="{{$o->id}}">{{$o->naziv}}</option>
        @endforeach
      </select>
     </div>
   </div>
   <br><hr><br>
   <div class="row justify-content-center">
     <div class="col-sm-4 col-12 mt-5">
         <button class="btn btn-block ml-2 submit" onclick='obavestenje_mail()'>Posalji mejl</button>
     </div>
     <div class="col-sm-4 col-12 mt-5">
         <button class="btn btn-block ml-2 submit" onclick='obavestenje_inbox()'>Posalji u inbox</button>
     </div>
   </div>
  <script>
      function obavestenje_mail() {
          var naslov=document.getElementById("naslov").value;
          var obavestenje=document.getElementById("obavestenje").value;
          var sviRecenzenti = document.getElementById("sviRecenzenti").value;
          var oblastStrucnost = document.getElementById("oblastStrucnost").value;



          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200)
              {
                  document.getElementById("obavestenje").value="";
                  document.getElementById("projekat").innerHTML = this.responseText;

              }
          };
          var csrfToken = "{{ csrf_token() }}";
          xhttp.open("POST", "adminobavestenja", true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("obavestenje="+obavestenje+"&sviRecenzenti="+sviRecenzenti+"&oblastStrucnost="+oblastStrucnost+"&naslov="+naslov);


      }

      function posalji() {
          var naslov=document.getElementById("naslov").value;
          var obavestenje=document.getElementById("obavestenje").value;
          var sviRecenzenti = document.getElementById("sviRecenzenti").value;
          var oblastStrucnost = document.getElementById("oblastStrucnost").value;



          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200)
              {
                  document.getElementById("obavestenje").value="";
                  document.getElementById("projekat").innerHTML = this.responseText;

              }
          };
          var csrfToken = "{{ csrf_token() }}";
          xhttp.open("POST", "adminobavestenja", true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("obavestenje="+obavestenje+"&sviRecenzenti="+sviRecenzenti+"&oblastStrucnost="+oblastStrucnost+"&naslov="+naslov);


      }
  </script>
   @endsection
