<?php

namespace App\Http\Controllers;

use App\Models\StudentExam;
use App\Http\Requests\StudentExam\StoreStudentExamRequest;
use App\Http\Requests\StudentExam\UpdateStudentExamRequest;

class StudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreStudentExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentExamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function show(StudentExam $studentExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentExam $studentExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentExamRequest  $request
     * @param  \App\Models\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentExamRequest $request, StudentExam $studentExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentExam $studentExam)
    {
        //
    }
}
