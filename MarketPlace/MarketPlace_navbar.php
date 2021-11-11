<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="MarketPlace_index.php">&nbsp; Market Place</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="MarketPlace_index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Stores
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="KopiLuwak.php" style="color:#1db8ff; font-weight: bold;"> Kopi Luwak </a>
            <a class="dropdown-item" href="autocarproducts.php" style="color:#dc3545; font-weight: bold;"> AUTOCAR PRODUCTIONS </a>
            <a class="dropdown-item" href="DDVVToursandTravels.php" style="color:#28a745; font-weight: bold;"> DDVV Tours and Travels </a>
            <a class="dropdown-item" href="PHDAUTOMOBILES.php" style="color:#ffc107; font-weight: bold;"> PHD AUTOMOBILES </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/most_visited_products.php">Our Popular Products </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/popularproducts.php">Featured Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/mplreview.html">Give a Review</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/best_reviews.php">Best Reviews</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/partner.php">Partners</a>
        </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart 
                    <span>
                        <?php 
                        session_start();
                        echo $_SESSION["cartcount"];
                        ?>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/orders.php">Orders &nbsp;</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://rohandeshmukh.live/MarketPlace/marketplace_logout.php">LOGOUT &nbsp;</a>
            </li>
        </ul>
    </div>
    </nav>