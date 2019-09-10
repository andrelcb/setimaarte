<?php
header("Content-type:text/html; charset=utf-8");
require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


//////////////////////////////////////////////////////////////////////
//======== ajusta os parâmetros recebidos para criar a query =======//
$filme = $_POST['filme'];

//////////////////////////////////////////////////////////////////////
//======== recupera os parâmetros para definir a quantidade de registros por página =======//
$registros_por_pagina = $_POST['registros_por_pagina'];
$offset = $_POST['offset'];
//////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////
//======== recupera o total de registros com base no filtro =======//
$sql = " SELECT COUNT(*) as total_registros FROM Filmes WHERE 1=1 ";
$sql.= $filme != "" ? " AND nome_filme LIKE '%$filme%' " : "";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
    $total_registros = $registro['total_registros'];
} else {
    echo 'Erro ao tentar recuperar o total de registros!';
}

$sql = "SELECT f.foto_filme,
               f.nome_filme,
               f.classificacao,
               c.nome_cinema, 
               f.preco_sessao,
               f.opcao,
               s.nome_shopping,
               date_format(f.horario_filme, '%H:%m') AS data
          FROM cinema c 
    INNER JOIN filmes f
            ON c.idcinema = f.cinema_idcinema
    INNER JOIN shopping s
            ON s.idshopping = c.shopping_idshopping
         WHERE nome_filme LIKE '%$filme%' 
      ORDER BY preco_sessao asc";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

echo '<div class="panel panel-info">';
    echo '<div class="panel-body">';
        echo '<div class="table-responsive">';
                echo '<table class="table table-striped table-bordered table-hover">';
                    echo '<thead>';
                        echo ' <tr style="background-color:red;"> ';
                            echo '<th style="color:white;" scope="col1" >FILMES</th>';
                            echo '<th style="color:white;" scope="col1" >NOME</th>';
                            echo '<th style="color:white;" scope="col1" >CLASSIFCAÇÃO</th>';
                            echo '<th style="color:white;" scope="col1" >CINEMA</th>';
                            echo '<th style="color:white;" scope="col1" >PREÇO</th>';
                            echo '<th style="color:white;" scope="col1" >OPCAO</th>';
                        echo '</tr>';
                    echo '</thead>';
					
                    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td><img src="imagens/'.$registro['foto_filme'].'" class="rounded" width="75" height="75"></td>';

                                echo '<td>'.$registro['nome_filme'].'<br> <span>Horario</span> '.$registro['data'].'</td>';

                                echo '<td>'.$registro['classificacao'].'</td>';

                                echo '<td style=""><b>'.$registro['nome_cinema'].'</b><br>'.$registro['nome_shopping'].'</td>';
                                
                                echo '<td style="color: green"><b>R$'.number_format($registro['preco_sessao'], 2).'</b<</td>';

                                echo '<td>'.$registro['opcao'].'</td>';        
                            echo '</tr>';
                        echo '</tbody>';
                    }
                 echo '</table>';
        echo '</div>';
    echo '</div>';
echo '</div>';


     //como o offset (página) inicia em zero, ajusto para que visualmente seja indicado o início em seu respectivo valor +1
     $offset++;
     //descobre a quantidade de páginas com base no total de registros / dividido pela quantidade de registros por página
     $total_paginas = ceil($total_registros / $registros_por_pagina); // a função ceil() arredonda o resultado para o inteiro superior mais próximo
     echo "Página ".ceil($offset / $registros_por_pagina)." de $total_paginas Total de registros: $total_registros";

     echo "<br />";

     //cria os links de paginação
     $pagina_atual = ceil($offset / $registros_por_pagina); //localiza a pagna atual

     for($i = 1; $i <= $total_paginas; $i++) {    
        
        $classe_botao = $pagina_atual == $i ? 'btn-primary' : 'btn-default'; //aplica a classe para o botão da página atual
        echo '<button style="background-color:red; border-color:red;" class="btn '.$classe_botao.' paginar" data-pagina_clicada="'.$i.'">'.$i.'</button>';
     }

     echo "<br /><br />";

} else {
    echo 'Erro na consulta dos registros!';
}


?>