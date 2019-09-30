Click here to reset your password: <a href="{{ $link = url(Request::route()->getPrefix().'/reset/password', $token).'?email='.encrypt(urlencode($user->email)) }}"> {{ $link }} </a>
