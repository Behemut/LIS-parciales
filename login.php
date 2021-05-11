<?php
    require_once("inc/header.php");
    require_once("inc/lognav.php");
?>
<div class="form-body without-side">
        <div class="website-logo">
 
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
            <div class="container">
                <?php 
                    validate_user_login();
           
                ?>
            </div>
                <div class="form-content">
                    <div class="form-items">
                        <h3>Inicio de sesión</h3>
                        <p>¡Tienes que identificarte para reservar un tour!</p>
                        <form Method="POST">
                            <input class="form-control" type="text" name="numCliente" placeholder="N° Cliente" required>
                            <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> 
                            </div>
                        </form>
                     
                        <div class="page-links">
                            <a href="register.php">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("inc/footer.php");
?>