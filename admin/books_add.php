<?php
include("header.php");
include("connection.php");

?>


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Element</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Books Form</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Author Name</label>
                                <select id="inputState" name="a_id" class="form-control">
                                <?php
                                    $sql = "select * from authors";
                                    $result = mysqli_query($conn,$sql);
                                    while($rows = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $rows['id']?>"><?php echo $rows['author_name']?>
                                        </option>;
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Category Name</label>
                                <select id="inputState" name="c_id" class="form-control">
                                <?php
                                    $sql = "select * from category";
                                    $result = mysqli_query($conn,$sql);
                                    while($rows = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $rows['id']?>"><?php echo $rows['CategoryName']?>
                                        </option>;
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Book Name</label>
                                <input type="text" name="bookname" class="form-control" placeholder="Enter Your Book Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Book Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Books Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
if(isset($_POST['submit'])){
    $bookname = $_POST['bookname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $authorname = $_POST['a_id'];
    $categoryname = $_POST['c_id'];


    $sql = "insert into books (Bookname , Description , Price , Catid_FK , AuthId_FK , BookImage) VALUES ('$bookname', '$description' , '$price' , '$categoryname' , '$authorname' , '$image')";
    $result = mysqli_query($conn,$sql);

    if (isset($_FILES)) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp, "images/books/" . $file_name);
    }
        echo "<script>
        alert('Books Has Been Added');
        window.location.href = 'books_show.php'
        </script>";

}
include("footer.php");
?>