<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::all();
       return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company=Company::all();
        return view('companies.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate= $request->validate([
            'name'=> 'required | min:5',
            'description' => 'required'
        ]);
        
        $company=Company::create($validate);
       
        if($company){
            return back()->with('success','successfullly');
        }
        else{
            return back()->with('error','Inserting error');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company=Company::find($company->id);
        $projects=Project::all();
        return view('companies.show',compact('company','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
         $company=Company::find($company->id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
       $validatedData=$request->validate([
           'name' => 'required',
           'description'  => 'required'

       ]);
       $companyupdate= Company::whereId($company->id)->update($validatedData);
    // dd($companyupdate);
       if($companyupdate){
           return redirect()->route('company.index')->with('success','updated successfully');
       }
       else{
           return back()->with('error','Updating Error');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
     $deleteCompany=Company::findorFail($company->id);
    if($deleteCompany->delete())
    {
        return redirect()->route('company.index')->with('message','Deleted successfullu');
    }
     else{
         return back()->with('error','You can not delete...');
     }
    }
}
