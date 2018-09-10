@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

{{-- Klaidu isvedimas pagal laravelio validatoriu--}}
       @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<p class='modal-title text-center form-title'><h1> Asociacijos nario anketa: </h1></p>


<form class="col-md-4" method="post" action= "{{ route('profile.store') }}">

        {{ csrf_field()}}

    <div class="form-group has-feedback">
        <div class="form-group has-feedback">
            <label for="email" class="col-md col-form-label text-md-right"> Vardas:  </label>
            <input class="form-control" type="text" placeholder="Vardas" name="name"  value="{{ old('name') }}">
        </div>

        <div class="form-group has-feedback">
            <label for="email" class="col-md col-form-label text-md-right"> Pavardė:  </label> 
            <input class="form-control"  type="text" placeholder="Pavardė" name="surname"value="{{ old('surname') }}">   
        </div>

        <div class="form-group has-feedback">
            <label for="email" class="col-md col-form-label text-md-right">  Gimtadienis:   </label>
            <input class="form-control"  type="text" placeholder="1970-07-07" name="birthday" value="{{ old('birthday') }}">   
        </div>

        <div class="form-group has-feedback">
            <label for="email" class="col-md col-form-label text-md-right">  Telefono numeris: </label>  
            <input class="form-control"  type="text" placeholder="868612345" name="phone" value = "{{ old('phone') }}">   
         </div>

        <div class="form-group has-feedback">
            <label for="email" class="col-md col-form-label text-md-right">   Adresas:  </label>
            <input class="form-control"  type="text" placeholder="Marių g. 7, Kaunas" name="address" value = "{{ old('address') }}">   
        </div>
    </div>  
        <div class="form-group has-feedback">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-green btn-block btn-flat">
                    Įrašyti
                </button>
            </div>
        </div>

</form>


@endsection