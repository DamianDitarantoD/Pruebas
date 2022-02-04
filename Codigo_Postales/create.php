<?php
// Include config file
require_once "../config.php";
require_once "../header.php";
 
// Define variables and initialize with empty values
$name = $address = $Import =  $Detall = $Dep = "";
$name_err = $address_err = $Import_err = $Detall_err = $Dep_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // // ValIDate name
    $input_name = trim($_POST["codigo_postal"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $name = $input_name;
    }
    // ValIDate name
    $input_address = trim($_POST["ciudad"]);
    if(empty($input_address)){
    $address_err = "Por favor ingrese un nombre.";
    } else{
        $address = $input_address;
    }

      
   // Check input errors before inserting in database  
   if(empty($name_err) && empty($Dep_err) && empty($address_err)){
       // Prepare an update statement
        $sql = "SELECT f_set_codigo_postal (?,?)";

        echo "Esto es un para name ". $param_name;
        echo "Esto es un para name ". $param_address;

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "is", $param_name, $param_address);
                        // Set parameters
                        $param_name = $name; 
                        $param_address = $address;           

                            echo "Esto es un para name ". $param_name;
                            echo "Esto es un para name ". $param_address;

                        if(mysqli_stmt_execute($stmt)){
                            // Records created successfully. Redirect to landing page
                            //header("location: http://192.168.1.80/Codigo_Postales/Codigo_Postales.php");
                            exit();
                        } else{
                            echo "Something went wrong. Please try again later.";
                        }
                    }
                     
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
                
                // Close connection
                mysqli_close($link);
            }
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

                            <label>Codigo Postal</label>
                            <input type="text" name="codigo_postal" class="form-control" value="<?php echo $name; ?>">

                            <label>Ciudad</label>
                            <input type="text" name="ciudad" class="form-control" value="<?php echo $name; ?>">

                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Codigo_Postales/Codigo_Postales.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>