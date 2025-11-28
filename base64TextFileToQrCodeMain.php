<!DOCTYPE html>
<html>
<head>
<title>Base64 Text File to QR Code Converter</title>
    <script>
        function readFile(file) {
            return new Promise((resolve, reject) => {
                let freader = new FileReader();
                freader.onload = x => resolve(freader.result);
                freader.readAsText(file);
            })
        }

        async function readInputFile(input) {
            output.innerText = await readFile(input.files[0]);
            display = document.getElementById("output").innerHTML;
            fakePath = document.getElementById("inputFileToLoad").value;

            document.getElementById("setName").value = fakePath.split("\\").pop();
            document.getElementById("status").innerHTML = '<span style = "color: Green; font-weight: bold;">Convert Done!</span>';
            document.getElementById("content").value = display;
            document.getElementById("contentLength").value = display.length;
        }
    </script>
</head>
<body>
    <h2 align = "center">Base64 Text File to QR Code Converter</h2>

    <p>Note: You must compile all Base64 characters from all QR Codes to 1 text file 1 by 1 manually. Then upload it to this page to convert it as raw file.</p>

    <input type="file" id = "inputFileToLoad" onchange="readInputFile(this)"/>
    <p id = "status"></p>

    <form method = "POST" action = "base64TextFileToQrCodePrint.php">
        <input type = "hidden" name = "qrCodeFilename" id = "setName"/>
        <input type = "hidden" name = "qrCodeContent" id = "content"/>
        <input type = "hidden" name = "qrCodeContentLength" id = "contentLength"/>
        Input String Length in QR Code: <input type = "number" name = "limitContent" required/><br/>
        <input type = "submit" value = "Generate QR Code"/>
    </form>
<!--
    <h3>File Content:</h3>
-->
    <pre id="output"></pre>
</body>
</html>
