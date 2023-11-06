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
      $sql = "SELECT c.customer_id, c.name, c.email, c.location, COUNT(o.order_id) AS total_orders
      FROM Customers AS c
      LEFT JOIN Orders AS o ON c.customer_id = o.customer_id
      GROUP BY c.customer_id, c.name, c.email, c.location
      ORDER BY total_orders DESC;
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
    echo "Customer ID: " . $row['customer_id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Location: " . $row['location'] . "<br>";
    echo "Total Orders: " . $row['total_orders'] . "<br>";
    echo "<br>";
    echo "<hr>";
    
}


      ?>
   
</body>
</html>