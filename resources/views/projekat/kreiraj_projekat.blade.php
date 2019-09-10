@extends('layouts/app')
@section('content')

    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
       <div class="row">
        <div class=" offset -1 col-sm-5 col-12 ml-2">
                <div class="row">
                    <h1>Kreiraj projekat</h1>
                </div>
                <div class="form-group row">
                    <label for="nazivProjekta" class="col-md-4 col-form-label">Naziv Projekta</label>

                    <input id="nazivProjekta"
                           type="text"
                           class="form-control{{ $errors->has('nazivProjekta') ? ' is-invalid' : '' }}"
                           name="nazivProjekta"
                           value="{{ old('nazivProjekta') }}"
                           autocomplete="nazivProjekta" autofocus>

                    @if ($errors->has('nazivProjekta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nazivProjekta') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="rukovodiocProjekta" class="col-md-4 col-form-label">Rukovodioc projekta</label>

                    <input id="rukovodiocProjekta"
                           type="text"
                           class="form-control{{ $errors->has('rukovodiocProjekta') ? ' is-invalid' : '' }}"
                           name="rukovodiocProjekta"
                           value="{{ old('rukovodiocProjekta') }}"
                           autocomplete="rukovodiocProjekta" autofocus>

                    @if ($errors->has('rukovodiocProjekta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('rukovodiocProjekta') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="NIORukovodioca" class="col-md-4 col-form-label">NIO Rukovodioca</label>

                    <input id="NIORukovodioca"
                           type="text"
                           class="form-control{{ $errors->has('NIORukovodioca') ? ' is-invalid' : '' }}"
                           name="NIORukovodioca"
                           value="{{ old('NIORukovodioca') }}"
                           autocomplete="NIORukovodioca" autofocus>

                    @if ($errors->has('NIORukovodioca'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('NIORukovodioca') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="zvanjeRukovodioca" class="col-md-4 col-form-label">Zvanje Rukovodioca</label>

                    <input id="zvanjeRukovodioca"
                           type="text"
                           class="form-control{{ $errors->has('zvanjeRukovodioca') ? ' is-invalid' : '' }}"
                           name="zvanjeRukovodioca"
                           value="{{ old('zvanjeRukovodioca') }}"
                           autocomplete="zvanjeRukovodioca" autofocus>

                    @if ($errors->has('zvanjeRukovodioca'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zvanjeRukovodioca') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="angazovanjeRukovodioca" class="col-md-4 col-form-label">Angazovanje Rukovodioca</label>

                    <input id="angazovanjeRukovodioca"
                           type="text"
                           class="form-control{{ $errors->has('angazovanjeRukovodioca') ? ' is-invalid' : '' }}"
                           name="angazovanjeRukovodioca"
                           value="{{ old('angazovanjeRukovodioca') }}"
                           autocomplete="angazovanjeRukovodioca" autofocus>

                    @if ($errors->has('angazovanjeRukovodioca'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('angazovanjeRukovodioca') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="oblastProjekta" class="col-md-4 col-form-label">Oblast projekta</label>

                    <input id="oblastProjekta"
                           type="text"
                           class="form-control{{ $errors->has('oblastProjekta') ? ' is-invalid' : '' }}"
                           name="oblastProjekta"
                           value="{{ old('oblastProjekta') }}"
                           autocomplete="oblastProjekta" autofocus>

                    @if ($errors->has('oblastProjekta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('oblastProjekta') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="odlukaProjekta" class="col-md-4 col-form-label">Odluka Projekta</label>

                    <input id="odlukaProjekta"
                           type="text"
                           class="form-control{{ $errors->has('odlukaProjekta') ? ' is-invalid' : '' }}"
                           name="odlukaProjekta"
                           value="{{ old('odlukaProjekta') }}"
                           autocomplete="odlukaProjekta" autofocus>

                    @if ($errors->has('odlukaProjekta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('odlukaProjekta') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <select name="idPoziva" class="btn dugme" )>
                        @foreach($pozivi as $p)
                        <option value="{{$p->idPoziv}}">{{$p->naziv}}</option>
                       @endforeach
                    </select>
                </div>
        </div>


           <div class=" offset -1 col-sm-5 col-12 ml-5 mt-5 justify-content-center">
                   <h4>Dodavanje Projektne dokumentacije:</h4>

                    <input type="file" class="form-control-file" id="dokument" name="dokument" >

                    @if ($errors->has('dokument'))
                        <strong>{{ $errors->first('dokument') }}</strong>
                    @endif


                <div class="row pt-4">
                    <button class="btn btn-primary">Kreiraj</button>
                </div>
        </div>
        </div>
    </form>




@endsection