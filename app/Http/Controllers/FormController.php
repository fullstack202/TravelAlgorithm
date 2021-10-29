<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormAnswer;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::with('questions')/*->where('id', 1)*/ ->get()->toArray();
        return view('questions.form-index', ['forms' => $forms]);
    }

    public function nextQuestion(Request $request)
    {
        try {
            if (isset($request[request()->segment(3)])) {

                FormAnswer::create([
                    'user_id' => auth()->user()->id,
                    'form_id' => request()->segment(2),
                    'question_id' => request()->segment(3),
                    'answer' => $request[request()->segment(3)]
                ]);
            }
            $questions = Form::where('id', request()->segment(2))->with('questions')->get();
            $answeredQuestions = FormAnswer::where([['user_id', auth()->user()->id], ['form_id', request()->segment(2)]])->get();
            $questionsCount = count($questions[0]['questions']);
            $answeredCount = $answeredQuestions->count();
            if ($answeredCount <= $questionsCount) {
                $unansweredQuestions = array_diff_key($questions[0]['questions']->keyBy('id')->toArray(), $answeredQuestions->keyBy('question_id')->toArray());

                if (array_key_first($unansweredQuestions) != null) {
                    $unansweredQuestion = $unansweredQuestions[array_key_first($unansweredQuestions)];
                    return view('questions.index')->with(['question' => $unansweredQuestion, 'form_id' => request()->segment(2)]);
                } else {
                    return redirect('home')->with(['message' => 'Successfully Answered']);
                }

            }
            return redirect('home')->with(['message' => 'Error']);
        } catch (QueryException $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }
}
