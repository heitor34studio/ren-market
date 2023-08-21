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


session_start();
if(!isset($_SESSION['pOrP']) || !isset($_SESSION['quantity'])){
  header('Location: index');
  die();
}else{
  $chosen = addslashes($_SESSION['pOrP']);
  $pp = '<script>window.location.href="index"</script>';
  if($chosen=='Pessoa'){
    $ppt = false;
    $pp = '<p class="u-text u-text-7">Por favor enviar imagens da Pessoa para mim, assim posso ter uma base para desenha-la. <a style="color:#000;" href="https://34productions.tech/#contato" target="_blank">Minhas formas de contato.</a>
    </p>';
  }
  if($chosen=='Personagem'){
    $ppt = true;
    $pp = '<textarea maxlength="100" placeholder="Nome do Seu Personagem Escolhido + Detalhes para Procurar" rows="4" cols="50" id="pp" name="message" class="u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle u-none u-text-white u-input-3" required=""></textarea>';
  }
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Carrinho</title>
    <link rel="stylesheet" href="style.css" media="screen">
<link rel="stylesheet" href="carrinho.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="script.js" defer=""></script>
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P:400|Orbitron:400,500,600,700,800,900">
    
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Carrinho">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <!-- Additional Script-->
         <!-- JavaScript Libraries -->
         <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     <script type="text/javascript">
        $(document).ready(function(){
            $('#fuck').click(function(){
              $.ajax({
                  url: 'lib/class.all.php',
                  method: 'post',
                  data: { name:$('#name').val(), email: $('#email').val()
                   
                   <?php if($ppt==true){
                    echo ", pp:$('#pp').val()";
                  }else{
                    echo '';
                  } ?>
                  
                },
                  success: function(data){
                    $('#test34').html(data);
                  },
                  beforeSend: function(){
                      $('#enviar').css({display:"none"});
                      $('#loading').css({display:"block"});
                  },
                  complete: function(){
                    $('#loading').css({display:"none"});
                  }
              });
            });
        });
    </script>
<meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-gradient u-xl-mode" data-lang="en" style="background-image: linear-gradient(#478ac9, #db545a);"><header class="u-clearfix u-header u-header" id="sec-335c"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://ren-market.tk" class="u-image u-logo u-image-1">
          <img src="images/new-preset-logo2.png" class="u-logo-image u-logo-image-1">
        </a>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-84ed">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h4 class="u-text u-text-body-alt-color u-text-default u-text-1">Contato</h4>
        <div class="u-form u-form-1">
          <form class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="email" name="form">
            <div class="u-form-group u-form-name u-label-none">
              <label for="name-6797" class="u-label">Name</label>
              <input maxlength="30" type="text" placeholder="Seu Nome" id="name" name="name" class="u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle u-none u-text-white u-input-1" required="">
            </div>
            <div class="u-form-email u-form-group u-label-none">
              <label for="email-6797" class="u-label">Email</label>
              <input maxlength="30" type="email" placeholder="Seu Email" id="email" name="email" class="u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle u-none u-text-white u-input-2" required="">
            </div>
            <div class="u-form-group u-form-message u-label-none">
              <label for="message-6797" class="u-label">Detalhes</label>
              <?php 
                  echo $pp;
              ?>
            </div>
            <div class="u-align-center u-form-group u-form-submit" id="lateSend">
              <a href="#" id="enviar" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Enviar</a>
              <input type="submit" value="Enviar" id="fuck" class="u-form-control-hidden">
              <center><img src="images/loading.gif" id="loading" style="display:none"></img></center>
            </div>
          </form>
        </div>
        <div id="test34"></div>
        
      </div>
    </section>
  
</body></html>