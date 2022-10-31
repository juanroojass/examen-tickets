<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'id',
        'nombre_usuario_solicitud',
        'correo_solicitud',
        'descripcion_bug',
        'evidencia_solicitud',
        'fecha_solicitud',
        'correo_registro',
        'id_desarrollo',
        'id_estatus',
        'comentario_seguimiento',
        'fecha_atencion',
    ];

    const UPDATED_AT = 'fecha_solicitud';
    const CREATED_AT = 'fecha_solicitud';

    function desarrollos(){
        return $this->hasOne('App\Models\DesarrollosWeb', 'id', 'id_desarrollo');
    }

    function estatus(){
        return $this->hasOne('App\Models\Estatus', 'id', 'id_estatus');
    }
}
