@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Create New adherant </h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('adherant.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                         
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Delegate</label>
                                            <select class="form-control" name="delegate">
                                                @foreach($delegates as $delegate)
                                                    <option value="{{ $delegate->id }}">{{ $delegate->Nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">nom</label>
                                            <input type="text" class="form-control" name="nom">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Prenom</label>
                                            <input type="text" class="form-control" name="prenom">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tel</label>
                                            <input type="text" class="form-control" name="tel">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="image">
                                    </div>
                                </div>
                        </div>
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Add</button>
                        </div>
                         

                    </form>
                </div>
                <div class="card-action">
                    <a href="{{ route('adherant.index') }}">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection