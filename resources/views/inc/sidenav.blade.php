<ul id="slide-out" class="sidenav sidenav-fixed grey lighten-4">
    <li>
        <div class="user-view">
            <div class="background">
            </div>
            {{-- Get picture of authenicated user --}}
            <a href="/dashboard"><span class="white-text email"> Bonjour , {{ Auth::user()->username }} </span></a>
            {{-- Get first and last name of authenicated user --}}
            <a href="/dashboard"><span class="white-text name">{{ Auth::user()->first_name }}   {{ Auth::user()->last_name }}</span></a>
            {{-- Get email of authenicated user --}}
            <a href="/dashboard"><span class="white-text email">{{ Auth::user()->email }}</span></a>
            @can('isAdminGlobal')
               <a href=""><span class="white-text email">Admin Global</span></a>
             @endcan
            @can('isAdminClub')
                <a href=""><span class="white-text email">Admin Club</span></a>
            @endcan

        </div>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/dashboard"><i class="material-icons">dashboard</i>Dashboard</a>
    </li>
    @can('isAdminGlobal')
        <li>
        <a class="waves-effect waves-grey" href="/clubs"><i class="material-icons">public </i>Manager Club </a>
        </li>
<li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header"><i class="material-icons pl-15">settings</i><span class="pl-15">Manager System</span></a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="/typeterrains" class="waves-effect waves-grey">
                                <i class="material-icons">view_headline</i>
                                 Type Terrain
                            </a>
                        </li>
                        <li>
                            <a href="/villes" class="waves-effect waves-grey">
                            <i class="material-icons">location_city</i>
                                Ville
                            </a>
                        </li>
                        
                          
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li>
        <a href="/admins" class="waves-effect waves-grey"><i class="material-icons">account_circle</i>Gérer l'admin</a>
    </li>

    <li>
        <a href="/chart" class="waves-effect waves-grey"><i class="material-icons">show_chart</i>charts</a>
    </li>



    <li>
        <a href="/maileclipse/mailables" class="waves-effect waves-grey"><i class="material-icons">mail</i>Mail Service </a>
    </li>

</ul>
        @endcan
@can('isAdminClub')
<li>
        <a class="waves-effect waves-grey" href="/delegates"><i class="material-icons">person </i> Gérer Les Delegués </a>
        </li>
         
       <li>
        <a class="waves-effect waves-grey" href="/reservation"><i class="material-icons">shopping_basket </i> Reservation  Management </a>
        </li>



<li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header"><i class="material-icons pl-15">settings</i><span class="pl-15">System Management</span></a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="/typeterrains" class="waves-effect waves-grey">
                                <i class="material-icons">view_headline</i>
                                 Type Terrain
                            </a>
                        </li>
                        <li>
                            <a href="/terrain" class="waves-effect waves-grey">
                                <i class="material-icons">view_headline</i>
                                 Terrain
                            </a>
                        </li>
                        <li>
                            <a href="/adherant" class="waves-effect waves-grey">
                            <i class="material-icons">person</i>
                                Adherant
                            </a>
                        </li>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li>

    <li>
        <a href="/chart" class="waves-effect waves-grey"><i class="material-icons">show_chart</i>charts</a>
    </li>


    
    <li>
        <a href="/maileclipse/mailables" class="waves-effect waves-grey"><i class="material-icons">mail</i>Mail Service </a>
    </li>

</ul>

@endcan