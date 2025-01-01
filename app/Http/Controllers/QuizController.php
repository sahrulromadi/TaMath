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
        // cek apakah user sudah menyelesaikan atau belum
        $isAnswer = Answer::where('user_id', Auth::id())
            ->where('question_id', $question->id)
            ->where('is_correct', true)
            ->first();

        if ($isAnswer) {
            return redirect()->back()->with('info', 'Anda sudah menyelesaikan soal ini!');
        }

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
        // ambil is correct nya
        $isCorrect = $option->is_correct;

        // ambil question nya buat route
        $question = Question::findOrFail($validated['question_id']);

        // simpan jawaban
        Answer::create([
            'user_id' => Auth::id(),
            'question_id' => $validated['question_id'],
            'option_id' => $validated['selected_option'],
            'is_correct' => $isCorrect
        ]);

        if ($isCorrect) {
            return redirect()->route('list-soal', $question->category->name)->with('success', 'Jawaban anda benar!');
        } else {
            return redirect()->back()->with('error', 'Jawaban anda salah!');
        }
    }
}
