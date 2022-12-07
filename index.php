<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Datatables con rango de fechas</title>
<!-- jQuery UI CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- jQuery UI JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<!-- Datatable Boostrap5 -->
<script src="//cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

</head>

<body>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark  bg-dark">

    <div class="container">
      <a class="navbar-brand" href="https://baulphp.com/">BaulPHP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="https://baulphp.com/">Portada</a>
          </li>
        </ul>
      </div>
    </div>

  </nav>
</header>

<main>
<div class="container">
<div class="alert alert-primary" role="alert">
  Datatables con rango de fechas
</div>

   <!-- Date Filter -->
   <form id="formFecha">
   <table>
     <tr>
       <td>
          <input type='text' readonly id='buscar_inicio' class="datepicker" placeholder='Fecha Inicio'class="form-control form-control-sm">
       </td>
       <td>
          <input type='text' readonly id='buscar_fin' class="datepicker" placeholder='Fecha fin' class="form-control form-control-sm">
       </td>
       <td>
          <input type='button' id="btn_search" value="Buscar" class="btn btn-primary btn-sm">
       </td>
       <td>
          <input type='button' id="btnLimpiar" value="Limpiar" class="btn btn-danger btn-sm">
       </td>
     </tr>
   </table>
</form>
<hr>
   <!-- Table -->
   <table id='Tabla_personal' class="table table-striped" style="width:100%">
     <thead>
       <tr>
         <th>Nombre personal</th>
         <th>Email</th>
         <th>Salario</th>
         <th>Ciudad</th>
         <th>Fecha de ingreso</th>
       </tr>
     </thead>

   </table>
</div>

</main>
<script>
   $("#btnLimpiar").click(function(event) {
	   $("#formFecha")[0].reset();
   });
</script>
<script src="script.js"></script>
</body>
</html>