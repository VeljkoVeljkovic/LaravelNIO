@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    <form method="POST" enctype="multipart/form-data"  action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ime" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

                            <div class="col-md-6">
                                <input id="ime" type="text" class="form-control @error('ime') is-invalid @enderror" name="ime" value="{{ old('ime') }}" required autocomplete="ime" autofocus>

                                @error('ime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prezime" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>

                            <div class="col-md-6">
                                <input id="prezime" type="text" class="form-control @error('prezime') is-invalid @enderror" name="prezime" value="{{ old('prezime') }}" required autocomplete="prezime" autofocus>

                                @error('prezime')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="korime" class="col-md-4 col-form-label text-md-right">{{ __('Korisnicko ime') }}</label>

                            <div class="col-md-6">
                                <input id="korime" type="text" class="form-control @error('korime') is-invalid @enderror" name="korime" value="{{ old('ime') }}" required autocomplete="korime" autofocus>

                                @error('korime')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nacionalnost" class="col-md-4 col-form-label text-md-right">{{ __('Nacionalnost') }}</label>

                            <div class="col-md-6">
                                <input id="nacionalnost" type="text" class="form-control @error('nacionalnost') is-invalid @enderror" name="nacionalnost" value="{{ old('nacionalnost') }}" required autocomplete="nacionalnost" autofocus>

                                @error('nacionalnost')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zemlja" class="col-md-4 col-form-label text-md-right">{{ __('Zemlja') }}</label>

                            <div class="col-md-6">
                                <input id="zemlja" type="text" class="form-control @error('zemlja') is-invalid @enderror" name="zemlja" value="{{ old('zemlja') }}" required autocomplete="zemlja" autofocus>

                                @error('zemlja')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIO" class="col-md-4 col-form-label text-md-right">{{ __('NIO') }}</label>

                            <div class="col-md-6">
                                <input id="NIO" type="text" class="form-control @error('ime') is-invalid @enderror" name="NIO" value="{{ old('NIO') }}" required autocomplete="NIO" autofocus>

                                @error('NIO')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trenutnaFirma" class="col-md-4 col-form-label text-md-right">{{ __('Trenutna Firma') }}</label>

                            <div class="col-md-6">
                                <input id="trenutnaFirma" type="text" class="form-control @error('trenutnaFirma') is-invalid @enderror" name="trenutnaFirma" value="{{ old('ime') }}" required autocomplete="trenutnaFirma" autofocus>

                                @error('trenutnaFirma')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="naucnoZvanje" class="col-md-4 col-form-label text-md-right">{{ __('Naucno zvanje') }}</label>

                            <div class="col-md-6">
                                <input id="naucnoZvanje" type="text" class="form-control @error('naucnoZvanje') is-invalid @enderror" name="naucnoZvanje" value="{{ old('naucnoZvanje') }}" required autocomplete="naucnoZvanje" autofocus>

                                @error('naucnoZvanje')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="angazovanje" class="col-md-4 col-form-label text-md-right">{{ __('Angazovanje') }}</label>

                            <div class="col-md-6">
                                <input id="angazovanje" type="text" class="form-control @error('angazovanje') is-invalid @enderror" name="angazovanje" value="{{ old('ime') }}" required autocomplete="angazovanje" autofocus>

                                @error('angazovanje')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                           <label for="oblastiStrucnosti" class="col-md-4 col-form-label text-md-right">{{ __('Oblasti Strucnosti') }}</label>
                            <div class="col-md-6">
                            <select name="oblastiStrucnosti"  class="btn btn-sm mr-5" )>
                                <option value="" selected>Oblasti strucnosti</option>
                              @foreach($oblasti as $o)
                                <option value="{{$o->id}}">{{$o->naziv}}</option>
                               @endforeach
                            </select>
                            @error('oblastiStrucnosti')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefon" class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

                            <div class="col-md-6">
                                <input id="telefon" type="text" class="form-control @error('telefon') is-invalid @enderror" name="telefon" value="{{ old('telefon') }}" required autocomplete="telefon" autofocus>

                                @error('telefon')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresa" class="col-md-4 col-form-label text-md-right">{{ __('Adresa') }}</label>

                            <div class="col-md-6">
                                <input id="adresa" type="text" class="form-control @error('adresa') is-invalid @enderror" name="adresa" value="{{ old('adresa') }}" required autocomplete="adresa" autofocus>

                                @error('adresa')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dokument" class="col-md-4 col-form-label text-md-right">{{ __('Dodavanje Projektne dokumentacije') }}</label>
                            <div class="col-md-6">
                            <input type="file"  id="dokument" name="dokument" >
                                @error('dokument')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vebStranica" class="col-md-4 col-form-label text-md-right">{{ __('Veb Stranica') }}</label>

                            <div class="col-md-6">
                                <input id="vebStranica" type="text" class="form-control @error('vebStranica') is-invalid @enderror" name="vebStranica" value="{{ old('telefon') }}" required autocomplete="vebStranica" autofocus>

                                @error('vebStranica')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
