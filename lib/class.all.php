<?php

session_start();
$quantidade = addslashes($_SESSION['quantity']);
$pp = addslashes($_SESSION['pOrP']);
//verifica se é personagem ou pessoa, e se for personagem se o tamanho do valor é permitido
if(isset($_POST['pp'])){
	if(strlen($_POST['pp'])>100 || strlen($_POST['pp'])==0){
		echo '<script>$("#enviar").css({display:"inline-block"});alert("Erro com a quantidade de caracteres na descrição do Personagem.")</script>';
		die();	
	}else{
		$descricao = addslashes($_POST['pp']);
		$descrSeExiste = '<span style="color:#404577;text-decoration:none;font-family:Arvo,Courier,Georgia,serif;color:#090909">Descricao: '.$descricao.'</span>';
        $disablePPInput = "$('#pp').prop('disabled', true);";
	}
}else{
	$descricao = '';
	$descrSeExiste = '';
    $disablePPInput = '';
}
//VERIFICA SE ESTÁ SETADO NOME E EMAIL
if(!isset($_POST['email']) || !isset($_POST['name'])){
	echo '<script>$("#enviar").css({display:"inline-block"});alert("O email ou nome não está sendo informado de forma correta.")</script>';
	die();
}
//verifica se nome ou email não poassam dos valores de tamanho permitidos
if(strlen($_POST['email'])>30 ||strlen($_POST['name'])>30){
	echo '<script>$("#enviar").css({display:"inline-block"});alert("Algum dos valores está passando do limite permitido")</script>';
	die();
}
//verifica se o nome não tem 0 caracteres
if(strlen($_POST['name'])==0){
	echo '<script>$("#enviar").css({display:"inline-block"});alert("Por favor insira seu nome.")</script>';
	die();
}
//cria variaveis email nome
$emailPessoa = addslashes($_POST['email']);
$nomePessoa = addslashes($_POST['name']);
//verifica email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo '<script>$("#enviar").css({display:"inline-block"});alert("O email inserido é invalido.")</script>';
	die();
}

require_once('db.class.php');

//VERIFICA SE TEM 5 CLIENTES QUE JÁ PEDIRAM PRA EVITAR FAZER MAIS Q 5 POR SEMANA
		$objDB = new db();
		$link = $objDB->conecta_mysql();
		$sql = " SELECT COUNT(*) AS qntd FROM user ";
		$qntd = 0;
		$resultado_id = mysqli_query($link, $sql);
		if(!$resultado_id){
			echo '<script>$("#enviar").css({display:"inline-block"});alert("Erro ao se conectar com o servidor. Contate o Dev.")</script>';
				die();
		}
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qntd = $registro['qntd'];
		if($qntd >= 5){
			echo '<script>$("#enviar").css({display:"inline-block"});alert("Já atingimos o limite de pedidos para esta semana. Contate o Dev para mais informações.")</script>';
				die();
		}
        $_SESSION['desc'] = addslashes($descricao);
        $_SESSION['descrSeExiste'] = addslashes($descrSeExiste);
        $_SESSION['email'] = addslashes($emailPessoa);
        $_SESSION['nome'] = addslashes($nomePessoa);
        $enviado = '<a href="#" class="enviado">Enviado!</a>';
        echo "<script type='text/javascript'>
                
                $(document).ready(function(){
                    var home = '".$enviado."';
                        $.ajax({
                            url: 'lib/email.php',
                            method: 'post',
                            success: function(data){
                                $('#test34').html(data);
                            },
                            beforeSend: function(){
                                $('#loading').css({display:'block'});
                                $('#name').prop('disabled', true);
                                $('#email').prop('disabled', true);
                                ".$disablePPInput."
                            },
                            complete: function(){
                              $('#loading').remove();
                              $('#enviar').remove();
                              $('#lateSend').html(home);
                            }
                        });
                });
            </script>";
?>