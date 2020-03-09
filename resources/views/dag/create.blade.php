@extends('layout.app')

@section('content')
<h6 style="float: right;"><?php echo date('d-m-Y') ?></h6>
<h3>Dagjournaal</h3>
<br>

<form method="post" action="{{ action('NamesController@store') }}" accept-charset="UTF-8">
    @csrf
    <table>
        <tr>
            <td>Nachtdienst</td>
            <td style="width:275px;"><input class="form-control" type="text" name="nachtdienst" autocomplete="off" value=""></td>
        </tr>
        <tr>
            <td>Ochtendienst</td>
            <td><input class="form-control" type="text" name="ochtenddienst" autocomplete="off" value=""></td>
        </tr>
        <tr>
            <td>Middagdienst</td>
            <td><input class="form-control" type="text" name="middagdienst" autocomplete="off" value=""></td>
        </tr>
        <tr>
            <td><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>
<br/>


@endsection