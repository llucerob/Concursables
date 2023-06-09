<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentacion;
use App\Models\Adjunto;
use App\Models\Costo;
use App\Models\Responsable;
use App\Models\Resumen;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;


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
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('fotocopiaacta'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'fotocopia acta';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            
            if($request->file('fotocopiarut')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('fotocopiarut'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'fotocopia rut';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('certificadopersonalidadjur')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('certificadopersonalidadjur'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'certificado personalidad juridica';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('certificadoinscripcion')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('certificadoinscripcion'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Certificado Inscripcion';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('certificadojunta')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('certificadojunta'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Certificado Junta';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('fotocopiacuenta')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('fotocopiacuenta'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Fotocopia Cuenta';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('antecedentes')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('antecedentes'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Antecedentes';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('antecedentestecnicos')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('antecedentestecnicos'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Antecedentes Tecnicos';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('dominiovigente')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('dominiovigente'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Dominio Vigente';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('registrofotografico')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('registrofotografico'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Registro Fotografico';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }
            if($request->file('otrosantecedentes')){
                $ruta = Storage::disk('public')->put('concurso/'.$presentacion->id, $request->file('otrosantecedentes'));
                $adjunto = new Adjunto;
                $adjunto->presentacion_id   = $presentacion->id;
                $adjunto->concepto          = 'Otros Antecedentes';
                $adjunto->ruta              = $ruta;
                $adjunto->save();
          
            }



               return view('logrado');    

    }


    public function ajaxproyectos(){


        $ben = Presentacion::all();
        $arr = [];

        foreach($ben  as $key => $b ){
            
            $arr[$key]['nombreproyecto']        =   $b->nombreproyecto;
            $arr[$key]['organizacion']          =   $b->organizacionsolicitante;       
            $arr[$key]['tipo']                  =   $b->tipo;
            $arr[$key]['direccion']             =   $b->direccion;
            $arr[$key]['id']                    =   $b->id;

        }

           // dd($arr);
        
        return DataTables($arr)->tojson();


        
    }





    public function imprimir(string $id){



        $presentacion = Presentacion::findOrFail($id);

       
        $arr = [];

        $arr['nombreproyecto']                  =   $presentacion->nombreproyecto;
        $arr['organizacionsolicitante']         =   $presentacion->organizacionsolicitante;
        $arr['tipo']                            =   $presentacion->tipo;
        $arr['descripcion']                     =   $presentacion->descripcion;
        $arr['necesidad']                       =   $presentacion->necesidad;        
        $arr['direccion']                       =   $presentacion->direccion;
        $arr['unidadvecinal']                   =   $presentacion->unidadvecinal;
        $arr['poblacionbeneficiada']            =   $presentacion->poblacionbeneficiada;
        $arr['topologia']                       =   $presentacion->topologia;
        $arr['rut']                             =   $presentacion->rut;
        $arr['folio']                           =   $presentacion->id;


        $responsable = [];

        
        foreach(Responsable::where('presentacion_id', $id)->get() as $key => $b){

           
            
            $responsable[$key]['nombre']        =   $b->nombre;
            $responsable[$key]['cargo']         =   $b->cargo;
            $responsable[$key]['telefono']      =   $b->telefono;
            $responsable[$key]['correo']        =   $b->correo;


        }

       $arr['responsables']                     =   $responsable;

       $costos   =   [];


       $resumenes = Resumen::where('presentacion_id', $id)->get();

        $arr['aptmunicipal']                    =   $resumenes[0]->aptmunicipal;
        $arr['aptorganizacion']                 =   $resumenes[0]->aptorganizacion;
        $arr['totalproyecto']                   =   $resumenes[0]->totalproyecto;
        
        $total =0;
        foreach(Costo::where('presentacion_id', $id)->get() as $key => $b){

            $costos[$key]['descripcion']        =   $b->descripcion;
            $costos[$key]['monto']              =   $b->monto;
            $costos[$key]['cantidad']           =   $b->cantidad;
            $total                              =   $total + $b->monto;
        }

        $arr['costos']                          =   $costos;
        $arr['totalcostos']                     =   $total;

        //dd($arr);

        
        view()->share('proyectos', $arr);

        $pdf = PDF::loadView('pdfs.proyectos', $arr);
        return $pdf->download($arr['nombreproyecto'].'.pdf');

        

    }




}
