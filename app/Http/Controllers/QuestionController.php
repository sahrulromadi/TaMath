<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();

        return view('admin.pages.question.question-index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.question.question-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|min:3|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        Question::create([
            'question' => $validated['question'],
            'category_id' => $validated['category_id']
        ]);

        return redirect()->back()->with('success', 'berhasil membuat question');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('admin.pages.question.show', compact('question'));
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
            'question' => 'required|string|min:3|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        $question->update([
            'question' => $validated['question'],
            'category_id' => $validated['category_id']
        ]);

        return redirect()->back()->with('success', 'berhasil update question');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->back()->with('success', 'berhasil delete');
    }
}
