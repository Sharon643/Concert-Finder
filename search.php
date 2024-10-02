<?php
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "concert";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];
    
    $sql = "SELECT * FROM concerts WHERE Artist LIKE '%$searchQuery%'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Description: " . $row["description"] . "<br>";
            
            echo "<hr>";
        }
    } else {
        echo "No results found";
    }
}

$conn->close();
?>
