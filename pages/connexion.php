<section class="row">
    <form action="" method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text"  id="pseudo" name="pseudo">
        <label for="password">Password :</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="valider" name="valider">
    </form>
</section>
<?php
if (isset($_POST["valider"])){
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $pwd = htmlspecialchars($_POST["password"]);
    $sql = sprintf('SELECT * FROM uti_utilisateur WHERE uti_pseudo = "%s" OR uti_password = "%s"', $pseudo, $pwd );
    $result_sql = $bdd->query($sql);


    foreach ($result_sql as $key => $value) {
        if ($value["uti_pseudo"] == $pseudo && $value["uti_password"] == $pwd) {
            $_SESSION['identifier'] = $value["uti_pseudo"];
            return header("Location: ?p=accueil");
        }
    };
    echo "Identifiant ou mot de passe incorrect";
};
?>

