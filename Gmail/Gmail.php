<?php
require_once "../config.php";
require_once "../header.php";
?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Gmail</h2>
                        <a href="http://192.168.1.80/Gmail/create.php" class="btn btn-success pull-right">Agregar</a>
                    </div>
                    <?php
                  
                    // Attempt select query execution
                    $sql = "SELECT C.*, D.Nombre FROM Coste_Gmail C LEFT JOIN Departamentos D ON D.ID =C.Departamentos_ID ";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>importe</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Estado</th>";
                                        echo "<th>Detalles</th>";
                                        echo "<th>Departamento</th>";
                                        echo "<th>Acciones</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['Importe'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        echo "<td>" . $row['Estado'] . "</td>";
                                        echo "<td>" . $row['Detalles'] . "</td>";
                                        echo "<td>" . $row['Nombre'] . "</td>";
                                        echo "<td>";
                                           // echo "<a href='read.php?id=". $row['ID'] ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?ID=". $row['ID'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['ID'] ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>