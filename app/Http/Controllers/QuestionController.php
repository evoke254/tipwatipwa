<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->moduleName = 'questions';
        $this->fields = ['Question'];
    }
    public function index()
    {
        $content = Question::get();
        return view('admin.Questions.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        
          return view('admin.Questions.create');
    }

    public function store(Request $request)
    {
        $insert = Question::create($request->all());
        if (!$insert) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("Question and Answer Saved");
        }   
    }

    public function show(Question $question)
    {
        //
        die();
    }

    public function edit(Question $question)
    {
        return view('admin.Questions.create')->with(['content'=>$question]);
    }

    public function update(Request $request, Question $question)
    {
        $update = $question->update($request->all());
        if (!$update) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("Question and Answer Updated");
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
