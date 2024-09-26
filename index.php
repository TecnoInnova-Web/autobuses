<?php
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
        
        $errorLogin = "nombre o pass malos";
        include_once 'src/views/admin/login.php';
    }

}else {
    include_once 'src/views/admin/login.php';
}


?>

<link href="src/views/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="src/views/admin/css/sb-admin-2.min.css" rel="stylesheet">


    <script src="src/views/admin/vendor/jquery/jquery.min.js"></script>
    <script src="src/views/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="src/views/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="src/views/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="src/views/admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="src/views/admin/js/demo/chart-area-demo.js"></script>
    <script src="src/views/admin/js/demo/chart-pie-demo.js"></script>