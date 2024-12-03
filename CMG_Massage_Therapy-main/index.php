<?php
// Initialize variables to store errors and sanitized data
$nameErr = $emailErr = $phoneErr = $messageErr = $serviceErr = $timeErr = $durationErr = "";
$name = $email = $phone = $message = $service = $time = $duration = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Sanitize and validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Sanitize and validate Phone Number
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
            $phoneErr = "Invalid phone number format";
        }
    }

    // Sanitize the Message for Contact Us
    if (!empty($_POST["message"])) {
        $message = test_input($_POST["message"]);
        $message = filter_var($message, FILTER_SANITIZE_STRING);
    }

    // Validate Service selection for Appointment form
    if (!empty($_POST["service"])) {
        $service = test_input($_POST["service"]);
    } else {
        $serviceErr = "Please select a service";
    }

    // Validate Duration selection
    if (!empty($_POST["duration"])) {
        $duration = test_input($_POST["duration"]);
    } else {
        $durationErr = "Please select duration";
    }

    // Validate Time for Appointment
    if (!empty($_POST['time'])) {
        $time = test_input($_POST['time']);
        $datetime = DateTime::createFromFormat('Y-m-d\TH:i', $time);
        if ($datetime === false) {
            $timeErr = "Invalid time format";
        }
    }

    // If there are no errors, process the form data (store or email)
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($serviceErr) && empty($timeErr) && empty($durationErr)) {
        // Code to process the form (e.g., insert into database or send email)
    }
}

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#treatments">Treatments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#direction">Direction</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="head1">
        <div class="hero-content">
            <img src="image/LogoNegativ.png" height="100px">
            <h1 id="text1" >"Embrace life fully—move freely and without limitations."</h1>
            <div>
                <a href="https://www.lorimcintosh-belanger.clinicsense.com/book" target="_blank" class="btn btn-primary">Book Your Massage Now</a>
            </div>
        </div>
    </section>

    <section id="about" class="content-section">
        <div class="container">
            <div class="about-us-section">
                <div class="info">
                    <h2>About Me</h2>
                    <p>I am committed to collaborating with patients to move without pain, enhance their overall well-being and actively participate in their own recovery.</p>
                    <a href="about.php">
                        <button class="learn">Learn more</button>
                    </a>
                </div>
                <div class="image-container">
                    <img src="image/5 1.png" alt="About Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    
    <section id="parallax2" class="parallax">
        <div class="parallax-content2">
            <div class="aligning-content">
                <img src="image/White tree 2.png" height="100px">
                <h1>Massage therapy provides a natural, hands-on approach to wellness. 
                    It serves both preventive and restorative purposes, focusing on addressing the root causes 
                    of pain or discomfort rather than merely treating individual symptoms.</h1>
            </div>
        </div>
    </section>

    <section id="treatments" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card">
                        <img src="image/Swedish Massage.png" alt="Swedish Massage" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title text-left">Swedish Massage </h5>
                            <a href="Swedish Massage.php">
                                <button class="learn">Learn more</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="card service-card">
                        <img src="image/Deep Tissue Massage.png" alt="Deep Tissue Massage" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title text-left">Deep Tissue Massage </h5>
                            <a href="Deep Tissue Massage.php">
                                <button class="learn">Learn more</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="card service-card">
                        <img src="image/Sports.png" alt="Sports" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title text-left">Sports Massage</h5>
                            <a href="Sports Massage.php">
                                <button class="learn">Learn more</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--    <section id="pricing" class="content-section">
        <div class="container">
            <h2>Our Price</h2>
            <div class="card">
                <div class="PriceCard">
                    <h4>We provide the best massage therapy services...</h4>

                    <p> 30 minutes - $85;

                        45 minutes - $110;

                        60 minutes - $135;

                        75 minutes - $160;

                        90 minutes - $185 </p>

                    <p>
                    <h4>Direct Billing</h4>
                    We are pleased to offer Direct Billing!<br>

                    Direct billing is easy and fast! It is the option to have your health care practitioner submit your insurance claim for you on your behalf. The insurance company may pay the provider directly. Some insurance plans may require the plan holder to pay up front.

                    <br>
                    If we are unable to process your claim we will give you a receipt to claim on your own.

                    <br>
                    All of our therapists at all of our clinics are registered with different Insurance Provider. Veteran Affairs clients - please contact ahead of time so we ensure we apply for benefit.
                    </p>

                    <p>
                    <h4>Cancellation Policy</h4>
                    Your appointment time is reserved just for you. A late cancellation or missed visit leaves a hole in the therapists’ day that could have been filled by another patient. As such, we require 4 hours notice for any cancellations or changes to your appointment. Patients who provide less than 4 hours notice, or miss their appointment, will be charged the full fee to their credit card on file. We will still review each cancelation on an individual basis.
                    </p>
                </div>
            </div>
        </div>
    </section>-->

    <section id="contact" class="content-section" style="background-color: #f0f8ff;">
        <div class="container">
            <h2>Contact Us</h2>
            <form id="contactForm" action="https://script.google.com/macros/s/AKfycbxEuWDTPyKFUDJ_t8oKbNTGmr4cs8NM_LDhqISw6qqKpAtVz4GFae2QNLe_ug2QEWSzWA/exec">
                <h6>The CMG Massage Therapy team is dedicated to providing you with individualized service, and personal care.
                    To schedule an appointment, please use the form below.
                    <br>
                    For general information, or to get in touch with us please complete
                    the form below or email us at info@CMGmassage.com. We look forward to hearing from you!
                </h6>
                <br>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Contact No:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="message" class="form-label">Message:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" name="message" placeholder="How can I help you?" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

            <!-- Confirmation Message Modal -->
            <div class="modal" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Submission Successful</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="confirmationMessage"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS for modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!--    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var form = e.target;
            var formData = new FormData(form);

            // Send form data using AJAX (fetch)
            fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Display success message in modal
                        var confirmationMessage = document.getElementById('confirmationMessage');
                        confirmationMessage.textContent = data.message;

                        // Show the modal
                        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                        confirmationModal.show();

                        // Reset the form
                        form.reset();

                        // Refresh the page after 3 seconds
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    } else {
                        alert("Error: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Error connecting to the server. Please try again later.");
                });
        });
    </script>-->

<!--    <section id="appointment" class="content-section" style="background-color: #ffe4e1;">
        <div class="container">
            <h2>Book an Appointment</h2>
            <br>
            <form id="appointmentForm">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="service" class="form-label">Service:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-select" name="service" required>
                            <option value="">Select Option</option>
                            <option value="Swedish Massage">Swedish Massage</option>
                            <option value="Deep Tissue Massage">Deep Tissue Massage</option>
                            <option value="Pre & Post-Natal Massage">Pre & Post-Natal Massage</option>
                            <option value="Therapeutic Massage">Therapeutic Massage</option>
                            <option value="Craniosacral Massage">Craniosacral Massage</option>
                            <option value="Manual Lymphatic Drainage">Manual Lymphatic Drainage</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="duration" class="form-label">Duration:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-select" name="duration" required>
                            <option value="">Select</option>
                            <option value="30">30 Minutes</option>
                            <option value="45">45 Minutes</option>
                            <option value="60">60 Minutes</option>
                            <option value="75">75 Minutes</option>
                            <option value="90">90 Minutes</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="time" class="form-label">Time:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="datetime-local" class="form-control" name="time" id="appointmentTime" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Contact No:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Book Appointment</button>
                    </div>
                </div>
            </form>
             Confirmation/Error Modal 
            <div id="messageModal" class="modal">
                <div class="modal-content">
                    <span id="closeModal" class="close">&times;</span>
                    <p id="modalContent"></p>
                </div>
            </div>
        </div>
    </section>-->
   
<!--    <script>
        // working hours schedule
        const openingHours = {
            "Sunday": {
                start: "10:00",
                end: "16:00"
            },
            "Monday": {
                start: "09:00",
                end: "18:00"
            },
            "Tuesday": {
                start: "09:00",
                end: "18:00"
            },
            "Wednesday": {
                start: "09:00",
                end: "18:00"
            },
            "Thursday": {
                start: "09:00",
                end: "18:00"
            },
            "Friday": {
                start: "09:00",
                end: "18:00"
            },
            "Saturday": {
                start: "10:00",
                end: "16:00"
            }
        };

        document.getElementById('appointmentTime').addEventListener('change', function(e) {
            const appointmentTime = new Date(e.target.value);
            const dayOfWeek = appointmentTime.toLocaleString("en-US", {
                weekday: 'long'
            });

            const startHour = parseInt(openingHours[dayOfWeek].start.split(":")[0]);
            const startMinute = parseInt(openingHours[dayOfWeek].start.split(":")[1]);
            const endHour = parseInt(openingHours[dayOfWeek].end.split(":")[0]);
            const endMinute = parseInt(openingHours[dayOfWeek].end.split(":")[1]);

            const openingTime = new Date(appointmentTime);
            openingTime.setHours(startHour, startMinute);

            const closingTime = new Date(appointmentTime);
            closingTime.setHours(endHour, endMinute);

            // Check if selected time is within working hours
            if (appointmentTime < openingTime || appointmentTime > closingTime) {
                alert("Please select a time within opening hours: " + openingHours[dayOfWeek].start + " to " + openingHours[dayOfWeek].end);
                e.target.value = ''; // Clear the input
            }
        });

        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(e.target);

            fetch("https://script.google.com/macros/s/AKfycbyGE1h1sVsAdrXcWScYMnCtbvU5DCG1DNL4fg_FcSkLA3OJiIJkhSE2ZPsdockjMhh7LA/exec", {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showModal(data.message, 'success'); // Show success modal
                        e.target.reset(); // Reset form on success
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000); // Refresh page after 3 seconds
                    } else if (data.status === 'error') {
                        showModal(data.message, 'error'); // Show error modal
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showModal("Error connecting to the server. Please try again later.", 'error');
                });
        });

        // Function to show modal messages
        function showModal(message, type) {
            const modal = document.getElementById('messageModal');
            const modalContent = document.getElementById('modalContent');
            const modalClose = document.getElementById('closeModal');

            modal.style.display = 'block'; // Show the modal
            modalContent.innerHTML = message; // Set message content

            if (type === 'success') {
                modalContent.style.color = '#155724';
                modalContent.style.backgroundColor = '#d4edda';
            } else if (type === 'error') {
                modalContent.style.color = '#721c24';
                modalContent.style.backgroundColor = '#f8d7da';
            }

            // Close modal on button click
            modalClose.onclick = function() {
                modal.style.display = 'none';
            };

            // Close modal on outside click
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            };
        }
    </script>-->
    
    <section id="direction">
        <div class="AllLocationContent">
            <div class="Locationhours">
                <h1>Location</h1>
                <p>
                    Address: 123 Willow Grove Road, Suite <br>
                    200, Maplewood, Ontario, K2P 1N8, <br>
                    Canada
                </p>
                <br>
                <p>Opening Hours:</p>
                <p>
                    Monday: 9:00 AM – 6:00 PM  <br> 
                    Tuesday: 9:00 AM – 6:00 PM  <br>
                    Wednesday: 9:00 AM – 8:00 PM  <br>
                    Thursday: 9:00 AM – 8:00 PM  <br>
                    Friday: 9:00 AM – 6:00 PM  <br> 
                    Saturday: 10:00 AM – 4:00 PM  <br> 
                    Sunday: Closed
                </p>
            </div>  
            <div class="MapAll">
                <div class="MapTitle">
                    <div>Show directions</div>
                    <img src="image/arrow.png" alt="direction" class="img-fluid arrowdirection">
                </div>
                <div>Map</div>
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