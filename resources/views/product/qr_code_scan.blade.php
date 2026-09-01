<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="refresh" content="10;url={{ $redirectUrl }}">
    <title>Opening Product</title>
</head>
<body data-location-url="{{ $locationUrl }}" data-redirect-url="{{ $redirectUrl }}" data-csrf-token="{{ csrf_token() }}">
    <p>Opening product details…</p>

    <script src="{{ asset('public_assets/js/qr-code-scan.js') }}"></script>
</body>
</html>
