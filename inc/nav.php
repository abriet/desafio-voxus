<?php userActive(); // VERIFICA SE O USUÁRIO ESTA LOGADO. ?>
<div class="container-fluid">
    <div class="row" style="background-image: url(http://lorempixel.com/1920/1080/business); background-repeat: no-repeat; background-position: center; background-size: cover; height: 300px; background-color: #222;" >
        <h1 style="line-height: 300px; padding-left: 50px; color: #fff; background-color: rgba(0,0,0,0.5); width: 100%; height: 100%; ">Dashboard of Tasks</h1>
    </div>
</div>

<nav class="navbar   navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home"><i class="fa fa-dashboard"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="painel">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tarefas">Minhas Tarefas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profissionais">Profissionais</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-0">
            <li class="nav-item active">
                <a class="nav-link" href="#"><spaan class="fa fa-user"></spaan> Meu Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout"><span class="fa fa-sign-out"></span> Sair</a>
            </li>

        </ul>
    </div>
</nav>