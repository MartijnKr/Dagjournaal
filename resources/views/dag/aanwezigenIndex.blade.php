@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Aanwezigen</h3>
<hr>
<?php
$aanwezigen = DB::table('names')->orderBy('created_at', 'desc')->get();
$maxTien    = DB::table('names')->where('tien', DB::raw("(select max(`tien`) from names)"))->pluck('tien');
$minTien    = DB::table('names')->where('tien', DB::raw("(select min(`tien`) from names)"))->pluck('tien');
$maxTwee    = DB::table('names')->where('twee', DB::raw("(select max(`twee`) from names)"))->pluck('twee');
$minTwee    = DB::table('names')->where('twee', DB::raw("(select min(`twee`) from names)"))->pluck('twee');
?>

<table class="table table-sm table-striped">
    <tr>
        <th>datum</th>
        <th>10:00 uur</th>
        <th>14:00 uur</th>
    </tr>

@foreach($aanwezigen as $aanwezig)

    @if($aanwezig->tien > 0)
    <?php 
    $datum  = date('d-m-Y', strtotime($aanwezig->created_at));
    $dagnr  = date('w', strtotime($aanwezig->created_at));
    $dag    = array("zondag", "maandag", "disndag", "woensdag", "donderdag", "vrijdag", "zaterdag");

    if(($maxTien[0] == $aanwezig->tien) || ($minTien[0] == $aanwezig->tien)) {
        $styleTien = "red";
    }else {$styleTien = "black";}
    if(($maxTwee[0] == $aanwezig->twee) || ($minTwee[0] == $aanwezig->twee)) {
        $styleTwee = "red";
    }else {$styleTwee = "black";}
    ?>
    <tr>
        <td>{{$dag[$dagnr]}} {{$datum}}</td>
        <td style="color:<?php echo $styleTien;?>";>{{$aanwezig->tien}}</td>
        <td style="color:<?php echo $styleTwee;?>";>{{$aanwezig->twee}}</td>
    </tr>
    @endif

@endforeach

</table>

@endsection