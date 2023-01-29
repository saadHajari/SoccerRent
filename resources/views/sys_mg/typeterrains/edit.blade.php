@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('typeterrains.update',$Typeterrain->id)}}" method="POST">
                            <!--
                                in value attribute of Typeterrain_name input, we are checking
                                if it has a value that we have submitted previously, else set
                                value to actual value that we are getting from $Typeterrain.
                            -->
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">edit</i>
                                <input type="text" name="Typeterrain_name" id="Typeterrain_name" value="{{Request::old('Typeterrain_name') ? : $Typeterrain->Typeterrain_name}}">
                                <label for="Typeterrain_name">Type Terrain</label>
                                <span class="{{$errors->has('Typeterrain_name') ? 'helper-text red-text' : ''}}">{{$errors->first('Typeterrain_name')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/typeterrains">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection