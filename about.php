<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('images/coffee.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            color: white; /* Text color */
        }

        .container {
            flex: 1;
            backdrop-filter: blur(2px); /* Blur effect */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
            color: white; /* Text color */
        }

        .card-body {
            background-color: transparent; /* Transparent card body */
        }

        footer {
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
    <title>About - iQuery</title>
</head>

<body>
    <?php include 'partials/_headerwelcome.php';?>

    <main class="container my-4">
        <h2 class="text-center">About iQuery</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            Welcome to iQuery, a project created by Riddhi Bisht. iQuery is a coding forum where people can post their coding-related doubts and queries. Other users can reply to these posts and help solve the problems.
                        </p>
                        <p class="card-text">
                            This platform is designed to foster a community of coders who can collaborate, share knowledge, and grow together. Whether you are a beginner looking for help or an experienced coder willing to share your expertise, iQuery is the place for you.
                        </p>
                        <p class="card-text">
                            Thank you for visiting iQuery. We hope you find this forum helpful and engaging.
                        </p>
                        <p class="card-text">
                            If you have any questions or feedback, please feel free to reach out to us through the contact page.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'partials/_footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
