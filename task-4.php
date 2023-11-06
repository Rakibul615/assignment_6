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
      $sql = " SELECT c.customer_id, c.name AS customer_name , SUM(o.total_amount) AS total_purchase_amount
      FROM Customers AS c
      JOIN Orders AS o ON c.customer_id = o.customer_id
      GROUP BY c.customer_id, customer_name
      ORDER BY total_purchase_amount DESC
      LIMIT 5;
      
      ";

     // Prepare the query statement
    $stmt = $conn->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Fetch all results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
// Loop through the results and display them
foreach ($results as $row) {
    //  return print_r($row);
    echo "Customer Name: " . $row['customer_name'] . "<br>";
    echo "Total Purchase Amount: " . $row['total_purchase_amount'] . "<br>";
    echo "<br>";
    echo "<hr>";
    
}


      ?>
   
</body>
</html>