<?php
//tudo que precisa
session_start();
$descricao = addslashes($_SESSION['desc']);
$descrSeExiste = $_SESSION['descrSeExiste'];
$quantidade = addslashes($_SESSION['quantity']);
$pp = addslashes($_SESSION['pOrP']);
$emailPessoa = addslashes($_SESSION['email']);
$nomePessoa = addslashes($_SESSION['nome']);
require_once('db.class.php');
$objDB = new db();
$link = $objDB->conecta_mysql();




//PREPARA PIX DEPENDENDO DA QUANTIDADE
if($quantidade == '6 Stickers'){
	$qtValor = '731269982138269736/1099389096499097780/qrcode-pix_3.png';
	$cod = '00020126580014BR.GOV.BCB.PIX01369d47b874-5e40-4507-a311-1e1e6f3a23bf5204000053039865406132.005802BR5918Heitor Dutra Bento6009Sao Paulo621305096STICKERS6304024A';
}else{
	$qtValor = '731269982138269736/1099388979574472795/qrcode-pix_2.png';
	$cod = '00020126580014BR.GOV.BCB.PIX01369d47b874-5e40-4507-a311-1e1e6f3a23bf5204000053039865406300.005802BR5918Heitor Dutra Bento6009Sao Paulo6214051015STICKERS63040165';
}


//ENVIA EMAIL PARA PESSOA



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = 'renthon.market@gmail.com';
$mail->Password = '';
$mail->setFrom('renthon.market@gmail.com', 'Renthon Market');
$mail->addAddress(''.$emailPessoa.'', ''.$nomePessoa.'');
$mail->Subject = "Seu Pedido Foi Criado!";
$body = '
				<html>
				<body style="margin:0;bottom:0;width:100%;background-color:#fff;">

								<div style="bottom:0;width:100%;text-align:center;line-height:40px;font-size:25px;margin-bottom:10px;margin-top:30px;">
									<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909"><strong>Olá '.$nomePessoa.'! Seu Pedido foi Recebido!</strong></span><br>
								</div>

								<br>


								<div style="bottom:0;width:100%;text-align:center;line-height:40px;font-size:25px;margin-bottom:10px;margin-top:30px;">
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909"><strong>Pague Seu Pedido em até 24 Horas Com O Código Pix a Seguir:</strong></span><br>
								<img src="https://cdn.discordapp.com/attachments/'.$qtValor.'"></img>
								<br>
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909"><strong>'.$cod.'</strong></span><br>
								</div>
								<div style="bottom:0;width:100%;text-align:center;line-height:40px;font-size:25px;">
								<img style="width:100%;" src="https://cdn.discordapp.com/attachments/731269982138269736/1103062418965418045/641430.png"></img>
								</div>


								</body>
								</html>';

$mail->msgHTML($body);



//ENVIA EMAIL

if ( !$mail->send() ) {
	//SE *NÃO* ENVIAR EMAIL, AVISAR QUE HOUVE ERRO
	echo '<script>alert("Erro ao enviar o email com os detalhes do pedido. Por favor, verifique se todos os dados estão corretos. Se o erro persistir contate o Dev.")</script>';
	die();
}

//SE ENVIAR EMAIL, ENVIAR PARA VC MESMO AGR, E DEPOIS ADICIONAR NA DATABASE
$mail->Subject = "Voce Recebeu Um Pedido!";
$body2 = '
			<html>
			<body style="margin:0;bottom:0;width:100%;background-color:#fff;">

							<div style="bottom:0;width:100%;text-align:center;line-height:40px;font-size:25px;margin-bottom:10px;margin-top:30px;">
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909"><strong>Pedido Recebido! Detalhes:</strong></span><br>
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909">Nome: '.$nomePessoa.'</span><br>
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909">Email: '.$emailPessoa.'</span><br>
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909">Quantidade: '.$quantidade.'</span><br>
								<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909">Tipo: '.$pp.'</span><br>
								'.$descrSeExiste.'
							</div>
							</body>
							</html>';

$mail->msgHTML($body2);
$mail->clearAllRecipients( );
$mail->addAddress('heitor34productions@gmail.com');
if ( !$mail->send() ) {
	//SE *NÃO* ENVIAR EMAIL, AVISAR QUE HOUVE ERRO
	echo '<script>alert("Erro ao enviar o email com os detalhes do pedido para o Dev. Por favor, contate o Dev para que alterações possam ser feitas.")</script>';
	die();	
}

//INSERE PEDIDO NO BANCO DE DADOS PQ TEM MENOS DE 5 PEDIDOS
$sql = " insert into user(name, email, quantidade, tipo, info) values ('$nomePessoa', '$emailPessoa', '$quantidade','$pp', '$descricao' ) ";
//INSERE PEDIDO
if(!mysqli_query($link, $sql)){
	echo '<script>alert("Erro ao se conectar com o servidor para adicionar pedido no banco de dados. Por favor, contate o Dev.")</script>';
	die();
}

//HTML COM PIX
$pixBody = "<script>
$(document).ready(function(){
  $('#copy').click(function(){
	  $('#pix').select();
	  document.execCommand('copy');
	  const element = document.querySelector('#copy');
	  const myStyles = `
		color:  #00e5ce !important;
		margin-bottom:200px !important;
		background-color: black !important;

	  `;
	  $('#copy').html('Copiado!');
	  element.style.cssText = myStyles;
  });
})

</script>";
$pixBody2 = '
<h4 class="u-text u-text-body-alt-color">Pague o código Pix Abaixo em Até 24 Horas:</h4>
<img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="https://cdn.discordapp.com/attachments/'.$qtValor.'">
<h4 class="u-text u-text-body-alt-color">Ou Use o Código Abaixo:</h4>
<input type="text" placeholder="Código Pix" id="pix" name="pix" class="u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle u-none u-text-white u-input-1" required="" readonly="" value="00020126580014BR.GOV.BCB.PIX01369d47b874-5e40-4507-a311-1e1e6f3a23bf520400005303986540575.005802BR5918Heitor Dutra Bento6009Sao Paulo621305096STICKERS630412AE">
<a id="copy" style="margin-bottom:200px" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Copiar</a>';
echo $pixBody.$pixBody2;

//Closing smtp connection
$mail->smtpClose();
$_SESSION = array();
				?>


