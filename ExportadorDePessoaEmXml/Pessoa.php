<?php
    
    class Pessoa
    {
        private string $nome;
        private DateTimeImmutable $dataDeNascimento;
        
        public function __construct(string $nome, DateTimeImmutable $dataDeNascimento)
        {
            $this->nome = $nome;
            $this->dataDeNascimento = $dataDeNascimento;
        }

        public function getNome(): string
        {
            return $this->nome;
        }

        public function getIdade(): int
        {
            $hoje = new DateTimeImmutable();
            $diferenca = $this->dataDeNascimento->diff($hoje);

            return $diferenca->y;
        }
    }