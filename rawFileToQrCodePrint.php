<!DOCTYPE html>
<html>
<head>
<title>Raw File to QR Code Converter</title>
    <style>
        #qrbox {
            display: inline-block;
            border: black solid thin;
        }

        // for Default Size of Paper in Printing Mode
        @media print and (orientation: portrait) {
	        @page {
	        	// size: 216mm 280mm;
		        page-break-inside: avoid;
		        page-break-before: avoid;
		        page-break-after: avoid;
	        }
        }

        @media print and (orientation: landscape) {
	        @page {
	        	// size: 216mm 280mm;
		        page-break-inside: avoid;
		        page-break-before: avoid;
		        page-break-after: avoid;
        	}
        }
    </style>
</head>
<body onLoad = "self.print()">
<?php
    $filename = $_POST['qrCodeFilename'];
    $content = $_POST['qrCodeContent'];
    $contentLength = $_POST['qrCodeContentLength'];
    $limitContent = $_POST['limitContent'];
?>
    <h2 align = "center">Filename: <?php echo $filename; ?></h2>
    <h2 align = "center">Total Character Length: <?php echo $contentLength; ?></h2>
    <h2 align = "center">Character Length in 1 QR Code: <?php echo $limitContent; ?></h2>
<?php
    $counterNum = 1;
    for ($i = 0; $i < $contentLength; $i+=$limitContent) {
        $displayString = substr($content, $i, $limitContent);
?>
    <div id="qrbox" style="text-align: center;">
        <img src="Generate QR Codes/generate.php?text=<?php echo htmlentities($displayString); ?>" alt="">
        <p><?php echo $counterNum; ?></p>
    </div>
<?php
        $counterNum++;
    }
?>
</body>
</html>
