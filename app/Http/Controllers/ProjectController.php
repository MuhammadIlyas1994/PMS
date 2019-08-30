<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('projects.index',compact('getProjects'));
    }

    public function getProject(){
       
        $model = Project::query();
        $project=Datatables::of($model)
        ->addColumn('company', function(Project $project) {
            return  $project->company->name;
        })->toJson();
      
        return $project;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $project=Project::all();
       $companies=Company::get();
       return view('projects.create',compact('project','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate=$request->validate([
           'name' => 'required | min:3',
           'description' => 'required',
           'days' => '',
           'company_id' => 'required',
           
       ]);
      if(Project::create($validate))
      {
          return back()->with('success','You have successfully added Project');
      }
      else{
          return back()->with('error','Inserting Error');
      }
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project=Project::findOrFail($project->id);
        $companies=Company::all();
        return view('projects.edit',compact('project','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validate=$request->validate([
            'name' => 'required | min:3',
            'description' => 'required',
            'days' => '',
            'company_id' => 'required',
            
        ]);
       if(Project::whereId($project->id)->update($validate))
       {
           return redirect()->route('projects.index')->with('success','You have successfully added Project');
       }
       else{
           return back()->with('error','Inserting Error');
       }
     
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $projectDelet=Project::finOrFail($project->id);
        $projectDelet->delete();
       
    }
}
