@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Nieuw bedrijf toevoegen</h3>
<hr/>

<form method="post" action="{{ action('CameraBedrijfsController@store') }}" accept-charset="UTF-8">
    @csrf
    <table>
        <tr>
            <td>Bedrijfs naam</td>
            <td style="width:200px;"><input class="form-control" type="text" name="bedrijf" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>Bedrijfs info</td>
            <td style="width:600px;"><textarea class="form-control" rows="2" type="text" name="info" autocomplete="off"></textarea></td>
        </tr>
        <tr>
            <td>Opmerkingen</td>
            <td style="width:600px;"><textarea class="form-control" rows="2" type="text" name="opmerkingen" autocomplete="off"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<br/>
<br/>
<a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>

<br/>
@endsection