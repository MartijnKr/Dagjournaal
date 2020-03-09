@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Nieuwe dagelijkse bezigheid toevoegen</h3>
<hr>
<form method="post" action="{{ action('DagelijksController@store') }}" accept-charset="UTF-8">
    @csrf
    <table>
        <tr>
            <th style="text-align: center;">Dag(en)</th>
            <th style="text-align: center;">Tijd</th>
            <th style="text-align: center;">Titel</th>
            <th style="text-align: center;">Boodschap</th>
        </tr>
        <td>
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Mon" value="Mon">
                    <label class="form-check-label">Maandag</label><br/>
                    <input class="form-check-input" type="checkbox" name="Tue" value="Tue">
                    <label class="form-check-label">Disndag</label><br/>
                    <input class="form-check-input" type="checkbox" name="Wed" value="Wed">
                    <label class="form-check-label">Woensdag</label><br/>
                    <input class="form-check-input" type="checkbox" name="Thu" value="Thu">
                    <label class="form-check-label">Dondedag</label><br/>
                    <input class="form-check-input" type="checkbox" name="Fri" value="Fri">
                    <label class="form-check-label">Vrijdag</label><br/>
                    <input class="form-check-input" type="checkbox" name="Sat" value="Sat">
                    <label class="form-check-label">Zaterdag</label><br/>
                    <input class="form-check-input" type="checkbox" name="Sun" value="Sun">
                    <label class="form-check-label">Zondag</label>
            </div>
        </td>
            <td style="width:75px;"><input class="form-control" type="time" name="tijd" required></td>
            <td style="width:200px;"><input class="form-control" type="text" name="title" autocomplete="off"></td>
            <td style="width:600px;"><input class="form-control" type="text" name="boodschap" autocomplete="off" required></td>
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