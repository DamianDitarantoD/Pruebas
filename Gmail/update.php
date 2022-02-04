<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$name = $address = $Import =  $Detall = $Dep = "";
$name_err = $address_err = $Import_err = $Detall_err = $Dep_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["ID"]) && !empty($_POST["ID"])){
    // Get hIDden input value
    $ID = $_POST["ID"];
    
    // // ValIDate name
     $input_name = trim($_POST["Estado"]);
     if(empty($input_name)){
     $name_err = "Por favor ingrese un nombre.";
     } else{
        $name = $input_name;
     }

    // // ValIDate name
    $input_dep = trim($_POST["Departamentos_ID"]);
    if(empty($input_dep)){
    $Dep_err = "Por favor ingrese un nombre.";
    } else{
       $Dep = $input_dep;
    }
    
    // ValIDate address address
    $input_address = trim($_POST["Email"]);
    if(empty($input_address)){
        $address_err = "Por favor ingrese una dirección.";     
    } else{
        $address = $input_address;
    }

      // ValIDate address address
      $input_Import= trim($_POST["Importe"]);
      if(empty($input_Import)){
          $Import_err = "Por favor ingrese una dirección.";     
      } else{
          $Import = $input_Import;
      }

    // // ValIDate name
    $input_det = trim($_POST["Detalles"]);
    if(empty($input_det)){
    $Detall_err = "Por favor ingrese un nombre.";
    } else{
       $Detall = $input_det;
    }
       
    // Check input errors before inserting in database  
    if(empty($name_err)){
        // Prepare an update statement
        $sql = "UPDATE Coste_Gmail SET  Estado=?, Email=?, Importe=?, Detalles=?, Departamentos_ID=? WHERE ID=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_address, $param_Import, $param_Detall,$param_Dep, $param_ID);
                        // Set parameters
                        $param_name = $name;
                        $param_address = $address;
                        $param_Import = $Import;
                        $param_Detall = $Detall;
                        $param_Dep = $Dep;
                        $param_ID = $ID;

            // Attempt to execute the prepared statement
            echo "<br>";
            echo "este es el param_name ". $param_name;
            echo "este es el param_ID ". $param_ID;
            echo "<br>";

            if(mysqli_stmt_execute($stmt)){


                 //Records updated successfully. Redirect to landing page
                 header("location: http://192.168.1.80/Gmail/Gmail.php");
                 exit();
            } else{
                echo "Something went wrong. Please try again later6666666.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of ID parameter before processing further
    if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){
        // Get URL parameter
        $ID =  trim($_GET["ID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM Coste_Gmail WHERE ID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_ID);
            
            // Set parameters
            $param_ID = $ID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve indivIDual field value
                    $name = $row["Estado"];
                    $address = $row["Email"];
                    $Import = $row["Importe"];
                    $Dep  = $row["Departamentos_ID"];
                    $Detall  = $row["Detalles"];
                    
                } else{
                    // URL doesn't contain valID ID. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again late9999r.";
            }
        }
        
   
    }  else{
        // URL doesn't contain ID parameter. Redirect to error page
        header("location: error.php");
        exit();
             // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }
}
require_once "../header.php";
?>
 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar Registro</h2>
                    </div>
                    <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                            <label>Estado</label>
                            <select name="Estado" class="form-control">
                            <option value="Activada">Activada</option> 
                            <option value="Desactivada">Desactivada</option> 
                            </select>

                            <label>Email</label>
                            <input type="text" name="Email" class="form-control" value="<?php echo $address; ?>">

                            <label>Importe</label>
                            <input type="text" name="Importe" class="form-control" value="<?php echo $Import; ?>">
                            
                            <label>Departamento</label>
                            <select name="Departamentos_ID" class="form-control">
                            <option value="%">Selecciona Departamento</option>
                            <?php
                            $sql="SELECT Nombre FROM Departamentos order by Nombre ASC";
                            $result=mysqli_query($link,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Nombre']; ?></option>
                            <?php
                            }
                            ?>
                            </select>

                            <label>Detalles</label>
                            <textarea name="Detalles" class="form-control"><?php echo $Detall; ?></textarea>
                           
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Gmail/Gmail.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>