<?php
// if (isset($_SESSION)){
//     session_destroy();
// }else {
//     echo "Vous n'etes pas co";
// };
session_destroy();
header("Location: ?p=accueil")
?>