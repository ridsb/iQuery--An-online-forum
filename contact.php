<?php
session_start();
require_once('partials/_dbconnect.php');

$alertMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $queryText = $_POST["query"];

    // Prepare the query to insert data into 'queries' table
    $sql = "INSERT INTO contacts (email_id, query, dt) VALUES ('$email', '$queryText', current_timestamp())";

    if (mysqli_query($conn, $sql)) {
        // Insert successful
        $alertMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Your query has been submitted successfully!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
    } else {
        // Insert failed
        $alertMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error: ' . mysqli_error($conn) . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Me</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>
<style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('images/contact.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            color: white;
        }

        .container {
            flex: 1;
            backdrop-filter: blur(2px);
            background-color: rgba(255, 255, 255, 0.3); /* 30% opacity */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: transparent; /* Transparent background */
            border: 1px solid #ccc;
            color: white;
        }

        .form-control:focus {
            background-color: transparent; /* Transparent background on focus */
            color: white;
        }

        footer {
            background: #f1f1f1;
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        a {
            color: blue;
        }
    </style>

<body>
    <?php require 'partials/_headerwelcome.php'; ?>

    <div class="container my-4">
        <h1 class="text-center">Contact Me</h1>
        <p class="text-center">If you encounter any issues with the website, please feel free to contact me through
            my Git repository.</p>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php echo $alertMessage; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="query">Describe the issue:</label>
                        <textarea class="form-control" id="query" name="query" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <p class="mt-3 text-center">You can also contact me directly through <a
                        href="https://github.com/yourusername" target="_blank">my GitHub profile</a>.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-dark text-light fixed-bottom">
        <p class="text-center mb-0 py-2">Copyright iQuery Coding Forums 2024 All rights reserved</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>

    