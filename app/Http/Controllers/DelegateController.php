<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delegate;

class DelegateController extends Controller
{
    public function index()
    {
        /**
         *  It works the same as employeescontroller
         *  please see the comments for explaination
         *  on what's going on here.
         */
        
        $delegates = Delegate::Paginate(4);
        return view('delegate.index')->with('delegates',$delegates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
       

        return view('delegate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delegate = new Delegate();
        $this->validateRequest($request,NULL);
        $fileNameToStore = $this->handleImageUpload($request);
        $this->setDelegate($request ,$delegate, $fileNameToStore);
        return redirect('/delegates')->with('info','New Delegate has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delegate = Delegate::find($id);
        return view('delegate.edit')->with('delegate',$delegate);
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
        $this->validateRequest($request,$id);
        
        $delegate = Delegate::find($id);
        
        if($request->hasFile('picture')){

            $fileNameToStore = $this->handleImageUpload($request);
            Storage::delete('public/delegates/'.$delegate->picture);
        }else{
            $fileNameToStore = '';
        }
        
        $this->setDelegate($request, $delegate ,$fileNameToStore);
        return redirect('/delegates')->with('info','selected Delegate has been updated');
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
         *  Check if the Delegate is not the
         *  current authenticated user
         */
        if($id == Auth::user()->id){
            //redirect to Delegates route
            return redirect('/delegates')->with('info','Authenticated Delegate cannot be deleted!');
        }
        
        $delegate = Delegate::find($id);

        //delete the Delegate picture
        Storage::delete('public/Delegates/'.$delegate->picture);
        $delegate->delete();
        return redirect('/delegates')->with('info','selected Delegate has been deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required',
            'options' => 'required',
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $delegates = Delegate::where( $option , 'LIKE' , '%'.$str.'%' )
            ->orderBy($option,'asc')
            ->paginate(4);
        return view('delegate.index')->with([ 'Delegates' => $delegates ,'search' => true ]);
    }

    /**
     *  Validate all the inputs
     */
    private function validateRequest(Request $request, $id)
    {
        $this->validate($request,[
            'Prenom'   =>  'required|min:3',
            'Nom'    =>  'required|min:3',
            //if we are updating Delegate but not changing password.
            'password'     =>  ''.( $id ? 'nullable|min:7' : 'required|min:7' ),
            'username'     =>  'required|unique:Delegates,username,'.($id ? : '' ).'|min:3',
            'email'        =>  'required|email|unique:Delegates,email,'.($id ? : '' ).'|min:7',
            'picture'      =>  ''.($request->hasFile('picture')  ? 'required|image|max:1999' : '')
        ]);
    }

    /**
     * Add or update an Delegate
     */
    private function setDelegate(Request $request , Delegate $delegate , $fileNameToStore){
        $delegate->Prenom = $request->input('Prenom');
        $delegate->Nom = $request->input('Nom');
        $delegate->username = $request->input('username');
        $delegate->email = $request->input('email');
        if($request->input('password') != NULL){
            $delegate->password = bcrypt($request->input('password'));
        }
        if($request->hasFile('picture')){
            $delegate->picture = $fileNameToStore;
        }
        $delegate->save();
    }

    /**
     *  Handle Image Upload
     */
    public function handleImageUpload(Request $request){
        if( $request->hasFile('picture') ){
            
            //get filename with extension
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            
            //get just filename
            $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            
            // get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            
            /**
             * filename to store
             * 
             *  we are appending timestamp to the file name
             *  and prepending it to the file extension just to
             *  make the file name unique.
             */
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //upload the image
            $path = $request->file('picture')->storeAs('public/Delegates' , $fileNameToStore);
        }
        /**
         *  return the file name so we can add it to database.
         */
        return $fileNameToStore;
    }
}
