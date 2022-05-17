<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit {{ $country->country_name }}</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form  method="POST" action='{{action([App\Http\Controllers\CountryController::class, "update"], $country -> id) }}'>
        @method('PUT')
        @csrf
        <label for='countryName'>Country Name</label>
        <input type='text' id='countryName' name='country_name' value='{{ $country->country_name }}'/> </br>
        <label for='country_code'>Country Code</label>
        <input type='text' id='country_code' name='country_code' value='{{ $country->country_code }}'/> </br>
        <input type='submit'/>
        <a href="{{url('country')}}">Back</a>
    </form>
    <pre>
    {{
        print_r($country)
    }}
    </pre>
</body>
</html>
