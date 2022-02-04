<?php
// Include config file
require_once "../config.php";
require_once "../header.php";
 
// Define variables and initialize with empty values
$Numero = $PUK = $IMEI_1 =  $IMEI_2 = $Serial_Number = $Estado = $Fech_Alta = $Tarifa = $Importe = $Numero_contrato = $Departamentos_ID = $Marcas_Modelos_ID = $Pin = $Numero_Corto ="";
$name_err = $address_err = $Import_err = $Detall_err = $Dep_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // // ValIDate name
    $input_name = trim($_POST["Numero"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Numero = $input_name;
    }


   // // ValIDate name
    $input_dep = trim($_POST["PUK"]);
    if(empty($input_dep)){
    $Dep_err = "Por favor ingrese un nombre.";
    } else{
       $PUK = $input_dep;
    }
   
   // ValIDate address address
   $input_address = trim($_POST["IMEI_1"]);
   if(empty($input_address)){
       $address_err = "Por favor ingrese una dirección.";     
   } else{
       $IMEI_1 = $input_address;
   }
      
   // // ValIDate name
   $input_name = trim($_POST["IMEI_2"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $IMEI_2 = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Serial_Number"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Serial_Number = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Estado"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Estado = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Fech_Alta"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Fech_Alta = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Tarifa"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Tarifa = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Importe"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Importe = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Numero_contrato"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Numero_contrato = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Departamentos_ID"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Departamentos_ID = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Marcas_Modelos_ID"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Marcas_Modelos_ID = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Pin"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Pin = $input_name;
   }
   // // ValIDate name
   $input_name = trim($_POST["Numero_Corto"]);
   if(empty($input_name)){
   $name_err = "Por favor ingrese un nombre.";
   } else{
      $Numero_Corto = $input_name;
   }
   

   echo " numero ". $Numero;
   echo " puk ".$PUK;
   echo " IMEI_1 ".$IMEI_1; 
   echo " IMEI_2 ".$IMEI_2;
   echo " Serial_Number ".$Serial_Number;
   echo" Estado ". $Estado;
   echo " Fech_Alta ".$Fech_Alta;
   echo " Tarifa ".$Tarifa;
   echo" Importe ". $Importe;
   echo " Numero_contrato ".$Numero_contrato;
   echo " Departamentos_ID ".$Departamentos_ID;
   echo" Marcas_Modelos_ID ". $Marcas_Modelos_ID;
   echo " Pin ".$Pin;
   echo" Numero_Corto ". $Numero_Corto;

   // Check input errors before inserting in database  
   if(empty($name_err) ){
       // Prepare an update statement
        $sql = "INSERT INTO Moviles_Empresa (Numero, PUK, IMEI_1, IMEI_2, Serial_Number, Estado, Fech_Alta, Tarifa, Importe, Numero_contrato, Departamentos_ID, Marcas_Modelos_ID, Pin, Numero_Corto ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iiiissssisiiii", $param_Numero, $param_PUK, $param_IMEI_1, $param_IMEI_2, $param_Serial_Number, $param_Estado, $param_Fech_Alta,$param_Tarifa, $param_Importe, $param_Numero_contrato, $param_Departamentos_ID, $param_Marcas_Modelos_ID,$param_Pin, $param_Numero_Corto);
                        // Set parameters
                        $param_Numero = $Numero;
                        $param_PUK = $PUK;
                        $param_IMEI_1 = $IMEI_1; 
                        $param_IMEI_2 = $IMEI_2;
                        $param_Serial_Number = $Serial_Number;
                        $param_Estado = $Estado;
                        $param_Fech_Alta = $Fech_Alta;
                        $param_Tarifa = $Tarifa;
                        $param_Importe = $Importe;
                        $param_Numero_contrato = $Numero_contrato;
                        $param_Departamentos_ID = $Departamentos_ID;
                        $param_Marcas_Modelos_ID = $Marcas_Modelos_ID;
                        $param_Pin = $Pin;
                        $param_Numero_Corto = $Numero_Corto; 
                                               
                        if(mysqli_stmt_execute($stmt)){
                            // Records created successfully. Redirect to landing page
                            header("location:http://192.168.1.80/Moviles_Empresa/Moviles_Empresa.php");
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

                            <label>Numero</label>
                            <input type="text" name="Numero" class="form-control" value="<?php echo $Numero; ?>">

                            <label>PUK</label>
                            <input type="text" name="PUK" class="form-control" value="<?php echo $PUK; ?>">

                            <label> IMEI 1</label>
                            <input type="text" name="IMEI_1" class="form-control" value="<?php echo $IMEI_1; ?>">

                            <label> IMEI 2</label>
                            <input type="text" name="IMEI_2" class="form-control" value="<?php echo $IMEI_2; ?>">

                            <label>Serial Number</label>
                            <input type="text" name="Serial_Number" class="form-control" value="<?php echo $Serial_Number; ?>">

                            <label>Estado</label>
                            <input type="text" name="Estado" class="form-control" value="<?php echo $Estado; ?>">

                            <label>Fech Alta</label>
                            </br>
                            <input type="date"  name="Fech_Alta">
                            </br> 

                            <label>Tarifa</label>
                            <input type="text" name="Tarifa" class="form-control" value="<?php echo $Tarifa; ?>">

                            <label>Importe</label>
                            <input type="text" name="Importe" class="form-control" value="<?php echo $Importe; ?>">

                            <label>Numero contrato</label>
                            <input type="text" name="Numero_contrato" class="form-control" value="<?php echo $Numero_contrato; ?>">

                            <label>Pin</label>
                            <input type="text" name="Pin" class="form-control" value="<?php echo $Pin; ?>">

                            <label>Numero Corto</label>
                            <input type="text" name="Numero_Corto" class="form-control" value="<?php echo $Numero_Corto; ?>">

                            <label>Marcas Modelos</label>
                            <select name="Marcas_Modelos_ID" class="form-control">
                            <option value="%">Selecciona Modelo</option>
                            <?php
                            $sql="SELECT * FROM Marcas_Modelos order by Marca ASC";
                            $result=mysqli_query($link,$sql);
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Marca']." ".$mostrar['Modelo']; ?></option>
                            <?php
                            }
                            ?>
                            </select>

                            <label>Departamento</label>
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




                            

                        </br>
                          
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="http://192.168.1.80/Moviles_Empresa/Moviles_Empresa.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>