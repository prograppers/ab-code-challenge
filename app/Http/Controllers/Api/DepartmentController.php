<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//$parentDepartments = Department::where('parent_id',0)->get();

         //return view('departments.departmentTreeview', compact('parentDepartments'));


        return DepartmentResource::collection(Department::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        //
        $input = $request->all();
        $image_path = '';

        if ($request->hasFile('file')) {
            $image_path = $request->file('file')->store('images', 'public');
        }

        /*$data = Department::create([
            'image' => $image_path,
        ]);*/

        $input['cover_image_path'] = $image_path;
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        $department = Department::create($input);

        return new DepartmentResource($department);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
       // $parentDepartments = Department::where('parent_id',0)->get();

       // return view('departments.departmentTreeview', compact('parentDepartments'));

        return new DepartmentResource($department);
    }


    public function printTree(Department $department)
    {
         $parentDepartments = Department::where('parent_id',0)->get();

        return view('departments.departmentTreeview', compact('parentDepartments'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        //

        $input = $request->all();
        $image_path = '';

        if ($request->hasFile('file')) {
            $image_path = $request->file('file')->store('images', 'public');
        }

        /*$data = Department::create([
            'image' => $image_path,
        ]);*/

        $input['cover_image_path'] = $image_path;

        //$request->validated()
        $department->update($input);

        return new DepartmentResource($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
        $department->delete();

        return response()->noContent();
    }
}
