<?php
session_start(); // Start the session to access session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/_dbconnect.php';

    // Ensure user is logged in and retrieve username from session
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username']; // Assuming 'username' is stored in session upon login
    } else {
        // Redirect or handle case where user is not logged in
        // Example redirect to login page:
        header("Location: login.php");
        exit();
    }

    $category_name = $_POST['category_name'];
    $question = $_POST['question'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO questions (username, category_name, question, dt) VALUES (?, ?, ?, current_timestamp())");
    $stmt->bind_param("sss", $username, $category_name, $question);

    // Execute the statement
    if ($stmt->execute()) {
        $success = "Your question has been submitted successfully!";
    } else {
        $error = "There was an error submitting your question. Please try again later.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('../images/plant.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(10%);
            position: relative;
        }

        .container {
            flex: 1;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.3); /* 30% opacity */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.3); /* 30% opacity */
            border: 1px solid #ccc;
            color: #000;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.5); /* 50% opacity on focus */
            color: #000;
        }

        footer {
            background: #f1f1f1;
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
    <title>Ask a Question</title>
</head>
<body>
    <?php include '../partials/_headerwelcome.php'; ?>

    <div class="container my-4">
        <h2 class="text-center">Ask a Question</h2>
        <?php
        if (isset($success)) {
            echo '<div class="alert alert-success">' . $success . '</div>';
        }
        if (isset($error)) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
        ?>
        <form action="_askquery.php" method="post">
            <div class="form-group">
                <label for="category_name">Language</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <textarea class="form-control" id="question" name="question" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php include '../partials/_footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>
</html>
