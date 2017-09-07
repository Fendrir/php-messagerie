<?php
if(isset($_SESSION['identifier']) && !empty($_SESSION['identifier'])){
    ?>
<section class="container">
<h1>Nouveau message</h1>
    <form action="" method="post">
        <ul class="list-unstyled">
            <li><br>
                <label class="col-xs-2" for="titre">Titre :</label>
                <input type="text"  id="titre" name="titre">
            </li>
            <li><br>
                <label class="col-xs-2" for="date">Date :</label>
                <input type="date" id="date" name="date">
            </li>
            <li><br>
                <label class="col-xs-2" for="texte">Contenu :</label>
                <textarea id="texte" name="texte" cols="50" rows="5"></textarea>
            </li>
            <li><br>
                <label class="col-xs-2" for="texte">Destinataire :</label>
                <select class="ui dropdown" name="receveur">
                    <option value="1">a</option>
                    <option value="2">b</option>
                    <option value="3">c</option>
                </select>
            </li>
            <li><br>
                <input type="submit" value="valider" name="valider">
            </li>
        </ul>
    </form>
</section>

<?php
    if (isset($_POST['valider']) ){
    $titre = htmlspecialchars($_POST['titre']);
    $texte = htmlspecialchars($_POST['texte']);
    $date = htmlspecialchars($_POST['date']);
    $receveur = htmlspecialchars($_POST['receveur']);
    /// envoi du courrier
    $sql_nouveau_message = sprintf('
        INSERT INTO mes_message ( mes_titre, mes_texte, mes_date, uti_oid) VALUE ("%s","%s","%s",%d)
        ', $titre, $texte, $date, $_SESSION["uti_oid"]);
    $bdd->query($sql_nouveau_message);
    ///recuperation de l'id du dernier courrier
    $sql_id_dernier_message = 'SELECT mes_oid FROM mes_message ORDER BY mes_oid DESC limit 1;';
    $result_id_dernier_message = $bdd->query($sql_id_dernier_message);
    $row_id_message = $result_id_dernier_message->fetch();
    $id_message = $row_id_message['mes_oid']; 
    /// envoi a la table des destinataires
    $sql_nouveau_num = sprintf('
        INSERT INTO num_nn_uti_mes VALUE (%d, %d)', $receveur, $id_message );
        $bdd->query($sql_nouveau_num);
    };
}else{
    header("Location: ?p=connexion");
};
?>