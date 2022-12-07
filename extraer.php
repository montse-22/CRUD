<?php
include 'conexion.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($db,$_POST['search']['value']); // Search value

## Variables de busqueda por fecha
$buscarFechaInicio = mysqli_real_escape_string($db,$_POST['buscarFechaInicio']);
$buscarFechaFin = mysqli_real_escape_string($db,$_POST['buscarFechaFin']);

## Busqueda normal 
$searchQuery = " ";
if($searchValue != ''){
    $searchQuery = " and (nombres like '%".$searchValue."%' or email like '%".$searchValue."%' or ciudad like'%".$searchValue."%' ) ";
}

// Filtramos por fecha
if($buscarFechaInicio != '' && $buscarFechaFin != ''){
    $searchQuery .= " and (fecha_ingreso between '".$buscarFechaInicio."' and '".$buscarFechaFin."' ) ";
}

## Número total de registros sin filtrar
$sel = mysqli_query($db,"select count(*) as allcount from personal");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Número total de registros con filtrado
$sel = mysqli_query($db,"select count(*) as allcount from personal WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Obtener registros
$empQuery = "select * from personal WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();
//Procesar informacion de MySQL
while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    	"nombres"=>$row['nombres'],
    	"email"=>$row['email'],
    	"fecha_ingreso"=>$row['fecha_ingreso'],
    	"salario"=>$row['salario'],
    	"ciudad"=>$row['ciudad']
    );
}

## Respuesta
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
die;