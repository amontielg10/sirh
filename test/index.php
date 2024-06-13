<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Input Animation | CodingNepal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');


    .a- {
      margin: 0;
      padding: 0;
      outline: none;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }


    .wrapper {
      width: 450px;
      background: #fff;
      padding: 30px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .wrapper .input-data {
      height: 40px;
      width: 100%;
      position: relative;
    }

    .wrapper .input-data input {
      height: 100%;
      width: 100%;
      border: none;
      font-size: 17px;
      border-bottom: 2px solid silver;
      margin: 0;
      padding: 0;
      outline: none;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .input-data input:focus~label,
    .input-data input:valid~label {
      transform: translateY(-20px);
      font-size: 15px;
      color: red;

    }

    .wrapper .input-data label {
      position: absolute;
      bottom: 10px;
      left: 0;
      color: grey;
      pointer-events: none;
      transition: all 0.3s ease;

    }

    .input-data .underline {
      position: absolute;
      height: 2px;
      width: 100%;
      bottom: 0;
      font-family: 'Poppins', sans-serif;
    }

    .input-data .underline:before {
      position: absolute;
      content: "";
      height: 100%;
      width: 100%;
      background: red;
      transform: scaleX(0);
      transform-origin: center;
      transition: transform 0.3s ease;

    }

    .input-data input:focus~.underline:before,
    .input-data input:valid~.underline:before {
      transform: scaleX(1);

    }
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
          <div class="input-data margin-data">
            <input type="text" required>
            <div class="underline"></div>
            <label style="font-family: 'Poppins', sans-serif;">Name</label>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>