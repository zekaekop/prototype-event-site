<?php

include("base.php");

if ($_SERVER["REQUEST_METHOD"]  == "POST"){
    if (isset($_POST["register_account"])){ 

        $username = $_POST["username"];
        $email= $_POST["email"];
        $role = "student";
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"]; 

        $query = $pdo->prepare("SELECT * FROM CAS.users WHERE name LIKE ?");
        $users = $query->execute([$username]);

        if ($password == $repeat_password){
            # If there are no matching users, you can create a account
            if (empty($users)){ 

                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

                $query = $pdo->prepare("INSERT INTO CAS.users (name, role, password) VALUE (?,?,?)");
                $query->execute([$username, $role, $hashed_pass]);
            }
        }
    }
}

?>

<div class="container">
    <div class="card mt-5">
    <h1>Register</h1>

    <form method="POST" action="">

        <input type="text" name="username" placeholder="Username ..." id="">
        <input type="text" name="email" placeholder="Email ..." id="">
        <input type="password" name="password" placeholder="Password ..." id="">
        <input type="password" name="repeat_password" placeholder="Repeat Password ..." id="">

        <button type="submit" name="register_account" >Register</button>
    </form>
    </div>
</div>