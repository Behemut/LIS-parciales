
<?php
      include ('inc/header.php');
      include ('inc/logNav.php');
?>

<div class="container">
    <div class="jumbotron" id="printablePart2">
      <div class="container">
          <h1 class="display-2"><?php echo $_SESSION['fullname']; ?></h1>
      </div>
    </div>
        <?php

        ?>
    <div id="printablePart">
      <table class="table">
      <thead class="thead-dark">
          <tr>
          <th scope="col"><strong># Reservacion</strong></th>
          <th scope="col"><strong>Num° Viaje</strong></th>
          <th scope="col"><strong>Fecha de Salida</strong></th>
          <th scope="col"><strong>Hora de Salida</strong></th>
          <th scope="col"><strong>N° de Personas</strong></th>
          <th scope="col" id="d-print-none"><strong>Actualizar</strong></th>
          <th scope="col" id="d-print-none"><strong>Eliminar</strong></th>
          </tr>
      </thead>
      <tbody>
      <?php
          $numCliente  = $_SESSION['numCliente'];
          $sql0 = "
              SELECT idCliente
              FROM cliente
              WHERE numCliente = '$numCliente'
          ";

          $result0     = query($sql0);
          confirm($result0);
          $row0        = fetch_data($result0);
          $idClient    = $row0['idCliente'];

          $sql         = "SELECT * FROM reservacion R WHERE R.idCliente = '$idClient'";
          $result      = query($sql);
          confirm($result);

          if (row_count($result) > 0){
              $count = 1;
              while($fetch = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
          <th scope="row"><?php echo $count++; ?></th>
          <td><?php echo $fetch['idCircuito']; ?></td>
          <td><?php echo $fetch['fechaSalida']; ?></td>
          <td><?php echo $fetch['horaSalida']; ?></td>
          <td><?php echo $fetch['numPersonas']; ?></td>
            <td  id="d-print-none">
                <button type="button" data-id = "<?php echo $fetch['idReservacion']; ?>" class="btn btn-link edit_data">
                    <span class="glyphicon glyphicon-cog" style="color:green"></span>
                </button>
            </td>
            <td  id="d-print-none"> 
                <a href=<?php echo 'deleteQuery.php?idR='.$fetch['idReservacion'] ?> class="btn btn-link">
                    <span class="glyphicon glyphicon-trash" style="color:red"></span>
                </a>
            </td>
          </tr>
      <?php
              }
          }
      ?>
      </tbody>
      </table>
    </div>
    <button class="btn btn-link" id="printBtn" style="float: right;">
          <span class="glyphicon glyphicon-print"></span>
    </button>
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Reservacion</h4>
        </div>

        <div class="modal-body">
          <form method="GET" id="my_form">
                <input type="hidden" value="" id="idR">
                <input type="text"   name="fechasalida" id="fechaSalida" class="form-control input datepicker" value="Mm/Dd/Yy">
                <br>
                <br>
                <input type="time"   name="horasalida" id="horaSalida" class="form-control" value="10:00">
                <br>
                <br>
                <div class="text-center">
                    <a href="" class="btn btn-success" id="modalEdit">Modificar información</a>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $(".edit_data").click(function(){
    $("#myModal").modal();
  });
});

$('.edit_data').click(function(){
    //get cover id
    var idR = $(this).data('id');
    //set href for cancel button
    $('#idR').attr('value',idR);
});
$('#modalEdit').click(function(){
    //get cover id
    var horasalida = $('#horaSalida').val();
    var fechasalida = $('#fechaSalida').val();
    var idR = $('#idR').val();
    //set href for cancel button
    $('#modalEdit').attr('href','updateQuery.php?idR='+idR+'&horaSalida='+horasalida+'&fechaSalida='+fechasalida);
});

</script>
<script src="js/print.js"></script>
<?php
          include ('inc/footer.php');
?>