<?php
session_start();
//Si on vient du formulaire de connexion on sauvegrade l'utilisateur en session
if(isset($_POST['user'])){
    $_SESSION['user']=$_POST['user'];
}
if(isset($_SESSION['user'])){ //Si on est connecté on propose la déconnexion
    echo "Utilisateur connecté : ".$_SESSION['user'];
    echo "<a href = 'deconnexion.php'><button name='deconnexion' type='button' class='btn btn-warning '>Se deconnecter</button></a>";
}
else{ //Sinon on propose la connexion
    $bdd = new PDO('mysql:host=localhost;dbname=cineps','root','');
    $affichage_membre = $bdd->query('SELECT * FROM membre');
    echo'<form method="post" action="index.php">
            <label>Membres</label>
                <select class="text-dark" name="user">';
    while($data = $affichage_membre->fetch()){ //Afficher un utlisateur
        echo"<option class='text-dark' class='btn btn-warning' value=".$data['Prenom'].">". $data['Nom']." ".$data['Prenom']."</option>";
    }
    echo"</select>
    <button type='submit' class='btn btn-warning'>Se connecter</button>
    </form>";
}

?>
<hr/>