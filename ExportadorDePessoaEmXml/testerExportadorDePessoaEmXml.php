<?php

require_once 'Pessoa.php';
require_once 'ExportadorDePessoaEmXml.php';

$pessoa = new Pessoa('Victor', new DateTimeImmutable('1991-10-08'));
$exportador = new ExportadorDePessoaEmXml($pessoa);

$nomeDoArquivo = md5(time()) . '.xml';

$xml = $exportador->exportaEmXml($nomeDoArquivo);

function verificaArquivoGerado($nomeDoArquivo)
{
    if (file_exists($nomeDoArquivo)) {

        // Verifica o conteúdo
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->load($nomeDoArquivo);

        $pessoa = $dom->getElementsByTagName('pessoa')->item(0);
        if (!$pessoa) {
            return "Elemento 'pessoa' não encontrado." . PHP_EOL;
        }

        $nome = $dom->getElementsByTagName('nome')->item(0);
        if (!$nome) {
            return "Elemento 'nome' não encontrado." . PHP_EOL;
        }

        $idade = $dom->getElementsByTagName('idade')->item(0);
        if (!$idade) {
            return "Elemento 'idade' não encontrado." . PHP_EOL;
        }

        return "O arquivo {$nomeDoArquivo} foi gerado corretamente" . PHP_EOL;
    } else {
        return "O arquivo {$nomeDoArquivo} não foi gerado" . PHP_EOL;
    }
}


echo verificaArquivoGerado($nomeDoArquivo);

unlink($nomeDoArquivo);

echo "O arquivo de teste {$nomeDoArquivo} foi apagado!" . PHP_EOL;
