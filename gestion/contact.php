<?php
    include 'connexion.php' ;
    if(isset($_GET['id'])){
        $id = strip_tags($_GET['id']);
        $del = $bdd->prepare("DELETE FROM contact WHERE id=?");
        $del->execute(array($id));
    }
    $requete = $bdd->query("SELECT * FROM contact");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des rendez-vous</title>
    <link rel="stylesheet" href="../css/gestion.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">
</head>
<body>
        <aside>
            <a href="rv.php"><h1>Gestion des rendez-vous</h1></a>
            <a href="contact.php" class="active"><h1>Gestion des contacts</h1></a>
        </aside>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Société</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Téléphone</th>
                        <th>Message</th>
                        <th>Supprimer l'alerte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = $requete->fetch()){?>
                    <tr>
                        <td><?=$data['id']?></td>
                        <td><?=$data['nom']?></td>
                        <td><?=$data['societe']?></td>
                        <td><?=$data['email']?></td>
                        <td><?=$data['ville']?></td>
                        <td><?=$data['telephone']?></td>
                        <td><?=$data['msg']?></td>
                        <td><a href="?id=<?=$data['id']?>"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
</body>
</html>