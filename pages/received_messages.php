<?php
$sql_recu = sprintf('
SELECT mes.mes_titre, mes.mes_texte,mes.mes_date
FROM 
num_nn_uti_mes num,
uti_utilisateur uti,
mes_message mes
WHERE 
uti.uti_oid =mes.uti_oid AND
num.mes_OID = mes.mes_oid AND
num.uti_oid = %d', $_SESSION['uti_oid']);


$result_recu = $bdd->query($sql_recu);
foreach ($result_recu as $key => $value) {
    echo "<h1>".$value["mes_titre"]."</h1><br>";
    echo "<h2>".$value["mes_date"]."</h2><br>";
    echo $value["mes_texte"]."<br>";
};
?>