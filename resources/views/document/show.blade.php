@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    
@foreach($documents as $document)
                <td>{{$document->name}}</td>
                <td>{{$document->id}}</td>
               
                   
                <td><a href=""> <button  type="button" class="btn btn-green">Taisyti </button></a></td>
                <td> <form action="" class='delete-form' method="POST">
                {{ csrf_field() }}
                <button type="submit" style= "width:150px;" class="btn btn-danger"> Ištrinti </button>
                </form>
                </td>
                <td><a href=""> <button  type="button" class="btn btn-primary">Tapti nariu </button></a></td>
                </tr>
            

                @endforeach