<?php
include("../DAO/DAOModule.php");
$id = $_POST['id'];
deleteModule($id);
tousLesModules();

?>