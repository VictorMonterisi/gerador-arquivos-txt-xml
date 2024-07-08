<?php

class ExportadorDePessoaEmXml
{
    private Pessoa $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function exportaEmXml(string $nomeDoArquivo): string
    {

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        $root = $dom->createElement('pessoa');
        $dom->appendChild($root);

        $nome = $dom->createElement('nome', $this->pessoa->getNome());
        $root->appendChild($nome);

        $idade = $dom->createElement('idade', $this->pessoa->getIdade());
        $root->appendChild($idade);

        $xmlString = $dom->saveXML();

        $filePath = $nomeDoArquivo;

        $dom->save($filePath);

        return $xmlString;
    }
}
