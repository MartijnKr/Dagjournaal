@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Nieuwe link toevoegen</h3>
<hr>
<form method="post" action="{{ action('LinksController@store') }}" accept-charset="UTF-8">
    @csrf
    <table>
        <tr>
            <th style="text-align: center;">Titel</th>
            <th style="text-align: center;">Link</th>
        </tr>
            <td style="width:200px;"><input class="form-control" type="text" name="title" autocomplete="off" required></td>
            <td style="width:600px;"><input class="form-control" type="url" name="link" autocomplete="off" value="http://" required></td>
        </tr>
        <tr>
            <td><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<br/>
<br/>
<br/>
<br/>
<a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>


<br/>
@endsection