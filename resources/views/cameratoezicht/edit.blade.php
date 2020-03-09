@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Bedrijf informatie aanpassen</h3>
<hr/>

<form method="post" action="{{ action('CameraBedrijfsController@update', $bedrijf->id) }}" accept-charset="UTF-8">
    @csrf
    <table>
        <tr>
            <td>Bedrijfs naam</td>
            <td style="width:200px;"><input class="form-control" type="text" name="bedrijf" value="{{$bedrijf->bedrijf}}" required></td>
        </tr>
        <tr>
            <td>Bedrijfs info</td>
            <td style="width:600px;"><textarea class="form-control" rows="2" type="text" name="info">{{$bedrijf->info}}</textarea></td>
        </tr>
        <tr>
            <td>Opmerkingen</td>
            <td style="width:600px;"><textarea class="form-control" rows="2" type="text" name="opmerkingen">{{$bedrijf->opmerkingen}}</textarea></td>
        </tr>
        <tr>
                <input name="_method" type="hidden" value="PUT">
            <td><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<br/>
<br/>
<form method="post" action="{{ action('CameraBedrijfsController@destroy', $bedrijf->id) }}" accept-charset="UTF-8">
    @csrf
<input name="_method" type="hidden" value="DELETE">
<input type="submit" class="btn btn-outline-danger float-right" name="send" value="Verwijder {{$bedrijf->bedrijf}}">
<a href="../../cameratoezicht/{{$bedrijf->id}}" class="btn btn-secondary">Terug</a>
</form>


<br/>
@endsection