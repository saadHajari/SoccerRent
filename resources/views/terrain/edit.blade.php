@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Update Terrain</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{ route('terrain.update',$terrain->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">type</label>
                                            <select class="form-control" name="typeterrain">
                                                @foreach($typeterrains as $typeterrain)
                                                    <option {{$typeterrain->id == $terrain->typeterrain->id ? 'selected' : '' }} value="{{ $typeterrain->id }}">{{ $typeterrain->Type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>

                                <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">club</label>
                                            <select class="form-control" name="club">
                                                @foreach($clubs as $club)
                                                    <option {{$club->id == $terrain->club->id ? 'selected' : '' }} value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>


                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <textarea class="form-control" name="nom">{{ $terrain->nom }}</textarea>
                                        </div>
                                    </div>
                                
                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Price</label>
                                            <input type="number" class="form-control" value="{{ $terrain->price }}" name="price">
                                        </div>
                                    </div>
                                </div>

                      
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                

                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/terrain ">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection