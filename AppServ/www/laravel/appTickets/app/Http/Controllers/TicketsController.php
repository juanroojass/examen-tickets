<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesarrollosWeb;
use App\Models\Tickets;
use App\Models\Estatus;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Mail;
use App\Mail\mailTicket;
use Auth, Storage;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tickets(){  
        $datos_desarrollos = DesarrollosWeb::all();
        return view('tickets.main', compact('datos_desarrollos'));
    }

    public function guardar_ticket(Request $request){
        try{
            $fecha = new \DateTime();         
            $archivo = $request->file('archivo_evidencia');           
            $nombre_archivo = '';
            if($archivo !== null){
                $nombre_archivo_original = $archivo->getClientOriginalName();
                $info = new \SplFileInfo($nombre_archivo_original);
                $nombre_archivo = implode('.', ['evidencia', strtolower($info->getExtension()) ]);                
            }   
            // $datos_insert = DB::table('tickets')->updateOrInsert(
            //     ['id' => $request->get('id')],
            //     [
            //         'nombre_usuario_solicitud' => Auth::user()->name,
            //         'correo_solicitud' => Auth::user()->email,
            //         'id_desarrollo' => $request->tipo_dev,
            //         'descripcion_bug' => $request->desc_bug,
            //         'fecha_solicitud' => $fecha->format("Y-m-d H:i:s"),
            //         'id_estatus' => 4,
            //         'evidencia_solicitud' => $nombre_archivo,               
            //     ]
            // );  
            $dataTicket = null;  
            $mensaje = '';         
            if(intval($request->si_respuesta) === 1){                
                $dataTicket = [                                
                    'id_estatus' => $request->estatus,      
                    'correo_registro' => Auth::user()->email,               
                    'comentario_seguimiento' => $request->respuesta, 
                    'fecha_atencion' => $fecha->format("Y-m-d H:i:s"),          
                ];
                $mensaje = 'Se actualizó correctamento la respuesta del ticket.';
            }else{                
                $dataTicket = [
                    'nombre_usuario_solicitud' => Auth::user()->name,
                    'correo_solicitud' => Auth::user()->email,
                    'id_desarrollo' => $request->iddesarrollo,
                    'descripcion_bug' => $request->desc_bug,                
                    'id_estatus' => 4,
                    'evidencia_solicitud' => $nombre_archivo,    
                    'comentario_seguimiento' => $request->respuesta,           
                ]; 
                $mensaje = 'Se registró correctamente el ticket.';
            }   
            $registro_ticktet = Tickets::updateOrCreate(
                ['id' => $request->id_ticket],
                $dataTicket,
            );     
         
            if($archivo !== null){
                Storage::disk('public')->put('tickets/'.$registro_ticktet->id.'/'.$nombre_archivo, \File::get($archivo));
            }

            if($request->correoA !== null){
                Mail::to($request->correoA)->send(new mailTicket($request->respuesta));
            }            

            session()->flash('success', $mensaje);
            return redirect('/herramientas/tickets'); 
        }catch(\Exception $e){
            return $e;
            session()->flash('danger', 'Error al registrar el ticket !!.');
            return redirect('/herramientas/tickets'); 
        }
    }

    public function seguimiento_tickets(Request $request){       
        $datos_tickets = Tickets::with(['desarrollos', 'estatus'])->get();
        $datos_estatus = Estatus::all();
        $datos_tipo_usuario = DB::table('tipo_usuario')->where('id', Auth::user()->id_tipo)->get();    
        return view('tickets.seguimiento-tickets', compact('datos_tickets', 'datos_estatus', 'datos_tipo_usuario'));
    }

    public function descarga_evidencia($url){        ;
        if (Storage::disk('public')->exists(base64_decode($url))){  
            return Storage::disk('public')->download(base64_decode($url));
        }
    }
   
}
