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

<p class='modal-title text-center form-title'><h1> Naujas dokumento šablonas </h1></p>


<form class="col-md-4" method="post" action= "{{route( 'document.update', $document->id )}}">
        <input type="hidden" name ="profileId" 
        value="{{ ($document) ? $document["id"]: '' }}">
        {{ csrf_field()}}

        {{ csrf_field()}}
       

    <div class="form-group has-feedback">
        <div class="form-group has-feedback">
            <label  class="col-md col-form-label text-md-right"> Pavadinimas  </label>
            <input class="form-control" type="text"  name="name"  
            value="{{ ($document) ? $document["name"]: '' }}">
        </div>
        <div class="form-group has-feedback">
            <label class="col-md col-form-label text-md-right"> Tinkamas amžius nuo:  </label> 
            <input class="form-control"  type="number"  name="age_from" 
            value="{{ ($document) ? $document["age_from"]: '' }}">   
        </div>
        <div class="form-group has-feedback">
            <label  class="col-md col-form-label text-md-right">Tinkamas amžius iki:  </label> 
            <input class="form-control"  type="number"  name="age_till" 
            value="{{ ($document) ? $document["age_till"]: '' }}">   
        </div>
        
        <div class="form-group has-feedback">
            <label  class="col-md col-form-label text-md-right">Dokumento įsigaliojimo data:  </label> 
            <input class="form-control"  type="text"  name="create_date" 
            value="{{ ($document) ? $document["create_date"]: '' }}">   
        </div> 
        <div class="form-group has-feedback">
            <label  class="col-md col-form-label text-md-right">Dokumento pabaiga:  </label> 
            <input class="form-control"  type="text"  name="valid_till" 
            value="{{ ($document) ? $document["valid_till"]: '' }}">   
        </div>     

        <div class="form-group  has-feedback">
                <label  class="col-md col-form-label  text-uppercase text-md-center"> Organizacija </label>  
                    <select class="form-control"  name="organisation_id">
                        
                        @foreach($organisations as $organisation)
                            <option value="{{ ($document) ? $document["organisation_id"]: '' }}">{{ $organisation->name }}</option>
                        @endforeach
                    </select>
            </div>

        <div class="form-group has-feedback">
            <label class="col-md col-form-label text-md-right">Mokestis (nebūtinas) </label> 
            <input class="form-control"  type="number"  name="price" 
            value="{{ ($document) ? $document["price"]: '' }}">   
        </div>

        <div class="form-group has-feedback">
            <label  class="col-md col-form-label text-md-right"> Dokumento tekstas:  </label> 
            <textarea rows="8" cols="100"  type="text"  name="text"> {{ ($document) ? $document["text"]: '' }} </textarea>  
        </div>
        
    </div>  
        <div class="form-group has-feedback">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-green btn-block btn-flat">
                    Išsaugoti
                </button>
            </div>
        </div>

</form>


@endsection