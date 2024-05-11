<?php
include("header.php");
include("connection.php");

$Id = $_GET['id'];
$sql = "select * from authors where id = $Id";
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($result);

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
                <h4 class="card-title">Author Form</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Author Name</label>
                                <input type="text" name="authorname" value="<?php echo $rows['author_name'] ?>" class="form-control" placeholder="Enter The Name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" value="<?php echo $rows['dob'] ?>" class="form-control" placeholder="Enter The DOB">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Location</label>
                                <input type="text" name="location" value="<?php echo $rows['location'] ?>" class="form-control" placeholder="Enter Your Location">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Image</label>
                            <h6><span>Author Image : </Span><?php echo $rows['image'] ?></h6>
                            <input type="file" name="image" class="form-control">
                        </div>
                </div>

                <button type="submit" name="update" class="btn btn-primary">Author Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<?php

if(isset($_POST['update'])){
    $authorname = $_POST['authorname'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];

    $sql = "update authors set author_name = '$authorname', dob = '$dob' , location = '$location' , image = '$image'  where id = $Id";
    $result = mysqli_query($conn,$sql);
    if(isset($_FILES)){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp, "images/author/" .$file_name);
    }
    echo "<script>
        alert('Author Has Been Updated!');
        window.location.href = 'authors_show.php'
        </script>";
}


include("footer.php");
?>