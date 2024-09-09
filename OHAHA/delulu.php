<?php
// Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'clothing_store';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check if "Show All Products" button is clicked
if (isset($_POST['show_all_products'])) {
  $sql = "SELECT p.product_id, p.product_name, p.image_path, AVG(r.rating) AS average_rating
          FROM products p
          LEFT JOIN ratings r ON p.product_id = r.product_id
          GROUP BY p.product_id";
} else {
  // Search query
  $search_term = isset($_GET['search']) ? $_GET['search'] : "";

  $sql = "SELECT p.product_id, p.product_name, p.image_path, AVG(r.rating) AS average_rating
          FROM products p
          LEFT JOIN ratings r ON p.product_id = r.product_id";

  if ($search_term) {
    $sql .= " WHERE p.product_name LIKE '%$search_term%'";
  }
}

$result = mysqli_query($conn, $sql);

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GUCHESS </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>GUCHESS Appeal</h1>
    <form action="" method="get">
      <input type="text" name="search" placeholder="Search Products">
      <button type="submit">Search</button>
    </form>
    <form method="post">
      <button type="submit" name="show_all_products">Show All Products</button>
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
</body>
</html>


