<?php
    //Añadiendo las clases 
    include './Autor.php';
    include './Libros.php';
    
    session_start();

    $errors =[];
    $data =[];
   //Objeto autor
    $autor = new Autor();
    $libro = new Libros();

    //Declaracion de regex

    $regex_nombre= '/^([a-zA-Z \u00f1\u00d1]+)$/';
    $regex_isbn = '/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/g';
    $regex_street= '/[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*/';


//VALIDACION PARA LOS CAMPOS 


if (empty($_POST['titulo'])) {
    $errors['titulo'] = 'Titulo es obligatorio.';
}
/*elseif(!empty($_POST['titulo']) && preg_match($regex_nombre,$_POST['titulo']) ){
    $errors['titulo'] = 'Titulo contiene caracteres especiales.';
}*/

if (empty($_POST['editorial'])) {
    $errors['editorial'] = 'Editorial es obligatorio.';
}
/*elseif(!empty($_POST['editorial']) && preg_match($regex_nombre,$_POST['editorial']) ){
    $errors['editorial'] = 'Editorial contiene caracteres especiales.';
}*/

if (empty($_POST['numedicion'])) {
    $errors['numedicion'] = 'Numero de edicion es obligatorio.';
}
if (empty($_POST['lugarpub'])) {
    $errors['lugarpub'] = 'Lugar de publicación es obligatorio.';
}
/*elseif(!empty($_POST['lugarpub']) && preg_match($regex_street,$_POST['lugarpub']) ){
    $errors['lugarpub'] = 'Lugar de la publicación contiene caracteres especiales.';
}*/

if (empty($_POST['añoed'])) {
    $errors['añoed'] = 'Año de edicion es obligatorio.';
}
if (empty($_POST['numpag'])) {
    $errors['numpag'] = 'Numero de paginas es obligatorio.';
}

if (empty($_POST['notas'])) {
    $errors['notas'] = 'Notas es obligatorio.';
}
if (empty($_POST['isbn'])) {
    $errors['isbn'] = 'ISBN es obligatorio.';
}
/*elseif(!empty($_POST['isbn']) && preg_match($regex_isbn,$_POST['isbn']) ){
    $errors['isbn'] = 'Formato de ISBN no coincide.';
}*/


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}


  if(empty($errors)){
    //Guardando libros por medio de Sesion 
    $libro->crearLibro($_POST['titulo'],$_POST['numedicion'],$_POST['lugarpub'],$_POST['añoed'], $_POST['numpag'], $_POST['isbn'], $_POST['notas'], $_SESSION['autores'],$_POST['editorial']);
    $_SESSION['libros'][] = $libro;
    //Despues de crear un registro del libro se borrara la memoria para autores para el siguiente registro de libros
    unset($_SESSION['autores']);
    }




echo json_encode($data);
?>