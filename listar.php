<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/db.class.php";

function listar_filmes()
{

$objDb = new db();
$link = $objDb->conecta_mysql(); 

$sql= "SELECT f.idfilmes,                                     
              f.foto_filme,                                  
              f.nome_filme,                                   
              f.classificacao,
              c.nome_cinema, 
              f.preco_sessao,
              f.opcao                                        
         FROM cinema c 
   INNER JOIN filmes f 
           ON (c.idcinema = cinema_idcinema) 
     ORDER BY preco_sessao desc;";

    $resultadoSelect = mysqli_query($link, $sql);

    if($resultadoSelect)
    {   
        return $lista = mysqli_fetch_all($resultadoSelect, MYSQLI_ASSOC);
    }
    else
    {
        return 0;
    }

}


function listarFilmeCodigo($codigo)
{

$objDb = new db();
$link = $objDb->conecta_mysql(); 

  $sql = "SELECT * FROM cinema c 
             INNER JOIN filmes f 
                     ON (c.idcinema = f.cinema_idcinema)
                  WHERE idfilmes =".$codigo;


  $resultadoSelect = mysqli_query($link, $sql);


    if($resultadoSelect)
    {   
        return $lista = mysqli_fetch_assoc($resultadoSelect);
    }
    else
    {
        return 0;
    }

}


function listarCinemas()
{
    $objDb = new db();
    $link = $objDb->conecta_mysql(); 
    
    $sql = "SELECT *
              FROM cinema C
        INNER JOIN shopping f 
                ON idshopping = shopping_idshopping;";

    $resultCinemas = mysqli_query($link, $sql);

    if($resultCinemas)
    {
        return $lista = mysqli_fetch_all($resultCinemas, MYSQLI_ASSOC);

    }
    else
    {
        return 0;
    }
}


function listarShopping()
{
    $objDb = new db();
    $link = $objDb->conecta_mysql(); 
    
    $sql = "SELECT *
              FROM shopping;";

    $resultShopping = mysqli_query($link, $sql);

    if($resultShopping )
    {
        return $lista = mysqli_fetch_all($resultShopping, MYSQLI_ASSOC);

    }
    else
    {
        return 0;
    }
}


function listarUsuarios()
{
    $objDb = new db();
    $link = $objDb->conecta_mysql(); 
    
    $sql = "SELECT *
              FROM usuario;";

    $resultUsuario = mysqli_query($link, $sql);

    if($resultUsuario )
    {
        return $lista = mysqli_fetch_all($resultUsuario, MYSQLI_ASSOC);

    }
    else
    {
        return 0;
    }
}



?>