<?php

// Declaramos las credenciales de conexion
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "e_rango_datatables"; /* Database name */
// Creamos la conexion MySQL
$db = new mysqli($host, $user, $password,$dbname);
// Verificamos la conexión
if (!$db) {
  die("Conexion fallida: " . mysqli_connect_error());
}
?>