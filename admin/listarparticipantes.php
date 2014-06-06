<?php
require_once '../admin/inc/servidor.php';
   
   //Incluir a classe excelwriter
   include("../admin/inc/excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("listagem_geral.xls");

    if($excel==false){
        echo $excel->error;
   }
/*   
      //Escreve o nome dos campos de uma tabela
   $myArr=array('NOME','CPF','DATA DE NASCIMENTO','SEXO','EMAIL','IGREJA','DISTRITO','TELEFONE','AREA DE ATUAÇÃO','FÓRUM','FORMA DE PAGTO');
   $excel->writeLine($myArr);
   
*/
$participantesQuery = consultaDados("select * from participante order by nome ASC");

    if(isset($_GET['acao'])){
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    if($_GET['acao'] == 'excluir'){
        consultaDados("delete from participante where id = '$id'");
        $excluir = 'ok';
    }
    }    
    
    $totalQuery = consultaDados("select * FROM participante" ); // Seleciona toda Tabela
    // Conta quanto registro tem na tabela
    $total = mysql_num_rows($totalQuery);
?>

<script type="text/javascript">
    function excluir(id){
        if(confirm("Você tem certeza que deseja EXCLUIR o participante?") == true){
          window.location = '?page=listparticipantes&acao=excluir&id=' + id;          
        }
    }
</script>
<div class="span12">
<article>
    <h3>Participantes</h3>
    <br />
    <section>
        <strong>Total de Participantes:</strong> <?php echo $total; ?> Inscritos
    </section> <br />
 <table class="table table-striped">
     <thead>
     <tr>
         <th width="40%">Participantes</th>
         <th width="25%">Email</th>
         <th width="25%">Pagamento Confirmado</th>
         <th width="20%">Editar/Deletar</th>
     </tr>
     </thead>
     <tbody>
     <?php while($participante = mysql_fetch_array($participantesQuery)) {  ?>
     <tr>        
     <th><?php echo $participante['nome'];?></th>
     <th class="text-left"><?php echo $participante['email'];?>
     </th>       
     <th><?php if($participante['confirma_pagto'] == 1){echo "<span class='verde-negrito'>Não</span>";}else{echo "<span class='vermelho-negrito'>Sim</span>";};?></th>
     <th>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="get">
        <a class="btn btn-small btn-success" href="?page=editparticipante&acao=editar&id=<?php echo $participante['id']; ?>" title="Clique para Editar"><i class="icon-edit icon-white"></i></a>
       <a class="btn btn-small btn-success" href="javascript:func()" onclick="excluir('<?php echo $participante['id']; ?>')" onclick="excluir" title="Clique para Excluir"><i class="icon-remove icon-white"></i></a>      
            <?php echo '<input type="hidden" name="id" value="' . $participante['id'] . '" formmethod="get" />'; ?>
        <input type="hidden" name="acao" value="<?php echo $participante['id']; ?>" formmethod="get"/>
        <input type="hidden" name="acao" value="editar"/>
        </form>
     </th>     
     </tr>
     
    
     <?php } ?>
     </tbody>
 </table>
</article>
<br />
 <?PHP     $excel->close();
    echo "<a href=\"listagem_geral.xls\" class=\"btn btn-primary\" target=\"_blank\">Baixar Planilha</a>";
?>
 <input type="button" value="Imprimir Relatório" onclick="window.print()" class="btn btn-primary"/>

</div>

