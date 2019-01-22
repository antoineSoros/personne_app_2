

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">FORMULAIRE PERSONNE</span>
</nav>
<?php if($personne->getId()===0 && empty($personne->getPrenom())&& empty($personne->getNom())) : ?>
<h3>La personne n'existe pas</h3>
<?php else :?>
<form action="/update_personne_controller.php" method="post">
    <div class="col ">
        <div class="form-group  mb-2">
            <label for="id">ID</label><br>
            <input type="text" class="form-control" id="id" name="id" placeholder="id" readonly value="<?=$personne->getId();?>">
        </div>

    <div class="col">
        <div class="row">
            <div class="col">
    <div class="form-group  mb-2">
        <label for="last_name">Nom</label><br>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="vôtre nom" value="<?=$personne->getNom();?>">
    </div>
        </div>
        <div class="col">
    <div class="form-group mb-2">
        <label for="first_name">Prénom</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="vôtre prénom" value="<?=$personne->getPrenom();?>">
    </div>
        </div>
        </div>

        <div class="row">
            <div class="col col-lg-2"
<div class="form-group mb-2">
        <label for="gender">Sexe</label>
        <select class="form-control" id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        </select>
    </div>
            </div>
    </div>
        <button  class="btn btn-dark">Ok</button>
</form>




<?php endif;?>
</body>
</html>