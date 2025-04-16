<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .login-container {
            background-color:   #11000025;;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.075);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(8px);
        }

        h2 {
            text-align: center;
            margin-bottom: 50px;
            color: #4fb84f;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4fb84f;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #5a67d8;
        }

        .bottom-text {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .bottom-text a {
            color: #667eea;
            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        .message {
            text-align: center;
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body style="background-image: url('./bluex-2.jpg'); background-size: cover;background-repeat: no-repeat;">

<?php
session_start();
$message = '';

// Get the 'user' parameter from URL
$allowed_user = isset($_GET['user']) ? $_GET['user'] : null;

// Mapping from URL alias to actual email
$user_map = [
    "xml" => "sneha@bluez",
    "integra" => "gayathri@bluez",
    "hq" => "richardhq@bluez",
    "spanish" => "richardspanish@bluez",
    "json" => "alaguraja@bluez",
    "e_pub" => "sridharepub@bluez",
    "ocr" => "sridharocr@bluez",
    "indesign" => "mathanbabu@bluez",
    "hr" => "prabha@bluez","pradeep@bluez",
    "admin" => "Rakesh@bluez",
    "smm" => "yaswanth@bluez",
    "web" => "sanjai@bluez",
     "ph" => "haridash@bluez"
    
    // Add more mappings if needed
];

// Hardcoded valid users and their passwords
$valid_users = [
    "sanjai@bluez" => "Bluez&1421",
    "yaswanth@bluez" => "Bluez&2537",
    "gayathri@bluez" => "Bluez&3245",
    "richardhq@bluez" => "Bluez&4554",
    "richardspanish@bluez" => "Bluez&4554",
    "prabha@bluez" => "Bluez&4364",
    "pradeep@bluez" => "Bluez&7615",
    "sridharepub@bluez" => "Bluez&1188",
    "sridharocr@bluez" => "Bluez&1188",
  
   
    "sneha@bluez" => "Bluez&3390",
    "alaguraja@bluez" => "Bluez&1967",
    "mathanbabu@bluez" => "Bluez&1789",
    "Rakesh@bluez" => "Bluez&9876",
    "haridash@bluez" => "Bluez&4136"
];

// Redirect pages for users
$redirect_pages = [
    "sanjai@bluez" => "./eod_forms/eod_report_forms/WD.html",
    "yaswanth@bluez" => "./eod_forms/DM.html",
    "gayathri@bluez" => "./eod_forms/eod_report_forms/integra.html",
    "richardhq@bluez" => "./eod_forms/eod_report_forms/hq_form.html",
    "prabha@bluez" => "",
    "pradeep@bluez" => "./sample.html?department=hr",
    "sridharepub@bluez" => "./eod_forms/eod_report_forms/E_pub-form.html",
    "sneha@bluez" => "./eod_forms/eod_report_forms/Eod_xml-report.html",
    "alaguraja@bluez" => "./eod_forms/eod_report_forms/json-form.html",
    "mathanbabu@bluez" => "./eod_forms/eod_report_forms/indesign.html",
    "Rakesh@bluez" => "./eod_forms/eod_report_forms/admin.html",
    "richardspanish@bluez" => "./eod_forms/eod_report_forms/spanish.html",
    "sridharocr@bluez" => "./eod_forms/OCR__form.html",
    "haridash@bluez" => "./eod_forms/eod_report_forms/PH.html"
];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($allowed_user && isset($user_map[$allowed_user])) {
        $expected_email = $user_map[$allowed_user];

        if ($email === $expected_email && isset($valid_users[$email]) && $valid_users[$email] === $password) {
            $_SESSION['email'] = $email;
            header("Location: " . $redirect_pages[$email]);
            exit();
        } else {
            $message = "Access denied or invalid credentials.";
        }
    } else {
        $message = "Unauthorized access.";
    }
}
?>






<div class="login-container">
    <form method="POST">
        <h2>Bluez Infomatic Solution</h2>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <input type="text" name="email" placeholder="Username" spellcheck="false" autocomplete="off" required>

        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    
</div>

</body>
</html>
