<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typeterrain;

class TypeterrainController extends Controller
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
         *  it's retrieving all rows from typeterrains table.
         *  we can also use 'All' instead of paginate which will return
         *  all rows from typeterrains table.
         */
        
        $typeterrains = Typeterrain::orderBy('Type_name','asc')->Paginate(4);
        
        /**
         *  we can also do orderBy('Type_name,'desc') which means it'll return
         *  rows in descending order.
         */

        /**
         *  returning the view with data which is $typeterrains.
         *  if we are returning an array than we'll use,
         *  return view('myview')->with($array);
         */

        return view('sys_mg.typeterrains.index')->with('typeterrains',$typeterrains);
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
         *  just a form for creating a new Typeterrain
         */

        return view('sys_mg.typeterrains.create');
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
         *  unique:typeterrains means it should be unique to Type_name
         *  in typeterrains table (note that input name and column name 
         *  should be same)
         */
        
        $this->validate($request,[
            'Type_name' => 'required|min:4|unique:typeterrains'
        ]);

        /**
         *  create new Typeterrain.
         *  add value(s) to it's fields.
         *  and save (store it to the database).
         */
        
        $Typeterrain = new Typeterrain();
        $Typeterrain->Type_name = $request->input('Type_name');
        $Typeterrain->save();
        
        /**
         *  redirect us to the /typeterrains route with a message.
         *  this message will make a toast that we have created in
         *  inc/alert view which is included in layouts/app view.
         *  see the inc/alert view
         */
        
         return redirect('/typeterrains')->with('info','Typeterrain has been Created!');
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
         *  single Typeterrain(resource) in a different view.
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
         *  find a Typeterrain(resource) by it's id which
         *  is coming from our route.
         */
        
         $Typeterrain = Typeterrain::find($id);
        
         /**
         *  return the view with the specified resource.
         */
        
         return view('sys_mg.typeterrains.edit')->with('Typeterrain',$Typeterrain);
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
            'Type_name' => 'required|unique:typeterrains,Type_name,'.$id.'|min:4'
        ]);
        
        /**
         *  it's the same as creating a new resource,
         *  but we are modifying an existing resource
         *  so first we'll find it by it's id then, save it. 
         */
        
        $Typeterrain = Typeterrain::Find($id);
        $Typeterrain->Type_name = $request->input('Type_name');
        $Typeterrain->save();

        /**
         *  redirecting with a message.
         */
        return redirect('/typeterrains')->with('info','Selected Typeterrain has been updated!');
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
        $Typeterrain = Typeterrain::find($id);
        $Typeterrain->delete();
        return redirect('/typeterrains')->with('info','Selected Typeterrain has been Deleted!');
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
        $typeterrains = Typeterrain::where( 'Type_name' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('Type_name','asc')
            ->paginate(4);
        return view('sys_mg.typeterrains.index')->with([ 'typeterrains' => $typeterrains ,'search' => true ]);
    }
}
