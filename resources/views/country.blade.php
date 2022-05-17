<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Show {{ $country->country_name }}</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form>
        Country Name <b>{{ $country->country_name }}</b> </br>
        Country Code <b>{{ $country->country_code }}</b>
    </form>
    <pre>
    {{
        print_r($country)
    }}
    </pre>
</body>
</html>
