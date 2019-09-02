<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Auth::check()){
            $companies= Company::where('user_id',Auth::user()->id)->get();
       
            return view('companies.index',compact('companies'));
        }       
        return view('auth.login');
    
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
    if(Auth::check()){
      
        $request->validate([
            'name'=> 'required | min:5',
            'description' => 'required',
            
        ]);

        $company=Company::create([
            'name'=> $request->name,
            'description' =>$request->description,
            'user_id'=>Auth::user()->id,
        ]);
       
        if($company){
            return redirect()->route('company.show',['company'=> $company->id]);
        }
        else{
            return back()->with('error','Inserting error');
        }
    }
    else{
        return redirect('login');
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
       
        return view('companies.show',compact('company'));
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
