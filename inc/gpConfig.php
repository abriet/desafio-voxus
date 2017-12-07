<?php
/**
 * Created by PhpStorm.
 * User: BRIET
 * Date: 06/12/2017
 * Time: 16:15
 */


//Include Google client library
include_once('google/Google_Client.php');
include_once('google/contrib/Google_Oauth2Service.php');

/*
 * Configuration and setup Google API
 */
$clientId = '1084594340523-i86qbvp2hdttnvtkdrd40n8g38ems12o.apps.googleusercontent.com';
$clientSecret = 'Ih2Bll3KwzZz2hb94hF1E4DW';
$redirectURL = 'http://localhost/VOXUS/painel';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Desafio Voxus');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);