<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;

class VilleController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *  We are using Eloquent ORM for database handling.
         *  DB library can also be used, check the docs for more
         *  information.
         */
        
        /**
         *  it's retrieving all rows from villes table.
         *  we can also use 'All' instead of paginate which will return
         *  all rows from villes table.
         */
        
        $villes = Ville::orderBy('ville_name','asc')->Paginate(4);
        
        /**
         *  we can also do orderBy('ville_name,'desc') which means it'll return
         *  rows in descending order.
         */

        /**
         *  returning the view with data which is $villes.
         *  if we are returning an array than we'll use,
         *  return view('myview')->with($array);
         */

        return view('sys_mg.villes.index')->with('villes',$villes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         *  this will simply return the create view which is
         *  just a form for creating a new Ville
         */

        return view('sys_mg.villes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  using laravel's pre-build validation class. 
         *  it's first argument will be Request which is $request
         *  and second argument will be an array which will specify
         *  the validation rules.
         *  format is,
         *  'form field name' => 'rule'
         *  unique:villes means it should be unique to ville_name
         *  in villes table (note that input name and column name 
         *  should be same)
         */
        
        $this->validate($request,[
            'ville_name' => 'required|min:4|unique:villes'
        ]);

        /**
         *  create new Ville.
         *  add value(s) to it's fields.
         *  and save (store it to the database).
         */
        
        $Ville = new Ville();
        $Ville->ville_name = $request->input('ville_name');
        $Ville->save();
        
        /**
         *  redirect us to the /villes route with a message.
         *  this message will make a toast that we have created in
         *  inc/alert view which is included in layouts/app view.
         *  see the inc/alert view
         */
        
         return redirect('/villes')->with('info','Ville has been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         *  you can use this method if you wanna diplay a
         *  single Ville(resource) in a different view.
         */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        /**
         *  find a Ville(resource) by it's id which
         *  is coming from our route.
         */
        
         $Ville = Ville::find($id);
        
         /**
         *  return the view with the specified resource.
         */
        
         return view('sys_mg.villes.edit')->with('Ville',$Ville);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ville_name' => 'required|unique:villes,ville_name,'.$id.'|min:4'
        ]);
        
        /**
         *  it's the same as creating a new resource,
         *  but we are modifying an existing resource
         *  so first we'll find it by it's id then, save it. 
         */
        
        $Ville = Ville::Find($id);
        $Ville->ville_name = $request->input('ville_name');
        $Ville->save();

        /**
         *  redirecting with a message.
         */
        return redirect('/villes')->with('info','Selected Ville has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         *  find the specified resource and delete it.
         *  then redirect us with a message.
         */
        $Ville = Ville::find($id);
        $Ville->delete();
        return redirect('/villes')->with('info','Selected Ville has been Deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $villes = Ville::where( 'ville_name' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('ville_name','asc')
            ->paginate(4);
        return view('sys_mg.villes.index')->with([ 'villes' => $villes ,'search' => true ]);
    }
}

    
