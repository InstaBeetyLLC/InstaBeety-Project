<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Samsung | 404 Error</title>

    <link href="{!! URL::asset('css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('font-awesome/css/font-awesome.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/animate.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/style.css')!!}" rel="stylesheet" type="text/css"/>


</head>

<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>500</h1>
    <h3 class="font-bold">Unauthorized Request</h3>

    <div class="error-desc">
        You don't have a role to do this action <br/>
        You can go back to Home page: <br/><a href="{!! route('HomeSweet') !!}"
                                              class="btn btn-primary m-t">Home</a>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{!! URL::asset('js/jquery-2.1.1.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>

</body>

</html>
