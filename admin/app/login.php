<?php 
require_once '../../conn/conn.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM admins WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if($user){
        if(password_verify($password,$user['password'])){
            $_SESSION['popcornNmoviesAdmin'] = $user['id'];
            header('location: dashboard.php');
            exit;
        }else{
            $error = 'You entered an incorrect password!';
        }
    }else{
        $error = 'Your credentials does not match any of our records!';
    }
    
}
?>