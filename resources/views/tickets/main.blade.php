@extends('layouts.app')

@section('content')
@php 
//print_r($datos_tickets2);
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 

            @if(session()->has('success'))
            <div class="row">
                <div class="alert alert-success w-100 text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                
                    {{ session()->get('success') }}
                </div>
            </div>     
            @elseif(session()->has('danger'))
            <div class="row">
                <div class="alert alert-danger w-100 text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                    {{ session()->get('danger') }}
                </div>
            </div>
            @endif
        <!-- {{ Auth::user() }} -->
            <div class="card">
                <div class="card-header text-center">Registro de tickets </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('guardar.ticket') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="tipo-usuario" class="col-md-4 col-form-label text-md-right">Tipo desarrollo</label>

                            <div class="col-md-6">
                                <select class="form-select col-form-label col-md-12 text-md-right" id="iddesarrollo" name="iddesarrollo" aria-label="Default select example" required>
                                    <option value="">Seleccione</option>
                                    @foreach($datos_desarrollos as $d)
                                        <option value="{{$d->id}}">{{$d->desarrollo}}</option>
                                    @endforeach                                                       
                                </select>
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="desc_bug" class="col-md-4 col-form-label text-md-right">Descripcion bug</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control  @error('desc_bug') is-invalid @enderror" id="desc_bug" name="desc_bug" rows="3"></textarea>

                                @error('desc_bug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjuntar-evidencia" class="col-md-4 col-form-label text-md-right">Adjuntar evidencia</label>

                            <div class="col-md-6">
                                <input id="archivo_evidencia" type="file" accept=".png, .jpg, .bmp, .tif" class="form-control" name="archivo_evidencia">
                            </div>                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
<style>
    #desc_bug {
        resize: none;
    }
</style>
<script>
    window.setTimeout(function () { 
         $(".alert").alert('close'); 
      }, 10000);
</script>