@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Links</h3>

<form method="post" action="{{ action('LinksController@store') }}" accept-charset="UTF-8">
    @csrf
    <table class="table">

        @foreach($links as $link)
            <td style="width:80%; text-align: center;"><a href="{{$link->link}}" target="_blank">{{$link->title}}</a></td>
            <td style="width:20%;"><a href="links/{{$link->id}}/edit" class="btn btn-outline-secondary btn-sm" role="button">Bewerken</a></td>
        </tr>
        @endforeach
        
    </table>
</form>
<br/>
<br/>
<a href="links/create" style="float:right;" class="btn btn-secondary" role="button">Nieuwe link</a>

<br/>
@endsection