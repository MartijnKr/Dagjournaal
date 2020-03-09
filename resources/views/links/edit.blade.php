@extends('layout.app')

@section('content')

<h3>Link bewerken</h3>
<br>
<form method="post" action="{{ action('LinksController@update', $link->id) }}" accept-charset="UTF-8">
    @csrf
    <table class="table" style="width:1000px;">
        <tr>
            <td style="width: 250px;"><input class="form-control" type="text" name="title" value="{{$link->title}}"></td>
            <td><input class="form-control" type="url" name="link" value="{{$link->link}}"></td>
        </tr>
        <tr>
            <input name="_method" type="hidden" value="PUT">
            <td colspan="4"><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<br/><br/>

<form method="post" action="{{ action('LinksController@destroy', $link->id) }}" accept-charset="UTF-8">
        @csrf
    <input name="_method" type="hidden" value="DELETE">
    <input type="submit" class="btn btn-outline-danger float-right" name="send" value="Verwijder">
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>
</form>

@endsection