<?php

namespace App\Http\Controllers;

use App\client;
use App\Mail\ClientMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::all();
        return view('admin.client.index' , compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $clients = new client();
        $clients->name = $request-> name;
        $clients->cnic = $request-> cnic;
        $clients->dob = $request-> dob;

        $clients->description = $request->description;

        Mail::to($request->email)->send(new  ClientMail($clients));
        if ($request->hasFile('image'))
        {
            $image1 = $request->file('image');
            $name = time(). 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image1->move($destinationPath,$name);
            $clients->image = 'image/' . $name;
        }
        $clients->save();
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = client::find($id);
        return view('admin.client.edit' , compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = client::find($id);
        $client->name = $request-> name;
        $client->cnic = $request-> cnic;
        $client->dob = $request-> dob;
        $client->description = $request->description;
        if ($request->hasFile('image'))
        {
            $image1 = $request->file('image');
            $name = time(). 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image1->move($destinationPath,$name);
            $client->image = 'image/' . $name;
        }
        $client->update();
        return redirect()->route('client.index')->with('message', 'Record Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        $client->delete();
        return redirect()->route('client.index')->with('error', 'Record Deleted Successfully !');;
    }
}
