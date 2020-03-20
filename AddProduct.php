<?php
include "MainDBconnection.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["prodAdd"]) && (strlen($_POST["product"])) > 0) {
    $ModName=$_POST["ProdModel"];

    $sqlMod="SELECT id FROM models WHERE ModelName = '$ModName'";
    $Mres=mysqli_query($conn,$sqlMod);
    $Mr=mysqli_fetch_assoc($Mres);
    $Mi=$Mr["id"];

    $ProdName = $_POST["product"];

    $sqlCat="SELECT categoryID FROM models WHERE id = '$Mi'";
    $Cres=mysqli_query($conn,$sqlCat);
    $Cr=mysqli_fetch_assoc($Cres);
    $Ci=$Cr["categoryID"];

    $imgPath=$_POST["product"];

    $isNew=$_POST["IsNew"];

    $DescInfo=$_POST["Desc_info"];

    $Prise=$_POST["prise"];


    $sql = "INSERT INTO `product` (`categoryID`,`modelID`,`ProductName`,`img_path`,
                       `IsNew`,`desc_info`,`price`)
    VALUES ('$Ci','$Mi','$ProdName','$imgPath','$isNew','$DescInfo','$Prise')";
    mysqli_query($conn, $sql);

    echo "<p class='AddMessage'>Model successfully added!</p>";
    unset($_POST["prodAdd"]);
}

if (isset($_POST["prodAdd"]) && (strlen($_POST["product"])) == 0){
    echo "<p class='AddMessage'>Insert product name!</p>";
    unset($_POST["prodAdd"]);
}

?>
<form action="AddProduct.php" method="post">
    <input type="text" placeholder="Product Name" name="product">
    <select name="ProdModel" >
        <option value="select model" hidden selected>select model</option>
        <?php
        $sqlC = "SELECT ModelName FROM models ORDER BY id DESC ";
        $resultC = mysqli_query($conn, $sqlC);
        $options="";
        while ($rowss = mysqli_fetch_array($resultC)) {
            $options=$options."<option value='$rowss[0]'>$rowss[0]</option>";
        }
        echo $options;
        ?>
    </select><br><br>
    <input type="text" name="img_path" placeholder="image path"><br>

    <p>Is this a new product?</p>
    <input type="radio" id="yes" name="IsNew" value="1">
    <label for="yes">Yes</label>
    <input type="radio" id="no" name="IsNew" value="0">
    <label for="no">No</label><br><br>
    <input type="textarea" placeholder="Products description" name="Desc_info"><br><br>
    <input type="text" placeholder="price" name="prise"><br><br>

    <input type="submit" name="prodAdd" value="ADD PRODUCT" class="add" >
</form>
<a href="products.php">CENCEL</a>


<style>

    .AddMessage{
        color: #f44336;
    }
    .add{
        cursor: pointer;
    }
</style>