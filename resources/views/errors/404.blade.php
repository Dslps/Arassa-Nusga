<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #f9f9f9, #e3e4e6);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .error-container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 550px;
            animation: fadeIn 1s ease-in-out;
        }

        .error-container h1 {
            font-size: 120px;
            color: #ff4757;
            margin: 0;
            animation: bounceIn 1.5s;
        }

        .error-container p {
            font-size: 22px;
            color: #555;
            margin-bottom: 25px;
        }

        .error-container a {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(to right, #3490dc, #2f3d7c);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            transition: transform 0.2s ease, background 0.3s;
        }

        .error-container a:hover {
            background: linear-gradient(to right, #2779bd, #0056b3);
            transform: translateY(-3px);
        }

        .illustration {
            margin-top: 25px;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            animation: float 3s infinite ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounceIn {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <p>Oops! The page you're looking for can't be found.</p>
        <div class="illustration">
            <img src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif" alt="Lost in Space Illustration">
        </div>
        <a href="{{ url('/') }}">Return to Home</a>
    </div>
</body>
</html>
