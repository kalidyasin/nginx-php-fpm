<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP-FPM and Nginx Test</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
			margin: 0;
			padding: 20px;
		}

		.container {
			max-width: 600px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			color: #333;
		}

		pre {
			background-color: #eee;
			padding: 10px;
			border-radius: 5px;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Welcome to PHP-FPM & Nginx Test Page</h1>
		<p>This page is served by Nginx with PHP-FPM.</p>

		<h2>PHP Test</h2>
		<?php
		// Output a simple message to verify PHP is running correctly
		echo "<p><strong>PHP is working!</strong></p>";
		?>

		<h2>Server Information</h2>
		<pre>
		<?php
			// Output server information for debugging purposes
			echo "Server IP: " . $_SERVER['SERVER_ADDR'] . "\n";
			echo "Client IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
			echo "Server Name: " . $_SERVER['SERVER_NAME'] . "\n";
			echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
		?>
        </pre>

		<h2>PHP Information</h2>
		<p>You can also view the full PHP information using the link below:</p>
		<p><a href="?phpinfo=true">View PHP Info</a></p>

		<?php
		// Display full PHP information if the query string has phpinfo=true
		if (isset($_GET['phpinfo']) && $_GET['phpinfo'] === 'true') {
			phpinfo();
		}
		?>
	</div>
</body>

</html>
