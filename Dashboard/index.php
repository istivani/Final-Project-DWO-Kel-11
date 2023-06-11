<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Mondrian</div>

                        <a class="nav-link" href="cube.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Cube
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">DWO</div>
                    Adventureworks
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Order </div>
                                                    <?php
                                                    $sql = "SELECT SUM(jumlah_pembelian) AS total_pembelian FROM faktaPembelian";
                                                    $result = mysqli_query($connection, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $totalPembelian = $row['total_pembelian'];
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($totalPembelian, 2); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Harga Produk</div>
                                                <?php
                                                    $sql = "SELECT SUM(harga_pembelian) AS total_harga FROM faktaPembelian";
                                                    $result = mysqli_query($connection, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $totalHarga = $row['total_harga'];
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($totalHarga, 2); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Produk</div>
                                                <?php
                                                    $sql = "SELECT COUNT(*) AS total_produk FROM dimProduk";
                                                    $result = mysqli_query($connection, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $totalProduk = $row['total_produk'];
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-danger"><?php echo $totalProduk; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php
                                                $sql = "SELECT COUNT(DISTINCT id_vendor) AS total_vendor FROM dimVendor";
                                                $result = mysqli_query($connection, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                $totalVendor = $row['total_vendor'];
                                                ?>
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Vendor</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            <strong>Jumlah:</strong> <?php echo $totalVendor; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Favorite Categories
                                </div>
                                <div class="card-body">
                                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php
                                    // Assuming you have already established the database connection

                                    // Fetch the top categories from the database
                                    $sql = "SELECT kategori_produk, COUNT(*) as jumlah FROM dimProduk
                                            INNER JOIN faktaPembelian ON dimProduk.id_produk = faktaPembelian.id_produk
                                            GROUP BY kategori_produk
                                            ORDER BY jumlah DESC
                                            LIMIT 5";
                                    $result = mysqli_query($connection, $sql);

                                    $labels = array();
                                    $data = array();

                                    // Process the fetched data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $labels[] = $row['kategori_produk'];
                                        $data[] = $row['jumlah'];
                                    }

                                    ?>

                                    <!-- JavaScript code to generate the chart -->
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            // Generate chart using Chart.js
                                            var ctx = document.getElementById('myAreaChart').getContext('2d');
                                            var myAreaChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: <?php echo json_encode($labels); ?>,
                                                    datasets: [{
                                                        label: 'Number of Orders',
                                                        data: <?php echo json_encode($data); ?>,
                                                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                                        borderColor: 'rgba(75, 192, 192, 1)',
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true,
                                                            precision: 0
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                    </script>

                                     <!-- HTML code for the chart -->
                                     <div class="col-xl-6">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-chart-area me-1"></i>
                                                Top Vendors
                                            </div>
                                            <div class="card-body">
                                                <canvas id="myAreaChart2" width="100%" height="40"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
// Assuming you have already established the database connection

// Fetch the top vendors from the database
$sql = "SELECT nama_vendor, SUM(jumlah_pembelian) as total_pembelian FROM dimVendor
        INNER JOIN faktaPembelian ON dimVendor.id_vendor = faktaPembelian.id_vendor
        GROUP BY nama_vendor
        ORDER BY total_pembelian DESC
        LIMIT 5";
$result = mysqli_query($connection, $sql);

$labels = array();
$data = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['nama_vendor'];
    $data[] = $row['total_pembelian'];
}
?>

<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate chart using Chart.js
        var ctx = document.getElementById('myAreaChart2').getContext('2d');
        var myAreaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Purchases',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(0, 0, 500, 0.6)',
                    borderColor: 'rgba(0, 0, 500, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    });
</script>

<?php
// Assuming you have already established the database connection

// Fetch the top states from the database
$sql = "SELECT state, COUNT(*) as total_pembelian FROM dimVendor
        INNER JOIN faktaPembelian ON dimVendor.id_vendor = faktaPembelian.id_vendor
        GROUP BY state
        ORDER BY total_pembelian DESC
        LIMIT 5";
$result = mysqli_query($connection, $sql);

$labels = array();
$data = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['state'];
    $data[] = $row['total_pembelian'];
}
?>

<!-- HTML code for the chart -->
<div class="col-xl-6">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-pie me-1"></i>
            Top States
        </div>
        <div class="card-body">
            <canvas id="myPieChart" width="100%" height="40"></canvas>
        </div>
    </div>
</div>

<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate chart using Chart.js
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Purchases',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: ['rgba(0, 123, 255, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 205, 86, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(153, 102, 255, 0.6)'],
                    borderColor: ['rgba(0, 123, 255, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 205, 86, 1)', 'rgba(54, 162, 235, 1)', 'rgba(153, 102, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Top States'
                    }
                }
            }
        });
    });
</script>
<?php
// Assuming you have already established the database connection

// Fetch the top cities based on the total amount of purchases
$sql = "SELECT dimVendor.kota, SUM(faktaPembelian.jumlah_pembelian) AS total_pembelian FROM dimVendor
        INNER JOIN faktaPembelian ON dimVendor.id_vendor = faktaPembelian.id_vendor
        GROUP BY dimVendor.kota
        ORDER BY total_pembelian DESC
        LIMIT 5";
$result = mysqli_query($connection, $sql);

$labels = array();
$data = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['kota'];
    $data[] = $row['total_pembelian'];
}
?>

<!-- HTML code for the chart -->
<div class="col-xl-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Distribution</h6>
        </div>
        <div class="card-body">
            <div class="chart-pie">
                <canvas id="pieChartAllTime"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate chart using Chart.js
        var ctx = document.getElementById('pieChartAllTime').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>