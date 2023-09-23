<?php
require('fpdf.php');
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

include("config.php");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$book_id =  $_GET['book_id'];
$query = mysqli_query($db, "SELECT * from invoice WHERE invoice_id = '$book_id'");
$invoice = mysqli_fetch_array($query);

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'NARANNE',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5, 'Rodeo Street no.7',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Cikarang, Indonesia, 30137',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5, $invoice['date'],0,1);//end of line

$pdf->Cell(130	,5,'Phone: +62-1234-5678',0,0);
$pdf->Cell(25	,5,'Invoice ID',0,0);
$pdf->Cell(34	,5, $invoice['invoice_id'],0,1);//end of line

$pdf->Cell(130	,5,'Email: naranne@gmail.com',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5, $invoice['tenant_id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, $invoice['tenant_name'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, $invoice['tenant_address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, $invoice['tenant_phone'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(80	,5,'Room Type',1,0);
$pdf->Cell(40	,5,'Period (months)',1,0);
$pdf->Cell(30	,5,'Price/month',1,0);
$pdf->Cell(40	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(80	,5, $invoice['room_label'],1,0);
$pdf->Cell(40	,5, $invoice['period'],1,0);
$pdf->Cell(30	,5, $invoice['room_monthly_price'],1,0);
$pdf->Cell(40	,5, 'Rp. ' . $invoice['totalamount'],1,1);//end of line

$roomid = mysqli_query($db, "SELECT room_id from book WHERE book_id = '$book_id'");
$room_id = $roomid->fetch_array()[0] ?? '';
$tenant_id = $invoice['tenant_id'];
$check = mysqli_query($db, "SELECT * FROM damage WHERE room_id = '$room_id' AND tenant_id = '$tenant_id'");
if(mysqli_num_rows($check)){
    $damagefine = 0;
    $pdf->Cell(189	,10,'',0,1);
    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(150	,5,'Room Damage',1,0);
    $pdf->Cell(40	,5,'Fine',1,1);
    while($row = mysqli_fetch_array($check)){
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(150	,5, $row['room_damage'],1,0);
        $pdf->Cell(40	,5, 'Rp. ' . $row['damage_fine'],1,1);

        $damagefine += $row['damage_fine'];
    }
    $pdf->Cell(189	,10,'',0,1);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(150	,5, 'Total Amount',1,0);

    $roomprice = $invoice['totalamount'];
    $totalamount = $damagefine + $roomprice;

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40	,5, 'Rp. ' . $totalamount,1,1);
}



















$pdf->Output();
?>

