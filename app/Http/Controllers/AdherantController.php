<?php

namespace App\Http\Controllers;

use App\Adherant;
use App\Delegate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdherantController extends Controller
{
    

   public function index()
    {
        $adherants = Adherant::all();
        return view('adherant.index',compact('adherants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $delegates = Delegate::all();
        return view('adherant.create',compact('delegates'));
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
            'delegate' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/adherant'))
            {
                mkdir('uploads/adherant',0777,true);
            }
            $image->move('uploads/adherant',$imagename);
        }else{
            $imagename = "default.png";
        }
        $adherant = new Adherant();
        $adherant->delegate_id = $request->delegate;
        $adherant->nom = $request->nom;
        $adherant->prenom = $request->prenom;
        $adherant->email = $request->email;
        $adherant->tel = $request->tel;
        $adherant->image = $imagename;
        $adherant->save();
        return redirect()->route('adherant.index')->with('successMsg','Adherant Successfully Saved');
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
        $adherant = Adherant::find($id);
        $delegates = Delegate::all();
        return view('adherant.edit',compact('adherant','delegates'));
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
            'delegate' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $adherant = Adherant::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/adherant'))
            {
                mkdir('uploads/adherant',0777,true);
            }
            unlink('uploads/adherant/'.$Adherant->image);
            $image->move('uploads/adherant',$imagename);
        }else{
            $imagename = $adherant->image;
        }

        $adherant->delegate_id = $request->delegate;
        $adherant->nom = $request->nom;
        $adherant->prenom = $request->prenom;
        $adherant->email = $request->email;
        $adherant->tel = $request->tel;
        $adherant->image = $imagename;
        $adherant->save();
        return redirect()->route('adherant.index')->with('successMsg','Adherant Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adherant = Adherant::find($id);
        if (file_exists('uploads/adherant/'.$adherant->image))
        {
            unlink('uploads/adherant/'.$adherant->image);
        }
        $adherant->delete();
        return redirect()->back()->with('successMsg','Adherant successfully Deleted');
    }

public function search(Request $request){
        $this->validate($request,[
            'search' => 'required',
            'options' => 'required',
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $adherants = Adherant::where( $option , 'LIKE' , '%'.$str.'%' )
            ->orderBy($option,'asc')
            ->paginate(4);
        return view('adherant.index')->with([ 'adherants' => $adherants ,'search' => true ]);
    }
    

}
