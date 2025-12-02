<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservaSpace - Room & Facility Reservation System</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --dark: #1f2937;
            --light: #f9fafb;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .facility-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .step-active {
            background-color: var(--primary);
            color: white;
        }
        
        .step-inactive {
            background-color: #e5e7eb;
            color: #6b7280;
        }
        
        .feature-card {
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalFadeIn 0.3s ease;
        }
        
        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6b7280;
        }
        
        .modal-close:hover {
            color: #374151;
        }
        
        .form-tabs {
            display: flex;
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 1.5rem;
        }
        
        .form-tab {
            flex: 1;
            padding: 0.75rem;
            text-align: center;
            font-weight: 600;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            color: #6b7280;
            transition: all 0.3s ease;
        }
        
        .form-tab.active {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }
        
        .form-tab:hover {
            color: #3b82f6;
        }
        
        .form-panel {
            display: none;
        }
        
        .form-panel.active {
            display: block;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }
        
        .form-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .form-button:hover {
            background-color: #2563eb;
        }
        
        .social-login {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-btn {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .social-btn.google:hover {
            background-color: #f3f4f6;
        }
        
        .social-btn.github:hover {
            background-color: #f3f4f6;
        }
        
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #e5e7eb;
        }
        
        .divider span {
            background-color: white;
            padding: 0 1rem;
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-md py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-blue-600">Reserva<span class="text-green-500">Space</span></span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium">Features</a>
                    <a href="#facilities" class="text-gray-700 hover:text-blue-600 font-medium">Facilities</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-blue-600 font-medium">How It Works</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-blue-600 font-medium">Testimonials</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button id="openLoginModal" class="px-4 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg">Sign In</button>
                    <button id="openRegisterModal" class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Get Started</button>
                    <button class="md:hidden text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-2/3 mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Streamline Your Room & Facility <span class="text-green-300">Reservations</span></h1>
                    <p class="text-xl mb-8 text-blue-100">An intuitive platform for booking conference rooms, labs, gyms, and other facilities. Manage all your reservations in one centralized system with real-time availability and automated confirmations.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button id="openRegisterModal2" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 text-center">Get Started <i class="ml-2 fas fa-arrow-right"></i></button>
                        <a href="#features" class="px-6 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 text-center">Explore Features</a>
                    </div>
                    
                    <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold">500+</h3>
                            <p class="text-blue-100">Rooms Available</p>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold">10K+</h3>
                            <p class="text-blue-100">Monthly Bookings</p>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold">98%</h3>
                            <p class="text-blue-100">User Satisfaction</p>
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold">24/7</h3>
                            <p class="text-blue-100">Support Available</p>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-1/3">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 md:p-8">
                        <h3 class="text-2xl font-bold mb-6 text-center">Why Choose Us</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                                <span>Real-time availability tracking</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                                <span>Automated confirmation emails</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                                <span>Calendar synchronization</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                                <span>Mobile-friendly interface</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                                <span>Custom reporting & analytics</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Powerful <span class="text-blue-600">Features</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Our reservation system is packed with features designed to simplify facility management and enhance user experience.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white border border-gray-200 p-6">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-calendar-check text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Real-Time Availability</h3>
                    <p class="text-gray-600 mb-4">See up-to-the-minute availability for all facilities. Avoid double bookings with our synchronized calendar system.</p>
                    <div class="flex items-center text-blue-600 font-medium">
                        <span>Learn more</span>
                        <i class="ml-2 fas fa-arrow-right"></i>
                    </div>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-white border border-gray-200 p-6">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mobile Responsive</h3>
                    <p class="text-gray-600 mb-4">Access the system from any device. Make bookings, check schedules, and manage reservations on the go.</p>
                    <div class="flex items-center text-green-600 font-medium">
                        <span>Learn more</span>
                        <i class="ml-2 fas fa-arrow-right"></i>
                    </div>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-white border border-gray-200 p-6">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Analytics Dashboard</h3>
                    <p class="text-gray-600 mb-4">Gain insights with detailed usage reports. Track facility utilization, peak hours, and booking trends.</p>
                    <div class="flex items-center text-purple-600 font-medium">
                        <span>Learn more</span>
                        <i class="ml-2 fas fa-arrow-right"></i>
                    </div>
                </div>
                
                <!-- Feature 4 -->
                <div class="feature-card bg-white border border-gray-200 p-6">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bell text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Automated Notifications</h3>
                    <p class="text-gray-600 mb-4">Receive email and SMS reminders for upcoming bookings. Reduce no-shows with automated confirmations.</p>
                    <div class="flex items-center text-yellow-600 font-medium">
                        <span>Learn more</span>
                        <i class="ml-2 fas fa-arrow-right"></i>
                    </div>
                </div>
                
                <!-- Feature 5 -->
                <div class="feature-card bg-white border border-gray-200 p-6">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-user-shield text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Role-Based Access</h3>
                    <p class="text-gray-600 mb-4">Control who can book which facilities. Set up different permission levels for staff, students, and guests.</p>
                    <div class="flex items-center text-red-600 font-medium">
                        <span>Learn more</span>
                        <i class="ml-2 fas fa-arrow-right"></i>
                    </div>
                </div>
                
                <!-- Feature 6 -->
                <div class="feature-card bg-white border border-gray-200 p-6">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-sync-alt text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Calendar Integration</h3>
                    <p class="text-gray-600 mb-4">Sync with Google Calendar, Outlook, and other calendar apps. Keep all your appointments in one place.</p>
                    <div class="flex items-center text-indigo-600 font-medium">
                        <span>Learn more</span>
                        <i class="ml-2 fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our <span class="text-blue-600">Facilities</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Choose from a wide range of well-equipped rooms and facilities designed for various purposes and group sizes.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Facility 1 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="facility-icon bg-blue-100 text-blue-600 mx-auto">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Conference Rooms</h3>
                    <p class="text-gray-600 mb-4 text-center">Perfect for meetings, presentations, and team collaborations with modern AV equipment, whiteboards, and video conferencing capabilities.</p>
                    <div class="text-center">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full mr-2">Capacity: 10-100</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">AV Equipment</span>
                    </div>
                </div>
                
                <!-- Facility 2 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="facility-icon bg-green-100 text-green-600 mx-auto">
                        <i class="fas fa-dumbbell text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Gym & Fitness Center</h3>
                    <p class="text-gray-600 mb-4 text-center">Fully equipped gym with cardio machines, weights, yoga studio, and group exercise areas. Locker rooms and showers available.</p>
                    <div class="text-center">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full mr-2">Open: 6AM-10PM</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">Full Equipment</span>
                    </div>
                </div>
                
                <!-- Facility 3 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="facility-icon bg-purple-100 text-purple-600 mx-auto">
                        <i class="fas fa-flask text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Laboratories</h3>
                    <p class="text-gray-600 mb-4 text-center">Specialized labs for research, experiments, and academic projects with safety equipment, specialized tools, and proper ventilation.</p>
                    <div class="text-center">
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 text-sm rounded-full mr-2">Special Access</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">Safety Equipment</span>
                    </div>
                </div>
                
                <!-- Facility 4 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="facility-icon bg-yellow-100 text-yellow-600 mx-auto">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Library Study Rooms</h3>
                    <p class="text-gray-600 mb-4 text-center">Quiet spaces for individual or group study with access to resources, high-speed WiFi, power outlets, and printing facilities.</p>
                    <div class="text-center">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full mr-2">Silent Zone</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">High-Speed WiFi</span>
                    </div>
                </div>
                
                <!-- Facility 5 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="facility-icon bg-red-100 text-red-600 mx-auto">
                        <i class="fas fa-chalkboard-teacher text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Classrooms</h3>
                    <p class="text-gray-600 mb-4 text-center">Equipped with smart boards, projectors, comfortable seating, and audio systems for educational sessions and training workshops.</p>
                    <div class="text-center">
                        <span class="px-3 py-1 bg-red-100 text-red-800 text-sm rounded-full mr-2">Capacity: 20-50</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">Smart Boards</span>
                    </div>
                </div>
                
                <!-- Facility 6 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="facility-icon bg-indigo-100 text-indigo-600 mx-auto">
                        <i class="fas fa-theater-masks text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Auditoriums</h3>
                    <p class="text-gray-600 mb-4 text-center">Large venues for events, seminars, and performances with professional lighting, sound systems, and stage equipment.</p>
                    <div class="text-center">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm rounded-full mr-2">Capacity: 200+</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">Professional AV</span>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <button id="openRegisterModal3" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition inline-flex items-center">
                    Register to View All Facilities <i class="ml-2 fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How It <span class="text-blue-600">Works</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Our platform makes facility reservation simple and efficient with a streamlined 4-step process.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="step-indicator step-active mx-auto mb-6">1</div>
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-plus text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Create Account</h3>
                    <p class="text-gray-600">Sign up for an account with your organization credentials. Get verified and set up your profile.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="step-indicator step-inactive mx-auto mb-6">2</div>
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-search text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Browse Facilities</h3>
                    <p class="text-gray-600">Explore available facilities, check real-time availability, and view equipment specifications.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="step-indicator step-inactive mx-auto mb-6">3</div>
                    <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="far fa-calendar-check text-yellow-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Make Reservation</h3>
                    <p class="text-gray-600">Select your preferred date, time, and facility. Add any special requirements or equipment needs.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="text-center">
                    <div class="step-indicator step-inactive mx-auto mb-6">4</div>
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check-circle text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Get Confirmation</h3>
                    <p class="text-gray-600">Receive instant confirmation and reminders. Manage your bookings through your personal dashboard.</p>
                </div>
            </div>
            
            <div class="mt-12 bg-blue-50 rounded-2xl p-8 text-center">
                <h3 class="text-2xl font-bold mb-4">Ready to Get Started?</h3>
                <p class="text-gray-700 mb-6 max-w-2xl mx-auto">Join hundreds of organizations that have streamlined their facility management with ReservaSpace.</p>
                <button id="openRegisterModal4" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition inline-flex items-center">
                    Request a Demo <i class="ml-2 fas fa-play-circle"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our <span class="text-blue-600">Users Say</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Hear from organizations and individuals who have transformed their reservation process with ReservaSpace.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-bold text-lg">JD</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold">John Davis</h4>
                            <p class="text-gray-500 text-sm">University Administrator</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"ReservaSpace has simplified our room booking process by 80%. The interface is intuitive and the automated confirmations save us hours of work each week."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-green-600 font-bold text-lg">SM</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold">Sarah Miller</h4>
                            <p class="text-gray-500 text-sm">Corporate Event Planner</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"The calendar view and real-time availability features are game-changers for planning our corporate events. We can now book multiple facilities simultaneously."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                            <span class="text-purple-600 font-bold text-lg">AR</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold">Alex Rodriguez</h4>
                            <p class="text-gray-500 text-sm">Research Lab Manager</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"Booking specialized lab equipment and facilities used to be a nightmare. Now with ReservaSpace, our researchers can easily schedule their lab time weeks in advance."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <button id="openLoginModal2" class="px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition inline-flex items-center">
                    Sign In to Read More <i class="ml-2 fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Facility Management?</h2>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto mb-8">Join thousands of organizations that trust ReservaSpace for their room and facility reservations.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button id="openRegisterModal5" class="px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition text-lg">Start Free Trial</button>
                <button id="openRegisterModal6" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 transition text-lg">Schedule a Demo</button>
            </div>
            <p class="mt-6 text-blue-200">No credit card required • 14-day free trial • Full support included</p>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">Reserva<span class="text-green-500">Space</span></span>
                    </div>
                    <p class="text-gray-400 mb-6">Simplifying room and facility reservations for organizations worldwide.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white transition">Features</a></li>
                        <li><a href="#facilities" class="text-gray-400 hover:text-white transition">Facilities</a></li>
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-white transition">How It Works</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition">Testimonials</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-6">Facilities</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Conference Rooms</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Meeting Rooms</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Laboratories</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Gym & Fitness</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Auditoriums</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-6">Contact Us</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-400"></i>
                            <span class="text-gray-400">123 Business Ave, Suite 100<br>San Francisco, CA 94107</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-blue-400"></i>
                            <span class="text-gray-400">+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-400"></i>
                            <span class="text-gray-400">info@reservaspace.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
                <p>&copy; 2023 ReservaSpace. All rights reserved. | <a href="#" class="hover:text-white transition">Privacy Policy</a> | <a href="#" class="hover:text-white transition">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <!-- Login/Register Modal -->
    <div id="authModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-2xl font-bold">Welcome to ReservaSpace</h2>
                <button id="closeAuthModal" class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-tabs">
                    <div class="form-tab active" data-tab="login">Sign In</div>
                    <div class="form-tab" data-tab="register">Register</div>
                </div>
                
                <!-- Login Form -->
                <div id="loginForm" class="form-panel active">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-input" placeholder="you@example.com" required>
                        </div>
                        <div class="mb-6">  
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-input" placeholder="Enter your password" required>
                            <div class="text-right mt-1">
                                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
                            </div>
                        </div>
                        <button type="submit" class="form-button">Sign In</button>
                    </form>
                    
                    <div class="divider">
                        <span>Or continue with</span>
                    </div>
                    
                    <div class="social-login">
                        <button class="social-btn google">
                            <i class="fab fa-google text-red-500"></i>
                            <span>Google</span>
                        </button>
                        <button class="social-btn github">
                            <i class="fab fa-github"></i>
                            <span>GitHub</span>
                        </button>
                    </div>
                    
                    <p class="text-center mt-6 text-gray-600">
                        Don't have an account? 
                        <a href="#" class="text-blue-600 font-medium hover:underline switch-to-register">Register here</a>
                    </p>
                </div>
                
                <!-- Register Form -->
                <div id="registerForm" class="form-panel">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-input" placeholder="John" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-input" placeholder="you@example.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-input" placeholder="Create a password" required>
                            <p class="text-xs text-gray-500 mt-1">Must be at least 8 characters with a number and special character.</p>
                        </div>

                        <div class="mb-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm your password" required>
                        </div>

                        <!-- Terms of Service -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2" required>
                                <span class="text-sm text-gray-700">
                                    I agree to the 
                                    <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and 
                                    <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>
                                </span>
                            </label>
                        </div>

                        <!-- Admin Checkbox -->
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" id="registerAsAdmin" class="mr-2">
                                <span class="text-sm text-gray-700">Register as Admin</span>
                            </label>
                            <!-- Hidden input for role -->
                            <input type="hidden" name="role" id="roleInput" value="user">
                        </div>

                        <button type="submit" class="form-button">Create Account</button>
                    </form>

                    <div class="divider">
                        <span>Or sign up with</span>
                    </div>

                    <div class="social-login">
                        <button class="social-btn google">
                            <i class="fab fa-google text-red-500"></i>
                            <span>Google</span>
                        </button>
                        <button class="social-btn github">
                            <i class="fab fa-github"></i>
                            <span>GitHub</span>
                        </button>
                    </div>

                    <p class="text-center mt-6 text-gray-600">
                        Already have an account? 
                        <a href="#" class="text-blue-600 font-medium hover:underline switch-to-login">Sign in here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Interactivity -->
     <script>
        const adminCheckbox = document.getElementById('registerAsAdmin');
        const roleInput = document.getElementById('roleInput');

        adminCheckbox.addEventListener('change', function() {
            roleInput.value = this.checked ? 'admin' : 'user';
        });
    </script>
    <script>
        // Modal functionality
        const authModal = document.getElementById('authModal');
        const openLoginModal = document.getElementById('openLoginModal');
        const openLoginModal2 = document.getElementById('openLoginModal2');
        const openRegisterModal = document.getElementById('openRegisterModal');
        const openRegisterModal2 = document.getElementById('openRegisterModal2');
        const openRegisterModal3 = document.getElementById('openRegisterModal3');
        const openRegisterModal4 = document.getElementById('openRegisterModal4');
        const openRegisterModal5 = document.getElementById('openRegisterModal5');
        const openRegisterModal6 = document.getElementById('openRegisterModal6');
        const closeAuthModal = document.getElementById('closeAuthModal');
        
        const formTabs = document.querySelectorAll('.form-tab');
        const formPanels = document.querySelectorAll('.form-panel');
        const switchToRegister = document.querySelector('.switch-to-register');
        const switchToLogin = document.querySelector('.switch-to-login');
        
        // Open modal with login form
        function openModalWithLogin() {
            authModal.style.display = 'flex';
            switchTab('login');
        }
        
        // Open modal with register form
        function openModalWithRegister() {
            authModal.style.display = 'flex';
            switchTab('register');
        }
        
        // Switch between login and register tabs
        function switchTab(tabName) {
            // Update tabs
            formTabs.forEach(tab => {
                if (tab.dataset.tab === tabName) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
            
            // Update panels
            formPanels.forEach(panel => {
                if (panel.id === `${tabName}Form`) {
                    panel.classList.add('active');
                } else {
                    panel.classList.remove('active');
                }
            });
        }
        
        // Event listeners for opening modal
        openLoginModal.addEventListener('click', openModalWithLogin);
        openLoginModal2.addEventListener('click', openModalWithLogin);
        openRegisterModal.addEventListener('click', openModalWithRegister);
        openRegisterModal2.addEventListener('click', openModalWithRegister);
        openRegisterModal3.addEventListener('click', openModalWithRegister);
        openRegisterModal4.addEventListener('click', openModalWithRegister);
        openRegisterModal5.addEventListener('click', openModalWithRegister);
        openRegisterModal6.addEventListener('click', openModalWithRegister);
        
        // Close modal
        closeAuthModal.addEventListener('click', () => {
            authModal.style.display = 'none';
        });
        
        // Close modal when clicking outside
        authModal.addEventListener('click', (e) => {
            if (e.target === authModal) {
                authModal.style.display = 'none';
            }
        });
        
        // Switch between login/register tabs
        formTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                switchTab(tab.dataset.tab);
            });
        });
        
        // Switch to register from login form link
        switchToRegister.addEventListener('click', (e) => {
            e.preventDefault();
            switchTab('register');
        });
        
        // Switch to login from register form link
        switchToLogin.addEventListener('click', (e) => {
            e.preventDefault();
            switchTab('login');
        });
        
        // Form submission handling
        document.getElementById('loginFormSubmit').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Login functionality would be implemented here. In a real app, this would validate credentials and redirect to dashboard.');
            authModal.style.display = 'none';
        });
        
        document.getElementById('registerFormSubmit').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Registration successful! In a real app, this would create a user account and redirect to dashboard.');
            authModal.style.display = 'none';
        });
        
        // Social login buttons
        document.querySelectorAll('.social-btn').forEach(button => {
            button.addEventListener('click', function() {
                const platform = this.querySelector('span').textContent;
                alert(`${platform} login would be implemented here. In a real app, this would redirect to OAuth authentication.`);
            });
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Mobile menu toggle (simplified)
        document.querySelector('button.md\\:hidden').addEventListener('click', function() {
            alert('Mobile menu would open here. In a real implementation, this would show/hide a mobile menu.');
        });
        
        // Add hover effect to all cards with the card-hover class
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && authModal.style.display === 'flex') {
                authModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>