@extends('layout.app')

@section('content')
<h6 style="float: right;"><?php echo date('d-m-Y') ?></h6>
<h3>Bewerk</h3>
<br>
<form method="post" action="{{ action('BijzondersController@update', $bijzonderheid->id) }}" accept-charset="UTF-8">
    @csrf
    <table class="table" style="width:100%;">
        <tr>
            <th colspan="4">Bijzonderheden</th>
        </tr>
        <?php $tijd = Date('H:i', strtotime($bijzonderheid->tijd)); ?>
        <tr>
            <td style="width: 100px;"><input class="form-control" type="time" name="tijd" value="<?php echo $tijd; ?>"></td>
            <td><textarea class="form-control" rows="3" type="text" name="bijzonderheden" value="{{$bijzonderheid->bijzonderheden}}">{{$bijzonderheid->bijzonderheden}}</textarea></td>
        </tr>
        <tr>
            <input name="_method" type="hidden" value="PUT">
            <td colspan="4"><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>
<br/><br/>
<form method="post" action="{{ action('BijzondersController@destroy', $bijzonderheid->id) }}" accept-charset="UTF-8">
        @csrf
    <input name="_method" type="hidden" value="DELETE">
    <input type="submit" class="btn btn-outline-danger float-right" name="send" value="Verwijder">
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>
</form>

@endsection