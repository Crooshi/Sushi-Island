<?php
    include_once 'header.php';
?>
    
    <section class="food-menu">
        <h2 class="food-menu-heading">
            Food Menu
        </h2>

        <ul class="nav justify-content-center bg-light">
            <li class="nav-item px-5">
                <a class="nav-link" href="#">Entrées</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="./products.php">Plats froids<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="#">Plats chauds</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="#">Desserts</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="./boissons.php">Boissons</a>
            </li>
        </ul>

        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-image">
                    <img src=".img/menu1.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 1</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src=".img/menu2.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 2</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src=".img/menu3.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 3</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src=".img/menu4.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Menu Item 4</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, praesentium.</p>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
        </div>
    </section>

 <?php
    include_once 'footer.php';
?>