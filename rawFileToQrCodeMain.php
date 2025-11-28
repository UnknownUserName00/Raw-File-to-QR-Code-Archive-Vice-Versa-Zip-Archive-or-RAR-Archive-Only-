<!DOCTYPE html>
<html>
<head>
    <title>Raw File to QR Code Converter</title>
    <style>
        body {
            display: grid;
        }
    </style>
    <script type='text/javascript'>
        function encodeImageFileAsURL() {
            var filesSelected = document.getElementById("inputFileToLoad").files;
            var fakePath = document.getElementById("inputFileToLoad").value;

            if (filesSelected.length > 0) {
                var fileToLoad = filesSelected[0];
                var fileReader = new FileReader();

                fileReader.onload = function(fileLoadedEvent) {
                    // data: base64
                    var srcData = fileLoadedEvent.target.result;

                    document.getElementById("setName").value = fakePath.split("\\").pop();
                    document.getElementById("status").innerHTML = '<span style = "color: Green; font-weight: bold;">Convert Done!</span>';
                    document.getElementById("content").value = srcData;
                    document.getElementById("contentLength").value = srcData.length;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>
</head>
<body>
    <h2 align = "center">Raw File to QR Code Converter</h2>

    <p>Note: Compress the file first into Zip Archive or RAR Archive before encrypt.</p>
    <input id="inputFileToLoad" type="file" onchange="encodeImageFileAsURL();" />
    <p id = "status"></p>
    <form method = "POST" action = "rawFileToQrCodePrint.php">
        <input type = "hidden" name = "qrCodeFilename" id = "setName"/>
        <input type = "hidden" name = "qrCodeContent" id = "content"/>
        <input type = "hidden" name = "qrCodeContentLength" id = "contentLength"/>
        Input String Length in QR Code: <input type = "number" name = "limitContent" required/><br/>
        <input type = "submit" value = "Generate QR Code"/>
    </form>
</body>
</html>
