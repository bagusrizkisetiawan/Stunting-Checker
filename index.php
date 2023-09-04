<?php

$conn = mysqli_connect("localhost", "root", "", "kuliah_penambangan_data");

$cek = fn ($a, $aa, $b, $bb) => mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting WHERE $a = '$aa' and $b='$bb' "));



if (isset($_POST['cek'])) {
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $bw = $_POST['bw'];
  $bl = $_POST['bl'];
  $bdw = $_POST['bdw'];
  $bdl = $_POST['bdl'];
  $asi = $_POST['asi'];

  $nData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting"));

  $yes =  mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting WHERE stunting ='Yes'"));
  $p_yes = $yes / $nData;

  $no = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting WHERE stunting ='No'"));
  $p_no = $no / $nData;


  $sex_yes = $cek("Sex", $sex, "Stunting", "Yes") / $yes;
  $age_yes = $cek("Age", $age, "Stunting", "Yes") / $yes;
  $bw_yes = $cek("BirthWeight", $bw, "Stunting", "Yes") / $yes;
  $bl_yes = $cek("BirthLength", $bl, "Stunting", "Yes") / $yes;
  $bdw_yes = $cek("BodyWeight", $bdw, "Stunting", "Yes") / $yes;
  $bdl_yes = $cek("BodyLength", $bdl, "Stunting", "Yes") / $yes;
  $asi_yes = $cek("ASIEksklusif", $asi, "Stunting", "Yes") / $yes;

  $class_yes = $p_yes * $sex_yes * $age_yes * $bw_yes * $bl_yes * $bdw_yes * $bdl_yes * $asi_yes;


  $sex_no = $cek("Sex", $sex, "Stunting", "No") / $no;
  $age_no = $cek("Age", $age, "Stunting", "No") / $no;
  $bw_no = $cek("BirthWeight", $bw, "Stunting", "No") / $no;
  $bl_no = $cek("BirthLength", $bl, "Stunting", "No") / $no;
  $bdw_no = $cek("BodyWeight", $bdw, "Stunting", "No") / $no;
  $bdl_no = $cek("BodyLength", $bdl, "Stunting", "No") / $no;
  $asi_no = $cek("ASIEksklusif", $asi, "Stunting", "No") / $no;

  $class_no = $p_no * $sex_no * $age_no * $bw_no * $bl_no * $bdw_no * $bdl_no * $asi_no;

  echo $class_no;
  echo "<br>";
  echo $class_yes;
  if ($class_yes > $class_no) {
    echo "0";
  } else {
    echo "1";
  }

  if ($class_no > $class_yes) {
    $alert = "
    <script>
      Swal.fire({
        title: 'Stunting',
        text: 'Setelah masuk dalam perhitungan kami anda termasuk dalam kategori stunting, perlu di ingat sistem hanya membantu klasifikasi tidak benar benar mendiaknosis!',
        icon: 'warning',
        confirmButtonColor: '#5bc1ac',
        
      }).then((result) => {
        window.location.replace('./');
      })
    </script>
    ";
  } else {
    $alert = "
    <script>
      Swal.fire({
        title: 'Tidak Stunting',
        text: 'Setelah masuk dalam perhitungan kami anda termasuk dalam kategori tidak stunting, perlu di ingat sistem hanya membantu klasifikasi tidak benar benar mendiaknosis!',
        icon: 'info',
        confirmButtonColor: '#5bc1ac',
        
      }).then((result) => {
        window.location.replace('./');
      })
    </script>
    ";
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cek Stunting Online</title>

  <!-- CSS FILES -->
  <link href="module/css/bootstrap.min.css" rel="stylesheet">

  <link href="module/css/bootstrap-icons.css" rel="stylesheet">

  <link href="module/css/templatemo-kind-heart-charity.css" rel="stylesheet">
  <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">

  <header class="site-header">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-12 d-flex flex-wrap">


          <p class="d-flex mb-0">
            <i class="bi-envelope me-2"></i>

            <a href="mailto:admin@bagusrizki.com">
              admin@bagusrizki.com
            </a>
          </p>
        </div>

        <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
          <ul class="social-icon">
            <li class="social-icon-item">
              <a href="#" class="social-icon-link bi-twitter"></a>
            </li>

            <li class="social-icon-item">
              <a href="#" class="social-icon-link bi-facebook"></a>
            </li>

            <li class="social-icon-item">
              <a href="#" class="social-icon-link bi-instagram"></a>
            </li>

            <li class="social-icon-item">
              <a href="#" class="social-icon-link bi-youtube"></a>
            </li>

            <li class="social-icon-item">
              <a href="#" class="social-icon-link bi-whatsapp"></a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg bg-light shadow-lg py-3">
    <div class="container">
      <a class="navbar-brand" href="index.html">

        <span>
          Stunting Checker
          <small>check stunting online</small>
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">




          <li class="nav-item ms-3 mb-2">
            <a class="nav-link custom-btn custom-border-btn btn" href="donate.html">Donate</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>

    <div class="container my-5 py-5 ">
      <div class="row justify-content-between">
        <div class="col-lg-4 mb-4">
          <h1 class="">Stunting Checker</h1>
          <p>
            Stunting Checker is a tool that is easy to use and can provide useful information for parents, medical personnel, and other interested parties to monitor children's health.
          </p>
          <p>
            Stunting Checker is designed to provide initial guidance and is not a substitute for a professional medical diagnosis. If you have any concerns or notice any signs about your child's growth, immediately consult with the relevant medical personnel.
          </p>
          <a href="" class="btn custom-btn" style="font-size: 14px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Direction</a>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Direction</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table class="table">
                    <tr>
                      <th>label</th>
                      <th>explanation</th>
                      <th>Value</th>
                    </tr>
                    <tr>
                      <td>Sex</td>
                      <td>choose gender</td>
                      <td>Male/Female</td>
                    </tr>
                    <tr>
                      <td>Birth Weight</td>
                      <td>filling weight at birth</td>
                      <td>kg</td>
                    </tr>
                    <tr>
                      <td>Birth Length</td>
                      <td>filling length at birth</td>
                      <td>cm</td>
                    </tr>
                    <tr>
                      <td>Body Weight</td>
                      <td>filling the current body weight</td>
                      <td>kg</td>
                    </tr>
                    <tr>
                      <td>Body Length</td>
                      <td>filling the current body length</td>
                      <td>kg</td>
                    </tr>
                    <tr>
                      <td>ASI Eksklusif</td>
                      <td>choose whether when the baby gets exclusive breastfeeding or not</td>
                      <td>Yes/No</td>
                    </tr>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card border-0 shadow-sm ">
            <div class="card-body p-5">
              <form action="" method="post">

                <div class="row">
                  <div class="col-12">

                    <label for="" class=" text-secondary">Gender</label>
                    <select name="sex" id="" class="mb-3 mt-2 form-control p-2 px-3" required>
                      <option value="" disabled selected>Choose</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                    <label for="" class=" mt-3 text-secondary">Age</label>
                    <input type="number" name="age" class="form-control p-2 px-3 mt-2 mb-3" required>
                  </div>
                  <div class="col-6">
                    <label for="" class=" mt-3 text-secondary">Birth Weight</label>
                    <input type="number" name="bw" class="form-control p-2 px-3 mt-2 mb-3" step="0.1" required>
                  </div>
                  <div class="col-6">
                    <label for="" class=" mt-3 text-secondary">Birth Length</label>
                    <input type="number" name="bl" class="form-control p-2 px-3 mt-2 mb-3" required>
                  </div>
                  <div class="col-6">
                    <label for="" class=" mt-3 text-secondary">Body Weight</label>
                    <input type="number" name="bdw" class="form-control p-2 px-3 mt-2 mb-3" step="0.1" required>
                  </div>
                  <div class="col-6">
                    <label for="" class=" mt-3 text-secondary">Body Length</label>
                    <input type="number" name="bdl" class="form-control p-2 px-3 mt-2 mb-3" step="0.1" required>
                  </div>
                  <div class="col-12">
                    <label for="" class=" mt-3 text-secondary">ASI Eksklusif</label>
                    <select name="asi" id="" class="mb-3 mt-2 form-control" required>
                      <option value="" disabled selected>Choose</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>

                    <button class="btn custom-btn mt-3 " name="cek" style="font-size: 14px;">Check Stunting</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-3 col-12 mb-4">
          <a class="navbar-brand" href="index.html">

            <span>
              Stunting Checker
              <small>check stunting online</small>
            </span>
          </a>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">
          <h5 class="site-footer-title mb-3">Quick Links</h5>

          <ul class="footer-menu">
            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Donate</a></li>


        </div>

        <div class="col-lg-4 col-md-6 col-12 mx-auto">
          <h5 class="site-footer-title mb-3">Contact Infomation</h5>

          <p class="text-white d-flex mb-2">
            <i class="bi-telephone me-2"></i>

            <a href="tel: +6285609201388" class="site-footer-link">
              +62 856 0920 1388
            </a>
          </p>

          <p class="text-white d-flex">
            <i class="bi-envelope me-2"></i>

            <a href="mailto:info@yourgmail.com" class="site-footer-link">
              admin@bagusrizki.com
            </a>
          </p>
        </div>
      </div>
    </div>

    <div class="site-footer-bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-7 col-12">
            <p class="copyright-text mb-0">Copyright © 2023 <a href="#">Stunting Checker</a>.
              <br>Develop By :
              <a href="https://themewagon.com">bagusrizki.com</a>
            </p>
          </div>

          <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
            <ul class="social-icon">
              <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-twitter"></a>
              </li>

              <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-facebook"></a>
              </li>

              <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-instagram"></a>
              </li>

              <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-linkedin"></a>
              </li>

              <li class="social-icon-item">
                <a href="https://youtube.com/templatemo" class="social-icon-link bi-youtube"></a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>

  <!-- JAVASCRIPT FILES -->
  <script src="module/js/jquery.min.js"></script>
  <script src="module/js/bootstrap.min.js"></script>
  <script src="module/js/jquery.sticky.js"></script>
  <script src="module/js/click-scroll.js"></script>
  <script src="module/js/counter.js"></script>
  <script src="module/js/custom.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php echo @$alert; ?>

</body>

</html>