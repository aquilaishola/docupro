<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocuPro - Professional PDF Generator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .hero {
            text-align: center;
            color: white;
            animation: fadeInUp 1s ease-out;
        }

        .logo {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            letter-spacing: -1px;
        }

        .tagline {
            font-size: 1.5rem;
            margin-bottom: 30px;
            opacity: 0.95;
            font-weight: 300;
        }

        .description {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 50px;
            line-height: 1.8;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            padding: 18px 50px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #667eea;
            background: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .cta-button:active {
            transform: translateY(-1px);
        }

        .features {display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 80px;
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 35px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            cursor: default;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: white;
        }

        .feature-description {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            font-size: 1rem;
        }

        .built-with {
            text-align: center;
            margin-top: 80px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            animation: fadeInUp 1s ease-out 0.6s backwards;
        }

        .built-with strong {
            color: white;
            font-weight: 700;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .logo {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .description {
                font-size: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <h1 class="logo"><i class="fas fa-file-pdf"></i> DocuPro</h1>
            <p class="tagline">Professional PDF Generation Made Simple</p>
            <p class="description">
                Create stunning, professional-grade PDFs with ease. Built with Laravel, 
                DocuPro transforms your documents into beautifully formatted PDFs in seconds.
            </p>
            <a href="{{ route('dashboard') }}"  class="cta-button">Try For Free →</a>
        </div>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <h3 class="feature-title">Lightning Fast</h3>
                <p class="feature-description">
                    Generate PDFs in milliseconds with optimized Laravel backend processing.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-palette"></i></div>
                <h3 class="feature-title">Professional Design</h3>
                <p class="feature-description">
                    Beautiful templates and customizable layouts for any document type.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3 class="feature-title">Secure & Reliable</h3>
                <p class="feature-description">
                    Enterprise-grade security ensuring your documents stay private and safe.
                </p>
            </div>
        </div>

        <div class="built-with">
            <p>Built with ❤️ by <strong>Dev Aquila</strong></p>
        </div>
    </div>
</body>
</html>