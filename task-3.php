<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment-6</title>
</head>
<body>
    <?php

      // Connect to the database
      include_once 'connect.php';

      // Execute the query
      $sql = " SELECT c.name, SUM(p.price * o.quantity) AS total_revenue
      FROM Products AS p
      JOIN Categories AS c ON p.category_id = c.category_id
      JOIN Order_Items AS o ON p.product_id = o.product_id
      GROUP BY c.name
      ORDER BY total_revenue DESC;
      ";

     // Prepare the query statement
    $stmt = $conn->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Fetch all results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
// Loop through the results and display them
foreach ($results as $row) {
    // return print_r($row);
    echo "Category Name: " . $row['name'] . "<br>";
    echo "Total Revenue: " . $row['total_revenue'] . "<br>";
    echo "<br>";
    echo "<hr>";
    
}


      ?>
   
</body>
</html>