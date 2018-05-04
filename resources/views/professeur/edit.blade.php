@extends('layout.master')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
      {!! Form::open(['action' => ['ProfController@update',$prof->id_prof], 'method'=>'POST']) !!}

        {{csrf_field()}}
        <!-- <input name="_method" type="hidden" value="PATCH"> -->
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Professeurs:</label>
            <input type="text" class="form-control" name="nom" value={{$prof->nom}} />
            <input type="hidden" class="form-control" name="id_prof" value={{$prof->id_prof}} />
        </div>
        <div class="form-group">
            <label for="description">Ticket Description:</label>
              <input type="text" class="form-control" name="prenom" value={{$prof->prenom}} />
        </div>
        <!-- <button type="submit" class="btn btn-primary">Update</button> -->
          {!! Form::hidden('_method','PUT') !!}
        {!! Form::submit('update',['class'=> 'btn btn-primary']) !!}


        </form>
    </div>
</div>
@endsection
