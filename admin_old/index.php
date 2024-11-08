<?php include('header.php') ?>

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <a href="users.php"><h5 class="card-title">Registered <span>| Users</span></h5></a>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?php
                      $sql = "SELECT count(*) AS users FROM users"; 
                      echo $conn->query($sql)->fetch_assoc()['users'];
                     ?>
                  </h6>
                  <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

          
            <div class="card-body">
              <a href="user-admissions.php"><h5 class="card-title">New Admissions </h5></a>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>
                  <?php
                      $sql = "SELECT count(*) AS adms FROM admissions"; 
                      echo $conn->query($sql)->fetch_assoc()['adms'];
                     ?>
                  </h6>
                  <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <a href="courses.php"><h5 class="card-title">Courses</h5></a>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>
                  <?php
                      $sql = "SELECT count(*) AS crs FROM courses"; 
                      echo $conn->query($sql)->fetch_assoc()['crs'];
                     ?>
                  </h6>
                  <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Reports -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reports <span>/Today</span></h5>
              <!-- Line Chart -->
              <canvas id="admissionChart" width="400" height="200"></canvas>
              <script src="chart.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                  fetch('getAdmissionData.php')
                    .then(response => response.json())
                    .then(data => {
                    // console.log(data)
                      const districts = data.map(item => item.district);
                      const maleAdmissions = data.map(item => item.male);
                      const femaleAdmissions = data.map(item => item.female);
                      const ctx = document.getElementById('admissionChart').getContext('2d');
                      const admissionChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                          labels: districts,
                          datasets: [{
                              label: 'Male',
                              data: maleAdmissions,
                              backgroundColor: 'rgba(54, 162, 235, 0.2)',
                              borderColor: 'rgba(54, 162, 235, 1)',
                              borderWidth: 1
                            },
                            {
                              label: 'Female',
                              data: femaleAdmissions,
                              backgroundColor: 'rgba(255, 99, 132, 0.2)',
                              borderColor: 'rgba(255, 99, 132, 1)',
                              borderWidth: 1
                            }
                          ]
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true
                            }
                          }
                        }
                      });
                    });
                });
              </script>
              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->

      </div>
    </div><!-- End Left side columns -->

</section>

</main><!-- End #main -->



<?php include('footer.php') ?>