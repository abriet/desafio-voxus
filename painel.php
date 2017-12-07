<?php

include_once './inc/Config.php'; // CONFIGURAÇÕES DO SITE
include_once './inc/gpConfig.php'; // CONFIGURAÇÕES DO GOOGLE
include_once './inc/header.php';

userActive(); // VERIFICA SE O USUÁRIO ESTA LOGADO.

if(isset($_GET['code'])){
    header( 'location: index.php?code='.$_GET['code']);
}

?>

<h1><?= $userData['first_name'] ?>, Seja Bem Vindo!</h1>
<a href="logout.php">Sair</a>

<?php

include_once './inc/footer.php';

?>
