<html lang="fr">

<head>
    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <link rel="stylesheet" href="/Shreknema/pages/anime.css">
</head>

<body>

    <nav class="navbar background">
        <ul class="nav-list">
            <li><a href="/Shreknema/pages/index.php">Accueil</a></li>
            <li><a href="/Shreknema/pages/form.php">Connexion</a></li>
        </ul>
        <div class="rightNav">

            <input id="searchbar" onkeyup="search_anime()" type="text" name="search" placeholder="Recherche un anime">
        </div>
    </nav>






    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item">
                <img src="/Shreknema/image/bg.jpg" alt="">
                <div class="carousel-item-details">
                    <h3 class="carousel-item-title">Jujutsu Kaisen</h3>
                    <p class="carousel-item-description">Description du film 1</p>
                    <button class="carousel-item-button">Regarder</button>
                    
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Shreknema/image/bg2.jpg" alt="">
                <div class="carousel-item-details">
                    <h3 class="carousel-item-title">Docteur Strange in the Multiverse of Madness</h3>
                    <p class="carousel-item-description">Description du film 2</p>
                    <button class="carousel-item-button">Regarder</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Shreknema/image/bg3.jpg" alt="">
                <div class="carousel-item-details">
                    <h3 class="carousel-item-title">Wanda-Vison</h3>
                    <p class="carousel-item-description">Description du film 3</p>
                    <button class="carousel-item-button">Regarder</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Shreknema/image/bg2.jpg" alt="">
                <div class="carousel-item-details">
                    <h3 class="carousel-item-title">Docteur Strange in the Multiverse of Madness</h3>
                    <p class="carousel-item-description">Description du film 4

                    </p>
                    <div id="container">
                        <div id="left">
                            <button class="carousel-item-button">Regarder </button>
                        </div>
                        <div id="right">
                        <div id="stars"></div>
                        </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>

    <form>
        <label for="rating">Rating out of 5:</label>
        <input type="number" id="rating" name="rating" min="0" max="5">
        <button type="button" onclick="displayStars()">Submit</button>
    </form>

    Afficher la moyenne de chaque series a cote du bouton regarder

    <script>
    function displayStars() {
        var rating = document.getElementById("rating").value;
        var stars = "";
        for (var i = 0; i < rating; i++) {
            stars += "<span class='star'></span>";
        }
        document.getElementById("stars").innerHTML = stars;
    }
    </script>
    <script src="/Shreknema/js/searchBar.js"></script>
</body>

</html>