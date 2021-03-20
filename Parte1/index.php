<!DOCTYPE html>
    <html>
    <head>
    <title>Pregunta 1 Parcial</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("#cursoA").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
      var opcion = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
      var dataString = "data="+ opcion; /* STORE THAT TO A DATA STRING */

      $.ajax({ /* THEN THE AJAX CALL */
        type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
        url: "recorridoA.php", /* PAGE WHERE WE WILL PASS THE DATA */
        data: dataString, /* THE DATA WE WILL BE PASSING */
        success: function(result){ /* GET THE TO BE RETURNED DATA */
          $("#contA").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
        }
      });

    });
  }); 

  $(document).ready(function(){ 
    $("#cursoB").change(function(){ 
      var opcion = $(this).val(); 
      var dataString = "data="+ opcion; 

      $.ajax({
        type: "POST",
        url: "recorridoB.php", 
        data: dataString,
        success: function(result){
          $("#contB").html(result); 
        }
      });

    });
  }); 


  $(document).ready(function(){ 
    $("#cursoC").change(function(){ 
      var opcion = $(this).val(); 
      var dataString = "data="+ opcion; 

      $.ajax({ 
        type: "POST", 
        url: "recorridoC.php", 
        data: dataString, 
        success: function(result){ 
          $("#contC").html(result); 
        }
      });

    });
  }); 
</script>

    <meta charset="utf-8" />
    </head>
    <body>
<label for="standard-select">Seleccionar un curso de idiomas  (Recorrido A)</label>
<div class="select">
<select   id="cursoA" name="curso">
  <option value="Ingles">Ingles</option>    
  <option value="Frances">Frances</option>    
  <option value="Aleman">Aleman</option>    
  <option value="Ruso">Ruso</option>    
  <option value="Chino Mandarin">Chino Mandarin</option>   
</select>
  <span class="focus"></span>
</div>
<div id="contA">
  <!-- ITEMS TO BE DISPLAYED HERE -->
</div>


<label for="standard-select">Seleccionar un curso de idiomas  (Recorrido B)</label>
<div class="select">
<select   id="cursoB" name="curso">
  <option value=0>Ingles</option>    
  <option value=1>Frances</option>    
  <option value=2>Aleman</option>    
  <option value=3>Ruso</option>    
  <option value=4>Chino Mandarin</option>   
</select>
  <span class="focus"></span>
</div>
<div id="contB">
</div>


<label for="standard-select">Seleccionar un curso de idiomas (Recorrido C)</label>
<div class="select">
<select   id="cursoC" name="curso">
  <option value=0>Ingles</option>    
  <option value=1>Frances</option>    
  <option value=2>Aleman</option>    
  <option value=3>Ruso</option>    
  <option value=4>Chino Mandarin</option>   
</select>
  <span class="focus"></span>
</div>
<div id="contC">
</div>

    </body>
    </html>