<?php
include "MainDBconnection.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$results_per_page=10;
$sql = "SELECT * FROM models ORDER BY id DESC ";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages=ceil($number_of_results/$results_per_page);


if (!isset($_GET["page"])){
    $page=1;
}else{
    $page=$_GET["page"];
}


$this_page_first_result=($page-1)*$results_per_page;
$sql = "SELECT * FROM models ORDER BY id DESC LIMIT ". $this_page_first_result .','.$results_per_page;
$result = mysqli_query($conn, $sql);


?>

<a href="AddModel.php">CREATE MODEL</a>

<table width='70%' border='1' cellpadding='5' cellspacing='5' align='center'>
    <tr>
        <th colspan='7'><h2>Models</h2></th>
    </tr>
    <t>
        <th>ID</th>
        <th>Model Name</th>
        <th>Category ID</th>
        <th>Model Crated Date</th>
        <th>Model Updated Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </t>
    <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $rows["id"] ?></td>
            <td><?php echo $rows["ModelName"] ?></td>
            <td><?php echo $rows["categoryID"] ?></td>
            <td><?php echo $rows["ModelCratedDate"] ?></td>
            <td><?php echo $rows["ModelUpdatedDate"] ?></td>
            <td>
                <form action="EditModels.php" method="GET">
                    <input type="hidden" name='EditM' value='<?php echo $rows["id"] ?>'>
                    <input type="submit" name="EditMbtn" value="EDIT" class="Edit">
                </form>
            </td>
            <td>
                <form action="models.php" method="post">
                    <input type="hidden" name='DelM' value='<?php echo $rows["id"] ?>'>
                    <input type="submit" name="DelMbtn" value="DELETE" class="del">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<form action="welcome.php" method="post">
    <input type="submit" value="Back" class="Back">
</form>

<?php
for($page=1;$page<=$number_of_pages;$page++){
  echo "<div class='pagination'><a href='models.php?page=".$page."'> $page </a></div>";
}




//model delete//////////////////////////////////////////////////////
if (isset($_POST['DelMbtn'])) {
     ?>  <script>
 if(confirm("Do you want to delete the model?")){
            <?php
$id = $_POST['DelM'];
$sql = "DELETE FROM models WHERE id=$id ";
mysqli_query($conn, $sql);
?>
            alert("Model deleted successfully")
        }else(location.replace("models.php"));
</script>
    <?php
    unset($_POST["DelMbtn"]);
}
?>



<style>

    .Back {
        background-color: #111;
        color: #fff;
        padding: 6px;
        cursor: pointer;
    }


.Edit{
    background-color: #4CAF50;
    color: white;
    padding: 9px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 5px;
    text-decoration: none;
}
    .del{
        background-color: #f44336;
        color: white;
        padding: 9px 10px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 5px;
    }



.pagination{
    position: relative;
}

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        position: inherit;
        left: 50%;
        transform: translate(0,-50%);
    }
</style>