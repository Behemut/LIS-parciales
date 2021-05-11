<?php
        include ('inc/header.php');
        include ('inc/logNav.php');

        if(($_GET['numPersonas'] != '') && ($_GET['idCliente'] != '') && ($_GET['idCircuito'] != '')){
            $idCliente               = $_GET['idCliente'];
            $numPersonas            = $_GET['numPersonas'];
            $idCircuito              = $_GET['idCircuito'];
        }
            $sql = "SELECT * FROM circuito where idCircuito = '$idCircuito'";
            $result = query($sql);
            confirm($result);
            $row = mysqli_fetch_assoc($result);
    ?>
        <div class="container" >
        <h3 class="display-4 text-center">Reservacion del viaje Num° <?php echo $row['numCircuito']; ?></h3>
        <div class="row">
            <div class="col-lg-6">
                    <h3 class="display-3 text-center" style="color:#191970;">                        
                        <?php 
                            echo $row["temaCircuito"];
                        ?>
                    </h3>
                    <div class="text-center">
                        <?php 
                            echo '<img src="'.$row["imagen_url"].'" alt="" style="width:80%;border-radius: 22%;Border:10px solid #40E0D0;" >'
                        ?>
                    </div>
            </div>

            <div class="col-lg-6" style="margin-top: 100px;">
                        <div>
                            <?php
                                validate_persons_info($numPersonas  , $idCliente);
                            ?>
                        </div>
                        <form action="" method="POST">
                        <?php
                            for ($i = 0 ; $i < $numPersonas  ; $i++){
                        ?>
                            <h1>Información del pasajero Num° <?php echo $i; ?></h1>
                            <br>
                            <input type="text" name="apellido<?php echo $i; ?>" placeholder="Apellido de la persona Num° <?php echo $i; ?>" class="form-control">
                            <br>
                            <input type="text" name="nombre<?php echo $i; ?>" placeholder="Nombre de la persona Num° <?php echo $i; ?>" class="form-control">
                            <br>
                            <input type="text" name="edad<?php echo $i; ?>" placeholder="Edad de la persona Num° <?php echo $i; ?>" class="form-control">
                            <br>
                        <?php
                            }
                        ?>
                        <div class="text-center">
                            <input type="submit" value="Guardar información" name="cc" class="btn btn-primary">
                        </div>
                        </form>
                <br>
                <br>
            </div>
        </div>
        </div>

     <!-- <script src="js/nbrPersonne.js"></script> -->


                        <!-- 
                        <div class="form-group">
                            <h1>Info Personne Num° 1</h1>
                            <br>
                            <input type="text" name="nomP1" placeholder="Nom personne Num° 1" class="form-control">
                            <br>
                            <input type="text" name="prenomP1" placeholder="Prénom personne Num° 1" class="form-control">
                            <br>
                            <input type="text" name="ageP1" placeholder="Age personne Num° 1" class="form-control">
                            <br>
                        </div> 
                        -->