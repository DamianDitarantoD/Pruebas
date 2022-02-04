<?php
// Include config file
require_once "../config.php";

// Procesar la operación de eliminación después de la confirmación
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    // Preparar una declaración de eliminación
    $sql = "DELETE FROM Costes_4G WHERE ID = ?";
       
    if($stmt = mysqli_prepare($link, $sql)){
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Intente ejecutar la declaración preparada
        if(mysqli_stmt_execute($stmt)){
            // Registros eliminados con éxito. Redirigir a la página de destino
            header("location: http://192.168.1.80/4G/4G.php");
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
       header("location: http://192.168.1.80/4G/4G.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
 
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
                                  $sql = "SELECT * FROM Costes_4G WHERE ID = $loc";
                                  if($result = mysqli_query($link, $sql)){
                                      if(mysqli_num_rows($result) > 0){
                                          echo "<table class='table table-bordered table-striped'>";
                                              echo "<thead>";
                                                  echo "<tr>";
                                                      echo "<th>ID</th>";
                                                      echo "<th>Numero</th>";
                                                      echo "<th>Importe</th>";
                                                  echo "</tr>";
                                              echo "</thead>";
                                              echo "<tbody>";
                                              while($row = mysqli_fetch_array($result)){
                                                  echo "<tr>";
                                                      echo "<td>" . $row['ID'] . "</td>";
                                                      echo "<td>" . $row['Numero'] . "</td>";
                                                      echo "<td>" . $row['Importe'] . "</td>";
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
                                    <a href="http://192.168.1.80/4G/4G.php" class="btn btn-default">No</a>
                                </h4>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
 </html>