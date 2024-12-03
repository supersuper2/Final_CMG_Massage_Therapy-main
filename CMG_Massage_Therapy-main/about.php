<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMG Massage Therapy</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for social media icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <header>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#treatments">Treatments</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#direction">Direction</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <section id="about" class="content-section">
        <div class="aboutmecontainer">
            <div class="about-us-section-onpage">
                <a href="index.php#about"> 
                    <button class="backtohome"> 
                        <span class="arrow"></span>
                    </button>
                </a>
                <div class="infoaboutme">
                    <p>I am a proud honors graduate and a newly Registered Massage Therapist with a passion for helping people improve their activities of daily living. My focus is on enhancing mobility, relieving discomfort, and empowering individuals to live life to the fullest. Throughout my career, I have been dedicated to sharing knowledge, fostering understanding, and equipping others with the tools they need to support their well-being.</p>

                    <p>I am committed to providing personalized care, tailoring each treatment to meet my clients' unique needs and health goals. Massage therapy, in my view, is a powerful way to promote overall wellness, ease pain, and improve quality of life.</p>

                    <p>Outside of treating clients, I find joy in traveling and creating lasting memories with my family. Staying active is a vital part of my lifestyle—I love the peace of a brisk walk, the mindfulness of yoga, and the energy of cycling. Living in the picturesque community of Merrickville is something I truly cherish. Its welcoming charm, vibrant local culture, and beautiful surroundings inspire me daily and make it the perfect place to call home.</p>
                </div>
                <div class="image-container-onpage">
                    <img src="image/aboutme.png" alt="About Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    
    <footer class="footer bg-dark text-light pt-5 pb-4">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <h5>About Us</h5>
                    <p>The clinic offers more than just massage services, it's a sanctuary for healing and empowerment. Set in the peaceful countryside, our environment provides a retreat where clients can escape the stress of daily life. I am passionate about not only helping patients build strength and relieve pain but also educating them on how they can have a meaningful impact on their own recovery and long-term health. </p>
                </div>


                <div class="col-md-3">
                    <h5>Our Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="#services" class="text-light">Relaxation</a></li>
                        <li><a href="#services" class="text-light">Deep tissue</a></li>
                        <li><a href="#services" class="text-light">Sport</a></li>
                </div>

                <div class="col-md-3">
                    <h5>Opening Hours</h5>
                    <ul class="list-unstyled">
                        <li>Monday: 9:00 AM - 6:00 PM</li>
                        <li>Tuesday: 9:00 AM - 6:00 PM</li>
                        <li>Wednesday: 9:00 AM - 8:00 PM</li>
                        <li>Thursday: 9:00 AM - 8:00 PM</li>
                        <li>Friday: 9:00 AM - 6:00 PM</li>
                        <li>Saturday: 10:00 AM - 4:00 PM</li>
                        <li>Sunday: Closed</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        <a href="https://www.facebook.com" class="text-light me-3"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="mt-4">
                        <img src="image/LogoNegativ.png" height="50px">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Font Awesome for Social Media Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>