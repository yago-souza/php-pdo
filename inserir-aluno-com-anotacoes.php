<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(null,'Vinicius Dias', new DateTimeImmutable('1997-10-15'));;

##$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";
$sqlInsert = "SELECT * FROM students;";

## o método exec retorna apenas a quantidade de linhas afetada
var_dump($pdo->fetAll($sqlInsert));