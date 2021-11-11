<?php

switch($_GET['menu']){

    case 'uniqueId01':
        menu1();
        break;
    case 'uniqueId02':
        menu2();
        break;
    case 'uniqueId03':
        menu3();
        break;
    default:
        someDefaultFunction();
        break;
}

function menu1(){
    include 'home.php'; //do something
}
function menu2(){
    include 'user.php';
}
function menu3(){
    echo 'You clicked Menu 3! ';
}


?>