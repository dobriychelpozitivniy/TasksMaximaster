<?php include __DIR__ . "/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="public/css/style.css?<?php echo filemtime(__DIR__.'/public/css/style.css'); ?>">
</head>
<body>

<?php include __DIR__.'/view/viewComments.php' ?>
<?php include __DIR__.'/view/viewForm.php' ?>

<div id="resultAjax"></div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="public/js/ajax.js"></script>
</body>
</html>