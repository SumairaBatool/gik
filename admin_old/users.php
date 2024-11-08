<?php
// Database connection
require_once("../inlcudes/config.php");

$error = '';
$errorPassword = '';
$name = '';
$useremail = '';
$password = '';
$cpassword = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // echo '<pre>'; print_r($_POST);die;
  // Retrieve form data
  $name = $_POST['name'];
  $useremail = trim($_POST['useremail']);
  $password = trim($_POST['password']);
  $cpassword = trim($_POST['cpassword']);
  $role = trim($_POST['role']);
  $role_name = ($_POST['role'] == 1) ? 'System Admin' : 'Regular User';

  if ($password != $cpassword) {
    $message = "<div class='alert alert-danger'>password and confirm password not match</div>";
  } else {
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    $userpassword_e = ($_POST['password'] != '') ?  'userpassword  = ' . $hashed_password . ',' : '';

    // $result = $conn->query("SELECT * FROM `users` WHERE useremail = '$useremail' ");
    // if ($result->num_rows == 1) {
    //   $message = "<div class='alert alert-danger'>This email is already exists.</div>";
    // } else {

      // SQL to insert data into table
      $sql = "INSERT INTO users (username, useremail, userpassword, user_role,role_name) VALUES ('$name', '$useremail', '$hashed_password', '$role', '$role_name')";
      $uid = $_POST['uid'] ?? '';
      if($_REQUEST['action'] == 'edit' && $uid != ''){
        $sql = "UPDATE  users SET username = '$name', useremail = '$useremail', $userpassword_e user_role ='$role' ,role_name = '$role_name' WHERE id = $uid";
      }

      if ($conn->query($sql) === TRUE) {

        $message = "<div class='alert alert-success'>new user create successful</div>";
        if($_REQUEST['action'] == 'edit' && $uid != ''){
          $message = "<div class='alert alert-success'>user updated successfully</div>";
        }
        
      } else {
        $message = "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error."</div>";
      }
      unset($_GET['action']);
      unset($_GET['id']);
      $_SERVER["REQUEST_METHOD"] == "POST";
    // }
  }
}


if($_SERVER["REQUEST_METHOD"] == "GET"){
       

  $u_id = $_GET['id'] ?? '';
  $action = $_GET['action'] ?? '';

  if($action  == 'edit' && $u_id != '' ){

      $sql = "SELECT * FROM users WHERE id = '$u_id'";
      $result = $conn->query($sql);
      $row1 = $result->fetch_assoc();
      // echo '<pre>'; print_r($row1); die;
      // $row1 = [];
  

  $mAttr = [' show' ,'style="display: block;"'];

}
}

?>

<?php include('header.php'); ?>


<div class="pagetitle">
  <h1>Registered Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">users</li>
      <li class="breadcrumb-item active">list</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body table-responsive">
          <h5 class="card-title">User Data</h5>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
            Add new User
          </button>
          <!-- Table with stripped rows -->
          <table class="table table-striped table-responsived datatable ">
            <thead>
              <tr>
                <th>Sr . #</th>
                <th>
                  <b>N</b>ame
                </th>
                <th>Email</th>
                <th data-type="date" data-format="YYYY/DD/MM">Joining Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // SQL query to retrieve data from the users table
              $sql = "SELECT * FROM users ORDER BY id DESC";
              $result = $conn->query($sql);

              // Check if any rows were returned
              if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) { ?>

                  <tr>
                    <td><?= $row["id"] ?? 'unknown'; ?></td>
                    <td><?= $row["username"] ?? 'unknown'; ?></td>
                    <td><?= $row["useremail"] ?? 'unknown'; ?></td>
                    <td><?= date('Y M,d', strtotime($row["created_at"])) ?? 'unknown'; ?></td>
                    <td><a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">Delete</a>
                      <a href="users.php?id=<?= $row["id"] ?>&action=edit" class="btn btn-sm btn-danger">Edit</a>
                    </td>

                  </tr>

              <?php    }
              } else {
                echo "0 results";
              }

              // Close connection
              $conn->close();
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


<!-- Modal -->
<div class="modal fade " id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php
      
       ?>
      <form action="" method="POST" >
                <div class="modal-body">
                <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">User Fullname</span>
                        <input type="text" name="name" value="<?= $row1['username'] ?? '' ?>" class="form-control" aria-label="Course title" aria-describedby="inputGroup-sizing-sm">
                      </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">User Email</span>
                        <input type="email" name="useremail" value="<?= $row1['useremail'] ?? '' ?>" class="form-control" aria-label="Course title" aria-describedby="inputGroup-sizing-sm">
                        <div class="error-message visible " style="margin-top:-10px; margin-bottom:10px"><?= $error ?></div>

                      </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                        <input type="password" name="password" value="" class="form-control" aria-label="Course title" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Confirm Password</span>
                        <input type="password" name="cpassword" value="" class="form-control" aria-label="Course title" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Role</span>
                        <select name="role" class="form-control"  aria-describedby="inputGroup-sizing-sm" required>
                          <option value=""> ---- select role ---- </option>
                          <option value="1" <?= ($row1['user_role'] ?? '' ) == '1' ? 'selected': '' ?> >Admin</option>
                          <option value="2" <?= ($row1['user_role'] ?? '' )== '2' ? 'selected': '' ?> >Regular user</option>
                        </select>
                    </div>
                    <div class="error-message visible " style="margin-top:-10px; margin-bottom:10px"><?= $error ?></div>
 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="uid" value="<?=  $row1['id'] ?? '' ?>" >
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
      $("#userModal").modal('show');
    });
  </script>
  <?php } ?>
<?php include('footer.php'); ?>