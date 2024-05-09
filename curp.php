<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button onclick="myFunction()">Clickeame</button>

<div id="myDIV" style="border:1px solid black;">
  Este elemento aparece y desaparece con el botón
</div>
</body>
</html>

<script>
function myFunction() {
    let x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>