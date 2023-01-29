<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Terrain;
use App\Delegate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
   
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index',compact('reservations'));

    }

     public function create()
    {
        $terrains = Terrain::all();
        $delegates = Delegate::all();
        return view('reservation.create',compact('terrains','delegates'));
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
            'terrain' => 'required',
            'delegate' => 'required' ,
            'datedebut' => 'required' ,
            'datefin' => 'required' ,
            'price' => 'required' ,
           
        ]);
        
        $reservation = new Reservation();
        $reservation->terrain_id = $request->terrain;
        $reservation->delegate_id = $request->delegate;
        $reservation->date_start = $request->datedebut;
        $reservation->date_end = $request->datefin;
        $reservation->price = $request->price;
        $reservation->save();
        return redirect()->route('reservation.index')->with('info','Reservation Successfully Saved');
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
        $reservation = reservation::find($id);
        $Terrains = Terrain::all();
        $delegate= Delegate::all();
        return view('reservation.edit',compact('reservation','terrains','delegates'));
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
            'terrain' => 'required',
            'delegate' => 'required' ,
            'datedebut' => 'required' ,
            'datefin' => 'required' ,
            'price' => 'required' ,
        ]);
        $reservation = Reservation::find($id);  
        $reservation->terrain_id = $request->terrain;
        $reservation->delegate_id = $request->delegate;
        $reservation->date_start = $request->datedebut;
        $reservation->date_end = $request->datefin;
        $reservation->price = $request->price;
        $reservation->save();
        return redirect()->route('reservation.index')->with('info','reservation Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = 	Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('info','reservation successfully Deleted');
    }

    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required',
            'options' => 'required',
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $reservations = reservation::where( $option , 'LIKE' , '%'.$str.'%' )
            ->orderBy($option,'asc')
            ->paginate(4);
        return view('reservation.index')->with([ 'reservations' => $reservations ,'search' => true ]);
    }
    




}
