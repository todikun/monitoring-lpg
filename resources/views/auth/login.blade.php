<!DOCTYPE html>
<html>

<head>
    <title>Login | Monitoring LPG</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.style')

</head>

<body>
    <div class="app app-default">

        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-header"></div>
                <div class="app-body">
                    <div class="loader-container text-center">
                        <div class="icon">
                            <div class="sk-folding-cube">
                                <div class="sk-cube1 sk-cube"></div>
                                <div class="sk-cube2 sk-cube"></div>
                                <div class="sk-cube4 sk-cube"></div>
                                <div class="sk-cube3 sk-cube"></div>
                            </div>
                        </div>
                        <div class="title">Logging in...</div>
                    </div>
                    <div class="app-block">
                        <div class="app-form">
                            <div class="form-header">
                                <div class="app-brand">Monitoring &nbsp;<span class="highlight">LPG</span></div>
                            </div>
                            @if (session('error'))
                            <p class="text-danger"><strong>{{ session('error') }}</strong></p>
                            @endif
                            <form action="{{route('login.action')}}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="username" name="username" class="form-control" placeholder="Username"
                                        aria-describedby="basic-addon1" required>

                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-key" aria-hidden="true"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        aria-describedby="basic-addon2" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-submit">Sign in</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- @include('includes.script') --}}

</body>

</html>