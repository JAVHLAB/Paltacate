<!--

Falta:

Revisar si el id de las recetas se obtiene correctamente
Crear un boton para eliminar en cada receta propia (perfil.php)
Puede que este archivo se borre y solo se pase el codigo a perfil.php

-->


<script type="text/javascript">
    function confirmar(){
        return confirm('Deseas eliminar la receta?');
    }
</script>



<?php
    echo"<a href= 'eliminarReceta.php?id=".$filas['id']."'
    onclick = 'return confirmar()'> Eliminar</a>";
?>



<?php
    $id=$_GET['id'];
    include('conexion.php');


    $sql="DELETE FROM recetas WHERE ID_receta='".$id."'";
    $result=mysqli_query($conn,$sql);

    if($result){
        echo "<script>
                alert('La receta se elimino correctamente');
                location.assign('perfil.php');
                </script>";
    }else{
        echo "<script>
                alert('La receta No se elimino');
                location.assign('perfil.php');
                </script>";
    }

    echo"<a href= 'eliminarRecera.php?id=".$filas['id']."'> Eliminar</a>";

?>