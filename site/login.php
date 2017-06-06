<?php 
  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['senha']);
  
    $host = "localhost";
    $db   = "myrobbie";
    $user = "gabriel";
    $pass = "";
	// conecta ao banco de dados
    $con = new mysqli($host, $user, $pass,$db);   
    
  if (isset($entrar)) {
            
      $verifica = $con->query("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
        if ($verifica->fetch_assoc() ){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
          die();
        }else{
          setcookie("login",$login);
          header("Location:index.php");
        }
    }
?>