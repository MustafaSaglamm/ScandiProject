<?php

//In this area, a connection to the database has been established

include ("conn.php");

$query = $db->prepare("select * from products");
$query->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>AddProductPage</title>
</head>
<body>

<nav>
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Product Add</a>
    </div>
  </div>
</nav>
    
<!--This section was written for the purpose of adding a new shopping card. -->
       
    <div class="form2">
    <form method="POST" action="#">

      SKU <input type="text" id="formbox" name="SKU"><br>
      Name <input type="text" id="formbox" name="name"><br>
      Price <input type="number" id="formbox" name="price"><br>
      Type Switcher <select id="type" name="product" onChange="prodType(this.value);">
        <option value="">...</option>
        <option value="Acme Disc">USB FLASH</option>
        <option value="War and Peace">War and Peace</option>
        <option value="Chair">Chair</option>
        </select>
                
            <div class="fieldbox" id="acme_disc_attributes">
            <label>Size (MB)</label>
            <input type="text" name="size" value="">
            </div>

                
            <div class="fieldbox" id="war_peace_attributes">
            <label>Weight (KG)</label>
            <input type="text" name="weight" value="">
            </div>

                
            <div class="fieldbox" id="chair_attributes">
            <label>Width (CM)</label>
            <input type="text" name="width"><br>
            <label>Length (CM)</label>
            <input type="text" name="length"><br>
            <label>Height (CM)</label>
            <input type="text" name="Height" value="">
            </div>

              <div class="pabuttons">
              <input type="submit" name="additem" value="Save">
              <button><a class="navbar-brand" href="index.php">Cancel</a></button>
              </div>

    </form>
    </div>    
       
<?php 

//In this section, the newly added card has been transferred to database

if (isset($_POST["additem"])){
    $additem = $db->prepare("insert into products set
    name=:name,
    price=:price,
    attribute=:attribute
    ");
    $additem->execute(array(
        "name" => $_POST["name"],
        "price" => $_POST["price"],
        "attribute" => $_POST["product"]
     
    ));
}
?>

















<script>
        function prodType(prod){
  var acmeAttributes = document.getElementById("acme_disc_attributes");
  var warPeaceAttributes = document.getElementById("war_peace_attributes");
  var chairAttributes = document.getElementById("chair_attributes");
  
  acmeAttributes.style.display="none";
  warPeaceAttributes.style.display="none";
  chairAttributes.style.display="none";
  
  if(prod=="Acme Disc"){
    acmeAttributes.style.display="block";
  }else if(prod=="War and Peace"){
    warPeaceAttributes.style.display="block";
  }else if(prod=="Chair"){
  chairAttributes.style.display="block";
  }
}
</script>
    </body>
</html>
