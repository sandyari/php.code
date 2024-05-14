<?php
// memanggil file koneksi ke databse 
require 'koneksi.php';

if (isset($_POST['tsimpan'])) {

    $query_simpan = " INSERT INTO barangmasuk (`kode`, `tgl`, `namaProduct`, `oleh`, `warna`, `size`, `jumlah`) VALUES
                        ( '" . $_POST['tkode'] . "',
                          '" . $_POST['ttanggal'] . "',
                          '" . $_POST['tnamaproduct'] . "',
                          '" . $_POST['toleh'] . "',
                          '" . $_POST['twarna'] . "',
                          '" . $_POST['tsize'] . "',
                          '" . $_POST['tjumlah'] . "'  ) ";

    $query_simpan = mysqli_query($conn, $query_simpan);

    $sql1 = " INSERT INTO stok (`kode`, `namaProduct`, `jumlah`) VALUES 
                ('" . $_POST['tkode'] . "',
                 '" . $_POST['tnamaproduct'] . "',
                 '" . $_POST['tjumlah'] . "') ";

    $sql1 = mysqli_query($conn, $sql1);


    // jika berhasil
    if ($query_simpan) {
        echo "<script> alert ('Data Berhasil disimpan !')</script>";
        echo "<meta http-equiv='refresh' content= '0; url=manual.php'> ";
    } else {
        echo "<script> alert ('Data Gagal disimpan !')</script>";
        echo "<meta http-equiv='refresh' content= '0; url=manual.php'> ";
    }


}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Manual</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Hijab Store Fashion 99</a>
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
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stock Barang
                        </a>

                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapsemasuk"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang Masuk
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapsemasuk" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Qr Code</a>
                                <a class="nav-link" href="manual.php">Manual</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapsekeluar"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang Keluar
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapsekeluar" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Qr Code</a>
                                <a class="nav-link" href="#">Manual</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Karyawan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="register.php">Register</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Report
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapsePages" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Stock Barang</a>
                                <a class="nav-link" href="#">Barang Masuk</a>
                                <a class="nav-link" href="#">Barang Keluar</a>
                                <a class="nav-link" href="#">Karyawan</a>
                            </nav>
                        </div>


                    </div>
                </div>
                
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Barang Masuk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Barang Masuk</li>
                    </ol>

                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2 d-md-block p-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah
                        </button>
                        <button class="btn btn-primary" type="button">Print</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" type="text"
                                                        placeholder="Enter your first name" type="text" name="tkode" />
                                                    <label for="inputFirstName">kode </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="" type="date" placeholder="tangal"
                                                        name="ttanggal" />
                                                    <label>tanggal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" placeholder="nama product"
                                                    name="tnamaproduct" />
                                                <label>Nama Product</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" placeholder="oleh"
                                                    name="toleh" />
                                                <label>Oleh</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" placeholder="warna"
                                                    name="twarna" />
                                                <label for="">Warna</label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <!-- Example single danger button -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select required class="form-control" id="tsize" name="tsize">
                                                        <option value="">--- Pilih Size --</option>
                                                        <option value="MS">MS</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>
                                                    <label>size</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="" type="number" placeholder="jumlah"
                                                        name="tjumlah" />
                                                    <label>Jumlah </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="tsimpan" class="btn btn-primary">Save
                                                changes</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Nama Product</th>
                                        <th>Oleh</th>
                                        <th>Warna</th>
                                        <th>Size</th>
                                        <th>Jumlah</th>
                                        <th>File Qr</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Nama Product</th>
                                        <th>Oleh</th>
                                        <th>Warna</th>
                                        <th>Size</th>
                                        <th>Jumlah</th>
                                        <th>File Qr</th>


                                    </tr>


                                </tfoot>
                                <tbody>

                                    <?php

                                    require_once "phpqrcode/qrlib.php";

                                    $no = 1;
                                    $ambildata = mysqli_query($conn, "select * from barangmasuk");
                                    while ($tampil = mysqli_fetch_array($ambildata)) {

                                        $qrvalue = $tampil["kode"];

                                        $tempDir = "pdfqrcodes/";
                                        $codeContents = $qrvalue;
                                        $fileName = $qrvalue . '.png';
                                        $pngAbsoluteFilePath = $tempDir . $fileName;
                                        $urlRelativeFilePath = $tempDir . $fileName;
                                        if (!file_exists($pngAbsoluteFilePath)) {
                                            QRcode::png($codeContents, $pngAbsoluteFilePath);
                                        }


                                        echo "
                                                <tr>
                                                    <td>$no</td>
                                                    <td>  $tampil[kode]  </td>
                                                    <td>  $tampil[tgl]  </td>
                                                    <td>  $tampil[namaProduct]  </td>
                                                    <td>  $tampil[oleh]  </td>
                                                    <td>  $tampil[warna]  </td>
                                                    <td>  $tampil[size]  </td>
                                                    <td>  $tampil[jumlah]  </td>
                                                    <td> <img src='pdfqrcodes/" . $tampil["kode"] . ".png' width='64px'> </td>
                                                </tr>";
                                        $no++;

                                    }

                                    ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>