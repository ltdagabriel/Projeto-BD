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

$titulo= $_POST['titulo'];
$sinopse = $_POST['sinopse'];
$data = date('d/m/Y', $_POST['data']);
$adicionado = date('m/d/Y h:i:s', time());
$foto = $_POST['foto'];
$video = $_POST['video'];
$classificacao=$_POST['classificacao'];

$connect = new mysqli($host, $user, $pass,$db); 
$query_select = "SELECT titulo FROM obra WHERE titulo = '$titulo' and '$data'=data_lancamento";
$select = $connect->query($query_select);
$array = $select->fetch_assoc();
$obra = $array['titulo'];

  if($titulo == "" || $titulo == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo Titulo deve ser preenchido');window.location.href='index.php';</script>";
    
    }
  else if($data == "" || $data == null){
       echo"<script language='javascript' type='text/javascript'>alert('O campo Data de Lançamento não pode estar em branco');window.location.href='index.php';</script>"; 
    }
  else if($classificacao == "Nada"){
       echo"<script language='javascript' type='text/javascript'>alert('O campo Classificação deve ser selecionado');window.location.href='index.php';</script>"; 
    }
    else{
      if($obra == $titulo){

        echo"<script language='javascript' type='text/javascript'>alert('Obra existente!!');window.location.href='index.php';</script>";
        die();

      }else{
        $query = "INSERT INTO obra (titulo,sinopse,data_lancamento,foto,Faixa_Etaria_idade,data_adicionado) VALUES ('$titulo','$sinopse','$data','$foto','$classificacao','$adicionado')";
        $query2="INSERT INTO filme(trailer,obra_titulo,obra_data) value ('$video','$titulo','$data')";
        $insert = $connect->query($query);
        $insert2 = $connect->query($query2);
        
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Seu Filme foi adicionado!');window.location.href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar seu Filme');window.location.href='index.php'</script>";
        }
      }
    }
?>
</body>
</html>