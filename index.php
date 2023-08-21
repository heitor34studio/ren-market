<?php

//APAGA PEDIDOS NÃO PAGOS EM 1 DIA
require_once('lib/db.class.php');
$objDB = new db();
$link = $objDB->conecta_mysql();
$sql = " delete from user where data < DATE_SUB(NOW() , INTERVAL 1 DAY) AND pago = 0; ";
$resultado_id = mysqli_query($link, $sql);
if(!$resultado_id){
  echo '<script>alert("Erro ao se conectar com o servidor. Contate o Dev.")</script>';
  die();
}


?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Renthon's Market</title>
    <link rel="stylesheet" href="style.css" media="screen">
<link rel="stylesheet" href="index1.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="script.js" defer=""></script>
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P:400|Orbitron:400,500,600,700,800,900">
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Renthon's Market">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
     <!-- Additional Script-->
         <!-- JavaScript Libraries -->
         <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     <script type="text/javascript">
        $(document).ready(function(){
            $('#field-fa43').click(function(){
              $('#titulo').html('Faço 6 </br> Stickers Personalizados para Você');
              $('#money').html('R$132,00');
            });
            $('#field-081a').click(function(){
              $('#titulo').html('Faço 15 </br> Stickers Personalizados para Você');
              $('#money').html('R$300,00');
            });
            $('#submit34').click(function(){
              $.ajax({
                  url: 'lib/scripts.php',
                  method: 'post',
                  data: { quantity:$('input[name=radiobutton]:checked').val(), pOrP: $('input[name=radiobutton-1]:checked').val() },
                  success: function(data){
                    $('#test34').html(data);
                  }/*,
                  beforeSend: function(){
                      $('#load').css({display:"block"});
                  },
                  complete: function(){
                      $('#load').css({display:"none"});
                  }*/
              });
            });
        });
    </script>
<meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-335c"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://ren-market.tk" class="u-image u-logo u-image-1">
          <img src="images/new-preset-logo2.png" class="u-logo-image u-logo-image-1">
        </a>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-f83f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-default u-text-palette-4-light-3 u-text-variant u-text-1">DESENHOS DIGITAIS</p>
        <div class="u-carousel u-expanded-width-sm u-expanded-width-xs u-gallery u-layout-carousel u-lightbox u-no-transition u-show-text-none u-gallery-1" data-interval="5000" data-u-ride="carousel" id="carousel-9387">
        <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
            <li data-u-target="#carousel-9387" data-u-slide-to="0" class="u-active u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
            <li data-u-target="#carousel-9387" data-u-slide-to="1" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
            <li data-u-target="#carousel-9387" data-u-slide-to="2" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
            <li data-u-target="#carousel-9387" data-u-slide-to="3" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
          </ol>
          <div class="u-carousel-inner u-gallery-inner" role="listbox">
            <div class="u-active u-carousel-item u-gallery-item u-carousel-item-1">
              <div class="u-back-slide" data-image-width="627" data-image-height="627">
                <img class="u-back-image u-expanded" src="images/JOINHA.png">
              </div>
              <div class="u-over-slide u-over-slide-1">
                <h3 class="u-gallery-heading"></h3>
                <p class="u-gallery-text"></p>
              </div>
            </div>
            <div class="u-carousel-item u-gallery-item u-carousel-item-2">
              <div class="u-back-slide" data-image-width="627" data-image-height="627">
                <img class="u-back-image u-expanded" src="images/flushed.png">
              </div>
              <div class="u-over-slide u-over-slide-2">
                <h3 class="u-gallery-heading"></h3>
                <p class="u-gallery-text"></p>
              </div>
            </div>
            <div class="u-carousel-item u-gallery-item u-carousel-item-3" data-image-width="916" data-image-height="921">
              <div class="u-back-slide">
                <img class="u-back-image u-expanded" src="images/love.png">
              </div>
              <div class="u-over-slide u-over-slide-3">
                <h3 class="u-gallery-heading"></h3>
                <p class="u-gallery-text"></p>
              </div>
              <style data-mode="XL"></style>
              <style data-mode="LG"></style>
              <style data-mode="MD"></style>
              <style data-mode="SM"></style>
              <style data-mode="XS"></style>
            </div>
            <div class="u-carousel-item u-gallery-item u-carousel-item-4" data-image-width="1092" data-image-height="911">
              <div class="u-back-slide">
                <img class="u-back-image u-expanded" src="images/noted.png">
              </div>
              <div class="u-over-slide u-over-slide-4">
                <h3 class="u-gallery-heading"></h3>
                <p class="u-gallery-text"></p>
              </div>
              <style data-mode="XL"></style>
              <style data-mode="LG"></style>
              <style data-mode="MD"></style>
              <style data-mode="SM"></style>
              <style data-mode="XS"></style>
            </div>
          </div>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1" href="#carousel-9387" role="button" data-u-slide="prev">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2" href="#carousel-9387" role="button" data-u-slide="next">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
        <h3 class="u-text u-text-2" id="titulo">Faço 15</br> Stickers Personalizados para Você</h3>
        <p class="u-text u-text-3"></p>
        <div class="u-form u-form-1">
          <div id="test34"></div>
          <form id="formBuy" class="u-clearfix u-form-spacing-2 u-form-vertical u-inner-form" style="padding: 15px;" name="form"">
            <p class="u-align-center u-form-group u-form-text u-text u-text-4"> Quan<span style="font-weight: 700;"></span>tidade:
            </p>
            <div class="u-form-group u-form-input-layout-horizontal u-form-radiobutton u-label-none">
              <label class="u-label u-label-1">Radios</label>
              <div class="u-form-radio-button-wrapper">
                <div class="u-input-row">
                  <input id="field-fa43" type="radio" name="radiobutton" value="6" class="u-field-input" data-calc="">
                  <label class="u-field-label" for="field-fa43">6 Stickers</label>
                </div>
                <div class="u-input-row">
                  <input id="field-081a" type="radio" name="radiobutton" value="15" class="u-field-input" data-calc="" checked="checked">
                  <label class="u-field-label" for="field-081a">15 Stickers</label>
                </div>
              </div>
            </div>
            <p class="u-align-center u-form-group u-form-text u-text u-text-5"> Tipo:</p>
            <div class="u-form-group u-form-input-layout-horizontal u-form-radiobutton u-label-none">
              <label class="u-label u-label-2">Radios</label>
              <div class="u-form-radio-button-wrapper">
                <div class="u-input-row">
                  <input id="field-ec52" type="radio" name="radiobutton-1" value="Pessoa" class="u-field-input" data-calc="" checked="checked">
                  <label class="u-field-label" for="field-ec52">Pessoa</label>
                </div>
                <div class="u-input-row">
                  <input id="field-c49a" type="radio" name="radiobutton-1" value="Personagem" class="u-field-input" data-calc="">
                  <label class="u-field-label" for="field-c49a">Personagem</label>
                </div>
              </div>
            </div>
            <p class="u-align-center u-form-group u-form-text u-large-text u-text u-text-palette-3-base u-text-variant u-text-6" id="money"> R$300,00</p>
            <div class="u-align-center u-form-group u-form-submit">
              <a href="#" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">COMPRAR AGORA</a>
              <input type="submit" value="submit" class="u-form-control-hidden" id="submit34">
            </div>
          </form>
        </div>
        <p class="u-text u-text-7">
          <span class="u-text-custom-color-2" style="font-weight: 700;">Por enquanto, só aceitamos PIX!</span>
          <br> Neste projeto de loja, você pode pedir pra eu desenhar stickers de alguém para você. Pode ser uma pessoa, um personagem de&nbsp; desenho, videogame, você que sabe, apenas preciso de material pra me basear! 6 Stickers são R$132,00 e 15, R$300,00! As emoções que&nbsp; temos são: 1-Joinha, 2-Flushed, 3-Amor, 4-Bravo, 5-Feliz, 6-Sonolento, 7-Dormindo, 8-Medo, 9-Surpreso, 10-Confiante, 11-Chorando,&nbsp; 12-Comemorando, 13-Pensativo, 14-Rezando 15-Anotado.
        </p>
      </div>
    </section>
  



     <!-- FOOTER-->
     <div class="footer">
      <div class="info1">
      <h4><a href="#category">UI DESIGN</a></h4>
        <h3>Renthon's Store</h3>
        <div class="meta1">
          <a  href="https://34productions.tech" target="_b" class="author1"></a><br>
          Por <a href="https://34productions.tech" target="_b">Renthon</a> em 12 de Fevereiro, 2023
        </div>
      </div>
    </div>
    <!-- END FOOTER -->
</body></html>