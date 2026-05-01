<?php
$system_name = "MyTalipapa";
$tagline = "An Augmented Reality–Based Stall Management System for Public Market Navigation";
$description = "MyTalipapa is a web-based system that uses Augmented Reality to help stall renters easily locate available public market stalls and assist market contractors in managing stall availability and rental records efficiently.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $system_name; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="logo">🏪 <?php echo $system_name; ?></div>
    <nav>
        <a href="#">Home</a>
        <a href="#features">Features</a>
        <a href="#about">About</a>
        <a href="login.php" class="btn-outline">Sign in</a>
        <a href="register.php" class="btn">Register</a>
    </nav>
</header>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <h1><?php echo $system_name; ?></h1>
        <h2><?php echo $tagline; ?></h2>
        <p><?php echo $description; ?></p>

        <div class="hero-buttons">
            <a href="register.php" class="btn">Get Started</a>
            <a href="login.php" class="btn-light">Sign in</a>
        </div>
    </div>

    <!-- PHONE MOCKUP -->
    <div class="hero-image">
        <div class="phone">
            <img src="images/market.jpg" alt="AR Market View">
            <span class="badge left">AVAILABLE</span>
            <span class="badge right">AVAILABLE</span>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section id="features" class="features">
    <h2>System Features</h2>
    <div class="feature-grid">

        <div class="feature-card">
            <div class="icon">📍</div>
            <h3>AR-Based Stall Navigation</h3>
            <p>Locate available stalls in real time using Augmented Reality.</p>
        </div>

        <div class="feature-card">
            <div class="icon">🗺</div>
            <h3>Digital Market Map</h3>
            <p>View market layout and stall availability digitally.</p>
        </div>

        <div class="feature-card">
            <div class="icon">📋</div>
            <h3>Stall Rental Management</h3>
            <p>Apply for stalls and track application status online.</p>
        </div>

        <div class="feature-card">
            <div class="icon">🧑‍💼</div>
            <h3>Admin & Contractor Dashboard</h3>
            <p>Manage stalls, applications, and records efficiently.</p>
        </div>

    </div>
</section>

<!-- HOW IT WORKS -->
<section class="how">
    <h2>How MyTalipapa Works</h2>
    <div class="steps">
        <div class="step">1<br><span>Register / Login</span></div>
        <div class="step">2<br><span>View Market Map</span></div>
        <div class="step">3<br><span>Use AR Navigation</span></div>
        <div class="step">4<br><span>Apply for Stall</span></div>
        <div class="step">5<br><span>Contractor Reviews</span></div>
    </div>
</section>

<!-- WHO -->
<section class="who">
    <h2>Who Is MyTalipapa For?</h2>
    <div class="who-grid">
        <div class="who-card">🧺<br>Stall Renters</div>
        <div class="who-card">🏢<br>Market Contractors</div>
        <div class="who-card">⚙<br>System Administrators</div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <p>© 2026 MyTalipapa – An Augmented Reality–Based Stall Management System</p>
</footer>

</body>
</html>
