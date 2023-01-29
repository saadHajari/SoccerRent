@extends('layouts.app')
@section('content')
@can('isAdminGlobal')
    <br>
    <div>
        <div class="row white-text">
            <a href="/admins" class="white-text">
                <div class="mx-20 card-panel pink lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Admins</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(3)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/clubs" class="white-text">
                <div class="mx-20 card-panel teal lighten-1 col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">public</i>
                            <h6 class="no-padding txt-md">Clubs</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(3)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/terrain" class="white-text">
                <div class="mx-20 card-panel red lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">terrain</i>
                            <h6 class="no-padding txt-md">Terrain</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(3)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/villes" class="white-text hide-on-small-only">
                <div class="mx-20 card-panel purple lighten-1 col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">location_city</i>
                            <h6 class="no-padding txt-md">Ville</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(2)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/adherant" class="white-text">
                <div class="mx-20 card-panel light-blue col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person_outline</i>
                            <h6 class="no-padding txt-md">Adherant</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(2))</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/delegates" class="white-text hide-on-small-only">
                <div class="card-panel green col s8 offset-s2 m4 l4 xl2 mx-20">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person_outline</i>
                            <h6 class="no-padding txt-md">Delegué</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(2)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/chart" class="white-text hide-on-small-only">
                <div class="card-panel blue col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 mx-20">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">show_chart</i>
                            <h6 class="no-padding txt-md">Charts</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(5)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/maileclipse/mailables" class="white-text hide-on-small-only">
                <div class="mx-20 card-panel orange col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">mail</i>
                            <h6 class="no-padding txt-md">Mail Tools </h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(1)</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
 @endcan

@can('isAdminClub')
<br>
    <div>
        <div class="row white-text">
            <a href="/clubs" class="white-text">
                <div class="mx-20 card-panel pink lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">public</i>
                            <h6 class="no-padding txt-md">Clubs</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(3)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/reservation" class="white-text">
                <div class="mx-20 card-panel teal lighten-1 col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">shopping_basket</i>
                            <h6 class="no-padding txt-md">Reservation</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(0)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/terrain" class="white-text">
                <div class="mx-20 card-panel red lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">terrain</i>
                            <h6 class="no-padding txt-md">Terrain</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(1)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/villes" class="white-text hide-on-small-only">
                <div class="mx-20 card-panel purple lighten-1 col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">location_city</i>
                            <h6 class="no-padding txt-md">Ville</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(2)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/adherant" class="white-text">
                <div class="mx-20 card-panel light-blue col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person_outline</i>
                            <h6 class="no-padding txt-md">Adherant</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(2))</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/delegates" class="white-text hide-on-small-only">
                <div class="card-panel green col s8 offset-s2 m4 l4 xl2 mx-20">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person_outline</i>
                            <h6 class="no-padding txt-md">Delegué</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(2)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/chart" class="white-text hide-on-small-only">
                <div class="card-panel blue col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 mx-20">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">show_chart</i>
                            <h6 class="no-padding txt-md">Charts</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(5)</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/maileclipse/mailables" class="white-text hide-on-small-only">
                <div class="mx-20 card-panel orange col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">mail</i>
                            <h6 class="no-padding txt-md">Mail Tools</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total(1)</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

   
 


 @endcan


@endsection