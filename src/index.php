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
            if (($result = mysqli_store_result($conn)) === false && mysqli_error($conn) != '') {
                echo "Query failed: " . mysqli_error($conn);
            }
        } while (mysqli_more_results($conn) && mysqli_next_result($conn)); // while there are more results
    } else {
        echo "First query failed..." . mysqli_error($conn);
    }
    echo '<p>Hello World</p>';
    for ($i = 0; $i < 10 ; $i++)
    {
        echo "Olá mundo!";
        echo "<br/>";
    }


    $query = "SELECT nome, sobrenome, email FROM usuario";

    if ($result = $conn->query($query)) {

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            printf ("%s %s (%s)\n", $row["nome"], $row["sobrenome"], $row["email"]);
        }

        /* free result set */
        $result->free();
    }

    /* close connection */
    $conn->close();
 ?> 
 </body>
</html>