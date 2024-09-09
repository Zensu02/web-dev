<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'animove';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (isset($_POST['show_all_products'])) {
  $sql = "SELECT p.product_id, p.product_name, p.image_path, AVG(r.rating) AS average_rating
          FROM products p
          LEFT JOIN ratings r ON p.product_id = r.product_id
          GROUP BY p.product_id";
} else {

  $search_term = isset($_GET['search']) ? $_GET['search'] : "";

  $sql = "SELECT p.product_id, p.product_name, p.image_path, AVG(r.rating) AS average_rating
          FROM products p
          LEFT JOIN ratings r ON p.product_id = r.product_id";

  if ($search_term) {
    $sql .= " WHERE p.product_name LIKE '%$search_term%'";
  }
}

$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <title>animove</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container"><h1 class="logo">Animove</h1></div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item active">Home</li>
                    <li class="menu-list-item">Series</li>
                    <li class="menu-list-item">Movies</li>
                    <li class="menu-list-item">Popular</li>
                </ul>
            </div>
            <div class="profile-container">
                <img class="profile-picture" src="img/Shades are 🔥.jpeg" alt="">
                <div class="profile-text-container">
                    <span class="profile-text">Profile</span>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <i class="left-menu-icon fa-solid fa-house"></i>
        <i class="left-menu-icon fa-solid fa-bookmark"></i>
        <i class="left-menu-icon fa-solid fa-hourglass"></i>
    </div>
    <div class="container">
        <div class="content-container">
            <div class="featured-content">
                <div class="featured-content-image"><img class="image" src="img/berserkcool.jpg" alt=""></div>
                <img class="featured-title" src="img/anime-removebg-preview.png" alt="">
                <p class="featured-desc">Berserk: Berserk (2016) <br></p>
                <p class="featured-desc-1">Branded for death and relentlessly hunted by demons, Guts sets out to defy his <br> gruesome fate, wielding the monstrous blade Dragonslayer to exact vengeance on the <br> one responsible - a former friend whom he once admired. Despite waves of beasts <br> pursuing him, Guts is determined to see his quest through to the end. <br>
                <button class="featured-button">PLAY NOW</button>
            </div>
    <header>
    <h1>Anime List</h1>
    <form action="" method="get">
      <input type="text" name="search" placeholder="Search Anime">
      <button type="submit">Search</button>
      <style>
        input{
            width:200px;
            height: 20px;
            font-size:14;
            border-radius: 5px;
            font-size:bold;
            cursor: pointer;
        }
        button{
            background-color: blueviolet;
            border-radius: 5px;
            font-size:14;
            cursor: pointer;
            margin-top: 5px;
            margin-left:0px;
        }
      </style>
    </form>
    <form method="post">
      <button type="submit" name="show_all_products">Anime list</button>
    </form>
  </header>
  <main>
    <?php if ($result->num_rows > 0): ?>
      <ul class="products">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <li class="product-box">
            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['product_name']; ?>">
            <h2><?php echo $row['product_name']; ?></h2>
            <p>Rating: <?php echo number_format($row['average_rating'], 1); ?></p>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p>No products found.</p>
    <?php endif; ?>
  </main>
            
    </div>
</body>
</html>