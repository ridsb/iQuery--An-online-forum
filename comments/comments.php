<?php
// Include necessary files
include '../partials/_dbconnect.php';
include '../partials/_headerwelcome.php';

// Retrieve logged-in user's username (you need to implement your session/login mechanism)
$username = "username"; // Replace with actual logged-in username

// Insert comment into database on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_id = $_POST['question_id'];
    $comment = $_POST['comment'];
    
    // Insert comment into database
    $sql = "INSERT INTO comment (username, question_id, comment, dt) VALUES (?, ?, ?, current_timestamp())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $username, $question_id, $comment); // Assuming question_id is INT type

    if ($stmt->execute()) {
        // Comment inserted successfully
        // Optionally, redirect or show success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

// Fetch comments based on question_id provided via form input
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_REQUEST['question_id'])) {
    $question_id = $_REQUEST['question_id'];
    
    // Fetch question details to display (optional)
    $sql_question = "SELECT * FROM questions WHERE sno = ?";
    $stmt_question = $conn->prepare($sql_question);
    $stmt_question->bind_param("i", $question_id);
    $stmt_question->execute();
    $result_question = $stmt_question->get_result();
    $row_question = $result_question->fetch_assoc(); // Assuming you need to display question details
    
    // Fetch comments for the question
    $sql_comments = "SELECT c.sno, c.username, c.comment, c.dt FROM comment c JOIN questions q ON c.question_id = q.sno WHERE q.sno = ?";
    $stmt_comments = $conn->prepare($sql_comments);
    $stmt_comments->bind_param("i", $question_id);
    $stmt_comments->execute();
    $result_comments = $stmt_comments->get_result();
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
            background-image: url('../images/flower.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(10%);
            position: relative;
        }
        
        .container {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
    <title>Comments</title>
</head>
<body>

<div class="container">
    <?php if (isset($row_question)) : ?>
        <h2 class="my-4">Question: <?php echo $row_question['question']; ?></h2>
    <?php endif; ?>

    <h3 class="my-4">Comments</h3>

    <?php if (isset($result_comments) && $result_comments->num_rows > 0) : ?>
        <?php while ($row_comment = $result_comments->fetch_assoc()) : ?>
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><?php echo $row_comment['comment']; ?></p>
                    <p class="card-text">By: <?php echo $row_comment['username']; ?> on <?php echo $row_comment['dt']; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="alert alert-info">No comments yet.</div>
    <?php endif; ?>

    <hr>

    <h4>Add a Comment</h4>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="question_id">Question ID:</label>
            <input type="text" class="form-control" id="question_id" name="question_id" required>
        </div>
        <div class="form-group">
            <label for="comment">Your Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include '../partials/_footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
