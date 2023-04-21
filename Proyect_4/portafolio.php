<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php

if($_POST){
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];

    $fecha = new DateTime();

    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];

    $imagen_temporal =$_FILES['archivo']['tmp_name'] ;

    move_uploaded_file($imagen_temporal, "img/" . $imagen);

    $objConexion= new Conexion();
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
    $id=$objConexion->ejecutar($sql);

    header("location:portafolio.php");

}

if($_GET)
{
   
    $id=$_GET['borrar'];
    $objConexion= new Conexion();

    $imagen= $objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);

    unlink("img/".$imagen[0]['imagen']);

    $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id;
    $objConexion->ejecutar($sql);
}

$objConexion= new Conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

// print_r($resultado);

?>

    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto.
                </div>
                <br/>  
                <div class="card-body">
                        <form action="portafolio.php" method="post" enctype="multipart/form-data">
                            Nombre del proyecto: <input required class="form-control" type="text" name="nombre" id="">
                            <br/>
                            Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
                            <br/>
                                Descripcion:
                            <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
                            <br/>
                            <input class="btn btn-success"  type="submit" value="Enviar Proyecto ">    
                        </form>
                    </div>
                </div>        
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Descripcion</th>
                                <th>Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proyectos as $proyecto) { ?>
                            <tr class="">
                                <td scope="row"><?= $proyecto['id'];?></td>
                                <td><?php echo $proyecto['nombre'];?></td>
                                <td>
                                    <img width="100px" src="img/<?php echo $proyecto['imagen'];?>" alt=""> </td>
                                <td><?php echo $proyecto['descripcion'];?></td>
                                <td> <a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>" role="button">Eliminar</a></td>
                            <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>


    


<?php include("footer.php");?>