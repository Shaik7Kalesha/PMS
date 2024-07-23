<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management System</title>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes dropdown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            background-color: #ffffff;
            color: #000000;
            scroll-behavior: smooth;
        }

        header {
            background-color: #007BFF;
            position: fixed;
            width: 100%;
            z-index: 10;
            color: #ffffff;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            /* display: flex; */
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        nav h1 {
            font-size: 1.5em;
            color: #ffffff;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 20px;
            margin: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: #ffffff;
            font-size: 1em;
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
            position: relative;
        }

        .auth-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sign-in {
            background-color: #0056b3;
            color: #ffffff;
        }

        .sign-in:hover {
            background-color: #004494;
        }

        .sign-up {
            background-color: #ffffff;
            color: #007BFF;
            position: relative;
            transition: background-color 0.3s ease;
        }

        .sign-up:hover {
            background-color: #e6e6e6;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            border: 1px solid #ccc;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            overflow: hidden;
            animation: dropdown 0.3s ease forwards;
        }

        .dropdown a {
            color: #007BFF;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .dropdown a:hover {
            background-color: #f1f1f1;
        }

        .sign-up:hover .dropdown {
            display: block;
        }

        .hero {
            text-align: center;
            padding: 200px 0;
            background: url('images/image.png') no-repeat center center/cover;
            position: relative;
            z-index: 0;
            color: #000000;
            animation: fadeIn 1s ease;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1;
        }

        .hero h2,
        .hero p,
        .hero .explore-btn {
            position: relative;
            z-index: 2;
        }

        .hero h2 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #000000;
        }

        .hero p {
            font-size: 1.5em;
            margin-bottom: 40px;
            color: #000000;
        }

        .explore-btn {
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #ffffff;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .explore-btn:hover {
            background-color: #0056b3;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            padding: 50px 0;
            background-color: #f8f9fa;
            color: #000000;
            animation: fadeIn 1s ease;
        }

        .stat {
            text-align: center;
        }

        .stat h3 {
            font-size: 2.5em;
            color: #007BFF;
        }

        .features {
            padding: 50px 0;
            background-color: #ffffff;
            color: #000000;
            animation: fadeIn 1s ease;
        }

        .features .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Adjust this value for spacing between cards */
            justify-content: center;
            /* Center the cards horizontally */
        }

        .feature {
            flex: 1 1 calc(33.333% - 40px);
            /* Adjust the width of each card */
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Floating effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .feature:hover {
            transform: translateY(-10px);
            /* Moves the card up slightly on hover */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .feature h3 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #007BFF;
        }

        .feature p {
            font-size: 1em;
            color: #000000;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #007BFF;
            color: #ffffff;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <h1>Project Management</h1>
                <div class="auth-buttons">
                    <a href="{{route('login')}}"><button class="sign-in">Sign In</button></a>
                    <div class="sign-up">
                        <button>Sign Up</button>
                        <div class="dropdown">
                            <a href="{{route('member_register')}}">Member</a>
                            <a href="{{route('student_register')}}">Student</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
    <section class="hero">
    <div class="container">
        <h2>"The only way to do great work is to love what you do." – Steve Jobs</h2>
    </div>
</section>


        
        <section class="features">
            <div class="container">
                <div class="feature">
                    <h3>Task Management</h3>
                    <p>Create, assign, and manage tasks with ease using our advanced task management tools.</p>
                </div>
                <div class="feature">
                    <h3>Team Collaboration</h3>
                    <p>Collaborate in real-time with your team, share files, and communicate effortlessly.</p>
                </div>
                <div class="feature">
                    <h3>Analytics</h3>
                    <p>Gain insights into your project's progress with our powerful analytics and reporting tools.</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Project Management System. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>