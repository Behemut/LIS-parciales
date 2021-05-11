<?php
     include ('inc/header.php');
     include ('inc/logNav.php');
    if (!isset($_SESSION['Rol']) && $_SESSION['Rol']!="Administrador"   ){
        redirect("login.php");
    }
?>
        <div class="row">
           
            <div class="form-holder">
            <div class="container">
                <?php 
                   validate_circuit_register();
           
                ?>
            </div>
                <div class="form-content">
                    <div class="form-items">
                        <h3>Registrar viajes disponibles</h3>
                        <form  method="post" enctype="multipart/form-data">
                            <input class="form-control" type="text" name="numCircuito" placeholder="Nombre Viaje" required>
                            <select class="select2 select form-control" style="width: 100%"  name="tipo">
                            <option >Tipo de viaje</option>
                            <option value="Turismo nacional">TURISMO NACIONAL</option>
                            <option value="Turismo internacional">TURISMO INTERNACIONAL</option>
                          </select>
                          <select class="select2 select form-control" style="width: 100%"  name="medio">
                            <option >Medio de transporte</option>
                            <option value="Autobus">AUTOBUS TURISTICO</option>
                            <option value="Vuelo internacional">VUELO INTERNACIONAL</option>
                            <option value="Crucero">CRUCERO</option>
                          </select>
                          <input class="form-control" type="number" min="1" max="31" name="duracion" placeholder="Duración (Días)" required>
                          <p>Imagen de referencia:</p>
                          <input type="file" name="fileToUpload" id="fileToUpload" required>


                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Registrar Viaje</button> 
                            </div>
                        </form>
                     
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("inc/footer.php");
?>