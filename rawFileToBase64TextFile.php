<!DOCTYPE html>
<html>
<head>
    <title>Raw File to Base64 Text File Converter</title>
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

                    displayPreviewOnly = srcData;

                    document.getElementById("setName").value = fakePath.split("\\").pop();
                    document.getElementById("status").innerHTML = '<span style = "color: Green; font-weight: bold;">Convert Done!</span>';
                    document.getElementById("content").value = srcData;
                    document.getElementById("output").innerHTML = "<button onclick='download_file(fileName(), dynamic_text())'>Download Converted File</button>";
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }

        function searchString() {
            srcData = document.getElementById("content").value;
        }

        function fileName() {
            name = document.getElementById("setName").value;

            getFilename = prompt("Enter File Name: ", name);

            if (getFilename == null) {
                getFilename = name;
            }
            applyFilename = getFilename + ".txt";

            return applyFilename;
        }

        function dynamic_text() {
            searchString();
            compiledLines = srcData;

            return compiledLines;
        }

        function download_file(name, contents, mime_type) {
            mime_type = mime_type || "text/plain";

            var blob = new Blob([contents], {type: mime_type});

            var dlink = document.createElement('a');
            dlink.download = name;
            dlink.href = window.URL.createObjectURL(blob);
            dlink.onclick = function(e) {
                // revokeObjectURL needs a delay to work properly
                var that = this;
                setTimeout(function() {
                    window.URL.revokeObjectURL(that.href);
                }, 1500);
            };

            dlink.click();
            dlink.remove();
        }
    </script>
</head>
<body>
    <h2 align = "center">Raw File to Base64 Text File Converter</h2>

    <p>Note: Compress the file first into Zip Archive or RAR Archive before encrypt.</p>
    <input id="inputFileToLoad" type="file" onchange="encodeImageFileAsURL();" />
    <p id = "status"></p>
    <input type = "hidden" id = "setName"/>
    <input type = "hidden" id = "content"/>
    <p id = "output"></p>
</body>
</html>
