<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />
  <!-- ./view/login/css/bootstrap.min.css -->
  <link rel="stylesheet" href="fonts/icomoon/style.css" />

  <link rel="stylesheet" href="./view/login/css/owl.carousel.min.css" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./view/login/css/bootstrap.min.css" />

  <!-- Style -->
  <link rel="stylesheet" href="./view/login/css/style.css" />

  <title>Login #2</title>
  <script>
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          var resultMessageElement = document.getElementById("resultMessage");
          resultMessageElement.innerText = response.loginError ? response.loginError : response;

        } else {
          // Xử lý lỗi khi gửi yêu cầu Ajax
          console.error("Error:", xhr.status);
        }
      }
    };

    xhr.open("POST", "../controller/LoginController.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Đối với POST request, bạn cần gửi dữ liệu qua body của yêu cầu
  </script>
</head>

<body>

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url(./view/login/images/bg_4.jpg);"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">

            <div id="resultMessage" value=""></div>

            <h3> Login <strong> User </strong></h3>
            <p class="mb-4">

            </p>
            <form action="index.php?controller=login" method="post">
              <div class="form-group first">
                <label for="username"> <strong>Username</strong> </label>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" />
              </div>

              <div class="form-group last mb-3">
                <label for="password"> <strong>Passwords</strong> </label>
                <input type="password" class="form-control" placeholder="Your Password" name="password" id="password" />
              </div>

              <div class="d-flex mb-5 align-items-center">
                </label>
                <span class="ml-auto"><a href="index.php?controller=forgot_password" class="forgot-pass">Forgot Password</a></span>
              </div>
              <div id="errorMessage"></div>
              <div class="card-footer py-3 border-0">
                <div class="text-center">
                  Don't have an account?
                  <a href="index.php?controller=register" class="text-dark">Create One</a>
                </div>
              </div>

              <input type="submit" class="btn btn-block btn-primary" name="login" value="Log In" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Thêm một số CSS để tùy chỉnh phong cách của thông báo */
    #errorMessage {
      display: none;
      background-color: #f44336;
      color: white;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 4px;
    }
  </style>

  <script src="./view/login/js/jquery-3.3.1.min.js"></script>
  <script src="./view/login/js/popper.min.js"></script>
  <script src="./view/login/js/bootstrap.min.js"></script>
  <script src="./view/login/js/main.js"></script>
</body>

</html>