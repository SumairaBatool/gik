<?php include('header.php');
$message = $_GET['msg'] ?? '';
?>


<div class="pagetitle">
    <h1>Admissions</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">user-admissions</li>
            <li class="breadcrumb-item active">list</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class='alert <?= 'alert-' . $_GET['status'] ?>'><?= $message ?? '' ?></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h5 class="card-title">User Data</h5>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Records</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Short Listed Students</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cancel Admission Students</button>
                        </div>
                    </nav>


                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-responsived datatable " >

                                <thead>
                                    <tr>
                                        <th>sr. #</th>
                                        <th>userimage</th>
                                        <th>username</th>
                                        <th>useremail</th>
                                        <th>fathername</th>
                                        <th>age</th>
                                        <th>qulification</th>
                                        <th>district</th>
                                        <th>village</th>
                                        <th>gender</th>
                                        <th>phone</th>
                                        <th>paddress</th>
                                        <th>languages</th>
                                        <th>status</th>
                                        <th>subject</th>
                                        <th>admissions status</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // SQL query to retrieve data from the users table
                                    $sql = "SELECT * FROM admissions ORDER BY id DESC";
                                    $result = $conn->query($sql);

                                    // Check if any rows were returned
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) { ?>

                                            <tr>
                                                <td><?= $row["id"] ?? 'unknown'; ?></td>
                                                <td><img src="<?= url($row["userimage"]) ?>" width="50px" height="50px" alt="" srcset=""></td>
                                                <td><?= $row['username'] ?? 'unknown'; ?></td>
                                                <td><?= $row['useremail'] ?? 'unknown'; ?></td>
                                                <td><?= $row['fathername'] ?? 'unknown'; ?></td>
                                                <td><?= $row['age'] ?? 'unknown'; ?></td>
                                                <td><?= $row['qulification'] ?? 'unknown'; ?></td>
                                                <td><?= $row['district'] ?? 'unknown'; ?></td>
                                                <td><?= $row['village'] ?? 'unknown'; ?></td>
                                                <td><?= $row['gender'] ?? 'unknown'; ?></td>
                                                <td><?= $row['phone'] ?? 'unknown'; ?></td>
                                                <td><?= $row['paddress'] ?? 'unknown'; ?></td>
                                                <td><?= $row['languages'] ?? 'unknown'; ?></td>
                                                <td><?= $row['status'] ?? 'unknown'; ?></td>
                                                <td><?= $row['subject'] ?? 'unknown'; ?></td>
                                                <td><?= $row['adm_status'] ?? 'pending'; ?></td>

                                                <td><?= date('Y M,d', strtotime($row["created_at"])) ?? 'unknown'; ?></td>
                                                <td><a href="admission-delete.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">Delete</a>
                                                    <a href="admission-confirm.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-success">confirm</a>
                                                    <a href="admission-cancel.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning">cancel</a>
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
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-responsived datatable ">

                                <thead>
                                    <tr>
                                        <th>sr. #</th>
                                        <th>userimage</th>
                                        <th>username</th>
                                        <th>useremail</th>
                                        <th>fathername</th>
                                        <th>age</th>
                                        <th>qulification</th>
                                        <th>district</th>
                                        <th>village</th>
                                        <th>gender</th>
                                        <th>phone</th>
                                        <th>paddress</th>
                                        <th>languages</th>
                                        <th>status</th>
                                        <th>subject</th>
                                        <th>admissions status</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // SQL query to retrieve data from the users table
                                    $sql_cf = "SELECT * FROM `admissions`  WHERE `adm_status`='confirmed'";
                                    $result_cf = $conn->query($sql_cf);

                                    // Check if any rows were returned
                                    if ($result_cf->num_rows > 0) {
                                        // Output data of each row
                                        while ($row_cf = $result_cf->fetch_assoc()) { ?>

                                            <tr>
                                                <td><?= $row_cf["id"] ?? 'unknown'; ?></td>
                                                <td><img src="<?= url($row_cf["userimage"]) ?>" width="50px" height="50px" alt="" srcset=""></td>
                                                <td><?= $row_cf['username'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['useremail'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['fathername'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['age'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['qulification'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['district'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['village'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['gender'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['phone'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['paddress'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['languages'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['status'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['subject'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cf['adm_status'] ?? 'pending'; ?></td>

                                                <td><?= date('Y M,d', strtotime($row_cf["created_at"])) ?? 'unknown'; ?></td>
                                                <td><a href="admission-delete.php?id=<?= $row_cf["id"] ?>" class="btn btn-sm btn-danger">Delete</a>
                                                    <a href="admission-confirm.php?id=<?= $row_cf["id"] ?>" class="btn btn-sm btn-success">confirm</a>
                                                    <a href="admission-cancel.php?id=<?= $row_cf["id"] ?>" class="btn btn-sm btn-warning">cancel</a>
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
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-responsived datatable ">

                                <thead>
                                    <tr>
                                        <th>sr. #</th>
                                        <th>userimage</th>
                                        <th>username</th>
                                        <th>useremail</th>
                                        <th>fathername</th>
                                        <th>age</th>
                                        <th>qulification</th>
                                        <th>district</th>
                                        <th>village</th>
                                        <th>gender</th>
                                        <th>phone</th>
                                        <th>paddress</th>
                                        <th>languages</th>
                                        <th>status</th>
                                        <th>subject</th>
                                        <th>admissions status</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // SQL query to retrieve data from the users table
                                    $sql_cl = "SELECT * FROM admissions  WHERE adm_status = 'canceled' ORDER BY id DESC";
                                    $result_cl = $conn->query($sql_cl);
                                    // Check if any rows were returned
                                    if ($result_cl->num_rows > 0) {
                                        // Output data of each row
                                        while ($row_cl = $result_cl->fetch_assoc()) { ?>

                                            <tr>
                                                <td><?= $row_cl["id"] ?? 'unknown'; ?></td>
                                                <td><img src="<?= url($row_cl["userimage"]) ?>" width="50px" height="50px" alt="" srcset=""></td>
                                                <td><?= $row_cl['username'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['useremail'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['fathername'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['age'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['qulification'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['district'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['village'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['gender'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['phone'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['caste'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['paddress'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['languages'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['status'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['subject'] ?? 'unknown'; ?></td>
                                                <td><?= $row_cl['adm_status'] ?? 'pending'; ?></td>

                                                <td><?= date('Y M,d', strtotime($row_cl["created_at"])) ?? 'unknown'; ?></td>
                                                <td><a href="admission-delete.php?id=<?= $row_cl["id"] ?>" class="btn btn-sm btn-danger">Delete</a>
                                                    <a href="admission-confirm.php?id=<?= $row_cl["id"] ?>" class="btn btn-sm btn-success">confirm</a>
                                                    <a href="admission-cancel.php?id=<?= $row_cl["id"] ?>" class="btn btn-sm btn-warning">cancel</a>
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

        </div>
    </div>
</section>

</main><!-- End #main -->


<?php include('footer.php'); ?>