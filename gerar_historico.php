<?php
include('conexao.php');

// Consultar o histórico de login de todos os usuários
$sql = "SELECT hl.*, u.usuario 
        FROM historico_login hl
        INNER JOIN usuarios u ON hl.usuario_id = u.id
        ORDER BY hl.data_hora DESC"; // Ordenar por data/hora decrescente
$result = $mysqli->query($sql);

// Criar o conteúdo do arquivo TXT
$conteudo = "Histórico de Login (Todos os Usuários):\n\n";
while ($row = $result->fetch_assoc()) {
    $conteudo .= "ID: " . $row['id'] . "\n";
    $conteudo .= "Usuário: " . $row['usuario'] . "\n"; 
    $conteudo .= "Data/Hora: " . $row['data_hora'] . "\n";
    $conteudo .= "Endereço IP: " . $row['endereco_ip'] . "\n";
    $conteudo .= "-------------------------\n";
}

// Nome do arquivo
$nome_arquivo = "historico_login_completo.txt";

// Cabeçalho para forçar o download do arquivo
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=" . $nome_arquivo);

// Gravar o conteúdo no arquivo
echo $conteudo;
?>