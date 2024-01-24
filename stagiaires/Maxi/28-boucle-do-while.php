<?php
/*
 * Les boucles do while
 */

// chargement des données 
include 'array.php';

// on trie $depFr par ordre alphabétique en retirant les clefs
$depFr = array_values($depFr);
// On compte le nombre de pays dans le tableau $depFr
$nbPays = count($depFr);
// On initialise la variable $nbPaysParPage
$nbPaysParPage = 20;
// On calcule le nombre de pages nécessaires
// pour afficher toutes les régions, ceil arrondit à l'entier supérieur
$nbPages = ceil($nbPays / $nbPaysParPage);


?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>28-boucle-do-while</title>
</head>

<body>
    <h1>28-boucle-do-while</h1>
    <h2>Créez la pagination avec la boucle do while</h2>
    <p>Puis créez le menu pour passer d'une page à l'autre en utilisant la variable $_GET nommée 'pg'</p>
    <p>Exemple d'un lien valide : <a href="?pg=3">3</a></p>
    <?php
    echo "Pour ce tableau de $nbPays pays, répartis par $nbPaysParPage pays par page,
    vous obtiendrez $nbPages pages<br><br>";

    //si il existe la variable $_GET['pg'] et qu'elle n'est pas vide (!empty)
    // et (and &&)
    //que des signes numeriques => 0123456789
    if(!empty($_GET['pg'])&&ctype_digit($_GET['pg'])){
        //on trqsnforme toujours les superglobales utilisateur en variables locales 
        //pour le traitement de sécurtité
        //trasnformation du string en integer
        $currentPage = (int) $_GET['pg']; //en utilisant les casting de type
     // sinon (pas de variable $_GET['pg'] ou varible non valide   
    }else{
        $currentPage=1;
    }

    //condition ternaire qui remplit la meme condition: condition? true : false

    $currentPage = !empty($_GET['pg'])&&ctype_digit($_GET['pg'])
        ? (int) $_GET['pg']
        : 1;


    /*
    si il existe la variable $_GET['pg'] ET 
        if(isset($_GET['pg']) && 
    que la variable pg est un string ne contenant 
    que des signes numériques => 123456789
        ctype_digit($_GET['pg'])
        ET qu'il est dif de empty
        && !empty($_GET['pg'])){
           echo $_GET['pg'];
        }
    */   
    

    ?>
    <h2>Les régions de France</h2>
    <h4>
        <?php
        $page = 1;
        do {
            /* -- bonne pratique -- 
            ?>
            <a href="?pg=<?=$page?>"><?=$page?></a>
            ?>
            */
            echo "<a href='?pg=$page'>$page</a> ";
            $page++;
        } while ($page <= $nbPages)
        ?>
    </h4>
    <p>Affichez ensuite la liste des régions suivant la variable $_GET nommée 'pg'</p>
    <hr>
        <ul>
        <?php
        //debut de l'index du tableau (le LIMIT en SQL )
        $i=($currentPage-1)*$nbPaysParPage;
        do{
            // si on depasse le nombre de pays, on arrete la boucle
            if($i>=$nbPays) break;
        ?>    
        <li><?=$depFr[$i]?></li>
        <?php
        }while($i<$nbPaysParPage * $currentPage);
        ?>
        </ul>

    <hr>
    <h4>
        <?php

        ?>
    
    </h4>
</body>

</html>