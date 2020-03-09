@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Dagelijkse bezigheden</h3>
<hr/>
@include('layout.messages')

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Mon', 1)->orderBy('tijd', 'asc')->get();
?>
<h4>Maandag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>

    @foreach($dagelijkseBezigheden as $bezigheid)
        <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>
    @endforeach

</table>
<hr/>

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Tue', 1)->orderBy('tijd', 'asc')->get();
?>

<h4>Dinsdag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>
    
    @foreach($dagelijkseBezigheden as $bezigheid)
    <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>
    @endforeach

</table>
<hr/>

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Wed', 1)->orderBy('tijd', 'asc')->get();
?>

<h4>Woensdag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>
    
    @foreach($dagelijkseBezigheden as $bezigheid)
    <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>    
    @endforeach

</table>
<hr/>

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Thu', 1)->orderBy('tijd', 'asc')->get();
?>

<h4>Donderdag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>
    
    @foreach($dagelijkseBezigheden as $bezigheid)
    <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>
    @endforeach

</table>
<hr/>

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Fri', 1)->orderBy('tijd', 'asc')->get();
?>

<h4>Vrijdag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>
    
    @foreach($dagelijkseBezigheden as $bezigheid)
    <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>
    @endforeach

</table>
<hr/>

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Sat', 1)->orderBy('tijd', 'asc')->get();
?>

<h4>Zaterdag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>
    
    @foreach($dagelijkseBezigheden as $bezigheid)
    <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>
    @endforeach

</table>
<hr/>

<?php
$dagelijkseBezigheden = DB::table('dagelijks')->where('Sun', 1)->orderBy('tijd', 'asc')->get();
?>
<h4>Zondag</h4>
<table class="table table-sm table-striped">
    <tr>
        <th style="text-align: center;">Tijd</th>
        <th style="text-align: center;">Titel</th>
        <th style="text-align: center;">Boodschap</th>
        <th></th>
    </tr>
    
    @foreach($dagelijkseBezigheden as $bezigheid)
    <?php $tijd = Date('H:i', strtotime($bezigheid->tijd)); ?>
        <td style="width:75px; text-align: center;"><?php echo $tijd; ?></td>
        <td style="width:200px; text-align: center;">{{$bezigheid->title}}</td>
        <td style="width:600px; text-align: center;">{{$bezigheid->msg}}</td>
        <td style="width: 50px;"><a href="../dagelijks/{{$bezigheid->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
    </tr>
    @endforeach

</table>

<br/>
<br/>
<br/>
<a href="../dagelijks" class="btn btn-secondary">Terug</a>


<br/>
@endsection