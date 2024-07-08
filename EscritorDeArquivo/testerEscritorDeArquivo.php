<?php

require_once 'EscritorDeArquivo.php';

// Definir o cenário
$caminhoDoArquivo = md5(time()) . '.txt';

$escritor = new EscritorDeArquivo($caminhoDoArquivo);

// Executar a ação a ser testada
$escritor->escreve('Primeira linha');
$escritor->escreve('Segunda linha');

// Verificar se o resultado é o esperado
$conteudoEsperado = 'Primeira linha' . PHP_EOL . 'Segunda linha' . PHP_EOL;

$mensagem = '';

if ($conteudoEsperado === file_get_contents($caminhoDoArquivo)) {
    $mensagem = 'TESTE OK';
} else {
    $mensagem = 'TESTE FALHOU';
}

echo "O conteúdo do arquivo gerado:" . PHP_EOL . $conteudoEsperado . PHP_EOL;
echo $mensagem . PHP_EOL . 'Apagando o arquivo de teste: ' . $caminhoDoArquivo . PHP_EOL;

unlink($caminhoDoArquivo);
