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
    $input_dep = trim($_POST["provincia"]);
    if(empty($input_dep)){
    $Dep_err = "Por favor ingrese un nombre.";
    } else{
       $Dep = $input_dep;
    }

      
   // Check input errors before inserting in database  
   if(empty($name_err) && empty($Dep_err) && empty($address_err)){
       // Prepare an update statement
        $sql = "INSERT INTO Provincia ( provincia) VALUES (?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s",  $param_Dep);
                        // Set parameters
                        $param_Dep = $Dep;

                        if(mysqli_stmt_execute($stmt)){
                            // Records created successfully. Redirect to landing page
                            header("location: http://192.168.1.80/Provincia/Provincia.php");
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

                            <label>Nombre</label>
                            <input type="text" name="provincia" class="form-control" value="<?php echo $Dep; ?>">
                            
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Provincia/Provincia.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>