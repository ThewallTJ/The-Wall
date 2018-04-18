<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="myStyle.css">
    <title>Image</title>
</head>
<body>
<h1>Image upload</h1>
<form method="post" action="process_upload.php" enctype="multipart/form-data">
    <label><input type="file" required name="uploaded_image" /></label><br>
    <label>Title<input required name="title" /></label><br>
    <label>Description<input name="description" /></label><br>
    <input type="submit" name="submit_image" value="Go"/>
</form>
</body>
</html>
