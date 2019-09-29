<div class="offset-1 col-10 offset-1 mt-2">
    

        <div class="form-group row">

                        <input type="text" name="pitanje" id="pitanje" class="form-control" placeholder="Unesi pitanje" />
                  
         
        </div>
          <div class="form-group row">
       <input type="hidden" id="idPoziv" value="{{$pitanja->idPoziv}}" />

            <button type="submit" class="btn" onclick='dodajPitanje()'>Dodaj</button>
        </div>

    </div>
<div class="row" >
 <div class="offset-3 col-md-6 col-12 offset-3">
   <table class="table table-responsive"> 
       @if($poziv)
       @foreach($poziv as $p)
       <tr>
           <td>
              <textarea class="form-control" disabled>{{$p->pitanje}}</textarea>  

            </td>
            <td>
                {{--<form method="POST" action="{{ route('pitanjapoziv.destroy', $p->idPitanja) }}">--}}

                    {{--<button type="submit" class="btn dugme">Obrisi</button>--}}

                {{--</form>--}}

          <button type="submit" class="btn btn-sm dugme" onclick='obrisi({{$p->idPitanja}})'>Obrisi</button>

            </td>
           </td>
       </tr>
      @endforeach
      @endif
   </table>
 </div>
