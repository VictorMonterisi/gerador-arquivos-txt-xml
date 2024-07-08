<?php

    require_once 'Pessoa.php';

    //Arrange
    $pessoa = new Pessoa('Victor', new DateTimeImmutable('1991-10-08'));

    //Act
    $idadePessoa = $pessoa->getIdade();

    //Assert
    $idadeEsperada = 32;

    if ($idadeEsperada === $idadePessoa) {
        echo 'TESTE OK' . PHP_EOL;
    } else {
        echo 'TESTE FALHOU' . PHP_EOL;
    }