<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 21/02/19
 * Time: 7:54 PM
 */
ini_set('display_errors','On');
//bd de xamm  3308
$db=new PDO('mysql:host=127.0.0.1;dbname=pdo_pruebas;port=3308','root','');
//bd mysql nativo ???? 3306

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
{
    $prods=$db->query('SELECT * FROM productos');
   //igual echo '<pre>',var_dump($prods->fetch(PDO::FETCH_OBJ)),'</pre>';
    echo '<pre>',var_dump($prods->fetchObject()->descripcion),'</pre>';
   //igual los dos
    echo '<pre>',var_dump($prods->fetch(PDO::FETCH_ASSOC)['descripcion']),'</pre>';
}catch(PDOException $ex)
{
    var_dump($ex->getMessage());
    die('Servicio no disponible...');
}

echo '<br><br>';
 $prods=null;
try
{
    $prods=$db->query('
      SELECT * FROM productos
     ');
    //igual echo '<pre>',var_dump($prods->fetch(PDO::FETCH_OBJ)),'</pre>';
    echo '<pre>',var_dump($prods->fetchObject()->descripcion),'</pre>';
    //igual los dos
    echo '<pre>',var_dump($prods->fetch(PDO::FETCH_ASSOC)['descripcion']),'</pre>';
}catch(PDOException $ex)
{
    var_dump($ex->getMessage());
    die('Servicio no disponible...');
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>pdo</title>
</head>
    <body>
        <?php while($prod=$prods->fetchObject()):?>
            <h4><?php echo $prod->nombre; ?></h4>
            <p><?php echo $prod->descripcion; ?></p>
            <p><?php echo $prod->precio; ?></p>
            <p><?php echo $prod->cod_barras; ?></p>
        <?php endwhile; ?>
    </body>
</html>
