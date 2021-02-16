<?php
/*
if (isset($_POST['enviar'])){
$moneda_actual = $_POST['moneda1'];
$moneda_conv = $_POST['moneda2'];
}*/

function Conversion($moneda1, $moneda2, $valor)
{           
    $original = $valor;
switch ($moneda1){
    
    case 'dolar':

        if ($moneda2=='euro'){
            
            $valor = $valor * 0.82460821;
            $retorno = "<p class=\"h3\">La conversion de $$original a euro es de: €".round($valor,2). "</p>";
            return $retorno;
        }
        elseif ($moneda2=='libras'){
            $valor = $valor * 0.72445689;
            $retorno = "<p class=\"h3\">La conversion de $$original a libras es de: £".round($valor,2). "</p>";
            return $retorno;
        }
        elseif ($moneda2=='yen'){
            $valor = $valor * 104.8051161;
            $retorno = "<p class=\"h3\">La conversion de $$original a yenes es de: ¥".round($valor,2). "</p>";
            return $retorno;
        }
        else{
            $retorno = "<p class=\"h3\">La conversion de $$original a dolares es de: $".round($valor,2). "</p>";
            return $retorno;
        }

    break;
    case 'euro':
        if ($moneda2 =='dolar'){
            $valor = $valor * 1.212842;
            $retorno = "<p class=\"h3\">La conversion de €$original a dolares es de: $".round($valor,2). "</p>";
            return $retorno;
        }
        elseif ($moneda2  == 'libra'){
            $valor = $valor * 0.878465;
            $retorno = "<p class=\"h3\">La conversion de €$original a libras es de: £".round($valor,2). "</p>";
            return $retorno;
        }
        elseif ($moneda2 =='yen'){
            $valor = $valor * 127.090953;
            $retorno = "<p class=\"h3\">La conversion de €$original a yenes es de: ¥".round($valor,2). "</p>";
            return $retorno;
        }
        else{
            $retorno = "<p class=\"h3\">La conversion de €$original a euro es de: €".round($valor,2). "</p>";
            return $retorno;
        }
        break;
        case "libra":
            if ($moneda2 =='euro'){
                $valor = $valor * 0.878465;
                $retorno = "<p class=\"h3\">La conversion de £$original a euro es de: €".round($valor,2). "</p>";
                return $retorno;
            }
            elseif ($moneda2 == 'dolar'){
                $valor = $valor * 1.380651;
                $retorno = "<p class=\"h3\">La conversion de £$original a euro es de: €".round($valor,2). "</p>";
                return $retorno;
            }
            elseif ($moneda2 =='yen'){
                $valor = $valor * 144.674049;
                $retorno = "<p class=\"h3\">La conversion de £$original a yenes es de: ¥".round($valor,2). "</p>";
                return $retorno;
            }
            else{
                $retorno = "<p class=\"h3\">La conversion de £$original a libras es de: £".round($valor,2). "</p>";
                return $retorno;
            }
    
            break;
     
        
        case "yen":
     
            if ($moneda2 =='euro'){
                $valor = $valor * 0.00786740;
                $retorno = "<p class=\"h3\">La conversion de ¥$original a euro es de: €".round($valor,2). "</p>";
                return $retorno;
            }
            elseif ($moneda2 == 'libra'){
                $valor = $valor * 0.0006911311977;
                $retorno = "<p class=\"h3\">La conversion de ¥$original  a libras es de: £".round($valor,2). "</p>";
                return $retorno;
            }
            elseif ($moneda2=='dolar'){
                $valor = $valor * 0.00954187;
                $retorno = "<p class=\"h3\">La conversion de ¥$original a dolares es de: $".round($valor,2). "</p>";
                return $retorno;
            }
            else{
                $retorno = "<p class=\"h3\">La conversion de ¥$original a yenes es de: ¥".round($valor,2). "</p>";
                return $retorno;
            }
    
            break;
            
        default: 
                return null;      
    }
}

//  echo Conversion("AAAAAA", "EEEEE");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de préstamos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
 <div class="banner">
          <h1>Formulario de conversión</h1>
        </div>
        <div class="item">
          <label for="entrada">Importe:  <span>*</span></label>
          <input type="number" name="entrada"  required/>
        </div>
        <div class="item">
          <label for="moned1">Seleccionar tipo de pago: <span></span></label>
          <select name="moneda1" id="webmenu">           
               <option value="dolar">Dolar</option>
                <option value="euro">Euro</option>
                <option value="libra">Libra Esterlina </option>
                <option value="yen">Yen japones</option> 
         </select>
        </div>
        <div class="item">
          <label for="moneda2">Seleccionar periodo de pago: <span></span></label>
          <select name="moneda2">              
                <option value="dolar">Dolar</option>
                <option value="euro">Euro</option>
                <option value="libra">Libra Esterlina </option>
                <option value="yen">Yen japones</option> 
         </select>
        </div>

        
        <div class="btn-block">
        <input type="submit" name="enviar" value="Ver resultados"> 
        </div>
 </form>

 <?php if (isset($_POST['enviar'])){

echo Conversion($_POST['moneda1'],$_POST['moneda2'], $_POST['entrada']);}
?>

</body>
</html>