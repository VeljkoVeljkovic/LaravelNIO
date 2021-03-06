<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <title>{{ config('app.name', 'Recenzenti') }}</title>
    <meta charset="utf-8">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="css/app.css">--}}
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
</head>
<body>
@include('inc.header')
{{--@if(count($errors)>0)--}}
{{--@foreach($errors->all() as $error)--}}
{{--<div class="alert alert-danger">--}}
{{--<p>{{$error}}</p>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endif--}}
<div class="container">
    @yield('content')


 </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>

    function prikazi(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pozivi/"+id, true);
        xhttp.send();

    }


    function dodajPitanje() {
        var idPoziv=document.getElementById("idPoziv").value;
        var pitanje = document.getElementById("pitanje").value;




        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {

                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("POST", "pitanjapoziv", true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("idPoziv="+idPoziv+"&pitanje="+pitanje);


    }

    function obrisi(idpitanja) {
        if (confirm("Da li ste sigurni da zelite da obrisete pitanje"))
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                {

                    document.getElementById("projekat").innerHTML = this.responseText;
                }
            };
            var csrfToken = "{{ csrf_token() }}";
            xhttp.open("DELETE", "pitanjapoziv/"+idpitanja, true);
            xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("idpitanja="+idpitanja);
        }

    }


    function obrisiProjekat(id) {
        if (confirm("Da li ste sigurni da zelite da obrisete projekat")) {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    //       document.getElementById("projekat").innerHTML = this.responseText;
                }
            };


            var csrfToken = "{{ csrf_token('') }}";

            xhttp.open("POST", "projekti", true);
            xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id="+id);

        }
    }

    function promeniProjekat(id)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {

                // document.getElementById("projekat").innerHTML = this.responseText;
            }
        };


        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("POST", "dodaj", true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("idPoziv="+idPoziv+"&pitanje="+pitanje);
    }

    function pretraga(){



        var oblastProjekta=document.getElementById("oblastProjekta").value;
        var naziv=document.getElementById("naziv").value;



        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("pretraga").innerHTML = "";
                document.getElementById("pretraga").innerHTML = this.responseText;
            }
        };
        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("POST", "/projekatpretraga", true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if(oblastProjekta==null){
            xhttp.send("naziv="+naziv);}
        else if(naziv==null){
            xhttp.send("oblastProjekta="+oblastProjekta, true); }
        else {
            xhttp.send("naziv="+naziv+"&oblastProjekta="+oblastProjekta, true);}

    }

    function prikaziProjekat(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "projekat/"+id, true);
        xhttp.send();

    }
    function izmeniProjekat(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                //   document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "projekat/"+id+"/edit", true);
        xhttp.send();

    }

    function prikaziRecenzenta(id) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "recenzentadmin/"+id, true);
        xhttp.send();

    }



    function dodela_projekta() {

        var idRecenzent=document.getElementById("idRecenzent").value;
        var idProjekat = document.getElementById("idProjekat").value;
        var rokZaIzvestaj = document.getElementById("rokZaIzvestaj").value;


        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {

                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("POST", "recenzentadmin", true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("idRecenzent="+idRecenzent+"&idProjekat="+idProjekat+"&rokZaIzvestaj="+rokZaIzvestaj);


    }

    function statusPrijave() {

        var idRecenzent=document.getElementById("idRecenzent").value;
        var status = document.getElementById("status").value;

        alert(status);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {

                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("PUT", "recenzentadmin/"+idRecenzent, true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("idRecenzent="+idRecenzent+"&status="+status);


    }

    function prikaziMojProjekat(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ocenjivanjeprojekta/"+id, true);
        xhttp.send();

    }

    function dodavanje_ocene(id) {

        var ocena=document.getElementById("ocena"+id).value;
        var ocenaProjekta = document.getElementById("ocenaProjekta"+id).value;
        var projekatRadi = document.getElementById("projekatRadi"+id).value;
        var idProjekat = document.getElementById("idProjekat"+id).value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {

                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("POST", "ocenjivanjeprojekta", true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id+"&ocena="+ocena+"&ocenaProjekta="+ocenaProjekta+"&projekatRadi="+projekatRadi+"&idProjekat="+idProjekat);
     }



     function izmena_ocene(id) {

         var ocena=document.getElementById("ocena"+id).value;
         var ocenaProjekta = document.getElementById("ocenaProjekta"+id).value;
         var idProjekat = document.getElementById("idProjekat"+id).value;
         var idOcene = document.getElementById("idOcene"+id).value;

         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200)
             {

                 document.getElementById("projekat").innerHTML = this.responseText;
             }
         };
         var csrfToken = "{{ csrf_token() }}";
         xhttp.open("PUT", "ocenjivanjeprojekta/"+idOcene, true);
         xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("id="+id+"&ocena="+ocena+"&ocenaProjekta="+ocenaProjekta+"&idProjekat="+idProjekat);
      }

    function obrisi_ocenu(id) {
       var idProjekat = document.getElementById("idProjekat"+id).value;
       var idOcene = document.getElementById("idOcene"+id).value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {

                document.getElementById("projekat").innerHTML = this.responseText;
            }
        };
        var csrfToken = "{{ csrf_token() }}";
        xhttp.open("DELETE", "ocenjivanjeprojekta/"+idOcene, true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("idProjekat="+idProjekat);
     }

     function zakljucaj_ocenu(id) {

         var zakljucavanje=document.getElementById("zakljucavanje"+id).value;
         var idProjekat = document.getElementById("idProjekat"+id).value;
         var idOcene = document.getElementById("idOcene"+id).value;

         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200)
             {

                 document.getElementById("projekat").innerHTML = this.responseText;
             }
         };
         var csrfToken = "{{ csrf_token() }}";
         xhttp.open("PUT", "ocenjivanjeprojekta/"+idOcene, true);
         xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("zakljucavanje="+zakljucavanje+"&idProjekat="+idProjekat);
      }

      function predaj_izvestaj(id) {

          var projekatRadi=document.getElementById("projekatRadi").value;
          var kraj=document.getElementById("kraj").value;

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200)
              {

            //      document.getElementById("projekat").innerHTML = this.responseText;
              }
          };
          var csrfToken = "{{ csrf_token() }}";
          xhttp.open("PUT", "ocenjivanjeprojekta/"+id, true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("projekatRadi="+projekatRadi+"&kraj="+kraj);
       }


       function prikazi_anketu(id) {
           var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200)
               {

                   document.getElementById("projekat").innerHTML = this.responseText;
               }
           };
           xhttp.open("GET", "adminanketa/"+id, true);
           xhttp.send();

       }

       function dodaj_slobodno_pitanje(id) {

           var pitanjeS=document.getElementById("pitanjeS").value;
          if(pitanjeS==""){
            alert("Potrebno je uneti slobodno pitanje");
          } else{
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("pitanjeS").innerHTML = "";
                    document.getElementById("projekat").innerHTML = this.responseText;
                }
            };
            var csrfToken = "{{ csrf_token() }}";
            xhttp.open("POST", "adminanketa", true);
            xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id="+id+"&pitanjeS="+pitanjeS);
          }



        }

        function dodaj_pitanje(id) {

            var pitanje=document.getElementById("pitanje").value;
            var odgovor1=document.getElementById("Odgovor1").value;
            var odgovor2=document.getElementById("Odgovor2").value;
            var odgovor3=document.getElementById("Odgovor3").value;
            var odgovor4=document.getElementById("Odgovor4").value;
            if(pitanje==""||odgovor1==""||odgovor2==""||odgovor3==""||odgovor4==""){
              alert("Potrebno je popuniti pitanje i sva četiri odgovora.");
            } else{

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("pitanje").innerHTML = "";
                    document.getElementById("Odgovor1").innerHTML = "";
                    document.getElementById("Odgovor2").innerHTML = "";
                    document.getElementById("Odgovor3").innerHTML = "";
                    document.getElementById("Odgovor4").innerHTML = "";
                    document.getElementById("projekat").innerHTML = this.responseText;
                }
            };
            var csrfToken = "{{ csrf_token() }}";
            xhttp.open("POST", "adminanketa", true);
            xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id="+id+"&pitanje="+pitanje+"&odgovor1="+odgovor1+"&odgovor2="+odgovor2+"&odgovor3="+odgovor3+"&odgovor4="+odgovor4);
         }
      }


      function obrisi_pitanje_ankete(idPitanje, idAnketa) {
         // var idProjekat = document.getElementById("idProjekat"+id).value;
         // var idOcene = document.getElementById("idOcene"+id).value;

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200)
              {

                  document.getElementById("projekat").innerHTML = this.responseText;
              }
          };
          var csrfToken = "{{ csrf_token() }}";
          xhttp.open("DELETE", "adminanketa/"+idPitanje, true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("idPitanje="+idPitanje+"&idAnketa="+idAnketa);
       }

       function zakljucavanjeAnkete(id) {



           var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200)
               {

                 document.getElementById("projekat").innerHTML = this.responseText;
                 alert("Anketa je zakljucana");
               }
           };
           var csrfToken = "{{ csrf_token() }}";
           xhttp.open("PUT", "adminanketa/"+id, true);
           xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
           xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xhttp.send();
        }

        function dodela_ankete(id) {

            var recenzent=document.getElementById("recenzent").value;
           if(recenzent=="Selektovati recenzenta"){
             alert("Potrebno je selektovati recenzenta");
           } else{

             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200)
                 {

                     document.getElementById("projekat").innerHTML = this.responseText;
                     alert("Anketa je uspešno dodeljena");
                 }
             };
             var csrfToken = "{{ csrf_token() }}";
             xhttp.open("POST", "adminanketa", true);
             xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             xhttp.send("id="+id+"&recenzent="+recenzent);
           }
         }

         function prikazi_anketu_recenzent(id) {
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200)
                 {

                     document.getElementById("projekat").innerHTML = this.responseText;
                 }
             };
             xhttp.open("GET", "recenzentanketa/"+id, true);
             xhttp.send();

         }

</script>

@include('inc.footer')
