<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-FPM and Nginx Test Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP-FPM and Nginx Test Page</h1>

        <section class="php-info">
            <h2>PHP Information</h2>
            <p><strong>Server Version:</strong> <?php echo phpversion(); ?></p>
            <p><strong>SAPI:</strong> <?php echo php_sapi_name(); ?></p>
            <p><strong>Configuration File:</strong> <?php echo php_ini_loaded_file(); ?></p>
            <p><strong>Loaded Extensions:</strong> <?php echo implode(', ', get_loaded_extensions()); ?></p>
        </section>

        <section class="server-info">
            <h2>Server Information</h2>
            <p><strong>Server IP:</strong> <?php echo $_SERVER['SERVER_ADDR']; ?></p>
            <p><strong>Client IP:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
            <p><strong>Server Name:</strong> <?php echo $_SERVER['SERVER_NAME']; ?></p>
            <p><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
        </section>

        <section class="php-test">
            <h2>PHP Test</h2>
            <?php
            // Example of a simple PHP function
            function greet($name) {
                return "Hello, <strong>$name!</strong>";
            }

            echo greet("World");
            ?>
        </section>

        <section class="dynamic-content">
            <h2>Dynamic Content</h2>
            <form method="post" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <button type="submit">Submit</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = htmlspecialchars($_POST['name']); // Sanitized user input
                echo "<p>You entered: <strong>$name</strong></p>";
            }
            ?>
        </section>
    </div>
</body>
</html>
