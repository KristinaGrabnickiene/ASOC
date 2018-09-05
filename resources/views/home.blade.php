@extends('layouts.sea')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">ka rodome prisijungus</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
    Ka rodome prisijungus 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
