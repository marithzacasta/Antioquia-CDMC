<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/agendamiento.php?page=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)){
 echo curl_error($ch);
}else{
$datos = json_decode($response, true);

//$recu = $_GET['id'];
}

?>
<!-- PDF -->
<?php
ob_start();// esto es para indicar que todo lo que este aqui adentro lo va guardar la variable html, va el formato de html
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Mooli&family=Quicksand:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>


<?php
include("../../../apisenasoft/modelo/conexion/conexion.php");
?>


  <div class="cont_tabla">
   
  <table class="table" width="700px" height="800px" border="1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Manzana</th>
      <th scope="col">Servicio</th>
      <th scope="col">Establecimiento</th>
      <th scope="col">fecha</th>
      <th scope="col">hora</th>
    </tr>
  </thead>
  <tbody>

  <?php
      // foreach($datos as $ver):
  ?>
    <!-- <tr> -->
      <!-- <th scope="row">1</th> -->
      <!-- <td><?php  echo $ver["idManzana"] ;?></td> -->
      <!-- <td><?php  echo $ver["idServicio"] ;?></td> -->
      <!-- <td><?php  echo $ver["idEstablecimiento"] ;?></td> -->
      <!-- <td><?php  echo $ver["fecha"] ;?></td> -->
      <!-- <td><?php  echo $ver["hora"] ;?></td> -->
    </tr>

<?php
  //endforeach;
?>

    <tr>
      <th scope="row">2</th>
      <td>Colores</td>
      <td>niñera</td>
      <td>barrio antioquia</td>
      <td>28-09-2023</td>
      <td>5:20 am</td>
    </tr>
    

  </tbody>

</table>

  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</body>
</html>
<!-- CREACION DEL PDF -->
<?php
$html=ob_get_clean();
// echo $html;

require_once '../../../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//aqui hay un objeto y lo que voy hacer esque voy a guaradar todas las interraciones que tiene donpdf

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("archivo_.pdf", array("Attachment" => true));//true para que descargue // false solo muestra el pdf
?>

