<!DOCTYPE html>
<html>
<head>
    <title>Upload File Example with AJAX (Plain JavaScript)</title>
</head>
<body>
    <h2>Chọn tệp để tải lên:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <button id="uploadButton">Tải lên</button>
    <div id="result"></div>

    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            var fileInput = document.getElementById('fileToUpload');
            if (fileInput.files.length === 0) {
                alert('Vui lòng chọn một tệp để tải lên.');
                return;
            }

            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('fileToUpload', file);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'uploads.php', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('result').innerHTML = xhr.response;
                } else {
                    alert('Có lỗi xảy ra khi tải lên tệp.');
                }
            };

            xhr.send(formData);
        });
    </script>
</body>
</html>

<!-- FILE PHP -->
<?php
if (isset($_FILES["fileToUpload"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    if (file_exists($targetFile)) {
        echo "Tệp đã tồn tại.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên thành công.";
            ?><img src="./uploads/<?= htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) ?>" alt=""><?php 
        } else {
            echo "Có lỗi xảy ra khi tải lên tệp.";
        }
    }
}
?>
<input type="checkbox" name="" id="">

