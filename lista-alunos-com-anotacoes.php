<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';
##Faz a conexão com o banco de dados;
$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);
##Execulta a query e retorna um resultado
$statement = $pdo->query('SELECT * FROM students');
##O fetchAll retorna por padrão um array com o resutado da querry com o nome da coluna e o número, repitindo os alores (consome mais memoria)
##O parametro PDO::FETCH_ASSOC) renorna apenas o array associativo (pelo nome)
##O parametro PDO::FETCH_CLASS
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

##insere os dados da query em um objeto
foreach ($studentDataList as $studentData) {
    $studentList[] = new Student($studentData['id'],
                                 $studentData['name'],
                                 new DateTimeImmutable($studentData['birth_date'])
    );
}
var_dump($studentList);