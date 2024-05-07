<?php
    $termino_busqueda = "%{$termino}%"; 

    $sql = "SELECT * FROM recetas WHERE titulo LIKE %";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $termino_busqueda);

    $stmt->execute();

    $result = $stmt->get_result();

    while ($receta = $result->fetch_assoc()) {
        echo $receta['titulo'];
    }
?>
