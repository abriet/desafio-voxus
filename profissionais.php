<?php

include_once './inc/Config.php'; // CONFIGURAÇÕES DO SITE
include_once './inc/gpConfig.php'; // CONFIGURAÇÕES DO GOOGLE
include_once './inc/header.php';
include_once './inc/nav.php';

userActive(); // VERIFICA SE O USUÁRIO ESTA LOGADO.
?>



<div class="container">
    <br><br>
    <div class="row">
        <table id="profissionais" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Perfil</th>
            </tr>
            </tfoot>
            <tbody>
            <?php
            $query = mysqli_query($cnx,'SELECT * FROM users');
            while($row = mysqli_fetch_array($query)):
                ?>
                <tr>
                    <td><?php echo $row['first_name'].' '.$row['last_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['level'] ?></td>
                </tr>
                <?php
            endwhile;
            ?>
            </tbody>
        </table>
    </div>
    <br><br>
</div>



<?php

include_once './inc/footer.php';

?>
