@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
   
        
<div class="col-md-6">
    <div class="form-group  has-feedback">
        <div class='modal-title text-center form-title'><h5>Sveiki, {{ Auth::user()->username }} </h5> </div>
    </div>

    <div class="form-group has-feedback">
        <div class="col-xs-12">
        <a href="{{route('profile.create', Auth::user()->id )}}">  <button type="submit" class="btn btn-green btn-block btn-flat">
        Sukurti naują nario anketą</button></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
     
            <th scope="col"> <h5>Vardas </h5></th>
            <th scope="col"> <h5>Pavardė </h5> </th> 
            <th scope="col"> <h5>Gimimo data</h5></th>
            <th scope="col"> <h5>Adresas </h5></th>  
            <th scope="col"> <h5>Narystė iki </h5> </th> 
            <th></th>
            <th></th>
            <th></th>
             <tr scope="row">
                @foreach($getuserbyid->hasprofile as $value)
                <td>{{$value->name}}</td>
                <td>{{$value->surname}}</td>
                <td>{{$value->birthday}}</td>
                <td>{{$value->address}}</td>
                    @if ($value->expirationDate == "1770-07-07") 
                    <td> Neaktyvi </td>
                    @else
                    <td class=col-md-3> {{$value->expirationDate}} </td>

                    @endif
                    
                    <td><a href="{{route('profile.edit', $value->id)}}"> <button  type="button" class="btn btn-green">Taisyti </button></a></td>
                    <td><button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete">Ištrinti </button></td> 
                    <td><a href=""> <button  type="button" class="btn btn-primary">Apmokėti už {{$value->name}}</button></a></td>
                    </tr>


                @endforeach
            </tr>
        </table>

    </div>
</div>
</div>  
<div class="modal fade" id="delete" role="dialog">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="text-center form-title">Ar tikrai norite ištrinti nario anketą?</h4>
                </div>
                
                <div class="modal-body">
                    <div class = "row">
                        <div class= "col-md-6">
                    <button type="button" style= "width:150px;" class="btn btn-green" data-dismiss="modal">Atšaukti</button>
                        </div>
                        <div class= "col-md=6">
                    <form action="{{route('profile.delete', $value->id)}}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style= "width:150px;" class="btn btn-danger"> Taip </button>
                    </form>
                        </div>
                    <div>
                </div>
            </div>
            </div>
        </div>
        </div>

@endsection