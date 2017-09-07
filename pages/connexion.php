<?php
if(!isset($_SESSION['identifier']) && empty($_SESSION['identifier'])){
    ?>
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
        $row = $result_sql->fetch();
        if ($row["uti_pseudo"] == $pseudo && $row["uti_password"] == $pwd) {
            $_SESSION['identifier'] = $row["uti_pseudo"];
            $_SESSION['uti_oid'] = $row["uti_oid"];
            header("Location: ?p=accueil");
        };
        echo "Identifiant ou mot de passe incorrect";
    };
};
?>

