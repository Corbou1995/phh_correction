<?php
function d_vardump($variable){
    global $_DEBUG;
    if(isset($DEBUG) )var_dump($variable);
}
function disconnect(){
    session_destroy();
}

function checkAuthent(){
    if(isset($_GET["deconnexion"])){
        disconnect();
        header('Location:index.php?page=authentification');
    }
    else if(isset($_POST["login"]))
    {
        global $db;
        $valid=$db->authent($_POST["login"],$_POST["password"]);
        var_dump($valid);
        if($valid)
        {
            $_SESSION['uid']=$_POST["login"];
            header("Location:index.php");
        }
    }
}

include_once('mysql.php');
$db=new BaseDeDonnees();
checkAuthent();
d_vardump($db);
    
?>