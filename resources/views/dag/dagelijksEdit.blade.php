@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Dagelijkse bezigheid bewerken</h3>
<br>
<form method="post" action="{{ action('DagelijksController@update', $bezig->id) }}" accept-charset="UTF-8">
    @csrf
    <table class="table" style="width:1000px;">
        <tr>
            <td style="width: 100px;">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Mon" value="Mon" {{ $bezig->Mon == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Maandag</label><br/>
                        <input class="form-check-input" type="checkbox" name="Tue" value="Tue" {{ $bezig->Tue == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Disndag</label><br/>
                        <input class="form-check-input" type="checkbox" name="Wed" value="Wed" {{ $bezig->Wed == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Woensdag</label><br/>
                        <input class="form-check-input" type="checkbox" name="Thu" value="Thu" {{ $bezig->Thu == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Dondedag</label><br/>
                        <input class="form-check-input" type="checkbox" name="Fri" value="Fri" {{ $bezig->Fri == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Vrijdag</label><br/>
                        <input class="form-check-input" type="checkbox" name="Sat" value="Sat" {{ $bezig->Sat == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Zaterdag</label><br/>
                        <input class="form-check-input" type="checkbox" name="Sun" value="Sun" {{ $bezig->Sun == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Zondag</label>
                </div>
            </td>
        <?php $tijd = Date('H:i', strtotime($bezig->tijd)); ?>
            <td style="width: 100px;"><input class="form-control" type="time" name="tijd" value="<?php echo $tijd; ?>"></td>
            <td style="width: 200px;"><input class="form-control" type="text" name="title" value="{{$bezig->title}}"></td>
            <td><input class="form-control" type="text" name="boodschap" value="{{$bezig->msg}}"></td>
        </tr>
        <tr>
            <input type="hidden" name="done" value="2018-07-07">
            <input name="_method" type="hidden" value="PUT">
            <td colspan="4"><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>
<br/><br/>
<form method="post" action="{{ action('DagelijksController@destroy', $bezig->id) }}" accept-charset="UTF-8">
        @csrf
    <input name="_method" type="hidden" value="DELETE">
    <input type="submit" class="btn btn-outline-danger float-right" name="send" value="Verwijder">
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>
</form>

@endsection