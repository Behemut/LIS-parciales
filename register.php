<?php
    require_once("inc/header.php");
    require_once("inc/lognav.php");
?>
<div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
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
                        validate_user_registration();
                    ?>
                </div>
                <div class="form-content">
                    <div class="form-items">
                        <h3>Registro</h3>
                        <form Method="post">
                            <input class="form-control" type="text"     name="nombre" placeholder="Nombre" required>
                            <input class="form-control" type="text"     name="apellido" placeholder="Apellido" required>    
                            <input class="form-control" type="text"     name="direccion" placeholder="Direccion" required>    
                            <input class="form-control" type="text"     name="numCliente" placeholder="N° Cliente" required>
                            <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                            <input class="form-control" type="text"     name="numTel" placeholder="N° Telefono" required>
                            <select name="sexo" class="sexo form-control" style="background-color:#F7F7F7 !important ; border: none;">
                                <option value="Hombre" class="sexo">Hombre</option>
                                <option value="Femenino" class="sexo">Mujer</option>
                            </select>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Registrarse</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">O Regístrese con</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="login.php">REGISTRATE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("inc/footer.php");
?>