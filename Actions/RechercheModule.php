<?php
include("../DAO/DAOModule.php");
$filiere = $_POST['filiere'];
$module = $_POST['module'];
if($filiere != "" && $module == ""){
    $fil = "%".$filiere."%";
    recherche("",$fil);
}else{
    $mod = "%".$module."%";
    recherche($mod,"");
}


?>