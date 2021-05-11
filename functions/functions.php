<?php

    
function clean($string){
    return htmlentities($string);
}
function redirect($location){
    
    return header("Location: {$location}");
}
function set_message($message){
    if (!empty($message)){
        $_SESSION['message'] = $message;
    }else{
        $message = "";
    }
}
function display_message(){
    if (isset( $_SESSION['message'])){
        echo  $_SESSION['message'];
        unset  ($_SESSION['message']);
    }
}

function validation_errors($error_message){
    $error_message = '
    <div class="alert alert-danger alert-danger" role="alert" style="margin-top:0px; margin-bottom: 0px;">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong>Warning!</strong> '.$error_message.'
    </div>';
    return $error_message;
}
function validate_user_registration(){
        
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
         $numCliente    = clean($_POST['numCliente']);
         $apellido        = clean($_POST['apellido']);
         $nombre     = clean($_POST['nombre']);
        $password   = clean($_POST['password']);
         $direccion    = clean($_POST['direccion']);
        $numTel     = clean($_POST['numTel']);
         $sexo       = clean($_POST['sexo']);

        if (empty( $numCliente)){
            $errors[] = "El registro no puede estar vacio"; 
        }else if (strlen( $numCliente) < $max){
            $errors[] = "Numero de cliente no puede ser de menos  ".$max." caracteres.";
        }
        if (empty( $apellido)){
            $errors[] = "Your apellido can't be empty";
        }else if (strlen( $apellido) < $min){
            $errors[] = "Your apellido's length can't be less then ".$min." caracteres.";
        }
        if (empty( $nombre)){
            $errors[] = "Your nombre can't be empty";
        }else if (strlen( $nombre) < $min){
            $errors[] = "Your nombre's length can't be less then ".$min." caracteres.";
        }
        if (empty($password)){
            $errors[] = "Password can't be empty";
        }else if (strlen($password) < $max){
            $errors[] = "Password must be at least ".$max." caracteres";
        }
        //  Checking if there's errors             
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
        }else if ( register_user( $numCliente,  $apellido,  $nombre, $password,  $direccion, $numTel,  $sexo)){
            set_message("<p class='bg-success text-center' >welcome $nombre we are happy you joined us </p>");
        }
    }
}
//  Registration function   
function register_user( $numCliente,  $apellido,  $nombre, $password,  $direccion, $numTel,  $sexo){
       
    //  escaping the data helps us prevent SQL injection
         $numCliente    = escape( $numCliente);
         $apellido        = escape( $apellido);
         $nombre     = escape( $nombre);
        $password   = escape($password);
         $direccion    = escape( $direccion);
        $numTel     = escape($numTel);
         $sexo       = escape( $sexo);

            $password = md5($password);
            $sql  = "INSERT INTO cliente(numCliente, apellido, nombre, direccion, numTel, sexo,password) VALUES('$numCliente','$apellido',' $nombre',' $direccion','$numTel',' $sexo','$password') ";
            $result = query($sql);
            if (confirm($result)){
                return true;
            }
}


function validate_circuit_register(){
    
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $numCircuito = clean($_POST['numCircuito']);
        $tipo = clean($_POST['tipo']);
        $medio = clean($_POST['medio']);
        $duracion = clean($_POST['duracion']);

  
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
  $uploadOk = 1;
} else {
$errors[] = "File is not an image.";
  $uploadOk = 0;
}
// Check if image file is a actual image or fake image


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errors[] = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //
  } else {
    $errors[] = "Sorry, there was an error uploading your file.";
  }
}


        if (empty( $numCircuito)){
            $errors[] = "Número del viaje"; 
        }
        if (empty($tipo)){
            $errors[] = "Tipo de viaje no puede estar vacío"; 
        }

        if (empty($medio)){
            $errors[] = "Medio de transporte no puede estar vacío"; 
        }
        if (empty($duracion)){
            $errors[] = "Duración del viaje no puede estar vacío"; 
        }


        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
    }else{
            
            if ( register_circuit( $numCircuito, $tipo, $medio,$duracion, "uploads/".basename( $_FILES["fileToUpload"]["name"]))   ){
                redirect("registertour.php");
            }


        }
    }    
}


function register_circuit($numCircuito, $tipo, $medio,$duracion, $Imagen){
       
    //  escaping the data helps us prevent SQL injection
    $numCircuito    = escape($numCircuito);
    $tipo      = escape( $tipo);
    $medio     = escape($medio);
    $duracion = escape($duracion);
  
 $sql  = "INSERT INTO `circuito`(`numCircuito`, `temaCircuito`, `duracion`, `medioTransporte`, `imagen_url`) 
  VALUES('$numCircuito',' $tipo',' $duracion ',' $medio', '$Imagen') ";
    $result = query($sql);
            if (confirm($result)){
                return true;
            }
}



function validate_user_login(){
    
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         $numCliente  = clean($_POST['numCliente']);
        $password = clean($_POST['password']);
        if (empty( $numCliente)){
            $errors[] = "Campo de Id Cliente no puede estar vacío"; 
        }
        if (empty($password)){
            $errors[] = "Campo de contraseña  no puede estar vacío"; 
        }
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
    }else{
            
            if ( login_user( $numCliente,$password)){
                redirect("logindex.php");
            }else{
                echo validation_errors("Credenciales incorrectas");
           }
        }
    }    
}




function login_user( $numCliente,$password){
    $sql = "SELECT idCliente, password, apellido, nombre FROM cliente WHERE numCliente = '". $numCliente."' ";
    $result = query($sql);
    confirm($result);
    if (row_count($result) == 1){
        $row = fetch_data($result);
        $db_password = $row['password'];
        if (md5($password) === $db_password){
            $_SESSION['numCliente'] =  $numCliente;
            $_SESSION['fullname'] = "{$row['apellido']} {$row['nombre']}";
            return true;
        }else{
            return false;
        }
    }
    else{
        $sql = "SELECT Nombre, Apellido, Usuario, Contraseña FROM administradores WHERE usuario = '". $numCliente."' ";
        $result = query($sql);
        confirm($result);
        if (row_count($result) == 1){
            $row = fetch_data($result);
            $db_password = $row['Contraseña'];
            if (md5($password) === $db_password){
                $_SESSION['numCliente'] =  $numCliente;
                $_SESSION['Rol']="Administrador";
                $_SESSION['fullname'] = "{$row['Apellido']} {$row['Nombre']}";
                return true;
            }
            else return false;
            }
    }


    return false;
}
function logged_in(){
    if (isset($_SESSION['numCliente'])){
        return true;
    }else{
        return false;
    }
}

function validate_user_reservation(){
        
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

         $numCliente = $_POST['numCliente'];

        $sql = "SELECT idCliente FROM cliente WHERE numCliente = '$numCliente'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);

        $idCliente       = $row['idCliente'];
        $idCircuito      = $_SESSION['idCircuito'];
        $fechaSalida     = $_POST['fechaSalida'];
        $fechaSalida     = date("Y-m-d h:i:s",strtotime($fechaSalida));
        $horaSalida    = $_POST['horaSalida'];
        $numPersonas    = $_POST['numPersonas'];
        

        if (empty($fechaSalida)){
            $errors[] = "Fecha de salida no puede estar vacío"; 
        }
        if (empty($horaSalida)){
            $errors[] = "Hora de salida no puede estar vacío";
        }
        if (empty( $numCliente)){
            $errors[] = "Numero de cliente no puede estar vacío";
        }

        //  Checking if there's errors             
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
        }else{
            $sql1   = "INSERT INTO reservacion(idCliente, idCircuito, fechaSalida, horaSalida, numPersonas) VALUES('$idCliente','$idCircuito','$fechaSalida','$horaSalida','$numPersonas') ";
            $result1 = query($sql1);
            confirm($result1);
            redirect('reservationPart2.php?numPersonas='.$numPersonas.'&idCliente='.$idCliente.'&&idCircuito='.$idCircuito);

        }
    }
}

function reserve_circuit($idCliente, $idCircuito, $fechaSalida, $horaSalida, $numPersonas){

            $sql   = "INSERT INTO reservacion(idCliente, idCircuito, fechaSalida, horaSalida, numPersonas) VALUES('$idCliente','$idCircuito','$fechaSalida','$horaSalida','$numPersonas') ";
            $result = query($sql);

            if (confirm($result))
            {
                return true;
            }
}

function insertPerData($idCliente,  $apellido,  $nombre, $edad){
    $sql = "INSERT INTO personaCliente(idCliente, apellido, nombre, edad) VALUES ('$idCliente', ' $apellido', ' $nombre', '$edad')";
    $result = query($sql);
    confirm($result);
}

function validate_persons_info($numPersonas, $idCliente){
    $errors = [];
    $np = "apellido";
    $pp = "nombre";
    $ap = "edad";
    $id = $idCliente;
    $i = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cc'])){
        for ($i = 0  ; $i < $numPersonas ; $i++){

            $a = $np.$i;
            $b = $pp.$i;
            $c = $ap.$i;

            $$a = $_POST[$a];
            $$b = $_POST[$b];
            $$c = $_POST[$c];

            if (empty($$a)){
                $errors[] = 'Apellido'.$i.' no puede estar vacío'; 
            }
            if (empty($$b)){
                $errors[] = 'Nombre'.$i.'  no puede estar vacío'; 
            }
            if (empty($$c)){
                $errors[] = 'Edad'.$i.'  no puede estar vacío'; 
            }

            $a = "";
            $b = "";
            $c = "";
        }
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
            }else{
                for ($i = 0 ; $i < $numPersonas ; $i++ ){
                $a = $np.$i;
                $b = $pp.$i;
                $c = $ap.$i;
                
                $aa = $$a;
                $bb = $$b;
                $cc = $$c;

                $sql = "INSERT INTO personaCliente(idCliente, apellido, nombre, edad) VALUES ('$id', '$aa', '$bb', '$cc')";
                $result = query($sql);
                confirm ($result);
                
                $a = "";
                $b = "";
                $c = "";

                }
                redirect("logindex.php");
            }
    }
}

?>