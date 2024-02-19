<?php
session_start();
ob_end_clean();
require  'vendor/autoload.php'; 

/* Assignment:
Try using styling, like font names and colors
try using tables to display the data
Resize the logo
Header/footer on every page? and forced page break... do research!
Include the QR code */

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$tel = $_SESSION['tel'];
$tday_name = $_SESSION['tday_name'];

// Create a new instance of DOMPDF class and allow remote images in content !!! very important when handling images in our dompdf! 
$dompdf  =  new \Dompdf\Dompdf(array('enable_remote'  =>  true));   
// Define the HTML content  
$html  =  "<h1>Hello $name</h1>
<img src='https://www.syntrapxl.be/themes/custom/sassy/assets/images/syntra/logo.svg'>
<p>U heeft een themadag geboekt ($tday_name). U heeft een e-mailadres: $email. U heeft een telefoonnummer: $tel.</p>";  
 // Load the HTML content to DOMPDF
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
// generate random filename
$filename = md5(microtime()) . '_themadag.pdf';
$dompdf->stream($filename,  array("Attachment"  =>  1)); 
