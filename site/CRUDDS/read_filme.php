<?php

$tituloFilmeSelecionado =
$dataFilmeSelecionado = 

$consulta = $pdo->query("SELECT titulo, sinopse, foto, Faixa_Etaria_Idade, data_lancamento, trailer, nome FROM filme,obra WHERE titulo = $tituloFilmeSelecionado and data_lancamento = $dataFilmeSelecionado");
 
  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	<?php echo "Foto: {$linha['foto']}<br />";?>
	<?php echo "T�tulo: {$linha['titulo']}<br />";?>
	<?php echo "Data de Lan�amento: {$linha['data_lancamento']}<br />";?>
	<?php echo "Sinopse: {$linha['obra_sinopse']}<br />";?>
	<?php echo "Faixa Et�ria: {$linha['Faixa_Etaria_Idade']}<br />";?>
    <?php echo "Trailer: {$linha['trailer']}<br />"; ?>
    <?php echo "Generos: {$linha['nome']}<br />"; ?>
} 

?>
