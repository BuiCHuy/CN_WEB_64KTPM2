<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues=Issue::with('computer')->paginate(5);
        return view('issues.index',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers=Computer::all();
        return view('issues.create',compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required|in:High,Medium,Low',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);
        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success','Issue created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $issue=Issue::findOrFail($id);
        $computers=Computer::all();
        return view('issues.edit',compact('issue','computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required|in:High,Medium,Low',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);
        $issue=Issue::find($id);
        $issue->update($request->all());
        return redirect()->route('issues.index')->with('success','Issue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue=Issue::find($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success','Issue deleted successfully');
    }
}
