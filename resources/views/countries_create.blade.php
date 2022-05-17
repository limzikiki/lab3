<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form method="POST" action="{{action([App\Http\Controllers\CountryController::class, 'store'])}}">
        @csrf
        <input type="text" name="country_name" placeholder='country_name'/>
        <input type="text" name="country_code" placeholder='country_code'/>
        <input type="submit" value="add">
    </form>
    <x-error />
</body>
</html>
