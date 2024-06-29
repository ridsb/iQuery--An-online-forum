<?php
include '../partials/_dbconnect.php'; // Adjust path as per your file structure

// Check if category_id is provided in the query string
if (isset($_GET['catid'])) {
    $category_id = $_GET['catid'];

    // Fetch category name from categories table
    $sql_category = "SELECT category_name FROM categories WHERE category_id = ?";
    $stmt_category = $conn->prepare($sql_category);
    if (!$stmt_category) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }
    $stmt_category->bind_param("i", $category_id);
    if (!$stmt_category->execute()) {
        echo "Error executing statement: " . $stmt_category->error;
        exit();
    }
    $result_category = $stmt_category->get_result();
    if ($row_category = $result_category->fetch_assoc()) {
        $category_name = $row_category['category_name'];
    } else {
        echo "Category not found!";
        exit();
    }
    $stmt_category->close();

    // Fetch questions from question table joined with categories table
    $sql_questions = "SELECT q.sno, q.username, q.question, q.dt 
                      FROM questions q 
                      JOIN categories c ON q.category_name = c.category_name
                      WHERE c.category_id = ?";
    $stmt_questions = $conn->prepare($sql_questions);
    if (!$stmt_questions) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }
    $stmt_questions->bind_param("i", $category_id);
    if (!$stmt_questions->execute()) {
        echo "Error executing statement: " . $stmt_questions->error;
        exit();
    }
    $result_questions = $stmt_questions->get_result();
} else {
    echo "No category specified!";
    exit();
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
            background-image: url('../images/flower1.png');
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
    <title>Questions for <?php echo $category_name; ?></title>
</head>
<body>
    <?php include '../partials/_headerwelcome.php'; ?>

    <div class="container">
        <h2 class="my-4">Questions for <?php echo $category_name; ?></h2>

        <?php
        // Check if there are questions to display
        if ($result_questions->num_rows > 0) {
            while ($row_question = $result_questions->fetch_assoc()) {
                $question_id = $row_question['sno'];
                $username = $row_question['username'];
                $question = $row_question['question'];
                $datetime = $row_question['dt'];

                // Display each question in a card
                echo '<div class="card">
                        <div class="card-body">
                            <h5 class="card-title">' . $question_id . '. ' . $question . '</h5>
                            <p class="card-text">Asked by: ' . $username . ' on ' . $datetime . '</p>
                            <a href="/phprids/forum/comments/comments.php" class="btn btn-primary">View Comments</a>
                        </div>
                    </div>';
            }
        } else {
            echo '<div class="alert alert-info">No questions asked on this topic yet.</div>';
        }

        // Close database connections
        $stmt_questions->close();
        $conn->close();
        ?>
    </div>

    <?php include '../partials/_footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
