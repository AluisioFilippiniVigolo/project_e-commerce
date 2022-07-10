<?php
// Seleciona o nome temporário do arquivo, ganho durante o upload
$nome_temporario=$_FILES["arquivo"]["tmp_name"];
// Gera um nome para o arquivo
$nome_real=$_FILES["arquivo"]["name"];
// Substitui os espaços em branco por "_"
$nome_real = str_replace(" ", "_", $nome_real);
// Copia o arquivo para a pasta destino
copy($nome_temporario,"./uploads/$nome_real");

$output = "<label data-error='wrong' data-success='right' for='caminho'>Caminho</label>";
$output .= "<input type='text' class='form-control' id='imagem' value='" . $nome_real . "'class='form-control validate'>";

echo $output;

?>