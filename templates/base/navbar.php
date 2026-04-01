<div class="nav navbar">
    <div class="d-flex justify-content-center">
        <div class="card">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products </a></li>
                <?php if ($_SESSION["user"]["role"] == "admin"): ?>
                    <li><a href="product_stocks.php">Product stocks</a></li>
                    <li><a href="admin_panel.php">Admin Panel</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>