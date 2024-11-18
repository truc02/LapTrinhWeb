<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <!-- boxi con -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="container py-5">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card shadow-sm">
                  <div class="card-body p-5">
                      <form action="../php/login.php" method="post"> 
                        <h1 class="titlle1">Đăng Nhập</h1>
                          <!-- Username input -->
                          <div class="form-outline mb-4">
                            <i class='bx bxs-user'></i>  
                            <input type="text" id="form2Example1" class="form-control" placeholder=" " name="username" required />
                            <label class="form-label" for="form2Example1">Tên đăng nhập</label>
                          </div>

                          <!-- Password input -->
                          <div class="form-outline mb-4">
                            <i class='bx bxs-lock-alt'></i> 
                            <input type="password" id="form2Example2" class="form-control" placeholder=" " name="password" required />
                            <label class="form-label" for="form2Example2">Mật khẩu</label>                                                 
                          </div>

                          <!-- Remember me & Forgot password -->
                          <div class="row mb-4">
                              <div class="col d-flex justify-content-start">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                      <label class="form-check-label" for="form2Example31">Ghi nhớ đăng nhập</label>
                                  </div>
                              </div>

                              <div class="col text-end">
                                  <a href="#!" class="text-primary">Quên mật khẩu?</a>
                              </div>
                          </div>

                          <!-- Submit button -->
                          <button type="submit" class="btn btn-primary btn-block mb-4">Đăng nhập</button> 

                          <!-- Register buttons -->
                          <div class="text-center">
                              <p>Chưa có tài khoản? <a href="../Frontend/register.html" class="text-primary">Đăng ký</a></p>
                              <p>Hoặc đăng nhập với:</p>
                              <div class="d-flex justify-content-center">
                                  <button type="button" class="btn btn-link btn-floating mx-1">
                                      <i class="fab fa-facebook-f"></i>
                                  </button>
                                  <button type="button" class="btn btn-link btn-floating mx-1">
                                      <i class="fab fa-google"></i>
                                  </button>
                                  <button type="button" class="btn btn-link btn-floating mx-1">
                                      <i class="fab fa-twitter"></i>
                                  </button>
                                  <button type="button" class="btn btn-link btn-floating mx-1">
                                      <i class="fab fa-github"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
