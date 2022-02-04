<?php
require_once "config.php";
require_once "header.php";
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
<!--<input type="text" name="busqueda" placeholder="Busca registro en la base de datos" style="width:250px; color:white; background-color: black; font-family:Righteous; vertical-align:middle;">-->
	<select name="champ" style="width:13%; color:white; background-color: black; font-family:Righteous; vertical-align:middle;">
		<option value="%">Selecciona Departamento</option>
		<?php
		$sql="SELECT * FROM Departamentos order by Nombre ASC";
		$result=mysqli_query($link,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		?>
		<option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['ID']." ".$mostrar['Nombre']; ?></option>
		<?php
		}
		?>
	</select>
	<input type="submit" style="color:white; background-color: black; margin-top:5px;" value="Filtrar">
</form>

<?php
	if (isset($_POST["champ"])) {
        $tabla = $_POST["champ"];
        $resultadotabla = mysqli_query($link, $tablas);
        $DEPP=$_POST["champ"];

           
        $sql = "SELECT Nombre FROM Departamentos WHERE ID = $DEPP";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        echo "El departamento selecionado es : ".$row['Nombre'];
        echo '<div class="contenedor"  style="width: 48%; float:left">';

        //CREA UNA CONSULTA EN FUNCION DE LA TABLA Empleados
        $sql = "SELECT *, EM.Nombre as Empresa FROM Empleados E LEFT JOIN Empresa EM ON EM.ID = E.Empresa_ID WHERE Departamentos_ID = $tabla AND Estado = 'activado'";

					if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<br>';
                            echo '<p>Empleados</p>';
                            echo "<table border='1'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Apellidos</th>";
                                        echo "<th>Empresa</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . " &nbsp". $row['Nombre'] ." &nbsp". "</td>";
                                        echo "<td>" . " &nbsp". $row['Apellidos'] ." &nbsp". "</td>";
                                        echo "<td>" . " &nbsp". $row['Empresa'] ." &nbsp". "</td>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                        }
					}
                
                    //CREA UNA CONSULTA EN FUNCION DE LA TABLA Telefonos
                    $sql = "SELECT * FROM Costes_Telefonos WHERE Departamentos_ID = $tabla";
                    $sql1 = mysqli_query($link,"SELECT SUM(Importe) as total FROM Costes_Telefonos WHERE Departamentos_ID = $tabla");
                    $row = mysqli_fetch_array($sql1);
                    $sum = $row['total'];
                   
                    if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>Telefonos</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Numero</th>";
                                            echo "<th>Cuota</th>";
                                            echo "<th>Importe</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Numero'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Cuota'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Importe'] . " €" ." &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>Total</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);                     
                      
                        //CREA UNA CONSULTA EN FUNCION DE LA TABLA 4G
                        $sql = "SELECT * FROM Costes_4G WHERE Departamentos_ID = $tabla";
                        $sql1 = mysqli_query($link,"SELECT SUM(Importe) as total FROM Costes_4G WHERE Departamentos_ID = $tabla");
                        $row = mysqli_fetch_array($sql1);
                        $sum = $row['total'];
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>4G</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Numero</th>";
                                            echo "<th>Importe</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Numero'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Importe'] . " €" . " &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>Total</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);
                        echo '</div>'; 
                        
                        echo '<div class="contenedor" style="width: 48%; float:right">';
                        //CREA UNA CONSULTA EN FUNCION DE LA TABLA Costes_Internet
                        $sql = "SELECT * FROM Costes_Internet WHERE Departamentos_ID = $tabla";
                        $sql1 = mysqli_query($link,"SELECT SUM(Importe) as total FROM Costes_Internet WHERE Departamentos_ID = $tabla");
                        $row = mysqli_fetch_array($sql1);
                        $sum = $row['total'];
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>Internet</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Nombre</th>";
                                            echo "<th>Operador</th>";
                                            echo "<th>Importe</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Nombre'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Operador'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Importe'] . " €" . " &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>Total</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);

                        //CREA UNA CONSULTA EN FUNCION DE LA TABLA Coste_Gmail
                        $sql = "SELECT * FROM Coste_Gmail WHERE Departamentos_ID = $tabla and Estado = 'Activada'";
                        $sql1 = mysqli_query($link,"SELECT SUM(Importe) as total FROM Coste_Gmail WHERE Departamentos_ID = $tabla");
                        $row = mysqli_fetch_array($sql1);
                        $sum = $row['total'];
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>Gmail</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Email</th>";
                                            echo "<th>Precio</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Email'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Importe'] . " €" . " &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>Total</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);

                        //CREA UNA CONSULTA EN FUNCION DE LA TABLA Costes_Ofice365
                        //¿necesita saber que empleado tiene tal cuenta?
                        $sql = "SELECT * FROM Costes_Ofice365 WHERE Departamentos_ID = $tabla";
                        $sql1 = mysqli_query($link,"SELECT SUM(Importe) as total FROM Costes_Ofice365 WHERE Departamentos_ID = $tabla");
                        $row = mysqli_fetch_array($sql1);
                        $sum = $row['total'];
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>Ofice365</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Nombre</th>";
                                            echo "<th>Tipo licencia</th>";
                                            echo "<th>Precio</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Precio'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Importe'] . " €" . " &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>Total</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);

                        //CREA UNA CONSULTA EN FUNCION DE LA TABLA Moviles_Empresa
                        $sql = "SELECT * FROM Moviles_Empresa WHERE Departamentos_ID = $tabla";
                        $sql1 = mysqli_query($link,"SELECT SUM(Importe) as total FROM Costes_Internet WHERE Departamentos_ID = $tabla");
                        $row = mysqli_fetch_array($sql1);
                        $sum = $row['total'];
                        
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<br>';
                                echo '<p>Moviles</p>';
                                echo "<table border='2'>";
                                echo "<tr>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Numero</th>";
                                            echo "<th>Fecha Alta</th>";
                                            echo "<th>Importe</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . " &nbsp". $row['Numero'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Fech_Alta'] . " &nbsp"."</td>";
                                            echo "<td>" . " &nbsp". $row['Importe'] . " €" . " &nbsp"."</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<th>Total</th>";
                                    echo  "<th align='right' colspan='2'>" . $sum . " €" .  " &nbsp" ."</th>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            }
                        }
                        mysqli_free_result($sql1);
                        echo '</div>';
                        mysqli_free_result($result);
                        mysqli_close($link);
	}
?>



