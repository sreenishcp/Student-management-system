<?php

namespace App\Http\Controllers;

use App\MarkList;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\MarklistRequest;
class MarkListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=0;
        $data['marklists'] = MarkList::with('student')->whereHas('student', function($q) use($status){

            $q->where('active_status',$status);
        
        })->paginate(10);
        return view('mark-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Student::pluck('name','id')->prepend('select','');
        return view('add-marklist',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarklistRequest $request)
    {
        $mark_list = new MarkList($request->all());
        $mark_list->save();
        return redirect('marklist/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MarkList  $markList
     * @return \Illuminate\Http\Response
     */
    public function show(MarkList $markList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarkList  $markList
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkList $markList,$id)
    {
        $data['students']   = Student::pluck('name','id')->prepend('select','');
        $data['mark_list']  = MarkList::with('student')->findOrFail($id);
        return view('add-marklist',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MarkList  $markList
     * @return \Illuminate\Http\Response
     */
    public function update(MarklistRequest $request, MarkList $markList,$id)
    {
        MarkList::where('id',$id)->update(['maths'=>$request->maths,'science'=>$request->science,'history'=>$request->history,'term'=>$request->term]);
        return redirect('/marklist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MarkList  $markList
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarkList $markList,$id)
    {
        MarkList::where('id',$id)->delete();
        return redirect('/marklist');
    }
}
