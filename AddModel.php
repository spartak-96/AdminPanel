<?php
include "MainDBconnection.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["modelAdd"]) && (strlen($_POST["model"])) > 0) {
    $CatName=$_POST["ModelCateg"];
    $sqlCat="SELECT id FROM categories WHERE CategoryName = '$CatName'";
    $res=mysqli_query($conn,$sqlCat);
    $r=mysqli_fetch_assoc($res);
    $i=$r["id"];
    $ModelNname = $_POST["model"];
    $sql = "INSERT INTO `models` (`ModelName`,`categoryID`)
    VALUES ('$ModelNname','$i')";
    mysqli_query($conn, $sql);
    echo "<p class='AddMessage'>Model successfully added!</p>";
    unset($_POST["modelAdd"]);
}

if (isset($_POST["modelAdd"]) && (strlen($_POST["model"])) == 0){
    echo "<p class='AddMessage'>Insert model name!</p>";
    unset($_POST["modelAdd"]);
}

?>
<form action="AddModel.php" method="post">
    <input type="text" placeholder="Model Name" name="model">
    <select name="ModelCateg" >
        <option value="select category" hidden selected>select category</option>
        <?php
        $sqlC = "SELECT CategoryName FROM categories ORDER BY id DESC ";
        $resultC = mysqli_query($conn, $sqlC);
        $options="";
        while ($rowss = mysqli_fetch_array($resultC)) {
            $options=$options."<option value='$rowss[0]'>$rowss[0]</option>";
        }
        echo $options;
        ?>
    </select>
    <input type="submit" name="modelAdd" value="ADD MODEL" class="add" >
</form>
<a href="models.php">CENCEL</a>


<style>

    .AddMessage{
        color: #f44336;
    }
    .add{
        cursor: pointer;
    }
</style>