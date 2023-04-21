<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php 
$objConexion= new Conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");
?>
    
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Bienvenid@s</h1>
          <p class="col-md-8 fs-4">Esto es un portafolio privado</p>
          <button class="btn btn-primary btn-lg" type="button">Mas informacion</button>
        </div>
      </div>

    <?php foreach ($proyectos as $proyecto) { ?>


    <div class="card-group">
        <div class="card">
          <img src="img/<?php echo $proyecto['imagen'];?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
            <p class="card-text"><?php echo $proyecto['descripcion'];?></p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          </div>
        </div>
    </div>
  <?php } ?>
</div>


<?php include("footer.php");?>