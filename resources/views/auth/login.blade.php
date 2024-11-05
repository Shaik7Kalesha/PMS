<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sliding Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

    *,
    *::before,
    *::after {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body,
    input {
      font-family: sans-serif;
    }

    main {
      width: 100%;
      min-height: 100vh;
      overflow: hidden;
      background-color: #e8dada;
      padding: 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .box {
      position: relative;
      width: 100%;
      max-width: 1020px;
      height: 640px;
      background-color: #fff;
      border-radius: 3.3rem;
      box-shadow: 0 60px 40px -30px rgba(0, 0, 0, 0.27);
    }

    .inner-box {
      position: absolute;
      width: calc(100% - 4.1rem);
      height: calc(100% - 4.1rem);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .forms-wrap {
      position: absolute;
      height: 100%;
      width: 45%;
      top: 0;
      left: 0;
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 1fr;
      transition: 0.8s ease-in-out;
    }

    form {
      max-width: 260px;
      width: 100%;
      margin: 0 auto;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      grid-column: 1 / 2;
      grid-row: 1 / 2;
      transition: opacity 0.02s 0.4s;
    }

    form.sign-up-form {
      opacity: 0;
      pointer-events: none;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 27px;
      margin-right: 0.3rem;
    }

    .logo h4 {
      font-size: 1.1rem;
      margin-top: -9px;
      letter-spacing: -0.5px;
      color: #151111;
    }

    .heading h2 {
      font-size: 2.1rem;
      font-weight: 600;
      color: #151111;
    }

    .heading h6 {
      color: #bababa;
      font-weight: 400;
      font-size: 0.75rem;
      display: inline;
    }

    .toggle {
      color: #151111;
      text-decoration: none;
      font-size: 0.75rem;
      font-weight: 500;
      transition: 0.3s;
    }

    .toggle:hover {
      color: #8371fd;
    }

    .input-wrap {
      position: relative;
      height: 37px;
      margin-bottom: 2rem;
    }

    .input-field {
      position: absolute;
      width: 100%;
      height: 100%;
      background: none;
      border: none;
      outline: none;
      border-bottom: 1px solid #bbb;
      padding: 0;
      font-size: 0.95rem;
      color: #151111;
      transition: 0.4s;
    }

    label {
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.95rem;
      color: #bbb;
      pointer-events: none;
      transition: 0.4s;
    }

    .input-field.active {
      border-bottom-color: #151111;
    }

    .input-field.active+label {
      font-size: 0.75rem;
      top: -2px;
    }

    .sign-btn {
      display: inline-block;
      width: 100%;
      height: 43px;
      background-color: #151111;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 0.8rem;
      font-size: 0.8rem;
      margin-bottom: 2rem;
      transition: 0.3s;
    }

    .sign-btn:hover {
      background-color: #8371fd;
    }

    .text {
      color: #bbb;
      font-size: 0.7rem;
    }

    .text a {
      color: #bbb;
      transition: 0.3s;
    }

    .text a:hover {
      color: #8371fd;
    }

    main.sign-up-mode form.sign-in-form {
      opacity: 0;
      pointer-events: none;
    }

    main.sign-up-mode form.sign-up-form {
      opacity: 1;
      pointer-events: all;
    }

    main.sign-up-mode .forms-wrap {
      left: 55%;
    }

    main.sign-up-mode .carousel {
      left: 0%;
    }

    .carousel {
      position: absolute;
      height: 100%;
      width: 55%;
      left: 45%;
      top: 0;
      background-color: #ffe0d2;
      border-radius: 2rem;
      display: grid;
      grid-template-rows: auto 1fr;
      padding-bottom: 2rem;
      overflow: hidden;
      transition: 0.8s ease-in-out;
    }

    .images-wrapper {
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 1fr;
    }

    .image {
      width: 100%;
      grid-column: 1/2;
      grid-row: 1/2;
      opacity: 0;
      transition: opacity 0.3s, transform 0.5s;
    }

    .img-1 {
      transform: translate(0, -50px);
    }

    .img-2 {
      transform: scale(0.4, 0.5);
    }

    .img-3 {
      transform: scale(0.3) rotate(-20deg);
    }

    .image.show {
      opacity: 1;
      transform: none;
    }

    .text-slider {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .text-wrap {
      max-height: 2.2rem;
      overflow: hidden;
      margin-bottom: 2.5rem;
    }

    .text-group {
      display: flex;
      flex-direction: column;
      text-align: center;
      transform: translateY(0);
      transition: 0.5s;
    }

    .text-group h2 {
      line-height: 2.2rem;
      font-weight: 600;
      font-size: 1.6rem;
    }

    .bullets {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .bullets span {
      display: block;
      width: 0.5rem;
      height: 0.5rem;
      background-color: #aaa;
      margin: 0 0.25rem;
      border-radius: 50%;
      cursor: pointer;
      transition: 0.3s;
    }

    .bullets span.active {
      width: 1.1rem;
      background-color: #151111;
      border-radius: 1rem;
    }

    @media (max-width: 850px) {
      .box {
        height: auto;
        max-width: 550px;
        overflow: hidden;
      }

      .inner-box {
        position: static;
        transform: none;
        width: revert;
        height: revert;
        padding: 2rem;
      }

      .forms-wrap {
        position: revert;
        width: 100%;
        height: auto;
      }

      form {
        max-width: revert;
        padding: 1.5rem 2.5rem 2rem;
        transition: transform 0.8s ease-in-out, opacity 0.45s linear;
      }

      .heading {
        margin: 2rem 0;
      }

      form.sign-up-form {
        transform: translateX(100%);
      }

      main.sign-up-mode form.sign-in-form {
        transform: translateX(-100%);
      }

      main.sign-up-mode form.sign-up-form {
        transform: translateX(0%);
      }

      .carousel {
        position: revert;
        height: auto;
        width: 100%;
        padding: 3rem 2rem;
        display: flex;
      }

      .images-wrapper {
        display: none;
      }

      .text-slider {
        width: 100%;
      }
    }

    @media (max-width: 530px) {
      main {
        padding: 1rem;
      }

      .box {
        border-radius: 2rem;
      }

      .inner-box {
        padding: 1rem;
      }

      .carousel {
        padding: 1.5rem 1rem;
        border-radius: 1.6rem;
      }

      .text-wrap {
        margin-bottom: 1rem;
      }

      .text-group h2 {
        font-size: 1.2rem;
      }

      form {
        padding: 1rem 2rem 1.5rem;
      }
    }
  </style>
</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <!-- Sign In Form -->
          <!-- Sign In Form -->
<form method="POST" action="{{ route('login') }}" autocomplete="off" class="sign-in-form">
  @csrf
  <div class="logo">
    <h4>Project Management</h4>
  </div>
 
  <div class="form-floating mb-3">
    <input id="floatingInput" class="form-control" type="email" name="email" required autofocus autocomplete="username" />
    <label for="floatingInput">Email</label>
  </div>
  <div class="form-floating mb-3">
    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
    <label for="password">Password</label>
  </div>
  <input type="submit" value="Sign In" class="sign-btn" />
  <p class="text">
    Forgotten your password or login details?
    <a href="{{ route('password.request') }}">Get help signing in</a>
  </p>
</form>

<!-- Sign Up Form -->
<form method="POST" action="{{ route('register') }}" autocomplete="off" class="sign-up-form">
  @csrf
  <div class="logo">
    <h4>GOLD SMITH</h4>
  </div>
  <div class="heading">
    <h2>Get Started</h2>
    <h6>Already have an account?</h6>
    <a href="#" class="toggle">Sign in</a>
  </div>
  <div class="form-floating mb-3">
    <input id="name" class="form-control" type="text" name="name" required autofocus autocomplete="name" />
    <label for="name">Name</label>
  </div> 
  <div class="form-floating mb-3">
    <input id="email" class="form-control" type="email" name="email" required autocomplete="username" />
    <label for="email">Email</label>
  </div>
  <div class="form-floating mb-3">
    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" minlength="4" />
    <label for="password">Password</label>
  </div>
  <div class="form-floating mb-3">
    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" minlength="4" />
    <label for="password_confirmation">Confirm Password</label>
  </div>
  <input type="submit" value="Sign Up" class="sign-btn" />
  <p class="text">
    By signing up, I agree to the
    <a href="#">Terms of Services</a> and
    <a href="#">Privacy Policy</a>
  </p>
</form>
        </div>
        <div class="carousel">
          <div class="images-wrapper">
            <img src="../images/pms-imag.jpg" class="image img-1 show" alt="Task Management" style="height:590px;object-fit:cover;  object-position: 100% 100%;
" />

          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>GOLD SMITH </h2>
              </div>
            </div>


          </div>
        </div>

      </div>
    </div>
  </main>

  <script>
    const toggle_btn = document.querySelectorAll(".toggle");
    const main = document.querySelector("main");

    toggle_btn.forEach((btn) => {
      btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
      });
    });
  </script>
</body>

</html>