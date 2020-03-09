@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Camera {{$camera->nr}}</h3>
<hr/>

<form method="post" action="{{ action('CamerasController@update', $camera->id) }}" accept-charset="UTF-8">
    @csrf
    <table>
        <tr>
            <td>Camera</td>
            <td style="width:200px;"><input class="form-control" type="text" name="nr" value="{{$camera->nr}}" required></td>
        </tr>
            <td>Straat</td>
            <td style="width:600px;"><input class="form-control" type="text" name="straat" value="{{$camera->straat}}"></td>
        </tr>
        <tr>
            <td>Plaats</td>
            <td style="width:600px;"><input class="form-control" type="text" name="plaats" value="{{$camera->plaats}}"></td>
            <td><input name="bedrijf" type="hidden" value="{{$camera->bedrijf}}"></td>
        </tr>
        <tr>
                <input name="_method" type="hidden" value="PUT">
            <td><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<br/>
<br/>
<form method="post" action="{{ action('CamerasController@destroy', $camera->id) }}" accept-charset="UTF-8">
    @csrf
<input name="_method" type="hidden" value="DELETE">
<input type="submit" class="btn btn-outline-danger float-right" name="send" value="Verwijder {{$camera->nr}}">
<a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>
</form>


<br/>
@endsection