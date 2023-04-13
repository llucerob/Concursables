<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">

@page {
    margin: 0px 0px 0px 0px !important;
    padding: 0px 0px 0px 0px !important;
}


.text-danger strong {
        	color: #04346c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #eeaf33;
			border-top: 12px solid #04346c;
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
<div class="receipt-main">
   <table class="col-12 receipt-header">
    <td><img src="{{asset('assets/images/logo/logom.png')}}" alt="Logo Municipal" width="220px"></td>
    <td class="text-right">
        <div class="receipt-right">
            <h5></h5>
            <p> </p>
            <p>  </p>
            <p> </p>
            <p> </p>            	
        </div>                  
    </td>
   </table>


   <table class="col-12 receipt-header receipt-header-mid">
    <td>
        <div class="receipt-right text-left">
            <p><strong>Nombre : {{$nombreproyecto}} </strong></p>
            <p><b>Rut :</b> {{$rut}}</p>
            <p><b>Organizacion Solicitante :</b> {{$organizacionsolicitante}}</p>
            <p><b>Dirección :</b> {{$direccion}}</p>
           

        </div>
</td>
    <td>
        <div class="receipt-right text-left">
            <p><b>Tipo:</b> {{$tipo}}</p>
            <p><b>Folio :</b>{{ $folio }} </p>
            <p><b>Poblacion Beneficiada :</b> {{$poblacionbeneficiada}} </p>
            <p><b>Topologia :</b> {{$topologia}} </p>
            
        </div>
    </td>
    <td>
        <div class="receipt-right mt-3">
            <p><b>Unidad Vecinal:</b> {{$unidadvecinal}}</p>
    
        </div>
    </td>
   </table>


   <table class="table table-bordered mt-3" >
    <thead>
        <tr>
            <th width="50%">DESCRIPCION</th>
            <th width="50%">NECESIDAD</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {{$descripcion}}
            
                
            </td>
                
            <td>
                {{$necesidad}}
            </td>
        </tr>

    </tbody>
    
   

    </table>

    <h5>Costos</h5>
   
   <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Montos</th>
            
        </tr>
    </thead>
    <tbody>

        @foreach ( $costos as $l )
        <tr>
            <td>{{$l['descripcion']}}</td>
            <td>{{$l['cantidad']}}</td>
            <td>{{$l['monto']}}</td>
            
        </tr>
        @endforeach
          
    </tbody>
    <tfoot>
        <td colspan="3" class="text-danger text-right">
            <p style="color:#04346c;">Total :  ${{$totalcostos}}</p>
        </td>
    </tfoot>
</table>


<div class="receipt-right text-left mb-3">
    <p><b>Aporte Municipal </b> $ {{$aptmunicipal}} </p>
    <p><b>Aporte Organización :</b> $ {{$aptorganizacion}}</p>
    <p><b>Total Proyecto :</b> $ {{$totalproyecto}}</p>
</div>




<h5>Responsables</h5>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Telefono</th>
            <th>Correo</th>
            
        </tr>
    </thead>
    <tbody>

        @foreach ( $responsables as $l )
        <tr>
            <td>{{$l['nombre']}}</td>
            <td>{{$l['cargo']}}</td>
            <td>{{$l['telefono']}}</td>
            <td>{{$l['correo']}}</td>
            
        </tr>
        @endforeach
          
    </tbody>
    
    </table>




</div>
        
    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>