<?php

include_once './inc/Config.php'; // CONFIGURAÇÕES DO SITE
include_once './inc/gpConfig.php'; // CONFIGURAÇÕES DO GOOGLE
include_once './inc/functions.php'; // TODAS AS FUNÇÕES DO SITE
include_once './inc/header.php';


if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}


if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();

    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => @$gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = checkUser('users',$gpUserData);

    //Storing user data into session
    $_SESSION['userData'] = $userData;

    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="btn btn-danger"><span class="fa fa-google-plus"></span> LOGIN</a>';
}

?>

<div class="container-fluid bg-dark">
    <div class="row" style="height: 100vh;">
        <div class="card" style="width: 35rem; margin:auto;">
            <div class="card-body">
                <h4 class="card-title">Identifique-se para acessar...</h4>
                <p class="card-text">Faça seu login com a sua conta no Google+.</p>
                <?php echo $output ?>
            </div>
        </div>
    </div>
</div>

<?php

include_once './inc/footer.php';

?>