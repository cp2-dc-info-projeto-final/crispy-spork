<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 

    require_once "connection.php";

    $conn = get_connection();

    $commands = file_get_contents("../create-schema.sql");   
    $result = mysqli_multi_query($conn, $commands);

    if ($result) {
        do {
            // grab the result of the next query
            if (($result = mysqli_store_result($mysqli)) === false && mysqli_error($mysqli) != '') {
                echo "Query failed: " . mysqli_error($mysqli);
            }
        } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli)); // while there are more results
    } else {
        echo "First query failed..." . mysqli_error($mysqli);
    }
    echo '<p>Hello World</p>';
    for ($i = 0; $i < 10 ; $i++)
    {
        echo "Olá mundo!";
        echo "<br/>";
    }
 ?> 
 </body>
</html>