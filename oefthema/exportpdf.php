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

// Define the HTML content using a variable for readability
$html = '<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Syntra PXL Themadag PDF</title>
<style>
body {
  font-family: Arial, sans-serif;
}
h1, h2 {
  text-align: center;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.5em;
  border: 1px solid #ddd;
}
.logo {
  max-width: 200px;
  max-height: 100px;
}
.page-break {
  page-break-after: always;
}
</style>
</head>
<body>
<header>
<img src=https://www.syntrapxl.be/themes/custom/sassy/assets/images/syntra/logo.svg width:100px>
<h1>Syntra PXL Themadag</h1>
</header>
<main>
<h2>Beste '. $name. ',</h2>
<p>U heeft een themadag geboekt ('.$tday_name.'). U heeft een e-mailadres: '.$email.'. U heeft een telefoonnummer: '.$tel.'.</p>
<table style="border-collapse: collapse; width: 100%;">
<thead>
<tr>
<th style="padding: 0.5em; text-align: left; border: 1px solid #ddd;">Themadag</th>
<th style="padding: 0.5em; text-align: left; border: 1px solid #ddd;">Uw e-mail</th>
</tr>
</thead>
<tbody>
<tr>
<td style="padding: 0.5em; border: 1px solid #ddd;">'.$tday_name.'</td>
<td style="padding: 0.5em; border: 1px solid #ddd;">'.$email.'</td>
</tr>
</tbody>
</table>
</main>
<footer>
</footer>
</body>
</html>';

// Load the HTML content to DOMPDF
$dompdf->loadHtml($html);

// Set header and footer for each page
$dompdf->set_option('default_font_size', 11); // Optional: Set default font size

$footer_html = '<footer>
<span style="font-size: 8pt;">Pagina {PAGENO}</span>
</footer>';

$dompdf->set_option('footer_html', $footer_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// Generate random filename
$filename = md5(microtime()) . '_themadag.pdf';
$dompdf->stream($filename, array("Attachment" => 1));
