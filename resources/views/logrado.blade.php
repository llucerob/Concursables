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
                            
                        
                        </div>
                        <div class="card-body">
                                                      
                          <div class="card-header text-center">
                            
                            <h3>Su Ficha presentación a proyecto FONDEVE O SUBVENCION ha sido guardado exitosamente </h3>
                            </div>
                            
                            
                        </div>
                        <div class="card-footer">
                           
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
        document.getElementById('costototal').value = total;

    }
</script>


@endsection
