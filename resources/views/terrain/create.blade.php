@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Create New Terrain </h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('terrain.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Type</label>
                                            <select class="form-control" name="typeterrain">
                                                @foreach($typeterrains as $typeterrain)
                                                    <option value="{{ $typeterrain->id }}">{{ $typeterrain->Type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Club</label>
                                            <select class="form-control" name="club">
                                                @foreach($clubs as $club)
                                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <textarea class="form-control" name="nom"></textarea>
                                        </div>
                                    </div>
                                </div>

                              <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Price</label>
                                            <input type="number" class="form-control" name="price">
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
                    <a href="{{ route('terrain.index') }}">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection