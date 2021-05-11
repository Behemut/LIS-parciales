<?php

include ('inc/header.php');
include ('inc/logNav.php');
?>


  <div id="slider_wrapper">
    <div class="container">
      <div id="slider_inner">
        <div class="">
          <div id="slider">
            <div class="">
              <div class="carousel-box">
                <div class="inner">
                  <div class="carousel main">
                    <ul>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>Bienvenido a nuestra</span></div>
                            <div class="txt2"><span>AGENCIA DE VIAJE UDB</span></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>Tour 7 días</span></div>
                            <div class="txt2"><span>VIAJA POR EL CARIBE</span></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>5 Días en </span></div>
                            <div class="txt2"><span>PARIS (Capital del MUNDO)</span></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="slider">
                          <div class="slider_inner">
                            <div class="txt1"><span>12 - Días en Crucero</span></div>
                            <div class="txt2"><span>DESDE GREECIA HASTA ESPAÑA</span></div>
                            <div class="txt3"><span>MEDITERRANEO- 12 - Días en crucero en el "GRAND VICTORIA III".</span></div>  
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="slider_pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="front_tabs">
    <div class="container">
      <div class="tabs_wrapper tabs1_wrapper">
        <div class="tabs tabs1">
          <div class="tabs_tabs tabs1_tabs">

              <ul>
                <li class="active flights"><a href="#tabs-1">Lugares</a></li>
              </ul>

          </div>
          <div class="tabs_content tabs1_content">

              <div id="tabs-1">
                <form action="javascript:;" class="form1" method="post">
                  <div class="row">
                    <div class="col-sm-4 col-md-2">
                      <div class="select1_wrapper">
                        <label>Vuelos desde :</label>
                        <div class="select1_inner">
                          <select class="select2 select" style="width: 100%">
                            <option value="1">Ciudad o Aeropuerto</option>
                            <option value="2">Alaska</option>
                            <option value="3">Bahamas</option>
                            <option value="4">Bermuda</option>
                            <option value="5">Canada</option>
                            <option value="6">Caribbean</option>
                            <option value="7">Europe</option>
                            <option value="8">Hawaii</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="select1_wrapper">
                        <label>Hacia:</label>
                        <div class="select1_inner">
                          <select class="select2 select" style="width: 100%">
                            <option value="1">Ciudad o Aeropuerto</option>
                            <option value="2">Alaska</option>
                            <option value="3">Bahamas</option>
                            <option value="4">Bermuda</option>
                            <option value="5">Canada</option>
                            <option value="6">Caribbean</option>
                            <option value="7">Europe</option>
                            <option value="8">Hawaii</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="input1_wrapper">
                        <label>Fecha de salida:</label>
                        <div class="input1_inner">
                          <input type="text" class="input datepicker" value="Mm/Dd/Yy">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="input1_wrapper">
                        <label>Fecha de regreso:</label>
                        <div class="input1_inner">
                          <input type="text" class="input datepicker" value="Mm/Dd/Yy">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-1">
                      <div class="select1_wrapper">
                        <label>Adultos:</label>
                        <div class="select1_inner">
                          <select class="select2 select select3" style="width: 100%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-1">
                      <div class="select1_wrapper">
                        <label>Niños:</label>
                        <div class="select1_inner">
                          <select class="select2 select select3" style="width: 100%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-2">
                      <div class="button1_wrapper">
                        <button type="submit" class="btn-default btn-form1-submit">Buscar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php

      $sql = "SELECT * FROM circuito";
      $result = query($sql);
      confirm($result);
      if (row_count($result) > 0){
      echo "<div class='container'><div class='row'>";
      while($row = mysqli_fetch_assoc($result)) {

    ?>

  <div class="popular col-md-4 col-lg-4 card" style="margin-top: 10px;">
    <div class="popular_inner card-body">
    
      <figure>
        <?php echo '<img src="http://'.$_SERVER['HTTP_HOST'].'/Travel-Agency/'.$row["imagen_url"].'" class="card-img-top img-thumbnail rounded" >'     ?>
        <div class="over">
        <div class="v1"> <?php echo $row["numCircuito"];  ?> </div>
        </div>
      </figure>
      <div class="caption">
        <div class="txt1"><span><?php echo $row["temaCircuito"];  ?></span><?php echo $row["duracion"]; ?> Días</div>
       <h3 class="card-title clearfix"><?php echo $row["medioTransporte"];  ?></h3>
        <div class="txt3 clearfix">
          <div class="left_side">
          </div>
          <div class="right_side"><a href=<?php echo "reserve.php?idc=".$row["idCircuito"]; ?> class="btn btn-primary btn-lg .active"   >Reservar</a></div>
        </div>
      </div>
    </div>
  </div>
  <?php
        }
      }

      echo '
      </div>
      </div>
      ';
  ?>
  <div id="why1">
    <div class="container">
      <img src="" alt="">
      <h2 class="animated" data-animation="fadeInUp" data-animation-delay="100">¿PORQUE ESCOGERNOS?</h2>

      <div class="title1 animated" data-animation="fadeInUp" data-animation-delay="200">
      Agencia de viajes UDB es la agencia de viaje líder en Latinoamérica. Tus boletos de avión, paquetes de viaje y
                    hoteles están en Sun Side, crucial para tener así las mejores vacaciones. <br> Le asesoraremos paso a paso, para que su viaje de placer o de negocios sea óptimo. Buscaremos las mejores opciones de vuelo, hoteles, planes y paquetes.
      </div>

      <br><br>

      <div class="row">
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="200">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why1.png" alt="" class="img1 img-responsive">
                  <img src="images/why1_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Viajes asombrosos</div>
                  <div class="txt2">Con los mejores lugares y destino con hermosos paisajes.</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="300">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why2.png" alt="" class="img1 img-responsive">
                  <img src="images/why2_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Descubrir</div>
                  <div class="txt2">Visita lugares Increíbles y hermosos.</div>
                  <div class="txt3">Read More</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumb2 animated" data-animation="flipInY" data-animation-delay="400">
            <div class="thumbnail clearfix">
              <a href="#">
                <figure class="">
                  <img src="images/why3.png" alt="" class="img1 img-responsive">
                  <img src="images/why3_hover.png" alt="" class="img2 img-responsive">
                </figure>
                <div class="caption">
                  <div class="txt1">Guías de viajes</div>
                  <div class="txt2">Tendrá a su disposición el mejor equipo de guías para sus viajes .</div>
       
                </div>
              </a>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>
  <div id="partners">
    <div class="container">

    </div>
  </div>
  </div>

<?php
  include ('inc/footer.php');
?>