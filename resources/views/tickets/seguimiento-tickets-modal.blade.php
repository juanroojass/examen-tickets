<div class="modal" tabindex="-1" role="dialog" id="modal_seguimiento_ticket">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span></span>Seguimiento de tickets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">

                <form method="post" id="isr_form" action="{{route('guardar.ticket')}}">
                    @csrf               

                    <div class="mb-2">
                        <label for="">Estatus</label>
                        <select class="form-select col-form-label col-md-12 text-md-right" id="estatus" name="estatus" aria-label="Default select example" required>
                            <option value="">Seleccione</option>
                            @foreach($datos_estatus as $e)
                                <option value="{{$e->id}}">{{$e->estatus}}</option>
                            @endforeach                                                       
                        </select>
                    </div>

                    <div>
                        <label for="respuesta" class="col-form-label">Comentario respuesta</label>
                        <textarea class="form-control" id="respuesta" name="respuesta" rows="3"></textarea>                                
                    </div>

                    <div class="text-center modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cerrar</button>
                        <button type="submit" class="btn btn-success">Responder</button>
                    </div>
                 
                    <input type="hidden" name="id_ticket" id="id_ticket"> 
                    <input type="hidden" name="iddesarrollo" id="iddesarrollo">
                    <input type="hidden" name="correoA" id="correoA">
                    <input type="hidden" name="si_respuesta" id="si_respuesta" value="1"> 
                </form>
            </div>
        </div>
    </div>
</div>
