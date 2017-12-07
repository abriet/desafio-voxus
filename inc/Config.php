<?php
/**
 * Created by PhpStorm.
 * User: BRIET
 * Date: 07/12/2017
 * Time: 07:16
 */

session_start(); //Inicia a Sessão

date_default_timezone_set('America/Sao_Paulo');

/*
 *########################################
 *      CONEXÃO COM O BANCO DE DADOS
 *########################################
 */

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_BASE','voxus');

//Executa conexão com o banco de dados, se houver falha termina a conexão.
@$cnx = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE) or die ('<br>ERROR AO CONECTAR NO BANCO DE DADOS => <br>'.mysqli_connect_error());



/*
 *########################################
 *         DADOS BÁSICOS DO SITE
 *########################################
 */

define('SITE_TITLE', 'Dashboard​ ​de​ Tasks');