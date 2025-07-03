<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    {{-- Header --}}
                    @yield('header')

                    {{-- Corpo do e-mail --}}
                    @yield('content')

                    {{-- Footer --}}
                    @yield('footer')
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
