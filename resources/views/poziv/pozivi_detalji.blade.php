<div class="offset-1 col-10 offset-1">
    
 <!--     <form method="POST"> -->
        <div class="form-group row">
        	                 
                        <input type="text" name="pitanje" id="pitanje"class="form-control" placeholder="Unesi pitanje" />
                  
         
        </div>
          <div class="form-group row">
            <input type="hidden" id="idPoziv" value="{{$poziv->first()->pozivi_idPoziv}}" />

            <button class="btn" onclick='dodaj()'>Dodaj</button>
        </div>
   <!--    <form>   -->
    </div>
<div class="row" >
 <div class="offset-3 col-md-6 col-12 offset-3">
   <table class="table table-responsive"> 

       @foreach($poziv as $p)
       <tr>
           <td>
              <textarea class="form-control" disabled>{{$p->pitanje}}</textarea>  

            </td>
            <td>
             
               @csrf
              
           <button class="btn btn-sm dugme" onclick='obrisi({{$p->idPitanja}}, {{$p->pozivi_idPoziv}})'>Obrisi</button>
           </td>
       </tr>
      @endforeach

   </table>
 </div>
