
<div <div class="row">
  <form action="/recenzentanketa" enctype="multipart/form-data" method="post">
      @csrf
  <table class="table table-responsive">
  @foreach($anketaPitanja as $a)
     @if(empty($a->odgovor1))
         <tr>
            <td>
               <textarea class="form-control" disabled>{{$a->pitanje}}</textarea>
            </td>
            <td colspan="2" class="text-right">
                <textarea class="form-control" name="vrednosti/{{$anketuradi}}/{{$a->idPitanja}}" ></textarea>
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
                   <input type="radio" class="form-check-input" name="vrednosti/{{$anketuradi}}/{{$a->idPitanja}}"
                   value="{{$a->odgovor1}}" >{{$a->odgovor1}}
                 </label>
               </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="vrednosti/{{$anketuradi}}/{{$a->idPitanja}}"
                    value="{{$a->odgovor2}}" >{{$a->odgovor2}}
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="vrednosti/{{$anketuradi}}/{{$a->idPitanja}}"
                    value="{{$a->odgovor3}}" >{{$a->odgovor3}}
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="vrednosti/{{$anketuradi}}/{{$a->idPitanja}}"
                    value="{{$a->odgovor4}}" >{{$a->odgovor4}}
                  </label>
                </div>
            </td>

        </tr>
    @endif
@endforeach
<td>
  <input type="hidden" name="id"  value="{{$anketa[0]['idAnketa']}}" >
      <button class="btn dugme">Posalji</button>
</td>
  </table>

</form>
</div>
