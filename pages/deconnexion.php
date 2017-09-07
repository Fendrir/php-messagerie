<?php
if(isset($_SESSION['identifier']) && !empty($_SESSION['identifier'])){
    session_destroy();
    header("Location: ?p=connexion");
}else{
    header("Location: ?p=connexion");
}
;
?>