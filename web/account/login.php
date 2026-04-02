<?php

include("../base/base.php");

$status = "";

if ($_SERVER["REQUEST_METHOD"]  == "POST"){
    if (isset($_POST["login_account"])){ 

        $username = $_POST["username"];
        $email= $_POST["email"];
        $password = $_POST["password"];

        $query = $pdo->prepare("SELECT * FROM CAS.users WHERE name = ?");
        $query->execute([$username]);
        $user = $query -> fetch();

        if (!empty($user)){
            $pass_hash = $user["password"];
            if (password_verify($password, $pass_hash)){
                # If there are no matching users, you can create a account

                $_SESSION["role"] = $user["role"];
                $_SESSION["user"] = $user;

                header("Location: ../base/home.php");
                exit();
            }else{
                $status = "Could not log in";
            }
        }else{
            $status = "Could not log into user $username";
        }
    }
}

?>

<div class="container">
    <div class="card mt-5">

        <?php if ($status): ?>
            <h1><?= $status ?></h1>
        <?php endif ?>

        <h1>Login</h1>

        <form method="POST" action="">

            <input type="text" name="username" placeholder="Username ..." id="" required>
            <input type="text" name="email" placeholder="Email ..." id="" required>
            <input type="password" name="password" placeholder="Password ..." id="" required>

            <button type="submit" name="login_account" >Register</button>

        </form>
        <a href="register.php">Don't have an account?</a>
    </div>
</div>