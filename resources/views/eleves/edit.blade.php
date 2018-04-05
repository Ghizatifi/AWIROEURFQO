@extends('layout.master')
@section('content')
<div class="container">

    <div class="row">
    <form method="post" action="{{action('EleveController@update',$id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="nom">nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value={{$eleve->nom}} />
         
        </div>
         <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="prenom">prenom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value={{$eleve->prenom}} />
         
        </div>
       
        <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection