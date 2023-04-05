@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
 
@endsection

@section('style')

@endsection



@section('content')
<div class="container-fluid mt-4">
    <div class="row starter-main">
       
        
                <div class="col">
                    <div class="card mt-2">
                        <div class="card-header text-center">
                            
                        <h3>Ficha presentación a proyecto FONDEVE O SUBVENCION </h3>

                        <p><span>Las bases del proyecto pueden ser descargadas en el siguiente enlace</span> <a href="{{asset('assets/reglamento_subvencion_fondeve_2023.pdf')}}"><i class="fa fa-2x fa-file-pdf-o"></i></a></p>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation theme-form" novalidate="" action="{{route('sube.form')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="row g-3">

                                <h4>Presentación</h4>
                                <hr>
                                <div class="col-md-6">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputNombreproyecto">Denominación del Proyecto</label>
                                      <input class="form-control" id="inputNombreproyecto" type="text" required name="nombreproyecto" placeholder="Ingrese nombre aquí">
                                      
                                    </div>
                                </div>
                                <div class="col-md-6">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputOrganizacion">Organización Solicitante</label>
                                      <input class="form-control" id="inputOrganizacion" type="text" required name="nombreorganizacion" placeholder="Ingrese organizacion aquí">
                                      
                                    </div>
                                </div>
                                <div class="col-md-2">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputRut">Rut</label>
                                      <input class="form-control" id="inputRut" type="text" required name="rut" placeholder="Ingrese rut aquí">
                                      
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                      <label class="form-label" for="selecttipo">Tipo de Proyecto</label>
                                      <select class="form-select digits" required id="selecttipo" name="tipo">
      
                                          
                                              <option value="Individual">Individual</option>
                                              <option value="Colectivo">Colectivo</option>
                                          
                                        
                                      </select>
                                     
                                    </div>
                                  </div>

                                <div class="col-md-5">
                                    <div class="mb-3">
                                      <label class="form-label" for="selecttipologia">Tipología del Proyecto</label>
                                      <select class="form-select digits" required id="selecttipologia" name="tipologia">
      
                                          
                                              <option value="Área Infraestructura Comunitaria">Área Infraestructura Comunitaria</option>
                                              
                                              <option value="Área Equipamiento Comunitario">Área Equipamiento Comunitario</option>
                                              
                                              <option value="Área Gestion Comunitaria">Área Gestion Comunitaria</option>
                                              
                                              <option value="Área Medioambiente">Área Medioambiente</option>
                                          
                                        
                                      </select>
                                      
                                    </div>
                                  </div>
                                  

                            </div>
                        
                            <div class="row g-3 mt-4">
                                <h4>Descripción</h4>
                                <hr>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label class="form-label" for="descripcionproyecto">Descripción del Proyecto</label>
                                      <textarea name="descripcionproyecto" id="descripcionproyecto" rows="12" cols="100"></textarea>
                                 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label class="form-label" for="identificacion">Identificacion de la necesidad</label>
                                      <textarea name="identificacion" id="identificacion" rows="12"  cols="100"></textarea>
                                    
                                    </div>
                                </div>

                                
                                
                            </div>

                            <div class="row g-3 mt-4">
                                <h4>Localización Geográfica y Alcance</h4>
                                <hr>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                      <label class="form-label" for="ubicacionGeografica">Ubicación Especifica</label>
                                      <input name="direccion" class="form-control" type="text" id="ubicacionGeografica" >
                                      
                                     
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                      <label class="form-label" for="unidadvecinal">Unidad Vecinal o Localidad</label>
                                      <input name="unidadvecinal" class="form-control" type="text" id="unidadvecinal" >
                                      
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                      <label class="form-label" for="Propiedaddelterreno">Propiedad del Terreno</label>
                                      <input name="propiedad" class="form-control" type="text" id="Propiedaddelterreno">
                                   
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                      <label class="form-label" for="Poblacion">Población directa beneficiada del terreno</label>
                                      <input name="poblaciondirecta" class="form-control" type="number" id="Poblacion">
                                     
                                    </div>
                                </div>

                                
                                
                            </div>

                            <div class="row g-3 mt-4 mb-2">
                                <h4>Costos del Proyecto</h4>
                                <hr>

                                <div class="col-md-6">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th>Cantidad</th>
                                                <th>Descripción</th>
                                                <th>Monto Total </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="tabla">
                                            <tr>
                                                <td><input class="form-control" name="gastos[0][cantidad]"></td>
                                                <td><input class="form-control" name="gastos[0][descripcion]"></td>
                                                <td><input class="form-control monto" name="gastos[0][monto]" onkeyup="sumar();"></td>
                                            </tr>

    
                                        </tbody>

                                        <tfoot>
                                          <tr>
                                            <th></th>
                                            <th><label class="col-sm-10 col-form-label" >Costo Total</label></th>
                                            <th><label class="col-sm-10 col-form-label" id="gastototal"></label></th>
                                          </tr>
                                        </tfoot>
                                        
                                            
                                         
                                    </table>
                                    
                                    
                                      <button type="button" class="btn btn-primary mt-3 left" onclick="agregarFila();">Agregar Fila</button>
                                      
                                     
                                     
                                    


                                </div>

                                <div class="col-md-6">

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Aporte Municipal</td>
                                                <td><input type="number" class="form-control monto2" name="aportemuni" onkeyup="suma2();" ></td>
                                            </tr>
                                            <tr>
                                                <td width="30%">Aporte Organización <br><span class="text-danger">Minimo 10% gasto total proyecto</span></td>
                                                <td><input type="number" name="aporteong" class="form-control monto2" onkeyup="suma2();"></td>

                                            </tr>
                                            <tr>
                                                <td>Costo total Proyecto</td>
                                                <td><input type="number" name="costototal" id="totalproyecto" class="form-control"></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    


                                </div>
                                


                            </div>


                            

                            <div class="row g-3 mt-4">

                                <h4>Adjuntar la documentacion señalada en el artículo Nº 10 Letra B</h4>
                                <hr>
                               
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Fotocopia del acta de la Asamblea, conforme al articulo Nº6 del Reglamento</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="fotocopiaacta">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Fotocopia del rut de la Organización</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="fotocopiarut">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Certificado de personalidad Juridica y directiva vigente, de la organización postulante</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="certificadopersonalidadjur">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Certificado de inscripción, en el registro de transferencias publicas www.registros19862.cl </label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="certificadoinscripcion">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Certificado, que acredite que la junta de vecinos u Organización, no posee deudas pendientes con el Municipio. </label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="certificadojunta">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Fotocopia cuenta bancaria o cartola bancaria a nombre de la Organización</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="fotocopiacuenta">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">En el caso de proyectos de infraestructura, se deberán presentar todos los antecedentes indicados en los requisitos específicos o factibilidades que se requieran</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="antecedentes">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Antecedentes técnicos, Financieros, Planimétricos y Cotizaciones del proyecto.</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="antecedentestecnicos">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Dominio vigente de la propiedad y/o comodato (solo para proyectos de infraestructura).</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="dominiovigente">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Registro Fotográfico, si corresponde, del area de intervencion del proyecto.</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="registrofotografico">
                                        </div>
                                      </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Otros antecedentes (si existe)</label>
                                        <div class="col-sm-9">
                                          <input class="form-control" type="file" name="otrosantecedentes">
                                        </div>
                                      </div>

                                </div>

                                



                            </div>


                            <div class="row g-3 mt-4">
                                <h4>Responsables de la presentación</h4>
                                <hr>

                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputnombrePresidente">Nombre y Apellidos Presidente</label>
                                      <input class="form-control" id="inputnombrePresidente" type="text" required name="nombrepresidente" placeholder="Ingrese nombre y apellidos aquí">
                    
                                    </div>
                                </div>
                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputtelefonoPresidente">Telefono Presidente</label>
                                      <input class="form-control" id="inputtelefonoPresidente" type="text" required name="telefonopresidente" placeholder="Ingrese Teléfono aquí">
                            
                                    </div>
                                </div>
                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputcorreoPresidente">Correo Presidente</label>
                                      <input class="form-control" id="inputcorreoPresidente" type="text" name="correopresidente" placeholder="Ingrese Correo aquí">
                         
                                    </div>
                                </div>


                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputnombreSecretario">Nombre y Apellidos Secretario</label>
                                      <input class="form-control" id="inputnombreSecretario" type="text" required name="nombresecretario" placeholder="Ingrese nombre y apellidos aquí">
                          
                                    </div>
                                </div>
                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputtelefonosecretario">Telefono Secretario</label>
                                      <input class="form-control" id="inputtelefonoSecretario" type="text" required name="telefonosecretario" placeholder="Ingrese Teléfono aquí">
                    
                                    </div>
                                </div>
                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputcorreoSeretario">Correo Secretario</label>
                                      <input class="form-control" id="inputcorreoSecretario" type="text"  name="correosecretario" placeholder="Ingrese Correo aquí">
                    
                                    </div>
                                </div>


                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputnombreTesorero">Nombre y Apellidos Tesorero</label>
                                      <input class="form-control" id="inputnombreTesorero" type="text" required name="nombretesorero" placeholder="Ingrese nombre y apellidos aquí">
                                
                                    </div>
                                </div>
                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputtelefonoTesorero">Telefono Tesorero</label>
                                      <input class="form-control" id="inputtelefonoTesorero" type="text" required name="telefonotesorero" placeholder="Ingrese Teléfono aquí">
                     
                                    </div>
                                </div>
                                <div class="col-md-4">
                              
                                    <div class="mb-3">
                                      <label class="form-label" for="inputcorreoTesorero">Correo Tesorero</label>
                                      <input class="form-control" id="inputcorreoTesorero" type="text" name="correotesorero" placeholder="Ingrese Correo aquí">
                              
                                    </div>
                                </div>



                            </div>


                            

                            
                            
                        </div>
                        <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    </div>
                </div>
                


        
        
        
        
        
    </div>
</div>

<script type="text/javascript">
    var session_layout = '{{ session()->get('layout') }}';
</script>
   
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery.ui.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validation-custom.js')}}"></script>

<script>
     var i =1;
    const agregarFila = () => {
           
            document.getElementById('tabla').insertRow(-1).innerHTML = '<td><input class="form-control" name=gastos['+i+'][cantidad]></td><td><input class="form-control" name=gastos['+i+'][descripcion]></td><td><input class="form-control monto" name=gastos['+i+'][monto] onkeyup="sumar();"></td>'
            i++;
        }

    const eliminarFila = () => {
        const table = document.getElementById('tablaprueba')
        const rowCount = table.rows.length
  
        if (rowCount <= 1)
                alert('No se puede eliminar el encabezado')
         else
            table.deleteRow(rowCount -1)
    }
   

</script>
<script>
    function sumar() {

        var total = 0;

        $(".monto").each(function() {

            if (isNaN(parseFloat($(this).val()))) {

            total += 0;

            } else {

            total += parseFloat($(this).val());

            }

        });

        console.log(total);
        document.getElementById('gastototal').innerHTML = total;

    }
    function suma2() {

var total = 0;

$(".monto2").each(function() {

if (isNaN(parseFloat($(this).val()))) {

total += 0;

} else {

total += parseFloat($(this).val());

}

});

console.log(total);
document.getElementById('totalproyecto').value = total;

}

   
</script>



@endsection
