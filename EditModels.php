<?php
include "MainDBconnection.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

    <form action="EditModels.php" method="POST">
        <input type="text" name="editMod" value="<?php echo $_GET['EditM'] ?>" ><br><br>
        <input type="text" name="updatedMod" placeholder="istert model name" ><br><br>
        <input type="submit" name="updateMod" value="UPDATE">
    </form>
    <a href="categories.php">CENCEL</a>

<?php
if (isset($_POST['updateMod'])){
    $editID=$_POST['editMod'];
    $edieModName=$_POST['updatedMod'];
    $sql="UPDATE models SET ModelName='$edieModName' where id='$editID'";
    mysqli_query($conn,$sql);
    header("location:models.php");
}

?>