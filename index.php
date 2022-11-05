<?php include("header.php");  ?>
<?php include("conn.php");  

// This are written for the purpose of connecting Database and Header

if (isset($_POST['del'])) {
    $deleteitems = implode(', ', $_POST['del']);
    $query = $db->prepare('DELETE FROM products WHERE id IN (' . $deleteitems . ')');
    $query->execute();
}

//This area has been written to delete items from the database

$query = $db->prepare("select * from products");
$query->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Product List</title>
    
</head>
<body>

<!-- In this section, there are cards in the form and it is written for the purpose of adding or deletion -->

<form action="" class="form1" method="post">

    <div class="mbtn">
    <a href="addproductpage.php" style="text-decoration: none">Product Add</a>
    <button type="submit">MASS DELETE</button>
    </div>


        <div class="grid-container">

        <?php 

        //In this section the table is fetching from the database.

        while ($line = $query->fetch(PDO::FETCH_ASSOC)) {

        echo "<table>";

        echo "<td><input class= cbDel type= checkbox name= del[] value= $line[id]></td>";

        echo "<td>".$line["id"]."</td>";
    
        echo "<td>".$line["name"]."</td>";
    
        echo "<td>".$line["price"]."</td>";
    
        echo "<td>".$line["attribute"]."</td>";

        echo "</table>";   
        }
        ?>

        </div>

</form>

</body>
</html>
