<?php

include '../setup.php';
include MODEl.'/Personne.php';
include  DAO . '/PersonneDao.php';

use model\Personne;
use  dao\PersonneDao;

/*$dao= new PersonneDao();
$result = $dao->getPersonnes();
var_dump($result);*/

//$pers = new Personne('SOROS','Antoine','Male');
$dao= new PersonneDao();
//$dao ->addPerson($pers);
//$result = $dao->getPersonnes();
//var_dump($result);

$result = $dao ->getPersonneById(8);
var_dump($result);
