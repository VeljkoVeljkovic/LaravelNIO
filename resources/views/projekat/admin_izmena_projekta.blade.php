@extends('basic')

@section('content')
    <div class="container">
           <span class="" role="alert">
              <strong>{{ $uspeh??"" }}</strong>
           </span>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="POST" enctype="multipart/form-data"  action="{{ route('projekat.update', $projekat->idProjekat) }}">
                    @csrf
                    {{ method_field('patch') }}

                    <div class="form-group row">
                        <label for="nazivProjekta" class="col-md-4 col-form-label text-md-right">{{ __('Naziv Projekta') }}</label>

                        <div class="col-md-6">
                            <input id="nazivProjekta" type="text"  class="form-control @error('nazivProjekta') is-invalid @enderror" name="nazivProjekta" value="{{ $projekat->nazivProjekta }}" required autocomplete="nazivProjekta" autofocus>

                            @error('nazivProjekta')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rukovodiocProjekta" class="col-md-4 col-form-label text-md-right">{{ __('Rukovodioc Projekta') }}</label>

                        <div class="col-md-6">
                            <input id="rukovodiocProjekta" type="text"  class="form-control @error('rukovodiocProjekta') is-invalid @enderror" name="rukovodiocProjekta" value="{{ $projekat->rukovodiocProjekta }}" required autocomplete="rukovodiocProjekta" autofocus>

                            @error('rukovodiocProjekta')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="NIORukovodioca" class="col-md-4 col-form-label text-md-right">{{ __('NIO Rukovodioca') }}</label>

                        <div class="col-md-6">
                            <input id="NIORukovodioca" type="text" class="form-control @error('NIORukovodioca') is-invalid @enderror" name="NIORukovodioca" value="{{ $projekat->NIOrukovodioc }}" required autocomplete="NIORukovodioca" autofocus>

                            @error('NIORukovodioca')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="zvanjeRukovodioca" class="col-md-4 col-form-label text-md-right">{{ __('Zvanje Rukovodioca') }}</label>

                        <div class="col-md-6">
                            <input id="zvanjeRukovodioca" type="text" class="form-control @error('zvanjeRukovodioca') is-invalid @enderror" name="zvanjeRukovodioca" value="{{ $projekat->zvanjeRukovodioca }}" required autocomplete="zvanjeRukovodioca" autofocus>

                            @error('zvanjeRukovodioca')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="angazovanjeRukovodioca" class="col-md-4 col-form-label text-md-right">{{ __('Angazovanje Rukovodioca') }}</label>

                        <div class="col-md-6">
                            <input id="angazovanjeRukovodioca" type="text" class="form-control @error('angazovanjeRukovodioca') is-invalid @enderror" name="angazovanjeRukovodioca" value="{{ $projekat->angazovanjeRukovodioca }}" required autocomplete="angazovanjeRukovodioca" autofocus>

                            @error('angazovanjeRukovodioca')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="oblastProjekta" class="col-md-4 col-form-label text-md-right">{{ __('Oblast Projekta') }}</label>

                        <div class="col-md-6">
                            <input id="oblastProjekta" type="text" class="form-control @error('oblastProjekta') is-invalid @enderror" name="oblastProjekta" value="{{ $projekat->oblastProjekta }}" required autocomplete="oblastProjekta" autofocus>

                            @error('oblastProjekta')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="odlukaProjekta" class="col-md-4 col-form-label text-md-right">{{ __('Odluka Projekta') }}</label>

                        <div class="col-md-6">
                            <input id="odlukaProjekta" type="text" class="form-control @error('odlukaProjekta') is-invalid @enderror" name="odlukaProjekta" value="{{ $projekat->odlukaProjekta }}" required autocomplete="odlukaProjekta" autofocus>

                            @error('odlukaProjekta')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idPoziva" class="col-md-4 col-form-label text-md-right">{{ __('Poziv') }}</label>
                        <div class="col-md-6">
                            <select name="idPoziva"  class="btn btn-sm mr-5" )>
                                <option value="{{ $pozivSelected->idPoziv }}" selected>{{ $pozivSelected->naziv }}</option>
                                @foreach($sviPozivi as $s)
                                    <option value="{{$s->idPoziv}}">{{$s->naziv}}</option>
                                @endforeach
                            </select>
                            @error('idPoziva')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dokument" class="col-md-4 col-form-label text-md-right">{{ __('Izmena dokumentacije') }}</label>
                        <div class="col-md-6 " name="dokument">
                            <input type="file"  id="dokument" name="dokument" >
                            @error('dokument')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>





                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Promeni') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
