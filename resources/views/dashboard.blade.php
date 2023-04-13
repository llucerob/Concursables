@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
 
@endsection

@section('style')

@endsection



@section('content')


<div class="container-fluid">
    <div class="row starter-main">
       
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Listado Proyectos</h5>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display datatables" id="proyectos">

                            <thead>
                                <tr class="text-center">
                                    <th>Nombre proyecto</th>
                                    <th>Organizacion Solicitante</th>
                                    
                                    <th>Tipo</th>
                                    <th>Dirección</th>
                                    
                                    
                                    <th>Descargas</th>
                                </tr>
                            </thead>
                          
                        </table>

                    </div> 

                    
                
                   
                </div>
            </div>
        </div>
        
        
        
    </div>
</div>
<script type="text/javascript">
    var session_layout = '{{ session()->get('layout') }}';
</script>


@endsection

@section('script')

    
    

    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>

<script>
    $(document).ready(function(){

        var tabla = $('#proyectos').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                ajax: '{{route('datatable.proyectos')}}',
                columns: [
                    {data: 'nombreproyecto'},
                    {data: 'organizacion'},
                    {data: 'tipo'},
                    {data: 'direccion'},
                    {
                        data: null,
                        defaultContent: '<button class="btn imprimir btn-secondary btn-sm m-1" title="imprimir"><i class="fa fa-file-pdf-o"></i></button>',

                       
                            
                        },
                    
                    
                    ],               
                    
            });

            obtener_data_imprimir('#proyectos', tabla);
        });


        var obtener_data_imprimir = function(tbody, tabla){
            $(tbody).on ('click', 'button.imprimir',function(){
                var data = tabla.row($(this).parents('tr')).data();

                location.href = "/imprimir/"+data.id;
                
            })
        }
</script>
@endsection