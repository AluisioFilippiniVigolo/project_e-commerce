<?php
// Seleciona o nome temporário do arquivo, ganho durante o upload
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
// Gera um nome para o arquivo
$nome_real=$_FILES["Arquivo"]["name"];
// Substitui os espaços em branco por "_"
$nome_real = str_replace(" ", "_", $nome_real);
// Copia o arquivo para a pasta destino
copy($nome_temporario,"./uploads/$nome_real");

echo '<input type="text" name="imagem" >';
// NÂO REDIRECIONA NADA
echo "Arquivo " . $nome_real ." armazenado";
?>