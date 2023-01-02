<?php

namespace App\Http\Controllers;


use App\Jobs;
use Illuminate\Http\Request;
use Validator;

class JobList extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Jobs::all();

        return view('index',[
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'job_name' => 'string|min:5|max:50',
            'job_description' => 'string|min:5|max:500'
        ];

        $validate = Validator::make($request->all(),$rules);

        //Check if Validate Fails
        if($validate->fails()) {
            return response()->json([
                'result' => 'error',
                'text' => $validate->errors()->first()
            ],400);
        }

        $job = Jobs::create([
            'job_name' => $request->job_name,
            'job_description' => $request->job_description
        ]);

        return response()->json([
            'result' => 'success',
            'text' => 'Job Successfully listed'
        ],201);

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
    public function edit(Request $request, $id)
    {

        $rules = [
            'job_name' => 'string|min:5|max:50',
            'job_description' => 'string|min:5|max:500'
        ];

        $validate = Validator::make($request->all(),$rules);

        if($validate->fails()) {
            return response()->json([
                'result' => 'error',
                'text' => $validate->errors()->first()
            ],400);
        }

        //Check if the Submited ID is Integer
        $validate =Validator::make(['id' => $id],['id' => 'numeric']);

        if($validate->fails()) {
            return response()->json([
                'result' => 'error',
                'text' => $validate->errors()->first()
            ],400);
        }

        $job = Jobs::where('id','=',$id);

        //Check if Job is Exist
        if(!$job) {
            return response()->json([
                'result' => 'success',
                'text' => 'Invalid Job ID'
            ],400);
        }

        //
        $job->update([
            'job_name' => $request->job_name,
            'job_description' => $request->job_description
        ]);

        return response()->json([
            'result' => 'success',
            'text' => 'Job Modified Done'
        ]);
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
        $job = Jobs::where('id','=',$id);

        //Check if Job is Exist
        if(!$job) {
            return response()->json([
                'result' => 'success',
                'text' => 'Invalid Job ID'
            ],400);
        }
        //
        $job->update([
            'done' => true
        ]);

        return response()->json([
            'result' => 'success',
            'text' => 'Job Susccessfully Done'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Jobs::destroy($id);

        return response()->json([
            'result' => 'success',
            'text' => 'Job Susccessfully Deleted'
        ]);
    }
}
