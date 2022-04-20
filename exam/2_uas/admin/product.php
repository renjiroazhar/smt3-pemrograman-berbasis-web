<?php
  if (!isset($_SESSION)) {
    // Initialize the session
    session_start();
  };
  
  // Check if the user is already logged in, if yes then redirect him to dashboard page
  session_regenerate_id();
  if(!isset($_SESSION['admin'])) { /* If there is no valid session */
      header("Location: index.php");
  };
  
  // Include config file
  require_once "config.php";

  // Get data
  $query = mysqli_query($connection, "SELECT * FROM product");
  $no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Sambongrejo | Product</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Profile -->
    <a href="" class="brand-link">
      <img src="dist/img/avatar5.png" alt="Profile" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $_SESSION['username']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline" style="margin-top: 10px;">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
          <li class="nav-item">
            <a href="./order.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./news.php" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>News</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./video.php" class="nav-link">
              <i class="nav-icon fab fa-youtube"></i>
              <p>Video</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./user.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./admin.php" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Admin</p>
            </a>
          </li>
          <a href="controllers/logout.php" class="nav-link" style="background-color: red; color: #ffffff">
            <i class="nav-icon fas fa-power-off"></i>
            <p>Logout</p>
          </a>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 id="txth3">Add</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="controllers/create_update_product.php">
                  <div class="row">
                    <input type="hidden" name="id" id="id">
                    <div class="col-md-4 mb-4">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label>Name</label>
                          <input required type="text" name="name" id="name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label>Category</label>
                          <select required name="category" id="category" class="form-control">
                            <option selected>Choose...</option>
                            <option value="1">Food</option>
                            <option value="2">Drink</option>
                            <option value="3">Souvenir</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 mb-1">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label>Quantity</label>
                          <input required type="number" name="quantity" id="quantity" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label>Unit</label>
                          <select required name="unit" id="unit" class="form-control">
                            <option selected>Choose...</option>
                            <option value="1">Pack</option>
                            <option value="2">Liter (l)</option>
                            <option value="3">Piece</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label>Price</label>
                          <input required type="number" name="price" id="price" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-12">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label>Description</label>
                          <textarea required type="text" name="description" id="description" class="form-control" rows="10"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label>Upload Image</label>
                          <input required type="file" name="image" id="image" class="form-control-file">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-1">
                      <div class="form-group">
                        <button type="reset" class="btn btn-danger">Reset</button>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    while ($data = mysqli_fetch_array($query)) {
                      $no = $no + 1;
                      echo "<tr>";
                      echo "<td>".$no."</td>";
                      echo "<td>".$data['name']."</td>";
                      if($data['category'] == 1) {
                        echo "<td>Food</td>";
                      } elseif ($data['category'] == 2) {
                        echo "<td>Drink</td>";
                      } else {
                        echo "<td>Souvenir</td>";
                      };
                      echo "<td>".$data['quantity']."</td>";
                      if($data['unit'] == 1) {
                        echo "<td>Pack</td>";
                      } elseif ($data['unit'] == 2) {
                        echo "<td>Liter (l)</td>";
                      } else {
                        echo "<td>Piece</td>";
                      };
                      echo "<td><img src='dist/img-upload/".$data['image']."' alt='Uploaded image' width='75px' height='75px'></td>";
                      echo "<td>".$data['descript']."</td>";
                      echo "<td>".$data['price']."</td>";
                      echo "<td>".$data['created_at']."</td>";
                      echo "<td>".$data['updated_at']."</td>";
                      echo "<td style='text-align: center'>
                            <a id='edit_data' 
                              style='color: blue'><i
                              onclick='setEditData({
                              id: `".$data['id']."`,
                              name: `".$data['name']."`,
                              category: `".$data['category']."`,
                              quantity: `".$data['quantity']."`,
                              unit: `".$data['unit']."`,
                              image: `".$data['image']."`,
                              description: `".$data['descript']."`,
                              price: `".$data['price']."`,
                              created_at: `".$data['created_at']."`,
                              updated_at: `".$data['updated_at']."`
                              })' class='fas fa-edit'></i></a>
                            <a href='controllers/delete_product.php?id=".$data['id']."' style='color: red'><i class='fas fa-trash'></i></a>
                          </td>";    
                      echo "</tr>";
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https:/e-sambongrejo.000webhost.com">E-Sambongrejo</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Edit Data -->
<script type="text/javascript">
  const edit_data = document.getElementById('edit_data');
  edit_data.onclick = function(event){
    event.preventDefault(); 
  };

  function setEditData(data){
    const {id, name, category, quantity, unit, image, description, price} = data;
    const id_input = document.getElementById('id');
    const name_input = document.getElementById('name');
    const category_input = document.getElementById('category');
    const quantity_input = document.getElementById('quantity');
    const unit_input = document.getElementById('unit');
    const image_input = document.getElementById('image');
    const description_input = document.getElementById('description');
    const price_input = document.getElementById('price');
    document.getElementById("txth3").innerHTML = "Edit";

    console.log(data);
    id_input.value = id;
    name_input.value = name;
    category_input.value = category;
    quantity_input.value = quantity;
    unit_input.value = unit;
    image_input.value = image;
    description_input.value = description;
    price_input.value = price;
  }
</script>
</body>
</html>
