@extends('layouts.app')

@section('content')
@php 
//dd($datos_estatus);
@endphp

<div class="container">
    <div class="justify-content-center">
        <div class="text-center"><h4><strong>Seguimiento de tickets</strong></h4> </div>
        <div class="col-md-8"> 
            <table class="table w-100" id="tabla_seguimiento_tickets">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre solicitud</th>
                        <th>Correo solicitud</th>
                        <th>Desarrollo reportado</th>
                        <th>Descripcion solicitud</th>
                        <th>Evidencia solicitud</th>
                        <th>Fecha solicitud</th>

                        <th>Atiende</th>
                        <th>Seguimiento</th>
                        <th>Fecha atención</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos_tickets as $t)
                    @php 
                    $ruta_evidencia = base64_encode('tickets/'.$t->id.'/'.$t->evidencia_solicitud);
                    @endphp
                    <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->nombre_usuario_solicitud}}</td>
                        <td>{{$t->correo_solicitud}}</td>
                        <td>{{$t->desarrollos->desarrollo}}</td>
                        <td>{{$t->descripcion_bug}}</td>
                        
                        <td><a href="{{route('descarga.evidencia', [$ruta_evidencia])}}" target="_blank">{{$t->evidencia_solicitud}}</a></td>
                        <td>{{$t->fecha_solicitud}}</td>
                        
                        <td>{{$t->correo_registro}}</td>
                        <td>{{$t->comentario_seguimiento}}</td>
                        <td>{{$t->fecha_atencion}}</td>
                        @if($t->id_estatus === 1)
                            <td><strong class="text-success">{{$t->estatus->estatus}}</strong></td>
                        @elseif($t->id_estatus === 2)
                            <td><strong class="text-primary">{{$t->estatus->estatus}}</strong></td>
                        @elseif($t->id_estatus === 3)
                            <td><strong class="text-primary">{{$t->estatus->estatus}}</strong></td>
                        @elseif($t->id_estatus === 4)
                            <td><strong class="text-danger">{{$t->estatus->estatus}}</strong></td>
                        @endif

                        @if($t->id_estatus === 1)
                            <td></td>
                        @else
                            <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_seguimiento_ticket" data-id="{{$t->id}}" data-iddesarrollo="{{$t->id_desarrollo}}" data-correoa="{{$t->correo_solicitud}}">
                                Atender</button></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>          

        </div>
    </div>
    @include('tickets.seguimiento-tickets-modal')
</div>
@endsection
<style>
    #desc_bug, #respuesta {
        resize: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>  -->

<script>
    window.setTimeout(function () { 
         $(".alert").alert('close'); 
      }, 10000);
      $(function() {             
        // let table = $('#tabla_seguimiento_tickets').DataTable({
        //     scrollY:'65vh',
        //     scrollCollapse: true,
        //     "language": {
        //         search: '',
        //         searchPlaceholder: 'Buscar registros por tipo tabla',
        //         "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        //     },
           
        // });

            $('#modal_seguimiento_ticket').on('shown.bs.modal', function (e) {
                let idTicket = $(e.relatedTarget).data('id'); 
                let idDesarrollo = $(e.relatedTarget).data('iddesarrollo'); 
                let correoA = $(e.relatedTarget).data('correoa'); 
                $('#id_ticket').val(idTicket);     
                $('#iddesarrollo').val(idDesarrollo);
                $('#correoA').val(correoA);
                // console.log(idDesarrollo);
            });
        });
    
      
</script>