<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/master.scss">
</head>
<body>
    <table class="table table-striped">
        <tr class="thead-dark">
            <th>#</th>
            <th>PRÉNOM</th>
            <th>NOM</th>
            <th>SEXE</th>
        </tr>
        <?php foreach($personnes as $pers):
            $id= htmlspecialchars($pers->getId()); ?>
        <tr>
            <td>
                <a href="/update_personne_controller.php?id=<?=$id?>" ><?=$id?>
               </a></td>
            <td><?= htmlspecialchars($pers->getPrenom()) ?></td>
            <td><?= htmlspecialchars($pers->getNom()) ?></td>
            <td><?= htmlspecialchars($pers->getGender()) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form action="/add_person_controller.php" method="get">
    <button  class="btn btn-dark">Ajouter Personne</button>
    </form>
    <script src="/public/js/script.js"></script>
</body>
</html>