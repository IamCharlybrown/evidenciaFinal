<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventarix - Sistema de Gestión de Inventarios</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <style>
            /* Base Styles */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f7fafc;
                color: #333;
                line-height: 1.6;
            }
            
            /* Header */
            header {
                background-color: #1a56db;
                color: white;
                padding: 1rem 0;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
            
            .header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .logo {
                font-size: 2rem;
                font-weight: 700;
            }
            
            .logo span {
                color: #93c5fd;
            }
            
            nav ul {
                display: flex;
                list-style: none;
            }
            
            nav ul li {
                margin-left: 2rem;
            }
            
            nav ul li a {
                color: white;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            
            nav ul li a:hover {
                color: #93c5fd;
            }
            
            .auth-buttons a {
                display: inline-block;
                padding: 0.5rem 1.5rem;
                margin-left: 1rem;
                text-decoration: none;
                border-radius: 4px;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            
            .login-btn {
                color: white;
                border: 1px solid white;
            }
            
            .login-btn:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }
            
            .register-btn {
                background-color: white;
                color: #1a56db;
            }
            
            .register-btn:hover {
                background-color: #f3f4f6;
            }
            
            /* Hero Section */
            .hero {
                background: linear-gradient(135deg, #1a56db 0%, #3b82f6 100%);
                color: white;
                padding: 5rem 0;
                text-align: center;
            }
            
            .hero-container {
                max-width: 900px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .hero h1 {
                font-size: 3rem;
                margin-bottom: 1rem;
                line-height: 1.2;
            }
            
            .hero p {
                font-size: 1.25rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }
            
            .hero-btn {
                display: inline-block;
                background-color: white;
                color: #1a56db;
                padding: 0.75rem 2rem;
                font-size: 1.1rem;
                font-weight: 600;
                border-radius: 4px;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            
            .hero-btn:hover {
                background-color: #f3f4f6;
                transform: translateY(-3px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
            
            /* Features Section */
            .features {
                padding: 5rem 0;
                background-color: white;
            }
            
            .features-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .section-title {
                text-align: center;
                margin-bottom: 3rem;
            }
            
            .section-title h2 {
                font-size: 2.5rem;
                color: #1a56db;
                margin-bottom: 1rem;
            }
            
            .section-title p {
                font-size: 1.1rem;
                color: #6b7280;
                max-width: 700px;
                margin: 0 auto;
            }
            
            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }
            
            .feature-card {
                background-color: #f9fafb;
                border-radius: 8px;
                padding: 2rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }
            
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
            
            .feature-icon {
                width: 60px;
                height: 60px;
                background-color: #dbeafe;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1.5rem;
                color: #1a56db;
                font-size: 1.5rem;
            }
            
            .feature-card h3 {
                font-size: 1.25rem;
                margin-bottom: 1rem;
                color: #111827;
            }
            
            .feature-card p {
                color: #6b7280;
            }
            
            /* Benefits Section */
            .benefits {
                padding: 5rem 0;
                background-color: #f1f5f9;
            }
            
            .benefits-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
                display: flex;
                align-items: center;
                flex-wrap: wrap;
            }
            
            .benefits-content {
                flex: 1;
                min-width: 300px;
                padding-right: 2rem;
            }
            
            .benefits-image {
                flex: 1;
                min-width: 300px;
                text-align: center;
            }
            
            .benefits-image img {
                max-width: 100%;
                border-radius: 8px;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            }
            
            .benefits-content h2 {
                font-size: 2.5rem;
                color: #1a56db;
                margin-bottom: 1.5rem;
            }
            
            .benefits-list {
                margin: 2rem 0;
            }
            
            .benefit-item {
                display: flex;
                margin-bottom: 1.5rem;
            }
            
            .benefit-icon {
                margin-right: 1rem;
                color: #1a56db;
                font-weight: bold;
            }
            
            .benefit-text h3 {
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
                color: #111827;
            }
            
            .benefit-text p {
                color: #6b7280;
            }
            
            /* CTA Section */
            .cta {
                padding: 5rem 0;
                background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
                color: white;
                text-align: center;
            }
            
            .cta-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .cta h2 {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
            }
            
            .cta p {
                font-size: 1.1rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }
            
            .cta-buttons {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                flex-wrap: wrap;
            }
            
            .cta-btn-primary {
                background-color: white;
                color: #1a56db;
                padding: 0.75rem 2rem;
                border-radius: 4px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            
            .cta-btn-primary:hover {
                background-color: #f3f4f6;
                transform: translateY(-3px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
            
            .cta-btn-secondary {
                border: 1px solid white;
                color: white;
                padding: 0.75rem 2rem;
                border-radius: 4px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            
            .cta-btn-secondary:hover {
                background-color: rgba(255, 255, 255, 0.1);
                transform: translateY(-3px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
            
            /* Footer */
            footer {
                background-color: #1e293b;
                color: white;
                padding: 4rem 0 2rem;
            }
            
            .footer-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .footer-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 2rem;
                margin-bottom: 3rem;
            }
            
            .footer-col h3 {
                font-size: 1.25rem;
                margin-bottom: 1.5rem;
                color: #e2e8f0;
            }
            
            .footer-col ul {
                list-style: none;
            }
            
            .footer-col ul li {
                margin-bottom: 0.75rem;
            }
            
            .footer-col ul li a {
                color: #cbd5e1;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            
            .footer-col ul li a:hover {
                color: white;
            }
            
            .footer-bottom {
                text-align: center;
                border-top: 1px solid #334155;
                padding-top: 2rem;
                color: #94a3b8;
                font-size: 0.875rem;
            }
            
            /* Responsive */
            @media (max-width: 768px) {
                .header-container {
                    flex-direction: column;
                    text-align: center;
                }
                
                nav ul {
                    margin: 1.5rem 0;
                }
                
                nav ul li {
                    margin: 0 1rem;
                }
                
                .auth-buttons {
                    margin-top: 1rem;
                }
                
                .hero h1 {
                    font-size: 2.5rem;
                }
                
                .benefits-content,
                .benefits-image {
                    flex: 100%;
                    padding-right: 0;
                }
                
                .benefits-content {
                    margin-bottom: 2rem;
                }
            }
        </style>
    </head>
    <body>
    <header>
        <div class="header-container">
            <div class="logo">Inventa<span>rix</span></div>
            <nav>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#benefits">Benefits</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="register-btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register-btn">Sign Up</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>
    
    <section class="hero">
        <div class="hero-container">
            <h1>Manage Your Inventory Efficiently with Inventarix</h1>
            <p>A complete solution for inventory control, product management, order tracking, and more.</p>
            
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="hero-btn">Go to Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="hero-btn">Get Started</a>
                @endauth
            @endif
        </div>
    </section>
    
    <section class="features" id="features">
        <div class="features-container">
            <div class="section-title">
                <h2>Main Features</h2>
                <p>Discover all the tools Inventarix offers to optimize your inventory management.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h3>Product Management</h3>
                    <p>Easily manage your product catalog with detailed information, categories, and SKUs.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Stock Control</h3>
                    <p>Monitor inventory levels in real-time, set low-stock alerts, and optimize stock levels.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🛒</div>
                    <h3>Order Management</h3>
                    <p>Track the entire lifecycle of orders, from creation to delivery.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile Access</h3>
                    <p>Access your inventory from anywhere with our mobile-optimized interface.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📄</div>
                    <h3>Detailed Reports</h3>
                    <p>Generate customized reports to analyze sales, inventory turnover, and more.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Advanced Security</h3>
                    <p>Secure system with customizable roles and permissions for your team.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="cta" id="contact">
        <div class="cta-container">
            <h2>Ready to Optimize Your Inventory?</h2>
            <p>Start today and see how Inventarix can transform your inventory management.</p>
            
            <div class="cta-buttons">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="cta-btn-primary">Sign Up for Free</a>
                @endif
                <a href="#" class="cta-btn-secondary">Request a Demo</a>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>Inventarix</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Product</h3>
                    <ul>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Integrations</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Inventarix. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>