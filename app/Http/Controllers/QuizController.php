<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function pilihLevel()
    {
        $categories = Category::all();
        return view('user.pages.quiz.pilih-level', compact('categories'));
    }

    public function listSoal(Category $category)
    {
        $questions = $category->questions()->get();

        return view('user.pages.quiz.list-soal', compact('category', 'questions'));
    }

    public function question(Question $question)
    {
        return view('user.pages.quiz.question', compact('question'));
    }

    public function submitAnswer(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'selected_option' => 'required|exists:options,id'
        ]);

        // ambil id option yg dipilih
        $option = Option::findOrFail($validated['selected_option']);

        // ambilk is correct nya
        $isCorrect = $option->is_correct;

        // simpan jawaban
        Answer::create([
            'user_id' => Auth::id(),
            'question_id' => $validated['question_id'],
            'option_id' => $validated['selected_option'],
            'is_correct' => $isCorrect
        ]);

        return redirect()->back();
    }
}
