<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
// $ID_Email_1 y $ID_Email_2 almacena la ID de email 1,2 recibido desde la BBDD
// $ID_Empresa almacena la ID de empresa recibida desde la BBDD
$ID_Email_1 = $ID_Email_2 = $ID_Movil_Empresa = "";
$ID = $Nombre = $Apellidos = $Movil_personal =$Email_1 = $Email_2 = $Movil_Empresa = $Empresa = $Estado ="";
$name_err = "";

// Processing form data when form is submitted
if(isset($_POST["ID"]) && !empty($_POST["ID"])){
    // Get hIDden input value
    $ID = $_POST["ID"];
    
    // // ValIDate name
    $input_name = trim($_POST["Nombre"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Nombre = $input_name;
    }
     
    // // ValIDate name
    $input_name = trim($_POST["Apellidos"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Apellidos = $input_name;
    }
          
    // // ValIDate name
    $input_name = trim($_POST["Movil_Personal"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Movil_Personal = $input_name;
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
        
    // // ValIDate name
    $input_name = trim($_POST["Movil_Empresa"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Movil_Empresa = $input_name;
    }
     
    // // ValIDate name
    $input_name = trim($_POST["Empresa"]);
    if(empty($input_name)){
    $name_err = "Por favor ingrese un nombre.";
    } else{
       $Empresa = $input_name;
    }

      // // ValIDate name
      $input_name = trim($_POST["Estado"]);
      if(empty($input_name)){
      $name_err = "Por favor ingrese un nombre.";
      } else{
         $Estado = $input_name;
      }
    
    if(!empty($ID))
    {     
      // Check input errors before inserting in database  
      if(empty($name_err))
      {
         // Prepare an update statement
         $sql = "UPDATE Empleados SET  Nombre=?, Apellidos=?, Estado=?, Movil_Personal=?, Empresa_ID = ? WHERE ID=?";
            
         if($stmt = mysqli_prepare($link, $sql))
         {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssiii", $Nombre, $Apellidos, $Estado, $Movil_Personal, $Empresa, $ID );    
            // Attempt to execute the prepared statement   
            if(!mysqli_stmt_execute($stmt))
           {
               echo "¡Error #L093! No se ha podido actualizar los datos de Empleado" ;
                // Close statement
               mysqli_stmt_close($stmt);
               // Close connection
               mysqli_close($link); 
               exit();           
            }
         } 
            //Inserta , Actualiza , Borra email en la tabla Empleados_Gmail
            //$Email_1 == 0 || empty($Email_1)) && ($ID_Email_1 != 0 || !empty($ID_Email_1)))
            if(($Email_1 == 0 && $ID_Email_1 != 0 ) || (empty($Email_1) && !empty($ID_Email_1)))
               {                  
                  $sql="DELETE from Empleados_Gmail where ID_Gmail=? and ID_Empleados=?";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "ii", $ID_Email_1, $ID);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L108!"; 
                     exit();
                  }
                  
               }elseif($Email_1 != $ID_Email_1 && $Email_1!=0 && !empty($ID_Email_1))
               {
                  $sql="UPDATE Empleados_Gmail set ID_Gmail=? where ID_Empleados=? and ID_Gmail=?";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "iii", $Email_1, $ID, $ID_Email_1);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L119!"; 
                     exit();
                  }
                 
               }elseif($Email_1>0 && empty($ID_Email_1))
               {
                  $sql="INSERT INTO Empleados_Gmail (ID_Gmail, ID_Empleados)values(?,?)";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "ii", $Email_1, $ID);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L132!"; 
                     exit();
                  }                
               }

               if(($Email_2 == 0 && $ID_Email_2 != 0 ) || (empty($Email_2) && !empty($ID_Email_2)))
               {
                  $sql="DELETE from Empleados_Gmail where ID_Gmail=? and ID_Empleados=?";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "ii", $ID_Email_2, $ID);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L143!"; 
                     exit();
                  }
               }elseif($Email_2 != $ID_Email_2 && $Email_2!=0 && !empty($ID_Email_2))
               {
                  $sql="UPDATE Empleados_Gmail set ID_Gmail=? where ID_Empleados=? and ID_Gmail=?";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "iii", $Email_2, $ID, $ID_Email_2);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L153!"; 
                     exit();
                  }
               }elseif($Email_2>0 && empty($ID_Email_2))
               {
                  $sql="INSERT INTO Empleados_Gmail (ID_Gmail, ID_Empleados)values(?,?)";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "ii", $Email_2, $ID);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L163!"; 
                     exit();
                  }
               }

               if($ID_Movil_Empresa!=$Movil_Empresa && !empty($ID_Movil_Empresa))
               {
                  $sql="UPDATE Moviles_Empresa set Empleados_ID=null where ID=?";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "i", $Movil_Empresa);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L175!"; 
                     exit();
                  }
               }elseif(!empty($Movil_Empresa))
               {
                  $sql="UPDATE Moviles_Empresa set Empleados_ID=? where ID=?";
                  $stmt=mysqli_prepare($link, $sql);
                  mysqli_stmt_bind_param($stmt, "ii",$ID, $Movil_Empresa);
                  if(!mysqli_stmt_execute($stmt))
                  {
                     echo "¡Error #L185!"; 
                     exit();
                  }
               }
                 // Close statement
                 mysqli_stmt_close($stmt);
                 // Close connection
                 mysqli_close($link);
                 //Records updated successfully. Redirect to landing page
                 header("location: http://192.168.1.80/Empleados/Empleados.php");
                 exit();
      }

      }else
      {
         echo "¡Error! Falta la ID de empleado";
         //header("location: http://192.168.1.80/Empleados/Empleados.php");
            exit();
         }
       
   } else{
    // Check existence of ID parameter before processing further
    if(isset($_GET["ID"]) && !empty(trim($_GET["ID"])))
    {
        // Get URL parameter
        $ID =  trim($_GET["ID"]);

        // Prepare a select statement
        $sql = "SELECT * FROM Empleados WHERE ID = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $ID);      
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve indivIDual field value  
                    $Nombre = $row["Nombre"];
                    $Apellidos = $row["Apellidos"];
                    $Estado = $row["Estado"];
                    $Movil_Personal  = $row["Movil_Personal"];
                    $Empresa  = $row["Empresa"];
                    
                } else{
                    // URL doesn't contain valID ID. Redirect to error page
                    mysqli_stmt_close($stmt); 
                    // Close connection
                  mysqli_close($link);
                    header("location: error.php");
                    exit();
                }
            } else
            {
                echo "Oops! Something went wrong. Please try again late9999r.";
                mysqli_stmt_close($stmt); 
                    // Close connection
                mysqli_close($link);
            }        
        }
        
         //Obtenemos las ID de los email de empleado en la tabla Empleados_Gmail
         $sql="SELECT ID_Gmail as ID from Empleados_Gmail where ID_Empleados= ?";
         if($stmt=mysqli_prepare($link, $sql))
         {
            mysqli_stmt_bind_param($stmt,"i",$ID);
            if(mysqli_stmt_execute($stmt))
            {
               $result = mysqli_stmt_get_result($stmt);
               $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               $i=mysqli_num_rows($result);            
               if($i>0)
               {
                  $ID_Email_1=$row['ID'];
                  $Email_1=$ID_Email_1;
                  if($i==2 && $ID_Email_1!=$row['ID'])
                  { 
                     $ID_Email_2=$row['ID'];
                     $Email_2=$ID_Email_2;
                  }                           
               }
            }
         }    
         //Obtenemos las ID de los Movil de empresa de empleado en la tabla Moviles_Empresa
         $sql="SELECT ID from Moviles_Empresa where Empleados_ID=?";
         if($stmt=mysqli_prepare($link, $sql))
         {
            mysqli_stmt_bind_param($stmt,"i",$ID);
            if(mysqli_stmt_execute($stmt))
            {
               $result = mysqli_stmt_get_result($stmt);
               $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               $i=mysqli_num_rows($result);            
               if($i>0)
               {
                  $ID_Movil_Empresa=$row['ID'];
                  $Movil_Empresa=$row['ID'];
               }
            }
         } 
         
         echo "ID  : ". $ID;
         echo ";    Email 1   : ". $ID_Email_1;
         echo ";    Email 2   : ". $ID_Email_2;
         echo ";    Movil Empresa   : ". $ID_Movil_Empresa;
        
    }  else
      {
         mysqli_stmt_close($stmt); 
         // Close connection
         mysqli_close($link);
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
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>">

                            <label>Estados</label>
                            <select name="Estado" class="form-control">
                            <option value="activado">Activada</option> 
                            <option value="desactivado">Desactivada</option> 
                            </select>

                            <label>Apellidos</label>
                            <input type="text" name="Apellidos" class="form-control" value="<?php echo $Apellidos; ?>">
                            
                            <label>Movil Personal</label>
                            <input type="text" name="Movil_Personal" class="form-control" value="<?php echo $Movil_Personal; ?>">
                           
                            <label>Movil Empresa</label>
                            <select name="Movil_Empresa" class="form-control">
                              <option value="%">Seleccione Movil de Empresa</option>
                              <?php
                                 $sql="SELECT ID, Numero FROM Moviles_Empresa";
                                 $result=mysqli_query($link,$sql);
                                 while($mostrar=mysqli_fetch_array($result))
                                 {
                                    ?>
                                       <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Numero']; ?></option>
                                    <?php
                                 }
                              ?>                            
                            </select>

                            <label>Empresa</label>
                            <select name="Empresa" class="form-control">
                              <option value="%">Seleccione Empresa</option>
                              <?php
                                 $sql="SELECT ID, Nombre FROM Empresa";
                                 $result=mysqli_query($link,$sql);
                                 while($mostrar=mysqli_fetch_array($result))
                                 {
                                    ?>
                                       <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Nombre']; ?></option>
                                    <?php
                                 }
                              ?>
                            </select>

                            <label>Email 1</label>
                            <select name="Email_1" class="form-control" >
                              <option value="%">Seleccione Email 1</option>
                              <?php
                                 $sql="SELECT ID, Email as Nombre FROM Coste_Gmail";
                                 $result=mysqli_query($link,$sql);
                                 while($mostrar=mysqli_fetch_array($result))
                                 {
                                    ?>
                                       <option value="<?php echo $mostrar['ID']=1; ?>"><?php echo $mostrar['Nombre']; ?></option>
                                    <?php
                                 }
                              ?>
                            </select>

                            <label>Email 2</label>
                            <select name="Email_2" class="form-control">
                              <option value="%">Seleccione Email 2</option>
                              <?php
                                 $sql="SELECT ID, Email as Nombre FROM Coste_Gmail";
                                 $result=mysqli_query($link,$sql);
                                 while($mostrar=mysqli_fetch_array($result))
                                 {
                                    ?>
                                       <option value="<?php echo $mostrar['ID']; ?>"><?php echo $mostrar['Nombre']; ?></option>
                                    <?php
                                 }    
                              ?>                        
                            </select>

                           <br>
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