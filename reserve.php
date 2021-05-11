    <?php
        include ('inc/header.php');
        include ('inc/logNav.php');
        if (!isset($_SESSION['numCliente'])){
            redirect("login.php");
        }
        if($_GET['idc'] != ''){
            $id = $_GET['idc'];
            $_SESSION['idCircuito'] = $id;
        }
            $sql = "SELECT * FROM circuito where idCircuito = '$id'";
            $result = query($sql);
            confirm($result);
            $row = mysqli_fetch_assoc($result);
    ?>
        <div class="container" >
        <h3 class="display-4 text-center">Reservacion de su viaje N° <?php echo $row['numCircuito']; ?></h3>
        <div class="row">
            <div class="col-lg-6">
                    <h3 class="display-3 text-center" style="color:#191970;">                        
                        <?php 
                            echo $row["temaCircuito"];
                        ?>
                    </h3>
                    <div class="text-center">
                        <?php 
                          echo '<img src="http://'.$_SERVER['HTTP_HOST'].'/Travel-Agency/'.$row["imagen_url"].'" alt="" style="width:80%;border-radius: 22%;Border:10px solid #40E0D0;" >'
                        ?>
                    </div>
            </div>

            <div class="col-lg-6" style="margin-top: 100px;">
                    <div>
                        <?php
                            validate_user_reservation();
                        ?>
                    </div>
                    <form method="POST">
                        <label for="">Numero Cliente:</label>
                        <input type="text" name="numCliente" class="form-control" placeholder="example: 12345678">
                        <label for="">Fecha de salida</label>
                        <input type="text" name="fechaSalida" class="form-control input datepicker" value="Mm/Dd/Yy">
                        <label for="">Hora de salida:</label>
                        <input type="time" name="horaSalida" class="form-control" value="10:00">
                        <label for="">Número de personas que viajaran: </label>
                        <select class="form-control" name="numPersonas" id="numPersonas">
                            <option value="1" selected>Una persona</option>
                            <option value="2">Dos personas</option>
                            <option value="3">Tres personas</option>
                            <option value="4">Cuatro personas</option>
                        </select>
                        <div id="personData"></div>
                        <br>
                        <div class="text-center">
                            <input type="submit" value="Reservar el viaje" class="btn btn-primary">
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