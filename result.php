<?php 
    session_start();
    include 'dbconn.php';
    $query = "SELECT * FROM ques";
    $total_que = mysqli_num_rows(mysqli_query($conn, $query));

    require('C:/xampp/fpdf186/fpdf.php');

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(isset($_POST['generate'])) {
        $n = $_POST['name'];
                
        // Create PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Add Image
        $pdf->Image('download.jpg', 10, 10, 50);

        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, 'K. K. Wagh Polytechnic, Nashik', 0, 1, 'C');

        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, 'Course - CSS(22519)', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Mark Sheet', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(0, 10, 'Name: ' . $n, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Total Questions: ' . $total_que, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Total Marks: ' . $_SESSION['score'], 0, 1, 'C');


        $pdf->Ln(10);

        // Output PDF to browser
        $pdf->Output('D', 'result.pdf');

        unset($_SESSION['score']);
        exit;
    }
?>

<!-- Rest of your HTML code -->

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

        <div class="res">
            <div class="con">
                <h1>- RESULT -</h1>
                <h2>TOTAL QUESTIONS: <?php echo $total_que; ?></h2>    
                <h2>TOTAL SCORE: <?php echo $_SESSION['score']; ?></h2>
                
                <div class="pdf">
                    <p>Download PDF</p>
                    <form action="result.php" method="post">
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                        <input type="submit" class="btn2" name="generate" value="Download">
                    </form>
                </div>
            </div>
        </div>

        <style>
            .res {
                color: #fff;
                font-size: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .con {
                text-align: center;
            }

            .con h1,h2 {
                display: block;
            }

            .pdf {
                background-color: white;
                height: auto;
                width: 500px;
                display: block;
                color: black;
                padding: 10px;
            }

            .pdf input {
                width: 90%;
                height: 40%;
                font-size: 18px;
                border-radius: 6px;
            }

            .btn2 {
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

            .btn2:hover {
                background-color: rgb(54, 0, 202);
            }
        </style>
    </body> 
</html>