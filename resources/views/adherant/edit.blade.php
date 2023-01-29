@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Update Adherant</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{ route('adherant.update',$adherant->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Delegate</label>
                                            <select class="form-control" name="delegate">
                                                @foreach($delegates as $delegate)
                                                    <option {{$delegate->id == $adherant->delegate->id ? 'selected' : '' }} value="{{ $delegate->id }}">{{ $delegate->Nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                     <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nom</label>
                                            <input type="text" class="form-control" value="{{ $adherant->nom }}" name="nom">
                                        </div>
                                    </div>
                                </div>
                                  
                                   <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Prenom</label>
                                            <input type="text" class="form-control" value="{{ $adherant->prenom }}" name="prenom">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" value="{{ $adherant->email }}" name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tel</label>
                                            <input type="text" class="form-control" value="{{ $adherant->tel }}" name="tel">
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
                    <a href="/adherant ">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection