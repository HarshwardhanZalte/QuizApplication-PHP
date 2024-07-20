<?php
include 'dbconn.php';

$query = "SELECT * FROM ques";
$qu = mysqli_query($conn, $query);
$total = mysqli_num_rows($qu);
$next = $total + 1;

if (isset($_POST['submit'])) {
    $que_no = $_POST['que_no'];
    $que_text = $_POST['que_text'];
    $correct = $_POST['correct'];

    $options = array();
    $options[1] = $_POST['op1'];
    $options[2] = $_POST['op2'];
    $options[3] = $_POST['op3'];
    $options[4] = $_POST['op4'];
    $query = "INSERT INTO ques (que_no, que_text) VALUES ('$que_no', '$que_text')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        foreach ($options as $op => $value) {
            if ($value != "") {
                if ($correct == $op){
                    $is_correct = 1;
                }
                else {
                    $is_correct = 0;
                }
                
                $query = "INSERT INTO choice (que_no, is_correct, op_text) VALUES ('$que_no', '$is_correct', '$value')";
                $insert_row = mysqli_query($conn, $query);

                if($insert_row){
                    continue;
                }
                else{
                    die("Problem hai re 2nd query me..!");
                }
            }
        }
        $msg = "Question has been added successfully.";
    }
}
?>

<!DOCTYPE html> 
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon.png">
    <script src="script.js"></script>
    <title>CSS - 22519</title>
</head> 
<body> 
    <nav> 
        <a href="index.html">Home</a> 
        <a href="questions.php?n=1">Solve</a> 
        <a href="addque.php">Admin</a> 
        <a href="about.html">About</a> 
    </nav>
    <hr>
    <div class="que">
        <h1>- Add Questions -</h1>
        <form method="POST" action="addque.php">
            <label for="">Question No.</label>
            <input type="Number" id="" required name="que_no" value="<?php echo $next; ?>">
            <br>
            <label for="">Question</label>
            <textarea id="" cols="30" rows="3" required name="que_text"></textarea>
            <br>
            <label for="">Option 1</label>
            <input type="text" id="" required name="op1">
            <br>
            <label for="">Option 2</label>
            <input type="text" id="" required name="op2">
            <br>
            <label for="">Option 3</label>
            <input type="text" id="" name="op3">
            <br>
            <label for="">Option 4</label>
            <input type="text" id="" name="op4">
            <br>
            <label for="">Correct Option</label>
            <input type="number" max="4" min="1" id="" required name="correct">

            <input type='submit' class="btn3" name="submit" value="Add Question" style="
            height: 3rem;
            width: 10rem;
            color: #fff;
            background-color: rgb(0, 0, 0);
            border-radius: 10px;
            align-items: center;
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 2px solid white;
            position: relative;
            left: 50%;
            transform: translate(-50%);
            transition: 0.5s;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            ">

            <style>
                .btn3:hover {
                    background-color: white;
                    color: black;
                    border: 2px solid black;
                }
            </style>
        </form> 
    </div>
</body> 
</html>