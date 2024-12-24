<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropex Logistics & Transport</title>
    <meta name="description" content="Dropex Logistics offers fast and reliable shipping services worldwide. Track your parcels easily and manage your shipments with us.">
    <meta name="keywords" content="Logistics, Shipping, Parcel Tracking, Air Freight, Ocean Freight, Ground Shipping">
    <!-- Add AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        teal: {
                            DEFAULT: '#319795',
                        },
                    },
                },
            },
        };
        AOS.init(); // Initialize AOS
    </script>
    </head>
<body class="bg-gray-100">
    <!-- Header Section -->
    <header class="bg-white shadow" role="banner">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="logo text-2xl font-bold text-teal-600">DropEX Logistics</div>
                <nav class="nav" role="navigation">
                    <ul class="flex space-x-6">
                        <li><a href="#hero" class="text-gray-700 hover:text-teal-600"><i class="fas fa-home"></i> Welcome</a></li>
                        <li><a href="#services" class="text-gray-700 hover:text-teal-600"><i class="fas fa-concierge-bell"></i> Our Services</a></li>
                        <li><a href="#track" class="text-gray-700 hover:text-teal-600"><i class="fas fa-truck"></i> Track Shipment</a></li>
                        <li><a href="#testimonials" class="text-gray-700 hover:text-teal-600"><i class="fas fa-comments"></i> Testimonials</a></li>
                        <li><a href="#contact" class="text-gray-700 hover:text-teal-600"><i class="fas fa-envelope"></i> Contact Us</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-teal-600"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-teal-600"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                    </ul>
                </nav>
            </div>
                        </div>
                    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero bg-teal-600 text-white py-20" data-aos="fade-up">
        <div class="container mx-auto text-center">
            <img src="{{ asset('assets/main logo.png') }}" alt="Dropex Logo" class="mx-auto mb-6 h-24">
            <h1 class="text-5xl font-extrabold">Delivering Excellence Worldwide</h1>
            <p class="mt-4 text-lg">Ensuring your goods reach their destination swiftly and securely.</p>
            <a href="#track" class="mt-6 inline-block bg-white text-teal-600 font-semibold py-3 px-6 rounded-full hover:bg-gray-200 transition">Track Your Parcel Now</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20" data-aos="fade-up">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">What We Offer</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                    <div class="text-teal-600 text-4xl mb-4"><i class="fas fa-plane"></i></div>
                    <h3 class="text-xl font-semibold">Air Freight</h3>
                    <p>Fast and reliable air freight services.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                    <div class="text-teal-600 text-4xl mb-4"><i class="fas fa-ship"></i></div>
                    <h3 class="text-xl font-semibold">Ocean Freight</h3>
                    <p>Cost-effective ocean freight solutions.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                    <div class="text-teal-600 text-4xl mb-4"><i class="fas fa-truck"></i></div>
                    <h3 class="text-xl font-semibold">Ground Shipping</h3>
                    <p>Reliable ground shipping across the country.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Parcel Tracking Section -->
    <section id="track" class="py-20 bg-gray-200" data-aos="fade-up">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">Track Your Parcel</h2>
            <form action="{{ route('track.parcel') }}" method="GET" class="flex justify-center">
                <input type="text" name="tracking_id" placeholder="Enter Tracking ID" class="p-3 border border-gray-300 rounded-l-lg w-full md:w-1/3" required aria-label="Tracking ID">
                <button type="submit" class="bg-teal-600 text-white font-semibold py-3 px-4 rounded-r-lg hover:bg-teal-700 transition">Track</button>
            </form>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20" data-aos="fade-up">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">What Our Customers Say</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="italic">"Dropex Logistics has transformed the way we ship our products. Highly recommend!"</p>
                    <p class="font-bold mt-4">- John Doe</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="italic">"Fast and reliable service. My parcels always arrive on time!"</p>
                    <p class="font-bold mt-4">- Jane Smith</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="py-20 bg-gray-200" data-aos="fade-up">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">Contact Us</h2>
            <form action="{{ route('contact.submit') }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <input type="text" name="name" placeholder="Your Name" class="p-3 border border-gray-300 rounded mb-4 w-full" required aria-label="Your Name">
                <input type="email" name="email" placeholder="Your Email" class="p-3 border border-gray-300 rounded mb-4 w-full" required aria-label="Your Email">
                <textarea name="message" placeholder="Your Message" class="p-3 border border-gray-300 rounded mb-4 w-full" required aria-label="Your Message"></textarea>
                <button type="submit" class="bg-teal-600 text-white font-semibold py-3 px-6 rounded hover:bg-teal-700 transition">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-gray-600">&copy; 2024 Dropex Logistics. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
        });
    </script>
    </body>
</html>
