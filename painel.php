<?php

include_once './inc/Config.php'; // CONFIGURAÇÕES DO SITE
include_once './inc/gpConfig.php'; // CONFIGURAÇÕES DO GOOGLE
include_once './inc/header.php';
include_once './inc/nav.php';




if(isset($_GET['code'])){
    header( 'location: index.php?code='.$_GET['code']);
}


/*
 *      VARIAVEIS DE APOIO PARA ESTA PÁGINA
 */
$nome_completo = $userData['first_name'].' '.$userData['last_name'];
?>

<div class="container" style="min-height: 70vh">
    <br><br>
    <div class="row">
        <div class="col-3 border text-center">
            <img src="<?php echo $userData['picture'] ?>" width="250px" title="<?php echo $nome_completo; ?>">
            <h4><?php echo $nome_completo; ?></h4>
            <p>
                <span class="fa fa-envelope-open-o"></span> <?php echo $userData['email'] ?>
                <br>
                <a target="_blank" href="<?php echo $userData['link'] ?>"><span class="fa fa-google-plus"></span> Meu perfil no Google+</a>
            </p>

        </div>
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-3">Bem Vindo!</h1>
                    <p class="lead">Este é o seu painel de tarefas, nele você pode gerenciar todas as suas taferas e otimizar o seu tempo.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include_once './inc/footer.php';

?>
