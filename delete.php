<?php
// Include config file
require_once "config.php";

// Procesar la operación de eliminación después de la confirmación
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    // Preparar una declaración de eliminación
    $sql = "DELETE FROM Empleados WHERE ID = ?";
       
    if($stmt = mysqli_prepare($link, $sql)){
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Intente ejecutar la declaración preparada
        if(mysqli_stmt_execute($stmt)){
            // Registros eliminados con éxito. Redirigir a la página de destino
            header("location: index.php");
            exit();
        } else{
            echo "Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Verificar la existencia del parámetro de identificación
    if(empty(trim($_GET["id"]))){
        // La URL no contiene el parámetro de identificación. Redirigir a la página de error
       header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Empleado</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
require_once "header.php";
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Borrar Registro</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]);;?>"/>
                            <b>Está seguro que quieres eliminar a:</></br></b>
                                <?php 
                                 $loc = $_GET["id"];
                                  $sql = "SELECT * FROM Empleados WHERE ID = $loc";
                                  if($result = mysqli_query($link, $sql)){
                                      if(mysqli_num_rows($result) > 0){
                                          echo "<table class='table table-bordered table-striped'>";
                                              echo "<thead>";
                                                  echo "<tr>";
                                                      echo "<th>ID</th>";
                                                      echo "<th>Nombre</th>";
                                                      echo "<th>Apellido</th>";
                                                      echo "<th>DNI</th>";
                                                      echo "<th>Movil personal</th>";
                                                  echo "</tr>";
                                              echo "</thead>";
                                              echo "<tbody>";
                                              while($row = mysqli_fetch_array($result)){
                                                  echo "<tr>";
                                                      echo "<td>" . $row['ID'] . "</td>";
                                                      echo "<td>" . $row['Nombre'] . "</td>";
                                                      echo "<td>" . $row['Apellidos'] . "</td>";
                                                      echo "<td>" . $row['DNI'] . "</td>";
                                                      echo "<td>" . $row['Movil_Personal'] . "</td>";
                                                    echo "</td>";
                                                  echo "</tr>";
                                              }
                                              echo "</tbody>";                            
                                          echo "</table>";
                                          // Free result set
                                          mysqli_free_result($result);
                                      } else{
                                          echo "<p class='lead'><em>No se encontraron registros.</em></p>";
                                      }
                                  } 
                                        ?>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </h4>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>