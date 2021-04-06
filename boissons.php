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
                <a class="nav-link" href="./products.html">Plats froids</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="#">Plats chauds</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="#">Desserts</a>
            </li>
            <li class="nav-item px-5">
                <a class="nav-link" href="#">Boissons</a>
            </li>
        </ul>

        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\coca.png" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Coca Cola</h2>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\fanta.png" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Fanta</h2>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="img\icetea.jpg">
                    <img src="img\orangina.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Orangina</h2>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\icetea.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Ice Tea</h2>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\evian.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Evian</h2>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-image">
                    <img src="img\perrier.jpg" alt="">
                </div>
                <div class="food-description">
                    <h2 class="food-title">Perrier</h2>
                    <p class="food-price">Prix : 5 €</p>
                </div>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>