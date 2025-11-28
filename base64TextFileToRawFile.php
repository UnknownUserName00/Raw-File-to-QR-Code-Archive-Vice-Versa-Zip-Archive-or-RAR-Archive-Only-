<!DOCTYPE html>
<html>
<head>
<title>Base64 Text File to Raw File Converter</title>
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

            document.getElementById("status").innerHTML = '<span style = "color: Green; font-weight: bold;">Convert Done!</span>';

            // Writing Base64 to Address Bar
            window.location.replace(display);
        }
    </script>
</head>
<body>
    <h2 align = "center">Base64 Text File to Raw File Converter</h2>

    <p>Note: You must compile all Base64 characters from all QR Codes to 1 text file 1 by 1 manually. Then upload it to this page to convert it as raw file.</p>

    <input type="file" onchange="readInputFile(this)"/>
    <p id = "status"></p>
<!--
    <h3>File Content:</h3>
-->
    <pre id="output"></pre>
</body>
</html>
