@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

@guest
@else
 @if(Auth::user()->role == "1")
 <a href="{{ route('document.create') }}"><button  type="button" class="btn btn-dark btn-lg"> 
Sukurti naują dokumento šabloną</button>
</a> 
@endif
@endguest 
<p class="text-par"><h1> Dokumentų šablonai:  </h1></p>
        <div class=row>
        <div class="col-md-12">
        
        <table class="table table-striped">
        <th> Nr. </th>
        <th > <h3> Pavadinimas </h3></th>
        <th > <h3>Tekstas </h3> </th> 
        <th>Amžius </th>
        <th>Mokestis</th>      

<!-- Einame per visą duomenų bazę -->
        @foreach($documents as $document)

        <tr scope="row">
        <td> {{$document->id}} </td>
            <td>{{$document->name}}</td>
            <td>{{$document->text}}</td>
            <td>{{$document->age_from}}-{{$document->age_till}}</td>
            <td>{{$document->price}} EUR</td>

        <td><a href="{{route('document.edit', $document->id)}}"> <button  type="button" class="btn btn-green">Taisyti  </button></a></td>
         
        <td>
        <form action="{{ route('document.delete', $document->id) }}" class='delete-form' method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style= "width:150px;" class="btn btn-danger"> Ištrinti </button>
                    </form>
        </td> 
        
        @endforeach
        </table>

        <script>
        $('.delete-form').submit(function() {
            
            return confirm('Ar tikrai norite ištrinti');
        });
        </script>
              


@endsection