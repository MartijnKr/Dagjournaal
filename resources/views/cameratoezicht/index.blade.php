@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Mobiel cameratoezicht</h3>

<form accept-charset="UTF-8">
    @csrf
    <table class="table">

        @foreach($bedrijven as $bedrijf)
        <td style="text-align: center;"><a href="cameratoezicht/{{$bedrijf->id}}?sort=nr" class="btn btn-secondary btn-lg btn-block">{{$bedrijf->bedrijf}}</a></td>
        </tr>
        @endforeach
        
    </table>
</form>

<br/>
<br/>
<a href="cameratoezicht/create" style="float:right;" class="btn btn-secondary" role="button">Nieuw bedrijf</a>

<br/>
@endsection