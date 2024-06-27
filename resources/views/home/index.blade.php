<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/pms-logo.png" type="">
      <title>Project Management System</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   </head>
   <body>
      <!-- <div class="hero_area"> -->
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <!-- @include('home.slider') -->
         <!-- end slider section -->
      <!-- </div> -->
      <!-- why section -->
      <!-- @include('home.why') -->
      <!-- end why section -->
      
      <!-- arrival section -->
      <!-- @include('home.arrival') -->
      <!-- end arrival section -->
      
      <!-- product section -->
      <!-- @include('home.product') -->
      <!-- end product section -->

      <!-- subscribe section -->
      <!-- @include('home.subscribe') -->
      <!-- end subscribe section -->
      <!-- client section -->
      <!-- @include('home.client') -->
      <!-- end client section -->
      <!-- footer start -->
      <!-- @include('home.footer') -->
      <!-- footer end -->
      
      <!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Management System</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">

    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #343a40;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            background-color: #615DFF;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .header nav {
            flex-grow: 1;
            display: flex;
            justify-content: center;
        }

        .header nav a {
            text-decoration: none;
            color: white;
            margin: 0 1rem;
            font-weight: bold;
        }

        .header nav a:hover {
            color: #3DD9EB;
        }

        .header .buttons {
            display: flex;
            gap: 1rem;
        }

        .header .buttons a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: #3DD9EB;
            color: #fff;
            border-radius: 0.25rem;
        }

        .header .buttons a:hover {
            background-color: #32B6C6;
        }

        .hero {
            text-align: center;
            padding: 8rem 0;
            background: linear-gradient(to right, #615DFF, #3DD9EB);
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .hero .cta {
            text-decoration: none;
            padding: 1rem 2rem;
            background-color: white;
            color: #615DFF;
            border-radius: 0.25rem;
            font-size: 1.25rem;
        }

        .hero .cta:hover {
            background-color: #f1f1f1;
        }

        .content {
            text-align: center;
            /* margin: 1rem 0; */
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .content img {
            width: 80%;
            max-width: 600px;
            animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .feature {
            flex: 1 1 calc(33% - 1.5rem);
            min-width: 280px;
            background-color: #f1f1f1;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature i {
            font-size: 3rem;
            color: #615DFF;
            margin-bottom: 1rem;
        }

        .about {
            padding: 4rem 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        .about h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .about p {
            font-size: 1.25rem;
            max-width: 800px;
            margin: auto;
        }

        .pricing {
            padding: 4rem 0;
            text-align: center;
        }

        .pricing h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .pricing .plans {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .pricing .plan {
            flex: 1 1 calc(33% - 1.5rem);
            min-width: 280px;
            background-color: #f1f1f1;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .pricing .plan:hover {
            transform: translateY(-10px);
        }

        .pricing .plan h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .pricing .plan p {
            font-size: 1.25rem;
        }

        .testimonials {
            padding: 4rem 0;
            background-color: #ffffff;
            text-align: center;
        }

        .testimonials h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .testimonials .testimonials-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
        }

        .testimonials .testimonial {
            flex: 1 1 calc(33% - 1.5rem);
            min-width: 280px;
            background-color: #f1f1f1;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .testimonials .testimonial:hover {
            transform: translateY(-10px);
        }

        .testimonials .testimonial p {
            font-size: 1rem;
            color: #6c757d;
        }

        .testimonials .testimonial h4 {
            margin-top: 1rem;
            font-size: 1.25rem;
            color: #343a40;
        }

        .contact {
            padding: 4rem 0;
            text-align: center;
            background-color: #f8f9fa;
        }

        .contact h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .contact form {
            max-width: 600px;
            margin: auto;
        }

        .contact form .form-group {
            margin-bottom: 1rem;
        }

        .contact form .form-group input,
        .contact form .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }

        .contact form .form-group textarea {
            resize: vertical;
        }

        .contact form button {
            padding: 0.75rem 1.5rem;
            background-color: #615DFF;
            color: white;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .contact form button:hover {
            background-color: #4944CC;
        }

        .newsletter {
            padding: 4rem 0;
            background-color: #ffffff;
            text-align: center;
        }

        .newsletter h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .newsletter p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .newsletter form {
            max-width: 600px;
            margin: auto;
        }

        .newsletter form .form-group {
            display: flex;
            justify-content: center;
        }

        .newsletter form .form-group input {
            flex: 1;
            padding: 0.75rem;
            border-radius: 0.25rem 0 0 0.25rem;
            border: 1px solid #ced4da;
        }

        .newsletter form .form-group button {
            padding: 0.75rem 1.5rem;
            background-color: #615DFF;
            color: white;
            border: none;
            border-radius: 0 0.25rem 0.25rem 0;
            cursor: pointer;
        }

        .newsletter form .form-group button:hover {
            background-color: #4944CC;
        }

        .footer {
            text-align: center;
            padding: 2rem 0;
            background-color: #615DFF;
            color: white;
            margin-top: 2rem;
        }

        .footer p {
            margin: 0;
        }

        .footer a {
            color: #3DD9EB;
            text-decoration: none;
            margin: 0 0.5rem;
        }

        .footer a:hover {
            color: #32B6C6;
        }
    </style>
</head>

<!-- <body> -->
    <!-- <header class="header">
        <div class="logo">
            <img src="assets/img/logo.png" alt="Project Management System Logo">
            <h1>Project Management System</h1>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#about">About</a>
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#testimonials">Testimonials</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="buttons">
            <a href="login.html">Login</a>
            <a href="register.html">Register</a>
        </div>
    </header> -->

    <section class="hero">
        <h1>Welcome to the Project Management System</h1>
        <p>Manage your projects efficiently and effectively.</p>               
        <a href="{{ route('login') }}" class="cta">Get Started</a>
    </section>

    <main class="content">
        <h2>Powerful Project Management Features</h2>
        <p>Our system provides all the tools you need to manage your projects effectively.</p>
        <img src="images/img.jpg" alt="Project Management Animation">

        <div class="features" id="features">
            <div class="feature">
                <i class="fas fa-tasks"></i>
                <h3>Task Management</h3>
                <p>Organize and prioritize your tasks with ease using our intuitive interface.</p>
            </div>
            <div class="feature">
                <i class="fas fa-users"></i>
                <h3>Team Collaboration</h3>
                <p>Collaborate with your team in real-time and keep everyone on the same page.</p>
            </div>
            <div class="feature">
                <i class="fas fa-chart-line"></i>
                <h3>Progress Tracking</h3>
                <p>Monitor project progress with detailed reports and analytics.</p>
            </div>
        </div>
    </main>

    <section class="about" id="about">
        <h2>About Us</h2>
        <p>Project Management System is designed to help teams collaborate and manage projects effectively. Our mission is to streamline project management and improve productivity.</p>
    </section>

    <!-- <section class="pricing" id="pricing">
        <h2>Pricing Plans</h2>
        <div class="plans">
            <div class="plan">
                <h3>Basic</h3>
                <p>Perfect for small teams</p>
                <p>$9.99/month</p>
            </div>
            <div class="plan">
                <h3>Pro</h3>
                <p>Ideal for growing businesses</p>
                <p>$29.99/month</p>
            </div>
            <div class="plan">
                <h3>Enterprise</h3>
                <p>Best for large organizations</p>
                <p>$99.99/month</p>
            </div>
        </div>
    </section> -->

   
    <section class="contact" id="contact">
        <h2>Contact Us</h2>
        <form>
            <div class="form-group">
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <!-- <section class="newsletter">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Stay updated with the latest news and updates from our team.</p>
        <form>
            <div class="form-group">
                <input type="email" name="email" placeholder="Your Email" required>
                <button type="submit">Subscribe</button>
            </div>
        </form>
    </section> -->

    <footer class="footer">
        <p>&copy; 2024 Project Management System. All rights reserved.</p>
        <p>Contact us: skalesha8852gmail.com</p>
        <p>Follow us on:
            <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
        </p>
        <p>
            <a href="#">Privacy Policy</a> | 
            <a href="#">Terms of Service</a>
        </p>
    </footer>
<!-- </body> -->

</html>







      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>