<?php
if(isset($_SESSION['identifier']) && !empty($_SESSION['identifier'])){

}else{
    header("Location: ?p=connexion");
};
?>