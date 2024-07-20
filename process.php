<?php
    include 'dbconn.php';
    session_start();

    if(!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    if($_POST) {
        $query = "SELECT * FROM ques";
        $total_que = mysqli_num_rows(mysqli_query($conn, $query));

        $number = $_POST['number'];

        $select_op = $_POST['op'];

        $next = $number + 1;

        $query = "SELECT * FROM choice WHERE que_no = $number AND is_correct = 1";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);

        $correct_op = $row['id'];

        if($select_op == $correct_op) {
            $_SESSION['score']++;
        }

        if ($number == $total_que) {
            header("LOCATION: result.php");
        }
        else {
            header("LOCATION: questions.php?n=".$next);
        }
    }
?>