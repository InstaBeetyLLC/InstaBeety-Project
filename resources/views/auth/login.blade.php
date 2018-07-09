<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Samsung | LOGIN</title>

    <link href="{!! URL::asset('css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('font-awesome/css/font-awesome.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/animate.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/style.css')!!}" rel="stylesheet" type="text/css"/>

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">
                <img  src="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABQCAYAAACpv3NFAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4AgDDjU0cU5OBAAACxBJREFUeNrtnFtsG2UWx39zsR1fYudix46bQFua0mybrgQUhLiJomoRDzzUfUBdQCpSaUDiCRANFLSlEkKwPCChbnlCW2kj6KqVoN0HpLZsW1ooJSlF24toaaOkuTitHTuJHV9n9iEa147HduriOL0cKZqZb3y+Od9/znfO+c53JoLP51NHRkZwOBzcThQOh/F4PMh+v5+hoSGi0Wi1ZZpTCoVCCIKAbLfbiUQit50GANjtdsRqC1FtugNAtQWoNt0BoNoCVJvuAFBtAapNcqU6FkWRZDLJWGiMdCqNIAgAeUe9tnKPmUHJMiaTqXoAiKJINBolHA7T0dFBTU0Nqqpm/hRFKetaURSAotcCApFohCtXrtDS0oIgCKiqWh4AgiCQSqeYik7ltJvNZmRZLthxIpEgEomwbds21q5dm/eGsil7oNl/2sCyj+l0OgeQdDqd1w7Tcf6XX37Jrn/vwuP2lK8BqqoiiRJ2uz2nXROgEPn9ftasWYPP5yupLYIgFAWoHPJ6vWzdupWzZ89y5swZXC5XeQCMjo7y4KoH+fjvH+e0d3V1cfToUdxuty5fIpHA5XRRbWpf1s5PP/1UPgDJZBKTyYTT6cxpN5vNJBKJgnySJBGPxas9fhKJBJIkFf1NUQAkScrMs2xKpVIlO04r+XyffPIJAwMD2O32DL8oigiCkHPU2mfeK3Qei8Vwu90899xzOc8rNk1nBUC5JAhCxiBl0zfffMOJEyfweDy6ws22bWa73+/nvvvuywNgNlSxOEBR8wFobW0lEAgUnZPlkKPOwd13310Wb8UiQb0390db+0y/lN9vRQAQ0A8+REGc1bycS6oMAIKgOwUqpQHzDgAAVdGZAqJwe2gAwtzagPkHANw0NqBicUA5GiDLMpFIhMuXL+fwt7a2YrVaSaVSNwcAgG4gVMoGhEIh7rrrLjZs2JATBe7bt4++vj5qa2tvDgDK1YBgMMjDDz/Mxo0bc9p7e3s5efJkQQBUyp9Wc+oFRLG4DTAYDMSmYnntyWQSWS78ruZfIFSmBpTLdyNUMQ0oFAiV8gLl8s0tACVkufU1YBbyFLIBpcArl29uASiFT5G1QDGLXVDVheKWfn56gUKqXEJWPeBEobgG3FReoBwNKMV3I1Q5L6ATCWr5vkrwzSsA7mgA+jZAEqXSXqBMvnkFwK0fB5QgRVF0hbZYLaSSqZK8M0EQpcrFARVZDRqNRmKxGL///jtAZuMyGAxisVgK8mkaoKqq7vb5TQOAw+FgbGyM559/PmfH12Qy4fV6dX29Rtm7wxpJklSxQKii+QDtTWZvZZUSVg+AkrbjBgKhigCgDdxsNuveK0Z6NkCSbjIvUC5la87M9krRvAIApleD12sDbhkACmlAqdXg3ANQwdS+ourYgBKR4Nwvhys0JYvZgGKWfs69QCAQYHBwMFPlkV3olH0sdJ59zB7kxMQENpstrypl3sUBK1euJBqN4nQ6URQlp06v1Lk2OL3SOEmSsFqt8z8OeOedd4reL7coMp2erii12Ww5/ZWKAwppwGyyyUUBUBQFg8Fw3QBlq3ypYqrZkNFoLDoQRVF0n2M0GnWLvGYNgMFgIBQO3fAAbpRUVdWtOtOozlFHIBBgy5YtmTZBEDj9v9N4mm+gUrSxsZFTp07R/a9u1v91fVUGPzk5yd69e4sWVpnNZiKRCN3d3TntTU1NOOwOkslkQV7hmWeeUYeHh3W/GhNFkehUlPHwOA888AAOhyNvcSMgIMoionCtrk+SpOmjKIHAtesZx7zfZ7XLskw0GmX//v2cP38ej8dTUp2vh8LhMM3NzaVtgMVswSAbOHHiRAZJbT5mz8uZc/SPuBYEgfr6epqbmytSGwCz8AKagSlUFzwXVKnBwzxbC1SD7gBQbQGqTXcAqLYA1abbHgBdNyjLMiMjI0xMTOTl6EVRpLm5GbPZnBOYaJ/JDQwMFIzbvV5vwXo/g8HA1atXCQQCOBwOPB5PwQjOaDQyMjJCOBzO61OTta+vD0mSWLhwYVE3mgeAIAgEg0GWr1jO4489jsvlIplMIooiiqJw7tw5Dhw4QCwWy1koTU1NYbPZ6OzsxGaz4XK5SKVTOau4PXv26Nb7iaLI0NAQbUvaeOGFF+jp6aG3pxfvAq9u9Hf16lUeffRRFi9ezK5duxgLjuGoc2RWlsPDw5law71791JTU1NwSZ0HQCQSwWgwsuMfO6irm15kmEwmUqkUBoOB9evXc++99/LGG2+wbNmyDN/k5CRut5u33noLmK75MxqNOaHzgQMHiEajeQDE43GCwSDvb3ufjo4ORkdHeeSRRxgfH8dqteYJPTg4yOrVq/H5fCxctJBNGzfR/qd2zGYzp06dwufz8e677+If9bNz506ampoKltnl2YB4PI6n2UNdXR2ffvopTqeTtrY2Fi1axPLly/nwww85duwYLa0tOXySJGX29vf9Zx+NjY0sWbKE9vZ2Vq9ezZNPPsmFCxfweDx5fJcuXeLVV1+lo6OD3bt309TURNfbXRk1zpsuRgPhUBgA31ofr7/+OucvnKe/v5/29na2b98OwKWLl5BluWhCJQ8WSZYIh6c737RpEyv/vBKH3YEoTS94vv32W3755RdkSR/RZDLJY48+xo/Hf8RcY2ZgYID33nsPQRCoqanJ+a0gCITDYRrqG9iyZQtHjx5l3bp1HDp0iJc2vMTOf+5keGQYd5M7x64ICDQ0NBAMBjl9+jRdb3dx+Mhh9u/fT09PD4ODg4yPj+P1eilFeRpQX1fP8PAwnZ2d9Pb2srJjJS6Xi/q6emw2G2+++SZbt25l4HJhY6coCqlkimQyiaIoyLKcUcFsHlEU6evr47XXXgPgyJEjPPTQQ/z8888AbO7azJXRK/pvTpYxm828+OKL+Ef9fPHFF+zevRur1cqaNWuIx+NYzIU3YgtqwMTkBCtWrMBisfDKK6/w66+/4nA4iMfjxGIxIpEIS5cuxVxjzsnEaGkpg8HAwe8Oss63DpPJhMlkYsGCBZmcn+Y9BEFgZGSEZcuW8fKml6cHvHkzmzdvzsjy9F+e5qmnnuL48eMsWrQoM8VUVBRVyfS1zreOI0eO8Oyzz9LZ2cnZs2dpbW0tuRWvC4B/xM8Tjz/BRx99RCwW47fffqO2thZFUUin01gsFi5evMjU1FRO7Y6SVjLXvrU+zpw5M/0GhGuu6YMPPuDQoUN4PB4SiQSJRIKvvvoKgI0bNxKNRrHb7YTGQtQ31LN9+3a6u7u5//77mZyczGytJxNJGhsaAbjnnns4efIkn332GW63m6+//pqlS5fS2Dh9P5VKFU2nSW1tbX+bnJzMzE+r1crAwEDm3OGYdi9akuLw4cN8/vnnJBKJnM1Pbfvb6XQSCARobGgklU7lZIW///57+vv7sdlsRKNRFi9ezKpVq9izZw87duwgFArR39/P8PAwPT09WK1WDAYDfX19XL58OfM8RVFwOp0k4gm+++93OJ1Ojh07xsGDB2lpaUEURVwuF+fOneOHH37QdYPxeJza2tr8jJAkScRiMYaGhnQToqlUCrvdTlNTU87ns6Iokkql8Pv9BRFvdDZitVwLWjT/rygKCxYsyACpCTs0NISqqni93pwMr0GeDpoi0QherzfzbFVVkWU50y9MB196sYSWESqYEpv5KbtG2Z+36lGxL8u1FFj2MzTt0nNVxe5rzymUddbsRSFZS6bEyv2s/Xpq+rQ8YDn3Sz1ntnLcWQyNj48TCoWqLcecUygUwmq1ImvJzpn/JeJWJ6vVitvt5v9Y1OqW0JEaPAAAAABJRU5ErkJggg==">
            </h1>

        </div>
        <h3>Welcome</h3>
        <p>
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

            </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            {{--<a href="#"><small>Forgot password?</small></a>--}}
            {{--<p class="text-muted text-center"><small>Do not have an account?</small></p>--}}
            {{--<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>--}}
        </form>
        <p class="m-t"> <small>Seam Labs &copy; 2016</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{!! URL::asset('js/jquery-2.1.1.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>

</body>

</html>
