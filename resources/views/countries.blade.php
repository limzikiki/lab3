<!DOCTYPE html>
<html>

<head>
    <title>Countries</title>
</head>

<body>
    <x-navigation />
    @if (count($countries) == 0)
    <p color='red'> There are no records in the database!</p>
    @else
    <table style="border: 1px solid black">
        <tr>
            <td> Country Id </td>
            <td> Country Name </td>
            <td> Country Code </td>
            <td> Show </td>
            <td> Delete</td>
            <td> Edit Field</td>
        </tr>
        @foreach ($countries as $country)
        <tr>
            <td> {{ $country->id }} </td>
            <td> <a href="{{url('merchant')}}?country_id={{ $country->id }}">{{ $country->country_name }}</a> </td>
            <td> {{ $country->country_code }} </td>
            <td>
                <input type="button" value="show" onclick='showCities("{{ $country->id }}")'>
            </td>
            <td>
                <form method="POST" action='{{action([App\Http\Controllers\CountryController::class, "destroy"], $country -> id) }}'>
                    @csrf @method('DELETE')
                    <input type="submit" value="delete">
                </form>
            </td>
            <td>
                <a href='{{action([App\Http\Controllers\CountryController::class, "edit"], $country -> id) }}'>Edit</a>
             </td>

        </tr>
        @endforeach
    </table>
    @endif
    <p>
    <form>
        <input name='search_query'/>
        <input type='submit' value='Search' />
    </form>
    <br>
    <input type="button" value="New Country" onClick="newCountry()"> </p>
    <script>
        function showCities(countryID) {
            window.location.href = "country/" + countryID;
        }

        function newCountry() {
            window.location.href = window.location.href + "/create";
        }
    </script>
</body>
