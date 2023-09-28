<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/senasoft1-main/apisenasoft/controlador/manzana.php?page=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)){
 echo curl_error($ch);
}else{
$datos = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>muestra cliente</title>
</head>
<body>

<select name="s1" id="s1">
<?php
        foreach($datos as $ver):
?>
                <option value="<?php echo $ver["idManzana"]; ?>"><?php  echo $ver["nombreManzana"]; ?></option>

                <?php
  endforeach;
?>
            </select>



<a href="guardar.php?id=<?php  echo $fr; ?>"> <input type="button" id="b1" name="b1" value="enviar"></a>


</body>
</html>

<?php
curl_close($ch);
?>