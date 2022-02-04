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
    $input_name = trim($_POST["Nombre"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $name = $input_name;
    }

      
   // Check input errors before inserting in database  
   if(empty($name_err) ){
       // Prepare an update statement
        $sql = "INSERT INTO Empresa (Nombre) VALUES (?)";

        if($stmt = mysqli_prepare($link, $sql)){
             // Bind variables to the prepared statement as parameters
             mysqli_stmt_bind_param($stmt, "s", $param_name);
             // Set parameters
             $param_name = $name;

                // Attempt to execute the prepared statement
                echo "<br>";
                echo "este es el param_name ". $param_name;
                echo "este es el param_ID ". $param_ID;
                echo "<br>";     

                        if(mysqli_stmt_execute($stmt)){
                            // Records created successfully. Redirect to landing page
                            header("location: http://192.168.1.80/Empresa/Empresa.php");
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
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $name; ?>">
                          
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Empresa/Empresa.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>