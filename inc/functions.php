<?php
/**
 * Created by PhpStorm.
 * User: BRIET
 * Date: 07/12/2017
 * Time: 08:05
 */


/*
 *      FUNÇÃO COM O OBJETIVO DE VERIFICAR SE O USARIO QUE ESTA LOGANDO JÁ POSSUI UM REGISTRO NO BANCO DE DADOS
 */

function checkUser($userTbl, $userData = array()){
    if(!empty($userData)){
        //Check whether user data already exists in database
        $prevQuery = "SELECT * FROM ".$userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
        $prevResult = mysqli_query($GLOBALS['cnx'], $prevQuery);
        if($prevResult->num_rows > 0){
            //Update user data if already exists
            $query = "UPDATE ".$userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $update = mysqli_query($GLOBALS['cnx'], $query);
        }else{
            //Insert user data
            $query = "INSERT INTO ".$userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
            $insert = mysqli_query($GLOBALS['cnx'], $query);
        }

        //Get user data from the database
        $result = mysqli_query($GLOBALS['cnx'], $prevQuery);
        $userData = $result->fetch_assoc();
    }

    //Return user data
    return $userData;
}


function userActive(){
    $userActive = $_SESSION['userData'];

    if(empty($userActive)){
        header('Location: logout.php');
        echo "Não esta logado";
    }
}

