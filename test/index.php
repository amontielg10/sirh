<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="notyf/notyf.min.css">
  <title>Document</title>
</head>

<body>

  <button onclick="inicio();">hola</button>

</body>
<script src="notyf/notyf.min.js"></script>

<script>
  function inicio() {
    console.log('success');
    var notyf = new Notyf();

    // Display an error notification
    notyf.error('Message error');


  }
</script>

</html>