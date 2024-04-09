<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
                .loader-page {
                        position: fixed;
                        z-index: 25000;
                        background: rgb(255, 255, 255);
                        left: 0px;
                        top: 0px;
                        height: 100%;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: all .3s ease;
                }

                .loader-page::before {
                        content: "";
                        position: absolute;
                        border: 2px solid rgb(50, 150, 176);
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        box-sizing: border-box;
                        border-left: 2px solid rgba(50, 150, 176, 0);
                        border-top: 2px solid rgba(50, 150, 176, 0);
                        animation: rotarload 1s linear infinite;
                        transform: rotate(0deg);
                }

                @keyframes rotarload {
                        0% {
                                transform: rotate(0deg)
                        }

                        100% {
                                transform: rotate(360deg)
                        }
                }

                .loader-page::after {
                        content: "";
                        position: absolute;
                        border: 2px solid rgba(50, 150, 176, .5);
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        box-sizing: border-box;
                        border-left: 2px solid rgba(50, 150, 176, 0);
                        border-top: 2px solid rgba(50, 150, 176, 0);
                        animation: rotarload 1s ease-out infinite;
                        transform: rotate(0deg);
                }
        </style>
</head>

<body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <div class="loader-page"></div>
        <h1>Contenido de la pagina</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
</body>

<script>
        /*
        $(window).on('load', function () {
                function () {
                        $(".loader-page").css({ visibility: "hidden", opacity: "0" })
                };

        });*/
        document.onreadystatechange = () => {
  if (document.readyState === 'complete') {
    console.log ("Listp");
  }
};
</script>


</html>