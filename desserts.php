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
                    <img src="img\glace1-fraise.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Glace à la fraise</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 3 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\glace2-chocolat.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Glace au chocolat</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 3 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\glace3-pistache.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Glace à la pistache</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 3 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\glace4-citron.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Glace au citron</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 3 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\glace5-mangue.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Glace à la mangue</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 3 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\glace6-noisette.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Glace à la noisette</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 3 €</p>
                </div>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>