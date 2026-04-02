<?php

include("base.php");

if (isset($list_mode)){
    $list_mode = $_COOKIE["ListMode"];
}else{
    $list_mode = "card";
    setcookie("ListMode", $list_mode, 0);
}


# Gets all available stocks
$query->query("SELECT * FROM CAS.stocks");
$stocks = $query->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["bought_stock"])){
        $query->prepare("SELECT * FROM CAS");
    }
}

function auth_user_role(){
    $_SESSION["user"]["role"] == "admin" ? true : header("Location: home.php");
}

?>

<div class="container">

    <div class="card">
        <h1>This is the stocks page</h1>

        <form method = "POST">
            <button type="submit" name=""><?php echo $_COOKIE["ListMode"] == "card" ? "Compact Mode" : "Card Mode"; ?></button>
        </form>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit exercitationem nesciunt alias unde. Placeat eius quis, quibusdam deleniti laborum incidunt maiores ducimus voluptas enim voluptate quam dolorum dolore quae. Adipisci.</p>
   
        <?php if ($_COOKIE["ListMode"] == "table"): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Individual Price</th>
                        <th>Report ID</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>3
                <?php foreach($stocks as $stock): ?>
                <tr>
                    <td><?= htmlspecialchars($stock["name"])?></td>
                    <td><?= htmlspecialchars($stock["description"])?></td>
                    <td><?= htmlspecialchars($stock["type"])?></td>
                    <td><?= htmlspecialchars($stock["current_amount"])?></td>
                    <td><?= htmlspecialchars($stock["individual_price"])?></td>
                    <td><?= htmlspecialchars($stock["report_id"])?></td>
                    <td><?= htmlspecialchars($stock["last_updated"])?></td>
                </tr>
                <?php endforeach ?>
            </table>
        <?php elseif ($_COOKIE["ListMode"] == "card"): ?>
            # card html here
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Individual Price</th>
                        <th>Report ID</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>3
                <?php foreach($stocks as $stock): ?>
                <tr>
                    <td><?= htmlspecialchars($stock["name"])?></td>
                    <td><?= htmlspecialchars($stock["description"])?></td>
                    <td><?= htmlspecialchars($stock["type"])?></td>
                    <td><?= htmlspecialchars($stock["current_amount"])?></td>
                    <td><?= htmlspecialchars($stock["individual_price"])?></td>
                    <td><?= htmlspecialchars($stock["report_id"])?></td>
                    <td><?= htmlspecialchars($stock["last_updated"])?></td>
                </tr>
                <?php endforeach ?>
            </table>
            <?php else: ?>
                <div>You should not be seing this</div>
        <?php endif ?>


    </div>

</div>