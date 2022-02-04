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
    if(empty($name_err) && empty($Detall_err) && empty($Import_err) && empty($address_err) && empty($Dep_err)){
        // Prepare an update statement
        $sql = "INSERT INTO Coste_Gmail (Estado, Email, Importe, Detalles, Departamentos_ID) VALUES (?,?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_address, $param_Import, $param_Detall,$param_Dep);
                        // Set parameters
                        $param_name = $name;
                        $param_address = $address;
                        $param_Import = $Import;
                        $param_Detall = $Detall;
                        $param_Dep = $Dep;
                        

                        if(mysqli_stmt_execute($stmt)){
                            // Records created successfully. Redirect to landing page
                            header("location: http://192.168.1.80/Gmail/Gmail.php");
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

                            <label>Estado</label>
                            <select name="Estado" class="form-control">
                            <option value="Activada">Activada</option> 
                            <option value="Desactivada">Desactivada</option> 
                            </select>

                            <label>Email</label>
                            <input type="text" name="Email" class="form-control" value="<?php echo $address; ?>">

                            <label>Importe</label>
                            <input type="text" name="Importe" class="form-control" value="<?php echo $Import; ?>">
                            
                            <label>Detalles</label>
                            <textarea name="Detalles" class="form-control"><?php echo $Detall; ?></textarea>

                            <select name="Departamentos_ID" class="form-control">
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