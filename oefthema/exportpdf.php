<?php
require  'vendor/autoload.php';    
// Create a new instance of DOMPDF class and allow remote images in content !!! very important when handling images in our dompdf! 
$dompdf  =  new \Dompdf\Dompdf(array('enable_remote'  =>  true));   
// Define the HTML content  
$html  =  "<h1>Welcome to a SyntraPXL DOMPDF example</h1>
<img src='https://www.syntrapxl.be/themes/custom/sassy/assets/images/syntra/logo.svg'>
<p>This is a simple example of generating a PDF using DOMPDF.</p>";  
 // Load the HTML content to DOMPDF
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream("my_pdf_file.pdf",  array("Attachment"  =>  1)); 
