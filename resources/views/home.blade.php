@extends('basic')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class=""></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                    @endif
                            <?php
                            if(Session::get('recenzent')['stanjePrijave'] =="registrovan"){
                                echo "You are logged in!";
                            } else {
                              echo  "Vasa prijava je uzeta u razmatranje, ceka se odobrenje administratora";
                              echo  "<br><hr>";
                              echo  "ps  treba u php admin da se promeni status prijave u registrovan :)";
                            }
                            ?>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
