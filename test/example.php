<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    /* Button Style 1 (Left Icons) */
    .icon-btn {
        min-height: 150px;
        background: #f5f5f5;
        float: left;
    }

    .icon-btn button {
        float: left;
        margin: 10px;
    }

    .btn-gradient {
        width: 40%;
        position: relative;
        display: inline-block;
        left: -20px;
        background: rgba(0, 0, 0, 0.15);
        border-top-right-radius: 60px;
        padding: 8px 24px 8px 16px;
        box-shadow: 2px 0px 0px 0px rgba(78, 72, 72, 0.4);
    }

    .btn-green {
        font-size: 15px;
        padding: 0px 20px;
        color: #fff;
        background-color: #47a447;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 100px;
    }

    .btn-pink {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #f11350;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-facebook {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #5863db;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-instagram {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #cb31d7;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-twitter {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #58cadb;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-google {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #f06262;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-github {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #5a5a5a;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-behance {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #0069ff;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-dribbble {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #f0709f;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-linkedin {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #0074af;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-pinterest {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #c41f26;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-snapchat {
        font-size: 23px;
        padding: 0px 20px;
        color: #fff;
        background-color: #fffc01;
        border: none;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 230px;
    }

    .btn-text {
        width: 60%;
    }

    .btn-gradient i {
        font-size: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Button Style 2 (Normal) */
    .normal-icon {
        min-height: 100px;
        line-height: 100px;
        background: #e8e8e8;
    }

    .normal-icon a {
        margin: 20px;
        border-radius: 0;
    }

    /* Button Style 3 (Radius) */
    .radius-icon {
        min-height: 100px;
        line-height: 100px;
        background: #f5f5f5;
    }

    .radius-icon a {
        margin: 20px;
        border-radius: 20px;
        font-size: 13px;
        width: 150px;
        font-weight: bold;
    }

    .btn-purple {
        padding: 0.375rem 0.75rem;
        background: #d733da;
        color: #FFF;
    }


    /* Button Style 4 (Circle) */
    .circle-btn {
        min-height: 100px;
        line-height: 100px;
        background: #e8e8e8;
    }

    .circle-btn button {
        margin: 10px;
        border-radius: 50%;
        height: 80px;
        width: 80px;
        font-size: 15px;
    }

    /* Button Style 5 (Size) */
    .rounded-btn {
        min-height: 100px;
        line-height: 100px;
        background: #f5f5f5;
    }

    .rounded-btn button {
        border-radius: 12px;
        margin: 10px;
    }

    /* Button Style 6 (Hover) */
    .hover-btn {
        min-height: 100px;
        line-height: 100px;
        background: #e8e8e8;
    }

    .hover-btn button {
        margin: 10px;
        color: #FFF;
        padding: 10px 40px;
    }

    .hover-btn button:hover {
        background: #5a5a5a;
    }

    .btn-one {
        background: #f11350;
    }

    .btn-two {
        background: #5863db;
    }

    .btn-three {
        background: #c41f26;
    }

    .btn-four {
        background: #58cadb;
    }

    /* Line Style 7 (Line) */
    .line-btn {
        min-height: 100px;
        line-height: 100px;
        background: #f5f5f5;
    }

    .line-btn button {
        margin: 10px;
        color: #FFF;
        padding: 5px 120px;
    }


    /* Line Style 8 (Left Icon) */

    .radius-style button {
        border-radius: 30px;
    }

    .radius-btn {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }
</style>

<div class="icon-btn">
    <button class="btn-green">
        <span class="btn-gradient">
            <i class="fa fa-plus"></i>
        </span>
        <span class="btn-text">Agregar</span>
    </button>

    <button class="btn-pink">
        <span class="btn-gradient">
            <i class="fa fa-close"></i>
        </span>
        <span class="btn-text">Wrong</span>
    </button>

    <button class="btn-facebook">
        <span class="btn-gradient">
            <i class="fa fa-facebook"></i>
        </span>
        <span class="btn-text">Facebook</span>
    </button>

    <button class="btn-instagram">
        <span class="btn-gradient">
            <i class="fa fa-instagram"></i>
        </span>
        <span class="btn-text">Instagram</span>
    </button>

    <button class="btn-twitter">
        <span class="btn-gradient">
            <i class="fa fa-twitter"></i>
        </span>
        <span class="btn-text">Twitter</span>
    </button>

    <button class="btn-google">
        <span class="btn-gradient">
            <i class="fa fa-google"></i>
        </span>
        <span class="btn-text">Google</span>
    </button>

    <button class="btn-github">
        <span class="btn-gradient">
            <i class="fa fa-github"></i>
        </span>
        <span class="btn-text">Github</span>
    </button>

    <button class="btn-behance">
        <span class="btn-gradient">
            <i class="fa fa-behance"></i>
        </span>
        <span class="btn-text">Behance</span>
    </button>

    <button class="btn-dribbble">
        <span class="btn-gradient">
            <i class="fa fa-linkedin"></i>
        </span>
        <span class="btn-text">Github</span>
    </button>

    <button class="btn-linkedin">
        <span class="btn-gradient">
            <i class="fa fa-linkedin"></i>
        </span>
        <span class="btn-text">Linkedin</span>
    </button>

    <button class="btn-pinterest">
        <span class="btn-gradient">
            <i class="fa fa-pinterest"></i>
        </span>
        <span class="btn-text">Pinterest</span>
    </button>

    <button class="btn-snapchat">
        <span class="btn-gradient">
            <i class="fa fa-snapchat"></i>
        </span>
        <span class="btn-text">Snapchat</span>
    </button>
</div>

<div class="normal-icon">
    <a href="#" class="btn btn-xs btn-success">
        <i class="fa fa-check" aria-hidden="true"></i> BUTTON
    </a>
    <a href="#" class="btn btn-xs btn-info">
        <i class="fa fa-check" aria-hidden="true"></i> BUTTON
    </a>
    <a href="#" class="btn btn-xs btn-warning">
        <i class="fa fa-check" aria-hidden="true"></i> BUTTON
    </a>
    <a href="#" class="btn btn-xs btn-primary">
        <i class="fa fa-check" aria-hidden="true"></i> BUTTON
    </a>
    <a href="#" class="btn btn-xs btn-danger">
        <i class="fa fa-check" aria-hidden="true"></i> BUTTON
    </a>
</div>

<div class="radius-icon">
    <a href="#" class="btn btn-xs btn-success">
        <i class="fa fa-check" aria-hidden="true"></i> Green Button
    </a>
    <a href="#" class="btn btn-xs btn-info">
        <i class="fa fa-check" aria-hidden="true"></i> Blue Button
    </a>
    <a href="#" class="btn btn-xs btn-warning">
        <i class="fa fa-check" aria-hidden="true"></i> Yellow Button
    </a>
    <a href="#" class="btn btn-xs btn-primary">
        <i class="fa fa-check" aria-hidden="true"></i> Blue Button
    </a>
    <a href="#" class="btn btn-xs btn-danger">
        <i class="fa fa-check" aria-hidden="true"></i> Red Button
    </a>
    <a href="#" class="btn btn-xs btn-purple">
        Orange Button <i class="fa fa-check" aria-hidden="true"></i>
    </a>
</div>

<div class="circle-btn">
    <button class="btn btn-success">Green</button>
    <button class="btn btn-info">Blue</button>
    <button class="btn btn-warning">Yellow</button>
    <button class="btn btn-danger">Red</button>
</div>

<div class="rounded-btn">
    <button class="btn btn-lg btn-success">Button</button>
    <button class="btn btn-lg btn-info">Button</button>
    <button class="btn btn-lg btn-warning">Button</button>
    <button class="btn btn-lg btn-danger">Button</button>
</div>

<div class="hover-btn">
    <button class="btn btn-one">BUTTON</button>
    <button class="btn btn-two">BUTTON</button>
    <button class="btn btn-three">BUTTON</button>
    <button class="btn btn-four">BUTTON</button>
</div>

<div class="line-btn">
    <button class="btn btn-one">BUTTON</button>
    <button class="btn btn-two">BUTTON</button>
    <button class="btn btn-three">BUTTON</button>
    <button class="btn btn-four">BUTTON</button>
</div>

<div class="icon-btn radius-style">
    <button class="btn-snapchat">
        <span class="btn-gradient radius-btn">
            <i class="fa fa-snapchat"></i>
        </span>
        <span class="btn-text">Snapchat</span>
    </button>
    <button class="btn-instagram">
        <span class="btn-gradient radius-btn">
            <i class="fa fa-instagram"></i>
        </span>
        <span class="btn-text">Instagram</span>
    </button>
    <button class="btn-twitter">
        <span class="btn-gradient radius-btn">
            <i class="fa fa-twitter"></i>
        </span>
        <span class="btn-text">Twitter</span>
    </button>
</div>