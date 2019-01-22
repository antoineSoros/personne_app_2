<?php
include '../setup.php';


if($_SERVER['REQUEST_METHOD']==='GET'){

    include VIEW.'/form_personnes.php';
}else if ($_SERVER['REQUEST_METHOD']==='POST'){

    $fistName = filter_input(INPUT_POST,'first_name');
    $lastName = filter_input(INPUT_POST,'last_name');
    $gender = filter_input(INPUT_POST,'gender');

    $pers = new Personne($lastName,$fistName,$gender);
    try{
        $dao = new PersonneDao();
        $dao->addPerson($pers);
    header('Location:/display_personnes_controller.php');

    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
}
