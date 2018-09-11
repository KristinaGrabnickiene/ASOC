@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif


 <!--Search -  paieška-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            @if ($profileResults != []  )
                <table class="table table-striped">
                    <th scope="col"> <h5>Vardas </h5></th>
                    <th scope="col"> <h5>Pavardė </h5> </th> 
                    <th scope="col"> <h5>Ar LJKA narys? </h5> </th> 
                    
                    <tr scope="row">
                        @foreach($profileResults as $result)
                            <td>{{$result->name}}</td>
                            <td>{{$result->surname}}</td>
                                @if ($result->expirationDate == "1770-07-07") 
                                <td> Pasibaigusi narystė </td>
                                @else
                                <td > Narys </td>
                                @endif
                    </tr>
                            @endforeach
                </table>
                @else
                <h1> Nieko nera </h1>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center">Asociacijos nario paieška</h2>
          <p class="text-center">Paieška vykdoma visų narių saraše
        <br> Naudokite lietuviškas raides<br>
        Galima ieškoti tik pagal vardą arba tik pagal pavardę </p>
            <div class="cta-2-form text-center">
                <form action="" method="post" >
                {{ csrf_field()}}
                <input type="text"  name="name"  placeholder="Vardas" >
                <input type="text"  name="surname" placeholder="Pavarde" >
                
                <input class="btn btn-green" value="Ieškoti" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<!--Search // paieška-->

@endsection