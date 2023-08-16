<?php 

switch($_POST['proceso']){
    case "giraRueda":
        include('./controllers/wheel.php');
        $claseWheel = new Wheel();
        $result = $claseWheel->girar($_POST);
}


?>