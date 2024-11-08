<?php include('header.php'); 
$message = '';
$modal_attr = ' "';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileDestination = '';
    if (!empty($_FILES['c_image']['name'])) {
        $file = $_FILES['c_image'];
        // File details
        $fileName = $_FILES['c_image']['name'];
        $fileTmpName = $_FILES['c_image']['tmp_name'];
        $fileSize = $_FILES['c_image']['size'];
        $fileError = $_FILES['c_image']['error'];
        $fileType = $_FILES['c_image']['type'];
        // File extension
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        // Allowed file types
        $allowed = array('jpg', 'jpeg', 'png', 'gif','jfif');
        // Check if file type is allowed
        if (in_array($fileActualExt, $allowed)) {
            // Check for upload errors
            if ($fileError === 0) {
                // Check file size
                if ($fileSize < 5000000) { // 5MB limit
                    // Unique file name
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../uploads/courses/' . $fileNameNew;

                    // Move file to upload directory
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $fileDestination = 'uploads/courses/' . $fileNameNew;;
                    } else {
                        $message = "<div class='alert alert-danger'>File upload failed!</div>";
                    }
                } else {
                    $message = "<div class='alert alert-danger'>Your file is too big!</div>";
                }
            } else {
                $message =  "<div class='alert alert-danger'>There was an error uploading your file!</div>";
            }
        } else {
            $message =  "<div class='alert alert-danger'>You cannot upload files of this type!</div>";
        }
    }

    if($message  == ''){
        $c_title = $_POST['c_title'];
        $c_desc = $_POST['c_desc'];
        $img_path = $fileDestination;
        $c_price = "Free";
        $_img = '';
        if($img_path != ''){
            $_img = "`c_image`='$img_path', ";
        }

        $sql = "INSERT INTO `courses`(`c_title`, `c_desc`, `c_image`, `c_price`) VALUES ('$c_title','$c_desc','$img_path','$c_price')";
        if(!empty($_GET['id'])){
            $c_id =  $_GET['id'];
            $sql = "UPDATE `courses` SET `c_title`='$c_title',`c_desc`='$c_desc', $_img `c_price`='$c_price'  WHERE `id` = '$c_id'" ;
        }

        if ($conn->query($sql) === TRUE) {
            $message = "<div class='alert alert-success'>New course added successfuly</div>";
            if($_REQUEST['action'] == 'edit' && $uid != ''){
                $message = "<div class='alert alert-success'>Course updated successfully</div>";
            }   
          } else {
            $message = "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error."</div>";
          }
          unset($_GET['action']);
          unset($_GET['id']);
          $_SERVER["REQUEST_METHOD"] == "POST";
    }

}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $c_id = $_GET['id'] ?? '';
    $action = $_GET['action'] ?? '';

    if($action  == 'edit' && $c_id != '' ){

        $sql = "SELECT * FROM courses WHERE id = '$c_id'";
        $result = $conn->query($sql);

        $row1 = [];
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output data of each row
        $row1 = $result->fetch_assoc();
        // echo '<pre>'; print_r($row); 
    }

    $modal_attr = ' show " style="display: block;"';

}
}
?>




<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">courses</li>
            <li class="breadcrumb-item active">list</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <div class="col">
        <?= $message;?>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body table-responsive">
                    <div class=" text-center">
                        <h5 class="card-title">Courses</h5>
                        <!-- <a href="courses-new.php"  class="btn btn-primary m-right" ></a> -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#coursesModal">
                            Add new course
                        </button>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped table-responsived datatable ">

                        <thead>
                            <tr>
                                <th>sr. #</th>
                                <th>Image</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // SQL query to retrieve data from the users table
                            $sql = "SELECT * FROM courses ORDER BY id DESC";
                            $result = $conn->query($sql);

                            // Check if any rows were returned
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) { ?>

                                    <tr>
                                        <td><?= $row["id"] ?? 'unknown'; ?></td>
                                        <td><img src="<?= url($row["c_image"]) ?>" width="50px" height="50px" alt="" srcset=""></td>
                                        <td><?= $row['c_title'] ?? 'unknown'; ?></td>
                                        <td><?= $row['c_desc'] ?? 'unknown'; ?></td>
                                        <td><?= $row['c_price'] ?? 'unknown'; ?></td>

                                        <td><?= date('Y M,d', strtotime($row["created_at"])) ?? 'unknown'; ?></td>
                                        <td><a href="course-delete.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="courses.php?id=<?= $row["id"] ?>&action=edit" class="btn btn-sm btn-info">Edit</a>
                                            
                                        </td>

                                    </tr>

                            <?php    }
                            } else {
                                echo "0 results";
                            }

                            // Close connection
                            // $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>

        </div>
    </div>
</section>

</main><!-- End #main -->

<!-- course modal  -->
<!-- Button trigger modal -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade " id="coursesModal" tabindex="-1" aria-labelledby="coursesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coursesModalLabel">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="input_field mb-3">
                        <label   >Upload Images</label>
                        <input type="file"  class="form-control" name="c_image" style=" width:100%;">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
                        <input type="text" name="c_title" value="<?=  $row1['c_title'] ?? '' ?>" class="form-control" aria-label="Course title" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Description</span>
                        <textarea type="text" name="c_desc" class="form-control"><?=  $row1['c_desc'] ?? '' ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?=  $row1['id'] ?? '' ?>" >
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php if(isset($_GET['action']) && $_GET['action'] == 'edit'){  ?>
  <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#coursesModal").modal('show');
    });
  </script>
  <?php } ?>

<?php include('footer.php'); ?>