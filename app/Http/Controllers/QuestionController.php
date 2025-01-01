<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $questions = Question::where('category_id', $category->id)->get();

        return view('admin.pages.question.index', compact('questions', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',

            // options
            'options' => 'required|array|min:2|max:4', // array 
            'options.*' => 'required|string|max:255', // elemen dari array nya
            'correct_option' => 'required|min:1|max:1'
        ]);

        // create question
        $question = Question::create([
            'question_text' => $validated['question_text'],
            'category_id' => $validated['category_id'],
        ]);

        // create option
        foreach ($validated['options'] as $key => $optionText) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $optionText,
                'is_correct' => $key == $validated['correct_option'],
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil membuat question');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $categories = Category::all();

        return view('admin.pages.question.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',

            // options
            'options' => 'required|array|min:2|max:4', // array 
            'options.*' => 'required|string|max:255', // elemen dari array nya
            'correct_option' => 'required|min:1|max:1'
        ]);

        $question->update([
            'question_text' => $validated['question_text'],
            'category_id' => $validated['category_id'],
        ]);

        // delete option agar bisa di create baru lagi
        $question->options()->delete();

        // create option
        foreach ($validated['options'] as $key => $optionText) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $optionText,
                'is_correct' => $key == $validated['correct_option'],
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil update question');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {
            $question->delete();

            return redirect()->back()->with('success', 'Berhasil delete');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal delete');
        }
    }
}
