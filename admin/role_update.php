<?php
include("header.php");
include("connection.php");

$Id = $_GET['id'];
$sql = "select * from role where id = $Id";
$result = mysqli_query($conn,$sql);

$rows = mysqli_fetch_assoc($result);
?>


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
                <h4 class="card-title">Role Update</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Role Name</label>
                                <input type="text" name="role" value="<?php echo $rows['Role_Name'] ?>" class="form-control" placeholder="Enter your Role Name">
                            </div>

                            <button type="submit" name="update" class="btn btn-primary">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if(isset($_POST['update'])){
    $role = $_POST['role'];
    $sql = "update role set Role_Name = '$role' where id = $Id";
    $result = mysqli_query($conn,$sql);
            echo "<script>
            alert('Role Updated Successfully');
            window.location.href = 'role_show.php'
            </script>";
}
    
include("footer.php");
?>