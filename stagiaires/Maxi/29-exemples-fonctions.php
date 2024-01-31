<?php

require "array.php";


// preocedure
function helloWorld(){
    echo "hello Wolrd!";
}

helloWorld();

//fonction avec retour
function myHelloWorld(){
    //envoit une valeur et s'arrete
    return "Hello World";
}

echo myHelloWorld();




function upperArray(array $tab): string 
{
    $text ="";
    foreach($tab as $value){
        $value .= strtoupper($value). "<br>";
        $txt  .=upperArray($value);
    }else{
        
    }
    }
    return  $txt;
}

echo upperArray("coucou");
echo "<br>";
echo upperArray($classe);

