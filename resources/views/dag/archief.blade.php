@extends('layout.app')

@section('content')

<h3 style="text-align: center;">Archief</h3>
<hr>

@foreach($namen as $naam)
<a href="archief/{{$naam->id}}" class="btn btn-secondary btn-lg btn-block">Dagjournaal van {{$naam->created_at->format('d-m-Y')}}</a>

@endforeach

<br/>
<div style="width: 20%;margin: 0 auto;">
{{$namen->links()}}
</div>

@endsection