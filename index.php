<?php 
session_start();
if (isset($_SESSION['identifier'])){
    if ($_SESSION['identifier']){
        echo "Bonjour, vous êtes connecté en tant que : ".$_SESSION['identifier'];
    }
}else{
    // header("Location: ?p=connexion");
};
//--------------------------DEBUT CONNEXION A LA BDD--------------------------------------//
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8', 'root', 'admin');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
};
//--------------------------FIN CONNEXION--------------------------------------//
if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'accueil';
}
ob_start();
if($p === 'accueil'){
    include('./pages/accueil.php');
}
if($p === 'connexion'){
    include('./pages/connexion.php');
}
if($p === 'deconnexion'){
    include('./pages/deconnexion.php');
}
if($p === 'nouveau'){
    include('./pages/create_message.php');
}
if($p === 'message'){
    include('./pages/message.php');
}
if($p === 'reception'){
    include('./pages/received_messages.php');
}
if($p === 'envoi'){
    include('./pages/sent_messages.php');
}
if($p === 'utilisateur'){
    include('./pages/utilisateur.php');
}
$content = ob_get_clean();
include('./pages/templates/default.php');

?>