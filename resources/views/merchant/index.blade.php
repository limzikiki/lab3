<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <x-navigation />
    @if (count($merchants) == 0)
    <p color="red">There are no records according to your query in the database!</p>
    @else
    <table class="tg" style="border: 1px solid black">
        <thead>
            <tr>
                <th>Name</th>
                <th>Year Founded</th>
                <th>Manager Name</th>
                <th>Country</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($merchants as $merchant)
            <tr>
                <td>{{$merchant->name}}</td>
                <td>{{$merchant->year_founded}}</td>
                <td>{{$merchant->manager_name}}</td>
                <td>{{$merchant->country->country_name}}</td>
                <td>
                    <form method="POST" action='{{action([App\Http\Controllers\MerchantController::class, "destroy"], $merchant -> id) }}'>
                        @csrf @method('DELETE')
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
    <br>
    <form>
        <input name='search_query'/>
        <select name='country_id' required>
            @if (app('request')->input('country_id') == null)
            <option disabled selected hidden>Please Choose Country</option>
            @endif
            <option value='-1'>None</option>
            @foreach ($all_countries as $country)
            @if( $country->id == app('request')->input('country_id'))
            <option value='{{$country->id}}' selected> {{$country->country_name}} </option>
            @else
            <option value='{{$country->id}}'> {{$country->country_name}} </option>
            @endif
            @endforeach
        </select>
        <input type='submit' value='Search' />
    </form>
    <bt>

    <a href="{{action([App\Http\Controllers\MerchantController::class, 'create'])}}">Crete Merchant</a>

</body>
</html>
