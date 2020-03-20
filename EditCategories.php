<?php
include "MainDBconnection.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

<form action="EditCategories.php" method="POST">
    <input type="text" name="editCat" value="<?php echo $_GET['EditC'] ?>" ><br><br>
    <input type="text" name="updatedCat" placeholder="istert category name" ><br><br>
    <input type="submit" name="updateCat" value="UPDATE">
</form>
<a href="categories.php">CENCEL</a>

<?php
if (isset($_POST['updateCat'])){
    $editID=$_POST['editCat'];
    $edieCatName=$_POST['updatedCat'];
    $sql="UPDATE categories SET CategoryName='$edieCatName' where id='$editID'";
    mysqli_query($conn,$sql);
    header("location:categories.php");
}

?>