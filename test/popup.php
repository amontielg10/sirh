<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tippy.js Example</title>
  <!-- Tippy.js CSS -->
  <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <style>
    /* Custom CSS for green tooltip */
    .tippy-box[data-theme~='green'] {
      background-color:  #235B4E;
      color: white;
      font-family: 'Montserrat';
    }
    .tippy-box[data-theme~='green'] .tippy-arrow {
      color:  #235B4E
    }
  </style>
</head>
<body>
  <div>
    <button id="myButton">Hover over me!</button>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      tippy('#myButton', {
        content: 'This is a green tooltip!',
        theme: 'green',
      });
    });
  </script>
</body>
</html>