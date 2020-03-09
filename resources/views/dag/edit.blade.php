@extends('layout.app')

@section('content')
<h6 style="float: right;"><?php echo date('d-m-Y') ?></h6>
<h3>Dagjournaal</h3>
<br>

<!--Namen gedeelte-->
<form style="display:inline-block;" method="post" action="{{ action('NamesController@update', $naam->id) }}" accept-charset="UTF-8">
    @csrf
    <input name="tien" type="hidden" value="{{$naam->tien}}">
    <input name="twee" type="hidden" value="{{$naam->twee}}">
    <table>
        <tr>
            <td>Nachtdienst</td>
        <td style="width:285px;"><input class="form-control" type="text" name="nachtdienst" autocomplete="off" value="{{$naam->nacht}}"></td>
        </tr>
        <tr>
            <td>Ochtendienst</td>
            <td><input class="form-control" type="text" name="ochtenddienst" autocomplete="off" value="{{$naam->ochtend}}"></td>
        </tr>
        <tr>
            <td>Middagdienst</td>
            <td><input class="form-control" type="text" name="middagdienst" autocomplete="off" value="{{$naam->middag}}"></td>
        </tr>
        <tr>
                <input name="_method" type="hidden" value="PUT">
            <td><input type="submit" class="btn btn-secondary" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<?php 
$dag = date("D");
if(($dag != "Sat") && ($dag != "Sun")) {
    $block = "inline-block";
}else{$block = "none";}
?>

<form style="display:<?php echo $block; ?>;float:right; width:10%" method="post" action="{{ action('NamesController@update', $naam->id) }}" accept-charset="UTF-8">
    @csrf
    <input name="nachtdienst" type="hidden" value="{{$naam->nacht}}">
    <input name="ochtenddienst" type="hidden" value="{{$naam->ochtend}}">
    <input name="middagdienst" type="hidden" value="{{$naam->middag}}">
    <table>
        <tr>
            <th colspan="2" style="text-align:center;">Aanwezigen</th>
        </tr>
        <tr>
            <td style="text-align:center;">10:00</td>
            <td style="text-align:center;">14:00</td>
        </tr>
        <tr>
            <td style="width:50px;"><input class="form-control form-control-sm" type="text" name="tien" autocomplete="off" maxlength="4" value="{{$naam->tien}}"></td>
            <td style="width:50px;"><input class="form-control form-control-sm" type="text" name="twee" autocomplete="off" maxlength="4" value="{{$naam->twee}}"></td>
        </tr>
        <tr>
                <input name="_method" type="hidden" value="PUT">
            <td colspan="2" style="text-align:center;"><input type="submit" class="btn btn-secondary btn-sm" name="send" value="Opslaan"></td>
        </tr>
    </table>
</form>

<br/>
<br/>

@include('layout.messages')

<?php
// Dagelijkse bezigheden (alerts buttons)
date_default_timezone_set("CET");
$nu         = date("H:i");
$nuIf       = date("H:i:s");
$dag        = date("D");
$vandaag    = date('Y-m-d');
$bezig      = DB::table('dagelijks')->where($dag, 1)->orderBy('tijd', 'desc')->get(); 
?>

@foreach($bezig as $bez)
<?php 
 $tijdBez = Date('H:i', strtotime($bez->tijd));

 $tijdJSU = Date('H', strtotime($bez->tijd));
 $tijdJSM = Date('i', strtotime($bez->tijd));
?>

@if (($nu >= $tijdBez) && ($nu < "23:59") && ($bez->done != $vandaag))
<form method="post" action="{{ action('DagelijksController@updateFromEdit', $bez->id) }}" accept-charset="UTF-8">
        @csrf
        <div class="alert alert-danger dangerAlert" style="overflow: auto;" role="alert">
            {{$tijdBez}} - <strong>{{$bez->title}}</strong> - {{$bez->msg}}
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="done" value="<?php echo $vandaag; ?>">
        <input type="submit" class="btn btn-outline-danger btn-sm alertBtn" style="float:right;" name="send" value="&times;">
        </div>
</form>
<hr/>
@endif
@endforeach

<br/>
<?php
// Bijzonderheden toevoegen
$datumFormat    = Date('Y-m-d');
$post           = DB::table('bijzonders')->whereDate('created_at', $datumFormat)->orderBy('tijd', 'asc')->get(); 
?>
<form method="post" action="{{ action('BijzondersController@store') }}" accept-charset="UTF-8">
    @csrf
    <table class="table table-sm table-striped" style="width:100%;">
        <tr>
            <th colspan="3">Bijzonderheden</th>
        </tr>

        @foreach($post as $posts)
        <?php $tijd = Date('H:i', strtotime($posts->tijd)); ?>
        <tr>
            <td style="width: 50px;"><?php echo $tijd; ?></td>
            <td>{{$posts->bijzonderheden}}</td>
            <td style="width: 50px;"><a href="../../bijzonder/{{$posts->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
        </tr>
        @endforeach
        
    </table>
            <input class="form-control form-control-sm" type="text" id="bijzonder" name="bijzonderheden" autocomplete="off" required><br/>
            <input type="submit" class="btn btn-secondary" name="send" value="Opslaan"/>
</form>
<br/>

<?php
// Haalt tijd uit DB en word klaar gemaakt om naar JS te sturen voor refresh van de page.
$tijdArray = DB::table('dagelijks')->where($dag, 1)->orderBy('tijd', 'desc')->pluck('tijd')->toArray();

$arrLength = count($tijdArray);

if(count($tijdArray) > 0){
    for($i = 0; $i < $arrLength; $i++){
        if($nuIf < $tijdArray[$i]){
            $volgende = $tijdArray[$i];
        }
    }
}
if(!empty($volgende)){
$tijdJSU = Date('H', strtotime($volgende));
$tijdJSM = Date('i', strtotime($volgende));
}

// Laatste bijzondeheid voor sessionstorage
$laatsteBijzonderheid = DB::table('bijzonders')->orderBy('id', 'desc')->pluck('bijzonderheden')->first();
?>

<script>
    function refreshAt(hours, minutes, seconds) {
        var now     = new Date();
        var then    = new Date();
        
        if(now.getHours() > hours ||
            (now.getHours() == hours && now.getMinutes() > minutes) ||
            now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
            then.setDate(now.getDate() + 1);
        }
        then.setHours(hours);
        then.setMinutes(minutes);
        then.setSeconds(seconds);
        
        var timeout = (then.getTime() - now.getTime());
        setTimeout(function() { window.location.reload(true); }, timeout);
    }
    
    var uur = "<?php if(!empty($tijdJSU)){ echo $tijdJSU;}else{ echo 00; } ?>";
    var min = "<?php if(!empty($tijdJSU)){ echo $tijdJSM;}else{ echo 00; } ?>";

    var u = parseInt(uur);
    var m = parseInt(min);

    // Tussen haakjes de tijden om de refreshen.
    refreshAt(u,m,00);
    refreshAt(00,00,01);

    // Redirect naar create.
    var d       = new Date();
    var nuUur   = d.getHours();
    var nuMin   = d.getMinutes();
    var nuSec   = d.getSeconds();
    
    if((nuUur == 00) && (nuMin == 00) && (nuSec == 01)){
        window.location.href = "../create";
    }

    // Refresh elk uur.
    refreshAt(nuUur++,00,01);

    // Bewaart de data in text veld van bijzonderheden voor reload.
    var laatste = "<?php echo $laatsteBijzonderheid; ?>";

    window.onload = function() {
        var bijzonder = sessionStorage.getItem('bijzonder');
        if (bijzonder == laatste) return;
        if (bijzonder !== null) $('#bijzonder').val(bijzonder);
    }
    window.onbeforeunload = function() {
        sessionStorage.setItem("bijzonder", $('#bijzonder').val());
    }

</script>
@endsection