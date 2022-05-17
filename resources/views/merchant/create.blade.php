<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{action([App\Http\Controllers\MerchantController::class, 'store']) }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name" required><br>
        <input type="number" max='9999' min='0' placeholder='year' name='year_founded' required><br>
        <input  type="text" name="manager_name"placeholder='manager_name' required><br>
        <select name='country_id' required>
            <option value="" disabled selected hidden>Please Choose Country</option>
            @foreach ($countries as $country)
            <option value='{{$country->id}}'> {{$country->country_name}} </option>
            @endforeach
        </select>
        <input type="submit" value="add"/>
    </form>
    <x-error />
</body>
</html>
