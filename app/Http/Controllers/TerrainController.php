<?php

namespace App\Http\Controllers;

use App\Terrain;
use App\Typeterrain;
use App\Club;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TerrainController extends Controller
{
    

   public function index()
    {
        $terrains = Terrain::all();
        return view('terrain.index',compact('terrains'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeterrains = Typeterrain::all();
        $clubs = CLub::all();
        return view('terrain.create',compact('typeterrains','clubs'));
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
            'typeterrain' => 'required',
            'club' => 'required',
            'nom' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/terrain'))
            {
                mkdir('uploads/terrain',0777,true);
            }
            $image->move('uploads/terrain',$imagename);
        }else{
            $imagename = "default.png";
        }
        $terrain = new Terrain();
        $terrain->typeterrain_id = $request->typeterrain;
        $terrain->club_id = $request->club;
        $terrain->nom = $request->nom;
        $terrain->price = $request->price;
        $terrain->image = $imagename;
        $terrain->save();
        return redirect()->route('terrain.index')->with('info','Terrain Successfully Saved');
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
        $terrain = Terrain::find($id);
        $typeterrains = Typeterrain::all();
        $clubs = Club::all();
        return view('terrain.edit',compact('terrain','typeterrains','clubs'));
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
            'typeterrain' => 'required',
            'club' => 'required',
            'nom' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $terrain = Terrain::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/terrain'))
            {
                mkdir('uploads/terrain',0777,true);
            }
            unlink('uploads/terrain/'.$terrain->image);
            $image->move('uploads/terrain',$imagename);
        }else{
            $imagename = $terrain->image;
        }

        $terrain->typeterrain_id = $request->typeterrain;
        $terrain->club_id = $request->club;
        $terrain->nom = $request->nom;
        $terrain->price = $request->price;
        $terrain->image = $imagename;
        $terrain->save();
        return redirect()->route('terrain.index')->with('info','Terrain Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terrain = Terrain::find($id);
        if (file_exists('uploads/terrain/'.$terrain->image))
        {
            unlink('uploads/terrain/'.$terrain->image);
        }
        $terrain->delete();
        return redirect()->back()->with('info','Terrain successfully Deleted');
    }
    
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required',
            'options' => 'required',
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $terrains = Terrain::where( $option , 'LIKE' , '%'.$str.'%' )
            ->orderBy($option,'asc')
            ->paginate(4);
        return view('terrain.index')->with([ 'terrains' => $terrains ,'search' => true ]);
    }

}
