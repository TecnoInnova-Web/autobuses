<?php

require_once 'src/routes/autoloader.php';
require_once 'src/routes/web.php';

include_once 'src/include/user.php';
include_once 'src/include/user_session.php';


$userSession = new UserSession();
$user = new User();


if (isset($_SESSION['user'])){
    //echo "hay session";
    $user->setUser($userSession->getCurrentUser());
    include_once 'src/views/admin/dashboard.php';

}else if(isset($_POST['username']) && isset($_POST['password'])){
    // echo "validacion login";
    $userForm = $_POST['username'];
    $passwordForm = $_POST['password'];

    if($user->userExist($userForm, $passwordForm)){
        //echo "usuario valido";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
         include_once 'src/views/admin/dashboard.php';
    }else {
        
        $errorLogin = "nombre o contraseña incorrecto";
        include_once 'src/views/admin/login.php';
    }

}else {
    include_once 'src/views/admin/login.php';
}

include_once 'src/include/scripts.php';
?>
 