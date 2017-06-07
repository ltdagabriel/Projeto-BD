<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
 
<body>
<?php 

$host = "localhost";
	$db   = "myrobbie";
	$user = "gabriel";
	$pass = "";

$login = $_POST['login'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$connect = new mysqli($host, $user, $pass,$db); 
$query_select = "SELECT login FROM usuario WHERE login = '$login'";
$select = $connect->query($query_select);
$array = $select->fetch_assoc();
$logarray = $array['login'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuario (login,senha,nome,email) VALUES ('$login','$senha','$nome','$email')";
        $insert = $connect->query($query);
        
        if($insert){
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha;
            setcookie("login",$nome);
            echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>
</body>
</html>