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
       
        <a href="{{route('profile.create')}}">  <button type="submit" class="btn btn-green btn-block btn-flat">
        Sukurti naują nario anketą</button></a>
       
    </div>
</div>
<br>

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
                   <td> <form action="{{ route('profile.delete', $value->id) }}" class='delete-form' method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style= "width:150px;" class="btn btn-danger"> Ištrinti </button>
                    </form>
                    </td>
                    <td><a href="{{route('profile.documents', $value->id)}}"> <button  type="button" class="btn btn-primary">Tapti nariu </button></a></td>
                    </tr>
             

                @endforeach
            </tr>
        </table>
        <script>
        
        </script>

    </div>
</div>
</div>  
<script>
        $('.delete-form').submit(function() {
            
            return confirm('Ar tikrai norite ištrinti');
        });
        </script>

 <!--Paieška-->
 <section id="cta-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center">Asociacijos nario paieška</h2>
          <p class="cta-2-txt">Paieška vykdoma visų narių saraše</p>
          <div class="cta-2-form text-center">
            <form action="{{ url('/search') }}" method="post" >
            {{ csrf_field()}}
              <input type="text"  name="name"  placeholder="Vardas"  value="{{ old('name') }}" >
              <input type="text"  name="surname"  placeholder="Pavarde"  value="{{ old('surname') }}" >
              
              <input class="btn btn-green" value="Ieškoti" type="submit">
            </form>
          </div>
        </div>
      </div>  
    </div>
  </section>
 <!--Cta-->


@endsection