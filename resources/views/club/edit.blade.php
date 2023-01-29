@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Update Club</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{ route('club.update',$club->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Admin</label>
                                            <select class="form-control" name="admin">
                                                @foreach($admins as $admin)
                                                    <option {{$admin->id == $club->admin->id ? 'selected' : '' }} value="{{ $admin->id }}">{{ $admin->username }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                             <div class="form-group label-floating">
                                            <label class="control-label">Ville</label>
                                            <select class="form-control" name="ville">
                                                @foreach($villes as $ville)
                                                    <option {{$ville->id == $club->ville->id ? 'selected' : '' }} value="{{ $ville->id }}">{{ $ville->ville_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <textarea class="form-control" name="name">{{ $club->name }}</textarea>
                                        </div>
                                    </div>
                                </div>
                        
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Adrese</label>
                                            <textarea class="form-control" name="adresse">{{ $club->adresse }}</textarea>
                                        </div>
                                    </div>
                                </div>
                        
                       <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <textarea class="form-control" name="email">{{ $club->email }}</textarea>
                                        </div>
                                    </div>
                                </div>
                        

                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tel</label>
                                            <input type="number" class="form-control" value="{{ $club->tel}}" name="tel">
                                        </div>
                                    </div>
                                </div>


                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fax</label>
                                            <input type="number" class="form-control" value="{{ $club->fax}}" name="fax">
                                        </div>
                                    </div>
                                </div>

                        <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>

                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/club ">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection