<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentacion;
use App\Models\Adjunto;
use App\Models\Costo;
use App\Models\Responsable;
use App\Models\Resumen;
use Illuminate\Support\Facades\Storage;


class FormController extends Controller
{
    public function subeform(Request $request){

        $presentacion = new Presentacion;
        $presentacion->nombreproyecto           = $request->nombreproyecto;
        $presentacion->organizacionsolicitante  = $request->nombreorganizacion;
        $presentacion->rut                      = $request->rut;
        $presentacion->tipo                     = $request->tipo;
        $presentacion->descripcion              = $request->descripcionproyecto;
        $presentacion->necesidad                = $request->identificacion;
        $presentacion->direccion                = $request->direccion;
        $presentacion->unidadvecinal            = $request->unidadvecinal;
        $presentacion->propiedadterreno         = $request->propiedad;
        $presentacion->poblacionbeneficiada     = $request->poblaciondirecta;
        $presentacion->topologia                = $request->tipologia; 
        $presentacion->save();
        
        

        foreach($request->gastos as $g){

            $costo = new Costo;
         
            $costo->presentacion_id = $presentacion->id;
            $costo->descripcion     = $g['descripcion'];
            $costo->cantidad        = $g['cantidad'];
            $costo->monto           = $g['monto'];
            $costo->save();

        }

        $resumen = new Resumen;
        $resumen->presentacion_id   = $presentacion->id;
        $resumen->aptmunicipal      = $request->aportemuni;
        $resumen->aptorganizacion   = $request->aporteong;
        $resumen->totalproyecto     = $request->costototal;
        $resumen->save();

        
       
            $responsable = new Responsable;
            $responsable->presentacion_id   = $presentacion->id;
            $responsable->nombre            = $request->nombrepresidente;
            $responsable->cargo             = 'presidente';
            $responsable->telefono          = $request->telefonopresidente;
            $responsable->correo            = $request->correopresidente;
            $responsable->save();
            
            $responsable = new Responsable;
            $responsable->presentacion_id   = $presentacion->id;
            $responsable->nombre            = $request->nombresecretario;
            $responsable->cargo             = 'secretario';
            $responsable->telefono          = $request->telefonosecretario;
            $responsable->correo            = $request->correosecretario;
            $responsable->save();
            
            $responsable = new Responsable;
            $responsable->presentacion_id   = $presentacion->id;
            $responsable->nombre            = $request->nombretesorero;
            $responsable->cargo             = 'presidente';
            $responsable->telefono          = $request->telefonotesorero;
            $responsable->correo            = $request->correotesorero;
            $responsable->save();





            if($request->file('fotocopiaacta')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('fotocopiaacta'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'fotocopia acta';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            
            if($request->file('fotocopiarut')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('fotocopiarut'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'fotocopia rut';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('certificadopersonalidadjur')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('certificadopersonalidadjur'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'certificado personalidad juridica';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('certificadoinscripcion')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('certificadoinscripcion'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Certificado Inscripcion';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('certificadojunta')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('certificadojunta'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Certificado Junta';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('fotocopiacuenta')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('fotocopiacuenta'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Fotocopia Cuenta';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('antecedentes')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('antecedentes'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Antecedentes';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('antecedentestecnicos')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('antecedentestecnicos'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Antecedentes Tecnicos';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('dominiovigente')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('dominiovigente'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Dominio Vigente';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('registrofotografico')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('registrofotografico'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Registro Fotografico';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('otrosantecedentes')){
                $ruta = Storage::disk('public')->put('concurso', $request->file('otrosantecedentes'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Otros Antecedentes';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }



               return view('logrado');    



        
        

                

    }

}
