@extends('basic')
@section('content')


<div class="row">
    <div class="offset-1  col-sm-2 col-11">
      @foreach($ankete as $anketa)
        @if($anketastatus!='popunjena')
          <div class="row card card-body mb-2" onclick="prikazi_anketu_recenzent({{$anketa->idAnketa}})">
              <div>
                  <p>{{$anketa->naziv}}</p>
              </div>
             </div>
         @endif
       @endforeach
    </div>

    <div class="col-sm-8 col-12 proba" style="margin-right: 5px;">
        <!-- @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif -->
        @if (session('status'))
            <script>
            alert("{{session('status')}}");
            </script>

        @endif
         <div id="projekat">

         </div>
     </div>
 </div>


@endsection
