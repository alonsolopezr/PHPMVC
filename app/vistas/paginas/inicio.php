<p><?php echo  RUTA_APP.'/vistas/inc/header.php';?></p>

<p><?php echo $datos['titulo']; ?></p>
<ul>
    <?php foreach ($datos['articulos'] as $articulo) : ?>
        <li><?php echo "articulo = ".$articulo->nombre; ?></li>
    <?php endforeach; ?>
</ul>

<p>
    <?php echo  RUTA_APP.'/vistas/inc/header.php';?>
</p>
