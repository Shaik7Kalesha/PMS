<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teamy</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background: linear-gradient(135deg, #d4a5e2, #ff9a9e);
    color: #fff;
    text-align: center;
}

header {
    background: rgba(255, 255, 255, 0.1);
    padding: 10px 0;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.auth-buttons {
    display: flex;
}

.auth-buttons a {
    margin-left: 10px;
    padding: 8px 20px;
    border-radius: 20px;
    text-decoration: none;
    color: #fff;
    font-size: 16px;
}

.auth-buttons .login {
    background: rgba(255, 255, 255, 0.2);
}

.auth-buttons .signup {
    background: rgba(255, 255, 255, 0.4);
}

.hero {
    margin-top: 50px;
    padding: 20px;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero p {
    font-size: 18px;
    margin-bottom: 30px;
}

.cta-button {
    background: #fff;
    color: #ff9a9e;
    padding: 15px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 18px;
}

.illustration {
    margin-top: 50px;
}

.illustration img {
    width: 100%;
    max-width: 600px;
}

</style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">Teamy</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="login">Login</a>
                <a href="#" class="signup">Sign Up</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1>Easy way to manage your project</h1>
            <p>Make it easier to manage projects from basic to complex with teamy.com</p>
            <a href="{{ route('login') }}" class="cta-button">Get Started</a>
            <div class="illustration">
                <img src="./images/index-bg.png" alt="Illustration of team working on project">
            </div>
        </section>
    </main>
</body>
</html>
