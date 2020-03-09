@extends('layout.app')

@section('content')
<h3>Dagjournaal van {{$naam->created_at->format('d-m-Y')}}</h3>
<br/>
<table class="table" style="width: 50%;">
    <tr>
        <td style="width:100px;">Nachtdienst:</td>
        <td>{{$naam->nacht}}</td>
    </tr>
    <tr>
        <td>Ochtenddienst:</td>
        <td>{{$naam->ochtend}}</td>
    </tr>
    <tr>
        <td>Middagdienst:</td>
        <td>{{$naam->middag}}</td>
    </tr>
</table>
<br/>

<?php
$naamDatum  = $naam->created_at->format('Y-m-d');
$post       = DB::table('bijzonders')->whereDate('created_at', $naamDatum)->orderBy('tijd', 'asc')->get(); 
?>

<table class="table table-striped" style="width:100%;">
    <th colspan="2">Bijzonderheden:</th>
    <tr>

        @foreach($post as $posts)
        <?php $tijd = Date('H:i', strtotime($posts->tijd)); ?>
            <td style="width: 50px;">{{$tijd}}</td>
            <td>{{$posts->bijzonderheden}}</td>
    </tr>
        @endforeach
        
</table>
<br/>
<a href="{{ URL::previous() }}" class="btn btn-secondary">Terug</a>
<br/>
<br/>
@endsection