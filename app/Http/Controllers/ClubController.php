<?php

namespace App\Http\Controllers;

use App\Club;
use App\Admin;
use App\Ville;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class clubController extends Controller
{
    
   public function index()
    {
        $clubs = Club::all();
        return view('club.index',compact('clubs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::all();
        $villes = Ville::all();
        return view('club.create',compact('admins','villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'admin' => 'required',
            'ville' => 'required' ,
            'name' => 'required' ,
            'adresse' => 'required' ,
            'email' => 'required' ,
            'tel' => 'required' ,
            'fax' => 'required' ,
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/club'))
            {
                mkdir('uploads/club',0777,true);
            }
            $image->move('uploads/club',$imagename);
        }else{
            $imagename = "default.png";
        }
        $club = new Club();
        $club->admin_id = $request->admin;
        $club->ville_id = $request->ville;
        $club->name = $request->name;
        $club->adresse = $request->adresse;
        $club->email = $request->email;
        $club->tel = $request->tel;
        $club->fax = $request->fax;
        $club->image = $imagename;
        $club->save();
        return redirect()->route('club.index')->with('info','club Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::find($id);
        $admins = Admin::all();
        $villes = Ville::all();
        return view('club.edit',compact('club','admins','villes'));
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
        $this->validate($request,[
            'admin' => 'required',
            'ville' => 'required' ,
            'name' => 'required' ,
            'adresse' => 'required' ,
            'email' => 'required' ,
            'tel' => 'required' ,
            'fax' => 'required' ,
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $club = Club::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/club'))
            {
                mkdir('uploads/club',0777,true);
            }
            unlink('uploads/club/'.$club->image);
            $image->move('uploads/club',$imagename);
        }else{
            $imagename = $club->image;
        }

        $club->admin_id = $request->admin;
        $club->ville_id = $request->ville;
        $club->name = $request->name;
        $club->adresse = $request->adresse;
        $club->email = $request->email;
        $club->tel = $request->tel;
        $club->fax = $request->fax;
        $club->image = $imagename;
        $club->save();
        return redirect()->route('club.index')->with('info','Club Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::find($id);
        if (file_exists('uploads/club/'.$club->image))
        {
            unlink('uploads/club/'.$club->image);
        }
        $club->delete();
        return redirect()->back()->with('info','Club successfully Deleted');
    }

    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required',
            'options' => 'required',
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $clubs = Club::where( $option , 'LIKE' , '%'.$str.'%' )
            ->orderBy($option,'asc')
            ->paginate(4);
        return view('club.index')->with([ 'clubs' => $clubs ,'search' => true ]);
    }
    

}
