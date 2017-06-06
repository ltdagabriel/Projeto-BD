<?php 
  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = $_POST['senha'];
  
    $host = "localhost";
    $db   = "myrobbie";
    $user = "gabriel";
    $pass = "";
	// conecta ao banco de dados
    $con = new mysqli($host, $user, $pass,$db);   
    
  if (isset($entrar)) {
      $query_select = "SELECT nome FROM usuario WHERE login = '$login'  AND senha = '$senha'";
      $verifica = $con->query($query_select) or die("erro ao selecionar");
      $array = $verifica->fetch_assoc();
      $logarray = $array['nome'];
        if (!isset($array)){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
          die();
        }else{
          setcookie("login",$logarray);
          header("Location:index.php");
        }
    }
?>