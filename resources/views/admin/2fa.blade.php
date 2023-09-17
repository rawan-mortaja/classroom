<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2FA</title>
</head>

<body>
    @if ($user->two_factor_secret && $user->two_factor_confirme_at)
        <h3>Recovery Codes</h3>
        <ul>
            @foreach ($user->recoveryCodes as $code)
                <li>{{ $code }}</li>
            @endforeach
        </ul>

        <form action="{{ route('two-factor.disable') }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Diable 2FA</button>
        </form>
    @else
        @if (session('status') == 'two-factor-authentication-enable')
            <div class="mb-4 font-media text-sm">
                Please finish configuring two factor authentication below
            </div>
            {!! $user->twoFactorQrCodeSvg() !!}
            <form action="{{ route('two-factor.confirm') }}" method="post">
                @csrf
                <p>Enter to confirm enable 2FA</p>
                <input type="text" name="code" class="form-control">
                <button class="btn btn-primary">Confirm</button>
            </form>
        @else
            <form action="{{ route('two-factor.enable') }}" method="post">
                @csrf
                <button class="btn btn-primary">Enable 2FA</button>
            </form>
        @endif
    @endif
</body>

</html>
