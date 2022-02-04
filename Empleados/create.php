<?php
// Include config file
require_once "../config.php";
require_once "../header.php";
 
// Define variables and initialize with empty values
$name = $Movilper = $Apellidos = $detalles = $Rol = $Usr_Si = $Usr_Na = $Usr_Int = $Pwd_Int = $Direc =$Email_Per = $Dni = $Pwd_Si = $Pwd_Na = $Dep = $Est = $Empresa = $Cod = $provin = $proyec = $funci = $Localica = $Num = "";
$name_err = $Movilper_err = $Apellidos_err = $detalles_err = $Rol_err = $Usr_Si_err = $Usr_Na_err = $Usr_Int_err = $Pwd_Int_err = $Direc_err =$Email_Per_err = $Dni_err = $Pwd_Si_err = $Pwd_Na_err = $Dep_err = $Est_err = $Emp_err = $Cod_err = $provin_err = $proyec_err = $funci_err = $Localica_err = $Num_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    // // ValIDate name
    $input_name = trim($_POST["Nombre"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $name = $input_name;
    }
     
    // // ValIDate name
    $input_Movilper = trim($_POST["Movil_Personal"]);
    if(empty($input_Movilper)){
    $Movilper_err = "Por favor ingrese un nombre.";
    } else{
       $Movilper = $input_Movilper;
    }
          
    // // ValIDate name
    $input_name = trim($_POST["Apellidos"]);
    if(empty($input_name)){
    $Apellidos_err = "Por favor ingrese un nombre.";
    } else{
       $Apellidos = $input_name;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Detalles"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $detalles = $input_detalles;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Rol_Actual"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Rol = $input_Rol;
    }
        
    // // ValIDate name
    $input_name = trim($_POST["Ususario_Sigri"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Usr_Si = $input_Usr_Si;
    }
     
    // // ValIDate name
    $input_name = trim($_POST["Usuario_NAOS"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Usr_Na = $input_Usr_Na;
    }
          
    // // ValIDate name
    $input_name = trim($_POST["Usuario_Intranet"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Usr_Int = $input_Usr_Int;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Contrasena_Intranet"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Pwd_Int = $input_Pwd_Int;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Direccion"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Direc = $input_Direc;
    }
    
    // // ValIDate name
    $input_name = trim($_POST["Correo_Personal"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Email_Per = $input_Email_Per;
    }
     
    // // ValIDate name
    $input_name = trim($_POST["DNI"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Dni = $input_Dni;
    }
          
    // // ValIDate name
    $input_name = trim($_POST["Contrasena_Sigri"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Pwd_Si = $input_Pwd_Si;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["contrasena_NAOS"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Pwd_Na = $input_Pwd_Na;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Departamentos_ID"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Dep = $input_Dep;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Estado"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Est = $input_name;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Empresa"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Empresa = $input_name;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["COD_Postal_ID"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Cod = $input_Cod;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Provincia_ID"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $provin = $input_provin;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Proyectos_ID"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $proyec = $input_proyec;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Funcion_ID"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $funci = $input_name;
    }
         
    // // ValIDate name
    $input_name = trim($_POST["Localidad_ID"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Localica = $input_Localica;
    }
         
     // // ValIDate name
    $input_name = trim($_POST["Email_1"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Email_1 = $input_name;
    }

       // // ValIDate name
    $input_name = trim($_POST["Email_2"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Email_2 = $input_name;
    }


 
    // Check input errors before inserting in database  
    if(empty($detalles_err)){
        // Prepare an update statement
        $sql = "INSERT INTO Empleados (Nombre, Movil_Personal, Apellidos, Estado, Empresa_ID ) 
        VALUES (?,?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sissi", $param_name, $param_Movilper, $param_Apellidos , $param_Est, $param_Emp);
                        // Set parameters
                        $param_name = $name; 
                        $param_Movilper = $Movilper; 
                        $param_Apellidos = $Apellidos; 
                        $param_Est = $Est ;
                        $param_Emp = $Empresa ;

                        echo "Nombre:  " . $name ;
                        echo "<br>";
                        echo " Movil personal: " . $Movilper ;
                        echo "<br>";
                        echo " Apellidos: " . $Apellidos;
                        echo "<br>";
                        echo "Estado:  " . $Est ;
                        echo "<br>";
                        echo " Empresa: " . $Empresa;
                        echo "<br>";
                        echo " "  ;


                        if(mysqli_stmt_execute($stmt)){
                            // Records created successfully. Redirect to landing page
                            if(empty($Email_1) && empty($Email_2) ){
                              header("location: http://192.168.1.80/Empleados/Empleados.php");
                              exit();
                            }
                            
                        } else{
                            echo "Something went wrong. Please try again later.";
                        }
                    }
                     
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
               // mysqli_close($link);
               $sql1 = "SELECT ID FROM Empleados WHERE Nombre = '".$name."' and Apellidos = '".$Apellidos."'";
               $result = mysqli_query($link,$sql1);
               $row = mysqli_fetch_array($result);
               $ID_Empleados=$row['ID'];

                if(empty($detalles_err) && !empty($Email_1)){
                 // Prepare an update statement
                  $sql= "INSERT INTO Empleados_Gmail VALUES (?,?)";
                   if($stmt = mysqli_prepare($link, $sql)){
                      // Bind variables to the prepared statement as parameters
                       mysqli_stmt_bind_param($stmt, "ii", $param_ID_Gmail, $param_ID_Empleados);
                                   //Set parameters
                                   $param_ID_Gmail = $Email_1;
                                   $param_ID_Empleados = $ID_Empleados;           
               
                                   if(mysqli_stmt_execute($stmt) && empty($Email_2) ){
                                      // Records created successfully. Redirect to landing page
                                       header("location: http://192.168.1.80/Empleados/Empleados.php");
                                       exit();
                                    } else{
                                       echo "Something went wrong. Please try again later.";
                                          }  
                               }
                                
                               mysqli_stmt_close($stmt);
                              }
                              if(empty($detalles_err) && !empty($Email_2)){
                                 // Prepare an update statement
                                  $sql= "INSERT INTO Empleados_Gmail VALUES (?,?)";
                                   if($stmt = mysqli_prepare($link, $sql)){
                                      // Bind variables to the prepared statement as parameters
                                       mysqli_stmt_bind_param($stmt, "ii", $param_ID_Gmail, $param_ID_Empleados);
                                                   //Set parameters
                                                   $param_ID_Gmail = $Email_2;
                                                   $param_ID_Empleados = $ID_Empleados;           
                               
                                                   if(mysqli_stmt_execute($stmt)){
                                                      // Records created successfully. Redirect to landing page
                                                       header("location: http://192.168.1.80/Empleados/Empleados.php");
                                                       exit();
                                                    } else{
                                                       echo "Something went wrong. Please try again later.";
                                                          }  
                                               }
                                                
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
                            
                            <label>Apellidos</label>
                            <input type="text" name="Apellidos" class="form-control" value="<?php echo $Apellidos; ?>">

                            <label>Email_1</label>
                            <select name="Email_1" class="form-control">
                            <?php
                            $sql="SELECT * FROM Coste_Gmail";
                            $result=mysqli_query($link,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Email']; ?></option>
                            <?php
                            }
                            ?>
                            </select>

                            <label>Email_2</label>
                            <select name="Email_2" class="form-control">
                            <?php
                            $sql="SELECT * FROM Coste_Gmail";
                            $result=mysqli_query($link,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Email']; ?></option>
                            <?php
                            }
                            ?>
                            </select>

                            <label>Estados</label>
                            <select name="Estado" class="form-control">
                            <option value="activado">Activada</option> 
                            <option value="desactivado">Desactivada</option> 
                            </select>
                            
                            <label>Moviles_Empresa</label>
                            <select name="Moviles_Empresa" class="form-control">
                            <?php
                            $sql="SELECT * FROM Moviles_Empresa";
                            $result=mysqli_query($link,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Numero']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                            
                            <label>Movil_Personal</label>
                            <input type="text" name="Movil_Personal" class="form-control" value="<?php echo $Movil_Personal; ?>">
                            
                            <label>Empresa</label>
                            <select name="Empresa" class="form-control">
                            <?php
                            $sql="SELECT * FROM Empresa";
                            $result=mysqli_query($link,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Nombre']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Empleados/Empleados.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>