<?php
	require "db_connect.php";
	require "header.php";
	session_start();
	
	// Redirect users based on session type
	if (empty($_SESSION['type']));
	else if (strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
	else if (strcmp($_SESSION['type'], "member") == 0)
		header("Location: member/home.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="css/index_style.css" />
	<style>
		/* General body styles */
		body {
			margin: 0;
			padding: 0;
			font-family: 'Arial', sans-serif;
			background-color: #f9f9f9;
			color: #444;
			overflow: hidden; /* Disable scrolling */
		}

		/* Hero Section */
		.hero {
			height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			text-align: center;
			background: linear-gradient(120deg, #f4f0ec, #eae8e2);
			color: #5a5a5a;
			animation: slideInLeft 2s ease-out; /* Hero section sliding animation */
		}

		.hero h1 {
			font-size: 3rem;
			margin-bottom: 20px;
			letter-spacing: 2px;
			text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			animation: bounceIn 2s ease-out; /* Heading bounce animation */
			transform: perspective(1000px) rotateX(10deg); /* 3D effect */
		}

		.hero p {
			font-size: 1.2rem;
			margin-bottom: 30px;
			max-width: 600px;
			line-height: 1.6;
			text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
			animation: fadeInRight 2s ease-out; /* Paragraph fade-in animation */
			transform: perspective(1000px) rotateY(5deg); /* 3D effect */
		}

		.hero .cta-btn {
			display: inline-block;
			padding: 15px 30px;
			font-size: 1rem;
			color: #5a5a5a;
			background: #fdfdfd;
			text-decoration: none;
			border-radius: 25px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
			transition: background 0.3s, color 0.3s, box-shadow 0.3s;
			animation: zoomIn 1.5s ease-out forwards; /* Button zoom-in effect */
			transform: perspective(1000px) rotate(10deg); /* 3D rotation */
		}

		.hero .cta-btn:hover {
			background: #dedcd4;
			color: #333;
			box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
			transform: perspective(1000px) rotate(0deg); /* Hover effect rotation reset */
		}

		/* Footer */
		footer {
			background-color: #eae8e2; /* Matches the lighter theme */
			color: #5a5a5a;
			text-align: center;
			padding: 20px;
			border-top: 2px solid #d6d3c9;
			animation: fadeInUp 1.5s ease-out 0.5s; /* Footer fadeIn animation */
			transform: perspective(1000px) rotateX(-10deg); /* 3D effect for footer */
		}

		/* 3D Card Hover Effect */
		.card {
			width: 300px;
			height: 400px;
			background: #fff;
			border-radius: 15px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			transition: transform 0.3s ease, box-shadow 0.3s ease;
			perspective: 1000px;
		}

		.card:hover {
			transform: rotateY(15deg); /* 3D rotation effect on hover */
			box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
		}

		/* Animations */
		@keyframes slideInLeft {
			from {
				transform: translateX(-100%);
				opacity: 0;
			}
			to {
				transform: translateX(0);
				opacity: 1;
			}
		}

		@keyframes bounceIn {
			0% {
				transform: scale(0);
				opacity: 0;
			}
			60% {
				transform: scale(1.1);
				opacity: 1;
			}
			100% {
				transform: scale(1);
			}
		}

		@keyframes fadeInRight {
			from {
				transform: translateX(50px);
				opacity: 0;
			}
			to {
				transform: translateX(0);
				opacity: 1;
			}
		}

		@keyframes zoomIn {
			from {
				transform: scale(0);
				opacity: 0;
			}
			to {
				transform: scale(1);
				opacity: 1;
			}
		}

		@keyframes fadeInUp {
			from {
				transform: translateY(50px);
				opacity: 0;
			}
			to {
				transform: translateY(0);
				opacity: 1;
			}
		}
	</style>
</head>
<body>
	<!-- Hero Section -->
	<section class="hero">
		<h1>Welcome to the Library Management System</h1>
		<p>Login to explore a world of knowledge, manage your account, and access library resources online.</p>
		<a href="member" class="cta-btn">Login to Your Account</a>
	</section>

	<!-- Footer Section -->
	<footer>
		<p>&copy; 2024 Library Management System. All rights reserved.</p>
	</footer>
</body>
</html>
