<?php

include("base.php");

$status = "";

if ($_SERVER["REQUEST_METHOD"]  == "POST"){
    if (isset($_POST["register_account"])){ 

        $username = $_POST["username"];
        $email= $_POST["email"];
        $role = "student";
        $credit_balance = 0;
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"]; 

        $query = $pdo->prepare("SELECT * FROM CAS.users WHERE name = ?");
        $query->execute([$username]);
        $users = $query->fetchAll();
        if ($password == $repeat_password){
            # If there are no matching users, you can create a account
            if (empty($users)){ 

                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

                $query = $pdo->prepare("INSERT INTO CAS.users (name, role, email, password, credit_balance) VALUES (?,?,?,?,?)");
                $query->execute([$username, $role, $email, $hashed_pass, $credit_balance]);
                header("Location: login.php");
                exit();
            }else{
                $status = "User already exists";
            }
        }else{
            $status = "Passwords do not match";
        }
    }
}

?>

<div class="container">
    <div class="card mt-5">
        <?php if ($status): ?>
            <h1><?= $status ?></h1>
        <?php endif ?>
        <h1>Register</h1>

        <form method="POST" action="">

            <input type="text" name="username" placeholder="Username ..." id="" required>
            <input type="text" name="email" placeholder="Email ..." id="" required>
            <input type="password" name="password" placeholder="Password ..." id="" required>
            <input type="password" name="repeat_password" placeholder="Repeat Password ..." id="" required>

            <button type="submit" name="register_account" >Register</button>
        </form>
        <a href="login.php">Have an account?</a>
    </div>
</div>