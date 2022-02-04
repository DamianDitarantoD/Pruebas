<?php
require_once "../config.php";
require_once "../header.php";
?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Empleados</h2>
                        <a href="http://192.168.1.80/Empleados/create.php" class="btn btn-success pull-right">Agregar</a>
                    </div>
                    <?php
                  
                    // Attempt select query execution
                    $sql = " SELECT E.ID,
                    `E`.`Nombre` AS `Nombre`,
                    `E`.`Apellidos` AS `Apellidos`,
SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT O.Email
                    SEPARATOR ','),
                ',',
                1) AS Email_1,
        IF(((SELECT 
                    COUNT(ID_Gmail)
                FROM
                    Empleados_Gmail
                WHERE
                    (ID_Empleados = E.ID)) = 1),
            NULL,
            SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT O.Email
                        SEPARATOR ','),
                    ',',
                    -(1))) AS Email_2,
                    `EM`.`Nombre` AS `Empresa`,
                    `E`.`Estado` AS `Estado IT`,
                    `ME`.`Numero` AS `Movil Empresa`,
                    `E`.`Movil_Personal` AS `Movil Personal`,
                    `ME`.`Numero_Corto` AS `Numero Corto Empresa`,
                    `ME`.`Pin` AS `Pin`,
                    `ME`.`PUK` AS `PUK`,
                    CONCAT(`MM`.`Marca`, ' ', `MM`.`Modelo`) AS `Modelo movil Empresa`,
                    `ME`.`IMEI_1` AS `IMEI_1`,
                    `ME`.`IMEI_2` AS `IMEI_2`,
                    `ME`.`Serial_Number` AS `Numero de Serie`
                FROM
                    (((((`Empleados` `E`
                    LEFT JOIN `Empleados_Gmail` `G` ON ((`E`.`ID` = `G`.`ID_Empleados`)))
                    LEFT JOIN `Coste_Gmail` `O` ON ((`G`.`ID_Gmail` = `O`.`ID`)))
                    LEFT JOIN `Moviles_Empresa` `ME` ON ((`ME`.`Empleados_ID` = `E`.`ID`)))
                    LEFT JOIN `Marcas_Modelos` `MM` ON ((`ME`.`Marcas_Modelos_ID` = `MM`.`ID`)))
                    LEFT JOIN `Empresa` `EM` ON ((`EM`.`ID` = `E`.`Empresa_ID`))) group by E.Nombre, E.Apellidos order by E.ID DESC";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Apellidos</th>";
                                        echo "<th>Email_1</th>";
                                        echo "<th>Email_2</th>";
                                        echo "<th>Empresa</th>";
                                        echo "<th>Estado IT</th>";
                                        echo "<th>Movil Empresa</th>";
                                        echo "<th>Movil Personal</th>";
                                        echo "<th>Numero Corto Empresa</th>";
                                        echo "<th>PIN</th>";
                                        echo "<th>PUK</th>";
                                        echo "<th>Modelo movil Empresa</th>";
                                        echo "<th>IMEI_1</th>";
                                        echo "<th>IMEI_2</th>";
                                        echo "<th>Numero de Serie</th>";
                                        echo "<th>Acciones</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['Nombre'] . "</td>";
                                        echo "<td>" . $row['Apellidos'] . "</td>";
                                        echo "<td>" . $row['Email_1'] . "</td>";
                                        echo "<td>" . $row['Email_2'] . "</td>";
                                        echo "<td>" . $row['Empresa'] . "</td>";
                                        echo "<td>" . $row['Estado IT'] . "</td>";
                                        echo "<td>" . $row['Movil Empresa'] . "</td>";
                                        echo "<td>" . $row['Movil Personal'] . "</td>";
                                        echo "<td>" . $row['Numero Corto Empresa'] . "</td>";
                                        echo "<td>" . $row['Pin'] . "</td>";
                                        echo "<td>" . $row['PUK'] . "</td>";
                                        echo "<td>" . $row['Modelo movil Empresa'] . "</td>";
                                        echo "<td>" . $row['IMEI_1'] . "</td>";
                                        echo "<td>" . $row['IMEI_2'] . "</td>";
                                        echo "<td>" . $row['Numero de Serie'] . "</td>";
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