<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();

        return view('admin.pages.question.index', compact('questions'));
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
        $imagePath = null;

        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        // image
        if ($request->hasFile('image')) {
            // simpan ke storage dan ambil path nya
            $imagePath = $request->file('image')->store('question-image', 'public');
        }

        Question::create([
            'question_text' => $validated['question_text'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath
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
        $imagePath = $question->image;

        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            if ($question->image && Storage::disk('public')->exists($question->image)) {
                Storage::disk('public')->delete($question->image);
            }

            // simpan
            $imagePath = $request->file('image')->store('question-image', 'public');
        }

        $question->update([
            'question_text' => $validated['question_text'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath
        ]);

        return redirect()->back()->with('success', 'berhasil update question');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        if ($question->image && Storage::disk('public')->exists($question->image)) {
            Storage::disk('public')->delete($question->image);
        }

        $question->delete();

        return redirect()->back()->with('success', 'berhasil delete');
    }
}
