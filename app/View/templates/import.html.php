<!DOCTYPE html>
<html>
<head>
	<title>Import CSV</title>
	<meta charset="utf-8" /> 
</head>
<body>
	<form action="{$router->makeUrl('page/importCSV')}" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="send">
	</form>
</body>
</html>