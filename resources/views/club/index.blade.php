@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Manage Club</h4>
    
  <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Clubs
                </div>
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('clubs.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search Clubs</label>
                                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                            </div>
                            <div class="input-field col s12 m6 l4 xl4">
                                <select name="options" id="options">
                                    <option value="name">Nom</option>
                                    <option value="email">Email</option>
                                    <option value="club->ville->ville_name">Ville</option>
                                    <option value="adresse">Adresse</option>
                                    <option value="tel">Tel</option>
                                </select>
                                <label for="options">Search by:</label>
                            </div>
                            <br>
                            <div class="col l2">
                                <button type="submit" class="btn waves-effect waves-light">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
  </div>  
    <div class="row">
        {{-- Show All clubs List as a Card --}}
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>Admin</th>
                                <th>Ville</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="dept-table">
                            {{-- Check if there are any clubs to render in view --}}
                            @if($clubs->count())
                                @foreach($clubs as $key=>$club)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$club->admin->username}} </td>
                                        <td>{{$club->ville->ville_name}} </td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/club/'.$club->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                      <td>{{$club->name}}  </td>
                                       <td>{{$club->tel}}  </td>
                                       <td>{{$club->email}} </td>
                                       <td>{{$club->adresse}} </td>
                                        <td>{{$club->created_at}}</td>
                                        <td>{{$club->updated_at}}</td>
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    {{-- 
                                                        Edit button will navigate us to clubs.edit
                                                        for defining a route you can use route method
                                                        route('route name') or if you want to pass data like
                                                        below then use route('route name',$data)
                                                     --}}
                                                    <a href="{{route('club.edit',$club->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    {{-- 
                                                        Delete button will navigate us to clubs.destroy
                                                     --}}
                                                    <form action="{{route('club.destroy',$club->id)}}" method="POST">
                                                        {{--
                                                            @method('DELETE') is a hidden input that we need
                                                            to make a Delete request because html doesn't support
                                                            DELETE and PUT methods
                                                        --}}
                                                        @method('DELETE')
                                                        {{--
                                                            @csrf() is also a hidden input that renders the csrf token
                                                            for security
                                                        --}}
                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                {{-- if there are no clubs then show this message --}}
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">No clubs found!</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="3">
                                        <a href="/club" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- clubs Table END --}}
                </div>
                
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


{{-- This is the button that is located at the bottom right, that navigates us to department.create view --}}
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('club.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection