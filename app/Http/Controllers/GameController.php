<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('games.index');
    }


    public function gameStart(Request $request)
    {
        session()->forget('answers');
        session()->forget('current_question_index');

        $questions = collect([
            [
                'id' => 1,
                'difficulty' => 'easy',
                'building' => 'masjid',
                'spotImage' => 'masjid/(1).jpg',
                'mapImage' => 'masjid_map.png',
                'answerX' => 100,
                'answerY' => 200,
            ],
            [
                'id' => 2,
                'difficulty' => 'easy',
                'building' => 'asrama',
                'spotImage' => 'asrama/(1).jpg',
                'mapImage' => 'asrama_map.png',
                'answerX' => 265,
                'answerY' => 109,
            ],
            [
                'id' => 3,
                'difficulty' => 'easy',
                'building' => 'asrama',
                'spotImage' => 'asrama/(6).jpg',
                'mapImage' => 'asrama_map.png',
                'answerX' => 120,
                'answerY' => 220,
            ],
            [
                'id' => 4,
                'difficulty' => 'easy',
                'building' => 'asrama',
                'spotImage' => 'asrama/(5).jpg',
                'mapImage' => 'asrama_map.png',
                'answerX' => 120,
                'answerY' => 220,
            ],
            [
                'id' => 5,
                'difficulty' => 'easy',
                'building' => 'lapangan',
                'spotImage' => 'lapangan/(1).jpg',
                'mapImage' => 'lapangan_map.png',
                'answerX' => 140,
                'answerY' => 240,
            ],
            [
                'id' => 6,
                'difficulty' => 'medium',
                'building' => 'masjid',
                'spotImage' => 'masjid/(2).jpg',
                'mapImage' => 'masjid_map.png',
                'answerX' => 160,
                'answerY' => 260,
            ],
            [
                'id' => 7,
                'difficulty' => 'medium',
                'building' => 'asrama',
                'spotImage' => 'asrama/(2).jpg',
                'mapImage' => 'asrama_map.png',
                'answerX' => 180,
                'answerY' => 280,
            ],
            [
                'id' => 8,
                'difficulty' => 'medium',
                'building' => 'lapangan',
                'spotImage' => 'lapangan/(2).jpg',
                'mapImage' => 'lapangan_map.png',
                'answerX' => 200,
                'answerY' => 300,
            ],
            [
                'id' => 9,
                'difficulty' => 'hard',
                'building' => 'masjid',
                'spotImage' => 'masjid/(3).jpg',
                'mapImage' => 'masjid_map.png',
                'answerX' => 220,
                'answerY' => 320,
            ],
            [
                'id' => 10,
                'difficulty' => 'hard',
                'building' => 'asrama',
                'spotImage' => 'asrama/(3).jpg',
                'mapImage' => 'asrama_map.png',
                'answerX' => 240,
                'answerY' => 340,
            ],
            [
                'id' => 11,
                'difficulty' => 'hard',
                'building' => 'lapangan',
                'spotImage' => 'lapangan/(3).jpg',
                'mapImage' => 'lapangan_map.png',
                'answerX' => 260,
                'answerY' => 360,
            ],
            [
                'id' => 12,
                'difficulty' => 'hard',
                'building' => 'masjid',
                'spotImage' => 'masjid/(4).jpg',
                'mapImage' => 'masjid_map.png',
                'answerX' => 280,
                'answerY' => 380,
            ],
        ]);

        $buildingType = $request->building;
        $difficultyType = $request->difficulty;

        if (!$buildingType || !$difficultyType) {
            return redirect()->route('game.menu')->with('error', 'Please select a building and difficulty.');
        }

        $data = $questions->where('building', $buildingType)->where('difficulty', $difficultyType)->take(3);

        session(['questions' => $data->values()->all()]);
        session(['current_question_index' => 0]);

        return view('games.playGame', ['question' => $data->first()]);
    }

    public function saveAnswer(Request $request) {
        try {
            // Lakukan validasi jika diperlukan
            $validated = $request->validate([
                'questionId' => 'required|integer',
                'userAnswerX' => 'required|numeric',
                'userAnswerY' => 'required|numeric',
                'scaleX' => 'required|numeric',
                'scaleY' => 'required|numeric',
                'score' => 'required|integer|max:1000|min:0',
            ]);

            // Simpan jawaban ke session atau database
            $answers = session('answers', []);
            $currentQuestionIndex = session('current_question_index', 0);

            // Save the current answer to the session
            $answers[$currentQuestionIndex] = [
                'question_id' => $validated['questionId'],
                'user_answer_x' => $validated['userAnswerX'],
                'user_answer_y' => $validated['userAnswerY'],
                'scale_x' => $validated['scaleX'],
                'scale_y' => $validated['scaleY'],
                'score' => $validated['score'],
            ];

            session(['answers' => $answers]);
            session(['current_question_index' => $currentQuestionIndex + 1]);

            // change route to nextQuestion
            return response()->json(['status' => 'success', 'message' => 'Answer saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
    }

    // public function saveAnswer(Request $request)
    // {
    //     try {
    //         // Lakukan validasi jika diperlukan
    //         $request->validate([
    //             'questionId' => 'required|integer',
    //             'userAnswerX' => 'required|numeric',
    //             'userAnswerY' => 'required|numeric',
    //             'scaleX' => 'required|numeric',
    //             'scaleY' => 'required|numeric',
    //             'score' => 'required|integer',
    //         ]);

    //         dd($request->all());

    //         // $answers = session('answers', []);
    //         // $currentQuestionIndex = session('current_question_index', 0);

    //         // // Save the current answer to the session
    //         // $answers[$currentQuestionIndex] = [
    //         //     'question_id' => $request->input('question_id'),
    //         //     'user_answer' => $request->input('user_answer'),
    //         // ];

    //         // session(['answers' => $answers]);
    //         // session(['current_question_index' => $currentQuestionIndex + 1]);

    //         return redirect()->route('game.nextQuestion');
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    public function nextQuestion()
    {
        $questions = session('questions', []);
        $currentQuestionIndex = session('current_question_index', 0);

        if ($currentQuestionIndex >= count($questions)) {
            return redirect()->route('game.result');
        }

        return view('games.playGame', ['question' => $questions[$currentQuestionIndex]]);
    }

    public function result()
    {
        $answers = session('answers', []);
        $questions = session('questions', []);
        $lastQuestion = $questions[count($questions) - 1];

        return view('games.result', ['answers' => $answers, 'questions' => $questions, 'lastQuestion' => $lastQuestion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}