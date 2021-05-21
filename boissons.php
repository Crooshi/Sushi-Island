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
                    <img src="img\boisson-coca.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Coca-Cola</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 2 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\boisson-fanta.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Fanta</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 2 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\boisson-oranginaa.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Orangina</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 2 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\boisson-icetea.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Ice Tea</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 2 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\boisson-evian.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Evian</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 2 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\boisson-perrier.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Perrier</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 2 €</p>
                </div>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>