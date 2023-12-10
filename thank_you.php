<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(45deg, #f8d7da, #81c3d7); /* Gradient background */
        }

        .content-section {
            text-align: center;
            padding: 30px;
            background-color: #f8d7da; /* Light red background */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            max-width: 400px;
            width: 100%;
        }

        .content-section:hover {
            transform: scale(1.02);
        }

        h1 {
            color: #d9534f; /* Dark red heading color */
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        li {
            margin-bottom: 15px;
            color: #555;
        }

        .icon {
            margin-right: 10px;
            color: #d9534f; /* Dark red icon color */
        }

        a {
            color: #138496; /* Teal link color */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="content-section">
        <h1>Thank You for Your Vote!</h1>
        <p>Your contribution has been received with gratitude. We're thankful for your commitment to our cause.</p>
        <p>If you have any questions or would like to get involved further, please <a href="mailto:info@example.com">contact us</a>.</p>
    </div>

</body>

</html>
