<?php
include("config.php");

// // 1. Navbar
// $navbar = $conn->query("SELECT * FROM home_navbar_menu WHERE is_active = 1 ORDER BY position ASC");

// // 2. Hero
// $hero = $conn->query("SELECT * FROM home_hero LIMIT 1")->fetch_assoc();

// // 3. Features
// $features = $conn->query("SELECT * FROM home_features");

// // 4. Routes
// $routes = $conn->query("SELECT * FROM home_routes");

// // 5. Testimonials
// $testimonials = $conn->query("SELECT * FROM home_testimonials");

// // 6. Footer About
// $footer_about = $conn->query("SELECT * FROM footer_about LIMIT 1")->fetch_assoc();

// // 7. Footer Links
// $footer_links = $conn->query("SELECT * FROM footer_links WHERE is_active = 1 ORDER BY position ASC");

// // 8. Footer Contact
// $footer_contact = $conn->query("SELECT * FROM footer_contact LIMIT 1")->fetch_assoc();

// // 9. Footer Social Links
// $footer_social_links = $conn->query("SELECT * FROM footer_social_links");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Reservation System</title>
    <link rel="stylesheet" type="text/css" href="../admin/admin-style.css">
</head>
<body>

 <!-- ======= Navbar/Header Section ======= -->
        <div id="navbar">
            <div id="logo">Bus Reservation</div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Service</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
      
    <!-- Hero Section -->
    <section id="hero">
      <div id="container">
          <h1>Your Journey Begins Here</h1>
          <p>Experience comfortable, affordable, and reliable bus travel across the country with our premium services. Book your seat today and travel with confidence.</p>
      </div>
  </section>
  
  <br><br>
  <!-- Features Section -->
  <section id="container features-section">
      <h2 id="section-title-1">Why Choose TravelExpress</h2>
      <div id="features-grid">

      <!-- Each feature block -->
            <!-- Feature 1 -->
          <div id="feature-card">
              <div id="feature-icon">🚍</div>
              <h3>High-Speed Bus</h3>
              <p>Experience fast and comfortable travel with our high-speed buses, designed for quick and efficient journeys.</p>
          </div>

           <!-- Feature 2 -->
          <div id="feature-card">
              <div id="feature-icon">⏱️</div>
              <h3>On-Time Guarantee</h3>
              <p>We pride ourselves on our 98% on-time arrival rate, ensuring you reach your destination as scheduled.</p>
          </div>

           <!-- Feature 3 -->
          <div id="feature-card">
              <div id="feature-icon">💰</div>
              <h3>Best Prices</h3>
              <p>Enjoy competitive fares with our price match guarantee and frequent traveler discounts.</p>
          </div>

           <!-- Feature 4 -->
          <div id="feature-card">
              <div id="feature-icon">🛡️</div>
              <h3>Safe Travel</h3>
              <p>Your safety is our priority with experienced drivers and rigorous maintenance standards.</p>
          </div>

           <!-- Feature 5 -->
          <div id="feature-card">
              <div id="feature-icon">📱</div>
              <h3>Easy Booking</h3>
              <p>Book your tickets in minutes through our website with instant confirmation.</p>
          </div>
          
           <!-- Feature 6 -->
          <div id="feature-card">
              <div id="feature-icon">🔄</div>
              <h3>Flexible Changes</h3>
              <p>Change your travel plans easily with our flexible rescheduling options.</p>
          </div>
  
           <!-- Feature 7 -->
          <div id="feature-card">
              <div id="feature-icon">📅</div>
              <h3>Easy Scheduling</h3>
              <p>Plan your trips with ease using our intuitive scheduling system.</p>
          </div>
  
           <!-- Feature 8 -->
          <div id="feature-card">
              <div id="feature-icon">🏞️</div>
              <h3>Nature Expeditions</h3>
              <p>Discover the beauty of nature with our carefully curated expeditions.</p>
          </div>

           <!-- Feature 9 -->
          <div id="feature-card">
              <div id="feature-icon">👨‍💼</div>
              <h3>24/7 Customer Support</h3>
              <p>Our dedicated support team is available around the clock to assist you with any inquiries or issues.</p>
          </div>

        
      </div>
  </section>
  <br><br>
  <!-- Popular Routes Section -->
  <section id="container routes-section">
      <h2 id="section-title-1">Popular Routes</h2>
      <div id="routes-grid">
          <div id="route-card">
              <div id="route-image">
                  <img src="../admin/img/img1 forhome page ktm to Nepaljung.jpg" alt="Kathmandu">
              </div>
              
              <div id="route-info">
                  <h3>Kathmandu to Nepaljung</h3>
                  <div id="route-meta">
                      <span>Duration: 16h 30m</span>
                      <span>Daily: 12 trips</span>
                  </div>
                  <div id="route-price">Rs.Ac.1600, Deluxe.1700, Non-Ac.1800</div>
              </div>
          </div>
          
          <div id="route-card">
              <div id="route-image">
                  <img src="../admin/img/img2 for home page ktm to Dhangadi.jpg" alt="Kathmandu">
              </div>
              <div id="route-info">
                  <h3>Kathmandu to Dhangadi</h3>
                  <div id="route-meta">
                      <span>Duration: 20h 15m</span>
                      <span>Daily: 8 trips</span>
                  </div>
                  <div id="route-price">Rs.Ac.2200, Deluxe.1900, Non-Ac.1800</div>
              </div>
          </div>
  
          <div id="route-card">
              <div id="route-image">
                  <img src="../admin/img/img3 for home page ktm to Dadheldhura.jpg" alt="Kathmandu">
              </div>
              <div id="route-info">
                  <h3>Kathmandu to Dadheldhura</h3>
                  <div id="route-meta">
                      <span>Duration: 28h 15m</span>
                      <span>Daily: 8 trips</span>
                  </div>
                  <div id="route-price">Rs; Ac.2400, Deluxe.2500, Non-Ac.2600</div>
              </div>
          </div>
         
          <div id="route-card">
              <div id="route-image">
                  <img src="../admin/img/img4 for home page ktm to Achham.jpg" alt="Kathmandu">
              </div>
              <div id="route-info">
                  <h3>Kathmandu to Achham</h3>
                  <div id="route-meta">
                      <span>Duration: 47h 15m</span>
                      <span>Daily: 8 trips</span>
                  </div>
                  <div id="route-price">Rs.Ac.2500, Deluxe.2600, Non-Ac.2800</div>
              </div>
          </div>
  
          <div id="route-card">
              <div id="route-image">
                  <img src="../admin/img/img5 for home page ktm to Bajura.jpg" alt="Kathmandu">
              </div>
              <div id="route-info">
                  <h3>Kathmandu to Bajura</h3>
                  <div id="route-meta">
                      <span>Duration: 50h 45m</span>
                      <span>Daily: 6 trips</span>
                  </div>
                  <div id="route-price">Rs: AC.2600, Deluxe.2800, Non-Ac.3000</div>
              </div>
  
          </div>
          <div id="route-card">
              <div id="route-image">
                  <img src="../admin/img/img6 for home page ktm to Bajhang.jpg" alt="Kathmandu">
              </div>
              <div id="route-info">
                  <h3>Kathmandu to Bajhang</h3>
                  <div id="route-meta">
                      <span>Duration: 43h 30m</span>
                      <span>Daily: 10 trips</span>
                  </div>
                  <div id="route-price">Rs: Ac.2600, Deluxe.2800, Non-Ac.3000</div>
              </div>
          </div>
      </div>
  </section>
  <br><br><br>
  <!-- Testimonials Section -->
  <section id="container testimonials-section">
      <h2 id="section-title-1">What Our Passengers Say</h2>
      <div id="testimonials-grid">
          <div id="testimonial-card">
              <p id="testimonial-text">"I travel weekly between Pokhara and Boston for work. TravelExpress has never let me down with their punctuality and comfortable seats. Highly recommended!"</p>
              <div id="testimonial-author">
                  <div id="author-avatar">
                      <img src="../admin/img/img of cr7 for home page customer say.webp" alt="Cristiano Ronaldo">
                  </div>
                  <div id="author-info">
                      <h4>Cristiano ronaldo</h4>
                      <p>Frequent Traveler</p>
                  </div>
              </div>
          </div>
  
  
          <div id="testimonial-card">
              <p id="testimonial-text">"The luxury coach service is worth every penny! I was able to work comfortably during my trip with the onboard WiFi and power outlets."</p>
              <div id="testimonial-author">
                  <div id="author-avatar">
                      <img src="../admin/img/img of messi for for home customer say.webp" alt="lional Messi">
                  </div>
                  <div id="author-info">
                      <h4>Lionel Messi</h4>
                      <p>Business Traveler</p>
                  </div>
              </div>
          </div>
  
          <div id="testimonial-card">
              <p id="testimonial-text">"Taking the overnight sleeper bus saved me a hotel night. I arrived fresh and ready for my meeting. Great service and friendly staff!"</p>
              <div id="testimonial-author">
                  <div id="author-avatar">
                      <img src="../admin/img/img of neymar for home page customer sasy.jpeg" alt="Neymar JR">
                  </div>
                  <div id="author-info">
                      <h4>Neymar JR</h4>
                      <p>Occasional Traveler</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <br><br>
  <!-- CTA Section -->
  <div id="hello">
      <section id="container cta-section">
          <h2>Ready to Travel With Us?</h2>
          <p>Join millions of satisfied passengers who choose TravelExpress for their journeys</p>
          <div id="cta-buttons">
              <a href="#" id="btn btn-primary">Book Your Ticket Now</a>
              <a href="#" id="btn btn-secondary">Explore Our Services</a>
          </div>
      </section>
  </div>


<!-- Footer HTML -->
<footer class="footer">
    <div class="footer-container">
      <div class="footer-section about">
        <h2>Online Bus Reservation</h2>
        <p>Your trusted partner for safe, easy, and reliable bus ticket bookings across the country.</p>
      </div>
      
      <!-- Footer Links Section -->
      <div class="footer-section links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">services</a></li>
          <li><a href="contact.php">Contact</a></li>
          
        </ul>
      </div>
  
      <div class="footer-section contact">
        <h3>Contact Us</h3>
        <p>Email: bhuone123@gmail.com</p>
        <p>Phone: +977- 9860132003</p>
        <p>Address:Putalisadak Street, Kathmandu, Nepal</p>
      </div>
  
       <!-- Footer Social Media Links -->
      <div class="footer-section social">
        <h3>Follow Us</h3>
        <div class="social-icons">
          <a href="https://www.facebook.com/cristiano.georgina.2025"><img src="../admin/img/img1 for facebook  footer.png" alt="Facebook">facebook</a>
          <a href="https://x.com/BhuvanJaishi/status/1638425250089308161?t=drB7SFVKyDA9sLwOHWWs5g&s=19"><img src="../admin/img/img2 for twitter footer.png" alt="Twitter">Twitter</a>
          <a href="https://www.instagram.com/bhuonejoshi7?igsh=YnBkcTdva3FmbWc4"><img src="../admin/img/img3 for instagram footer.svg" alt="Instagram">Instagram</a>
         <a href="https://www.linkedin.com/public-profile/settings?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_self_edit_contact-info%3BOIJJolWfSiel9fqOI%2FZ3fw%3D%3D"><img src="../admin/img/img4 for footer linkedin.png" alt="linked">Linkedin</a>        </div>
      </div>
    </div>
  
     <!-- Footer Bottom -->
    <div class="footer-bottom">
      &copy; 2025 Online Bus Reservation System. All rights reserved.
    </div>
  </footer>


<script src="script.js"></script>
</body>
</html>