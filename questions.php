<?php
    include 'dbconn.php';
    session_start();

    $number = $_GET['n'];

    $query = "SELECT * FROM ques WHERE que_no = $number";

    $result = mysqli_query($conn, $query);
    $question = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM choice WHERE que_no = $number";
    $choices = mysqli_query($conn, $query);
    

    $query = "SELECT * FROM ques";
    $total = mysqli_num_rows(mysqli_query($conn, $query));
?>

<!DOCTYPE html> 
<html>
     <head> 
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="icon.png">
        <script src="script.js"></script>
        <title>
            CSS - 22519
        </title>
     </head> 
     <body> 
        <nav> 
            <a href="index.html">Home</a> 
            <a href="questions.php?n=1">Solve</a> 
            <a onclick="admin()">Admin</a> 
            <a href="about.html">About</a> 
        </nav>
        <hr>
         <div class="solve">
            <p class="qno">Ques. No.: <?php echo $number; ?> of <?php echo $total; ?></p>
            <p class="qtxt"><?php echo $question['que_text']; ?></p>
            <form method="post" action="process.php">
                <div class="ops">
                <?php while ($row = mysqli_fetch_assoc($choices)) { ?>
                    <input type="radio" name="op" id="op" value="<?php echo $row['id']; ?>"> <?php echo $row['op_text']; ?> <br>
                <?php } ?>
                </div>
                <br>
                <input type="hidden" name="number" value="<?php echo $number; ?>">
                <input class="btn1" type="submit" name="submit" value="Submit">
                <a href="result.php"><input type="button" class="btn1" value="ExitTest"></a>
            </form>

        </div>

        <style>
            .solve {
                margin-left: 5rem;
                margin-top: 1rem;   
            }

            .solve .qno {
                color: #fff;
                font-size: 21px;
            }

            .solve .qtxt {
                color: #fff;
                font-size: 30px;
            }

            .solve .ops {
                color: #fff;
                font-size: 26px;
                margin-left: 3rem;
            }

            .btn1 {
                height: 3rem;
                width: 7rem;
                font-size: 21px;
                font-family: 'Courier New', Courier, monospace;
                font-weight: bold;
                background-color: rgb(69, 0, 255); 
                border-radius: 2rem;
                color: #fff;
                border-color: #fff;
            }

            .btn1:hover {
                background-color: rgb(54, 0, 202);
            }

            #op {
                height: 1rem;
                width: 1rem;
            }
        </style>

    </body> 
</html>