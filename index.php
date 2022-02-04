<?php
require_once "config.php";
require_once "header.php";
//include_once 'Usuarios/login.php';

//CREA UNA CONSULTA EN FUNCION DE LA TABLA 4G
                        $sql1 = mysqli_query($link,"SELECT Nombre FROM Departamentos");
                        /*$sql1 = mysqli_query($link,"SELECT SUM(ID) FROM Empleados WHERE Departamentos_ID = 1");*/
                        $row = mysqli_fetch_array($sql1);
                        $sum = $row['Nombre'];

                       
                        //CREA UNA CONSULTA EN FUNCION DE LA TABLA Costes_Ofice365
                        //¿necesita saber que empleado tiene tal cuenta?
                        $sql = "SELECT 
                        D.Nombre AS Nombres,
                        (SELECT 
                                COUNT(Empleados.ID)
                            FROM
                                Empleados
                            WHERE
                                ((Empleados.Departamentos_ID = D.ID)
                                    AND (Empleados.Estado = 'activado'))) AS Total,
                        (SELECT 
                                COUNT(M.ID)
                            FROM
                                (Moviles_Empresa M
                                JOIN Empleados E ON ((M.Empleados_ID = E.ID)))
                            WHERE
                                ((M.Departamentos_ID = D.ID)
                                    AND (E.Estado = 'activado'))) AS 'Con Linea Movil'
                    FROM
                        Departamentos D";
                        
                        $sum = $row['Con Linea Movil'];
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>Imputación</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Nombre</th>";
                                            echo "<th>total</th>";
                                            echo "<th>Con Linea Movil</th>";
                                            echo "<th> % facturación</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                                                   
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Nombres'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['total'] ." &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Con Linea Movil'] ." &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['facturacion'] ." &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['total'] ." &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>total con lineas</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);
	
                        ?>
</body>
</html>
