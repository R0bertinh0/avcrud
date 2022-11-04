<?php 
 session_start();
 ob_start();
require('config.php');
require('head.php');

if((!isset($_SESSION['id'])) && (!isset($_SESSION['nome']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário fazer o login!</p>";
    header("Location: index.php");
}

?>



<body>
    <h1>Home</h1>
<h2>Bem-vindo, <?php echo $_SESSION['nome'] ?></h2>
  <center> <h1> Lista de alunos</h1>   </center>    



<!-- 
<table rules="all">
<thead>
    <tr> 
    <th> NOME </th>
    <th> EMAIL </th>
    <th> IDADE </th>
    <th> ENDEREÇO </th>
    <th>  </th>
    </tr>
</thead> -->



<tbody> 


    <?php 

$sql= $pdo->query(" SELECT * FROM alunos ");
$dados = $sql->fetchAll();
foreach($dados as $aluno) :?>

<table rules="all">
    <thead>
        <tr>
        <th> NOME </th>
        <th> EMAIL </th>
        <th> IDADE </th>
        <th> CONTATO</th>
        <th> ENDEREÇO </th>

        </tr>
    </thead>
    
    <tr>
        <td> <?= $aluno[1]  ?></td>
        <td> <?= $aluno[2]  ?></td>
        <td> <?= $aluno[3]  ?></td>
        <td> <?= $aluno[4] ?></td>
        <td> <?= $aluno[5]  ?></td>
       
        
        <a class="btn btn-primary" href="registrar_aluno.php"> Registrar Aluno </a><br/><br/>
        <a 
                            href="editar.php?id=<?=$aluno['id']; ?>"
                            class="btn btn-success"
                            >
                            Editar
                            </a>
                            <a 
                            href="excluir.php?id=<?=$aluno['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir:')"
                            class="btn btn-danger"
                            >
                            Excluir


    </tr>
     
       <?php 
    endforeach;

    ?>


</tbody>
</table>

</center>

<hr>
  <Center> 
  <a href="sair.php">Sair</a>
 </Center> 

<hr>

</body>

</html>