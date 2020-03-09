@extends('layout.app')

@section('content')

<h3 style="text-align: center;"><b>{{$bedrijf->bedrijf}}</b></h3>
<hr/>
<p>Info: {{$bedrijf->info}}<br/>Opmerkingen: {{$bedrijf->opmerkingen}}<br/>
<a href="{{$bedrijf->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a>
</p>
<hr/>

<form method="post" action="{{ action('CamerasController@store') }}" accept-charset="UTF-8">
        @csrf
        <table class="table table-striped table-sm">
            <tr>
                <th style="text-align: center;width:100px"><a style="color:black;" href="{{$bedrijf->id}}?sort=nr">Camera</a></th>
                <th style="text-align: center;"><a style="color:black;" href="{{$bedrijf->id}}?sort=straat">Straatnaam</a></th>
                <th style="text-align: center;"><a style="color:black;" href="{{$bedrijf->id}}?sort=plaats">Plaats</a></th>
                <th style="text-align: center;width: 150px;"><a style="color:black;" href="{{$bedrijf->id}}?sort=updated_at">Datum</a></th>
                <th></th>
            </tr>
            
            <?php 
            if(empty($_GET)){
                $sort = "nr";
            }else{
            $sort = $_GET['sort'];
            }
            $cam = DB::table('cameras')->where('bedrijf', $bedrijf->bedrijf)->orderBy($sort, 'asc')->get(); 
            ?>

            @foreach($cam as $camera)
            <?php $datum = Date('d-m-Y', strtotime($camera->updated_at)); ?>
            <tr>
                <td style="text-align: center;">{{$camera->nr}}</td>
                <td style="text-align: center;">{{$camera->straat}}</td>
                <td style="text-align: center;">{{$camera->plaats}}</td>
                <td style="text-align: center;">{{$datum}}</td>
                <td style="width: 50px;"><a href="{{$camera->id}}/editCamera" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
            </tr>
            @endforeach

                <td><input class="form-control" type="text" name="nr" autocomplete="off" required></td>
                <td><input class="form-control" type="text" name="straat" autocomplete="off"></td>
                <td><input class="form-control" type="text" name="plaats" autocomplete="off" required></td>
                <td><input name="bedrijf" type="hidden" value="{{$bedrijf->bedrijf}}"></td>
                <td></td>
            </tr>
        </table>
                <input type="submit" class="btn btn-secondary" name="send" value="Opslaan">
    </form>

<br/>

@include('layout.messages')

<br/>
<a href="../cameratoezicht" class="btn btn-secondary">Terug</a>
<br/>


@endsection