<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Project Managaement System</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="../../../template/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="../../../template/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="../../../template/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="../../../template/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../template/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
   <style>/* General Styles */
body {
  font-family: 'Nunito Sans', sans-serif;
  background-color: #f8f9fa;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: auto;
  /* padding: 2rem; */
}

.row {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.flex-center {
  display: flex;
  justify-content: center;
  align-items: center;
}

.text-center {
  text-align: center;
}

.text-1000 {
  color: #212529;
}

.text-700 {
  color: #6c757d;
}

.mb-3, .mb-4, .mb-7 {
  margin-bottom: 1rem !important;
}

/* .py-5 {
  padding-top: 3rem;
  padding-bottom: 3rem;
} */

/* Form Styles */
.form-label {
  display: block;
  margin-bottom: 0.5rem;
}

.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 2.5rem 0.375rem 0.75rem; /* Increased right padding to accommodate the icon */
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-icon-container {
  position: relative;
}

.form-icon {
  position: absolute;
  left: 10px;
  top: 44%;
  transform: translateY(-50%);
  z-index: 2; /* Ensures the icon is in front */
}

.form-icon-input {
  padding-right: 2.5rem; /* Ensure there's space for the icon */
  position: relative;
  z-index: 1;
}
.form-control.form-icon-input{
    text-indent:20px;
}

/* Button Styles */
.btn-primary {
  color: #fff;
  background-color: #615DFF;
  border-color: #615DFF;
  display: block;
  width: 120%;
  padding: 0.5rem;
  font-size: 1rem;
  border-radius: 0.25rem;
  margin-top: 20px;
}

.btn-primary:hover {
  background-color: #4944CC;
  border-color: #4944CC;
}

/* Link Styles */
a {
  color: #3DD9EB;
  text-decoration: none;
}

a:hover {
  color: #32B6C6;
  text-decoration: underline;
}

/* Checkbox Styles */
.form-check-input {
  width: 1.25em;
  height: 1.25em;
  margin-top: 0.25em;
  vertical-align: top;
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  border: 1px solid rgba(0, 0, 0, 0.25);
  border-radius: 0.25rem;
  appearance: none;
  -webkit-print-color-adjust: exact;
  color-adjust: exact;
  display: inline-block;
  position: relative;
  cursor: pointer;
}

.form-check-label {
  margin-left: 0.5rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .container {
    padding: 1rem;
  }

  .col-sm-10,
  .col-md-8,
  .col-lg-5,
  .col-xl-5,
  .col-xxl-3 {
    padding: 0 1rem;
  }
}
.fa-user:before .fa-key:before{
  font-size: 12px;
}
</style>
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container">
            <div class="row flex-center min-vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                    <div class="d-flex justify-content-center">
                        <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index-2.html" style="margin-left:141px;">
                            <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='174' height='26' viewBox='0 0 174 26' fill='none'%3E%3Cpath d='M20.1369 26C22.8983 26 25.1842 23.7425 24.6732 21.0288C24.3528 19.3274 23.8679 17.6594 23.2235 16.0502C21.9602 12.8958 20.1087 10.0295 17.7745 7.61522C15.4403 5.2009 12.6692 3.28575 9.61949 1.97913C8.11383 1.33406 6.55481 0.843538 4.96489 0.512196C2.26154 -0.0511821 0 2.23858 0 5V21C0 23.7614 2.23858 26 5 26H20.1369Z' fill='%23615DFF'/%3E%3Cg style='mix-blend-mode:multiply'%3E%3Cpath d='M13.7013 26C10.9399 26 8.65395 23.7425 9.16502 21.0288C9.48544 19.3274 9.97031 17.6594 10.6147 16.0502C11.878 12.8958 13.7295 10.0295 16.0637 7.61522C18.3979 5.2009 21.169 3.28575 24.2187 1.97913C25.7244 1.33406 27.2834 0.843538 28.8733 0.512196C31.5767 -0.0511821 33.8382 2.23858 33.8382 5V21C33.8382 23.7614 31.5996 26 28.8382 26H13.7013Z' fill='%233DD9EB'/%3E%3C/g%3E%3C/svg%3E"
                                alt="SVG Image">
                        </a>
                    </div>
                    <div class="text-center mb-7">
                        <h3 class="text-1000">Sign In</h3>
                        <p class="text-700">Get access to your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 text-start">
                            <label class="form-label" for="email">Email address</label>
                            <div class="form-icon-container">
                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                                <input class="form-control form-icon-input" id="email" type="email" name="email"
                                    placeholder="name@example.com" required autofocus autocomplete="email" />
                               
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-icon-container">
                            <span class="fas fa-key text-900 fs--1 form-icon"></span>
                                <input class="form-control form-icon-input" id="password" type="password"
                                    name="password" placeholder="Password" required autocomplete="current-password" />
                                
                            </div>
                        </div>
                        
                        <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
                    </form>
                    <!-- <div class="text-center"><a class="fs--1 fw-bold" href="sign-up.html">Create an account</a></div> -->
                </div>
            </div>

        </div>

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../../../template/vendors/popper/popper.min.js"></script>
    <script src="../../../template/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../../template/vendors/anchorjs/anchor.min.js"></script>
    <script src="../../../template/vendors/is/is.min.js"></script>
    <script src="../../../template/vendors/fontawesome/all.min.js"></script>
    <script src="../../../template/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../../../template/vendors/list.js/list.min.js"></script>
    <script src="../../../template/vendors/feather-icons/feather.min.js"></script>
    <script src="../../../template/vendors/dayjs/dayjs.min.js"></script>
    <script src="../../../template/assets/js/phoenix.js"></script>
</body>

</html>
<!--
Downloaded from https://nullforums.net/resources/phoenix-admin-dashboard-webapp-template-html.6657/
2914167K3MLX7LFILQLTDIPN2TOWXFI5HGR7MU
-->