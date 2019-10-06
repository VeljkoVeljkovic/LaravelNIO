@if($anketa->status!='zakljucana')
<div class="row justify-content-center proba card card-body ml-1">
    <div class="col-md-8">
        <h2>Kreiranje Ankete:</h2><br><hr><br>
          <div class="row">
            <div class="form-group row">
                <div class="col-md-6">
                    <textarea id="pitanjeS" cols="50" rows="4" placeholder="Slobodno pitanje"  class="form-control @error('pitanjeS') is-invalid @enderror" name="pitanjeS" value="{{ old('pitanjeS') }}"
                     required autocomplete="pitanjeS" autofocus></textarea>

                    @error('pitanjeS')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-12">
                     <button class='btn dugme btn-block' onclick='dodaj_slobodno_pitanje({{$anketa->idAnketa}})'>Dodaj slobodno pitanje</button>

                </div>
            </div>
         </div>
         <br><hr><br>
         <div class="row mt-3">
           <div class="form-group row">
               <div class="col-md-6 col-12">
                   <textarea id="pitanje" cols="50" rows="4" placeholder="Unesi pitanje"  class="form-control @error('pitanje') is-invalid @enderror"
                    name="pitanje" value="{{ old('pitanje') }}"
                    required autocomplete="pitanje" autofocus></textarea>

                   @error('pitanje')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
               </div>
               <div class="col-md-6 col-12">
                 <input id="Odgovor1" type="text" class="form-control @error('Odgovor1') is-invalid @enderror" placeholder="Odgovor1" name="Odgovor1" value="{{ old('Odgovor1') }}"
                  required autocomplete="Odgovor1" autofocus>

                 @error('Odgovor1')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                 <input id="Odgovor2" type="text" class="mt-1 form-control @error('Odgovor2') is-invalid @enderror" placeholder="Odgovor2" name="Odgovor2" value="{{ old('Odgovor2') }}"
                  required autocomplete="Odgovor2" autofocus>

                 @error('Odgovor2')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                 <input id="Odgovor3" type="text" class="mt-1 form-control @error('Odgovor3') is-invalid @enderror" placeholder="Odgovor3" name="Odgovor3" value="{{ old('Odgovor3') }}"
                  required autocomplete="Odgovor3" autofocus>

                 @error('Odgovor3')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                 <input id="Odgovor4" type="text" class=" mt-1 form-control @error('Odgovor4') is-invalid @enderror" placeholder="Odgovor4" name="Odgovor4" value="{{ old('Odgovor4') }}"
                  required autocomplete="Odgovor4" autofocus>

                 @error('Odgovor4')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
               </div>
           </div>
           <div class="form-group row mb-0">
               <div class="col-12">
                    <button class='btn dugme btn-block' onclick='dodaj_pitanje({{$anketa->idAnketa}})'>Dodaj  pitanje</button>

               </div>
           </div>

           <div class="form-group row mb-0 mt-2">
               <div class="col-12">
                <button class='btn dugme btn-block' onclick='zakljucavanjeAnkete({{$anketa->idAnketa}})'>Završi izradu ankete</button>
           </div>
         </div>
        @endif
        </div>

        <br><hr><br>
        <div <div class="row">
          <table class="table table-responsive">
          @foreach($anketaPitanja as $a)
             @if(empty($a->odgovor1))
                 <tr>
                    <td>
                       <textarea class="form-control" disabled>{{$a->pitanje}}</textarea>
                    </td>
                    <td colspan="2" class="text-right">
                      @if($anketa->status!='zakljucana')
                        <button class="btn dugme" onclick='obrisi_pitanje_ankete({{$a->idPitanja}},{{$anketa->idAnketa}})' >Obrisi</button>
                      @endif
                    </td>
                 </tr>
                @else
                   <tr>
                     <td>
                       <textarea class="form-control" disabled>{{$a->pitanje}}</textarea><br>
                     </td>
                     <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" disabled>{{$a->odgovor1}}
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" disabled>{{$a->odgovor2}}
                          </label>
                        </div>
                        <div class="form-check disabled">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" disabled>{{$a->odgovor3}}
                          </label>
                        </div>
                        <div class="form-check disabled">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" disabled>{{$a->odgovor4}}
                          </label>
                        </div>
                    </td>
                   <td>
                     @if($anketa->status!='zakljucana')
                       <button class="btn dugme" onclick='obrisi_pitanje_ankete({{$a->idPitanja}},{{$anketa->idAnketa}})'>Obrisi</button>
                     @endif
                   </td>
                </tr>
            @endif
        @endforeach
          </table>
          @if($anketa->status=='zakljucana')
          <div class="form-group row mb-0 mt-2">
              <div class="col-12">

             <select id="recenzent" class="form-control">
                  <option selected>Selektovati recenzenta</option>
               @foreach($recenzenti as $recenzent)
                   <option value="{{$recenzent->idRecenzent}}">{{$recenzent->ime}} {{$recenzent->prezime}}</option>
               @endforeach
            </select>&nbsp;&nbsp;&nbsp;

                <button class='btn dugme btn-block' onclick='dodela_ankete({{$anketa->idAnketa}})'>Dodela Ankete</button>
           </div>
         </div>
           @endif
        </div>
     </div>
  </div>
