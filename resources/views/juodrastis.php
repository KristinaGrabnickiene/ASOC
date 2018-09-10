@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
<p class="text-par"><h1> Antraste</h1></p>

<p class="text-name">tesktass</p>

@endsection