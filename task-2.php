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
      $sql = "SELECT  o.order_id,p.name, oi.quantity, (oi.quantity * oi.unit_price) AS total_amount
      FROM  Orders AS o
      JOIN Order_Items AS oi ON o.order_id = oi.order_id
      JOIN Products AS p ON oi.product_id = p.product_id
      ORDER BY  o.order_id ASC
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
    echo "Product Name: " . $row['name'] . "<br>";
    echo "Quantity: " . $row['quantity'] . "<br>";
    echo "Total Amount: " . $row['total_amount'] . "<br>";
    echo "<br>";
    echo "<hr>";
    
}


      ?>
   
</body>
</html>