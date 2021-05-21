<?php
    include_once 'header.php';
?>

<style>
    <?php include 'sitestyle.css';?>
</style>

    <section class="food-menu">
        <h2 class="food-menu-heading">
            Food Menu
        </h2>

        <ul class="nav justify-content-center bg-light">
            <li class="nav-item px-5">
                <a class="nav-link" href="./entrees.php">Entrées</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="./products_cold.php">Plats froids</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="./products_hot.php">Plats chauds</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="./desserts.php">Desserts</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="./boissons.php">Boissons</a>
            </li>
        </ul>

        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/menu1.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 1</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 10 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/menu2.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 2</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 10 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/menu3.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 3</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 10 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/menu4.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 4</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 10 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/menu5.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 5</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 10 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img/menu6.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 6</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 10 €</p>
                </div>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>