<?php

namespace model;

class Personne
{
    protected $id;
    protected $last_name;
    protected $first_name;
    protected $gender;







    function __construct($last_name,$first_name , $gender,$id=NULL) {
        $this->last_name= $last_name;
        $this->first_name =$first_name;
        $this ->gender = $gender;
        $this->id = $id;



    }
public static  function creatNullObject(): Personne{
        return $pers = new Personne('','','',0);
}

    public function toArray(): array{

        return [
            'id' => $this->id,
            'first_name'=> $this->first_name,
            'gender'=> $this->gender,
            'last_name'=> $this->last_name
        ];
}

    public function getId()
    {
        return $this->id;
    }


    public function getNom() {
        return $this->last_name;
    }

    public function getPrenom() {
        return $this->first_name;
    }

    public function setNom($nom) {
        $this->last_name = $nom;
    }

    public function setPrenom($prenom) {
        $this->first_name = $prenom;
    }

    public function getGender()
    {
        return $this->gender;
    }




    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}