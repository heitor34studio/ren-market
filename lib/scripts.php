<?php 
//echo '<script>window.location.href="carrinho.php"</script>';
session_start();
//checa se valores existem
if(!isset($_POST['quantity']) || !isset($_POST['pOrP'])){
    die();
}
//checa se valores estão corretos
if($_POST['pOrP']!="Pessoa" && $_POST['pOrP']!="Personagem"){
    die();
}
if($_POST['quantity']!="6" && $_POST['quantity']!="15"){
    die();
}
$_SESSION['quantity'] = addslashes($_POST['quantity']);
$_SESSION['pOrP'] = addslashes($_POST['pOrP']);
echo '<script>window.location.href="carrinho"</script>';
die();
?>