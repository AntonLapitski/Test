<?php
/**
 * Created by PhpStorm.
 * User: tonnes
 * Date: 6/23/20
 * Time: 6:43 PM
 */

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', ['leads' => $leads]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|regex:/^(\+375)[0-9]{9}$/',
            'message' => 'required|min:12'
        ]);

        $lead = new Lead();
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->message = $request->message;
        $lead->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource from storage.
     *
     * @param Request $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|regex:/^(\+375)[0-9]{9}$/',
            'message' => 'required|min:12'
        ]);

        $lead = Lead::find($id);
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->message = $request->message;
        $lead->is_closed = $request->closed;
        $lead->save();

        return redirect()->route('leads.index');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::find($id);
        return view('leads.edit', ['lead' => $lead]);
    }

    /**
     * Show the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::find($id);
        return view('leads.show', ['lead' => $lead]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::find($id);
        $lead->delete();
        return redirect()->back();
    }

}
