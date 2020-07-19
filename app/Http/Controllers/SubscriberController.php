<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $payload = $request->all();
        $payload['status'] = 'active';
        $insert = Subscriber::create($payload);
        if (!$insert) {
                return redirect()
                        ->back()
                        ->withInput()
                        ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect()->back()->withSuccess($payload->email." has been successfully registered. You will receive all our periodic updates");
        }   
    }

    public function show(Subscriber $subscriber)
    {
        //
    }

    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
