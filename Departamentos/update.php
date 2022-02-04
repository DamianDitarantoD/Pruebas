<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["ID"]) && !empty($_POST["ID"])){
    // Get hIDden input value
    $ID = $_POST["ID"];
    
    // // ValIDate name
     $input_name = trim($_POST["Nombre"]);
     if(empty($input_name)){
     $name_err = "Por favor ingrese un nombre.";
     } else{
        $name = $input_name;
     }
    
    // // ValIDate address address
    // $input_address = trim($_POST["address"]);
    // if(empty($input_address)){
    //     $address_err = "Por favor ingrese una dirección.";     
    // } else{
    //     $address = $input_address;
    // }
    
    // // ValIDate salary
    // $input_salary = trim($_POST["salary"]);
    // if(empty($input_salary)){
    //     $salary_err = "Por favor ingrese el monto del salario del empleado.";     
    // } elseif(!ctype_digit($input_salary)){
    //     $salary_err = "Por favor ingrese un valor positivo y válIDo.";
    // } else{
    //     $salary = $input_salary;
    // }
    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE Departamentos SET Nombre=? WHERE ID=?";



        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters

                        // Set parameters
                        $param_name = $name;
                        //$param_address = $address;
                        $param_ID = $ID;

            mysqli_stmt_bind_param($stmt, "si", $param_name, $param_ID);
            

            
            // Attempt to execute the prepared statement
            echo "<br>";
            echo "este es el param_name ". $param_name;
            echo "este es el param_ID ". $param_ID;
            echo "<br>";

            if(mysqli_stmt_execute($stmt)){


                 //Records updated successfully. Redirect to landing page
                 header("location: http://192.168.1.80/Departamentos/Departamentos.php");
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
        $sql = "SELECT * FROM Departamentos WHERE ID = ?";
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
                    $name = $row["Nombre"];
                   // $address = $row["ID"];
                    //$salary = $row["salary"];
                } else{
                    // URL doesn't contain valID ID. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again late9999r.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain ID parameter. Redirect to error page
        header("location: error.php");
        exit();
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

                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $name; ?>">

                            <!-- <label>Direccion</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea> -->

                            <!-- <label>Sueldo</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>"> -->
                            
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Departamentos/Departamentos.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>