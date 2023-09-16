<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2FA</title>
</head>

<body>
    @if (!$user->two_factor_secret)
        <form action="{{ route('two-factor.enable') }}" method="post">
            @csrf
            <button class="btn btn-primary">Enable 2FA</button>
        </form>
    @elseif(!$user->two_factor_confirme_at)
        @if(session('status') == 'two-factor-authentication-enable')
            <div class="mb-4 font-media text-sm">
                Please finish configuring two factor authentication below
            </div>
            {!! $user->twoFactorQrCodeSvg !!}
        <form action="{{ route('two-factor.diable') }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Diable 2FA</button>
        </form>
    @endif
</body>

</html>
