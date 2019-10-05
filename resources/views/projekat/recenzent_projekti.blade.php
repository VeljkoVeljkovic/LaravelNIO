@extends('basic')
@section('content')
    <div class="row">

        <div class="col-sm-3 col-12">

            @foreach($mojProjekat as $m)
                <div class="row card card-body mb-2 ml-1" onclick="prikaziMojProjekat({{$m->idProjekat}})">
                    <div>
                        <p>{{$m->nazivProjekta}}</p>
                        <p class="link1">{{$m->rukovodiocProjekta}}</p>
                        <p class="link1">{{$m->oblastProjekta}}</p>
                    </div>
                </div>
            @endforeach


        </div>
        @if (session('status'))
            <script>
            alert("{{session('status')}}");
            </script>

        @endif

        <div class="col-sm-9 col-12">

            <div id="projekat">

            </div>
        </div>
    </div>

@endsection
