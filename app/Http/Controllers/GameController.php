<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\History;
use App\Models\MiniMap;
use App\Models\Question;
use App\Models\QuestionMapHistory;
use App\Models\User;
use App\Services\BadgeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    protected $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
        // $this->badgeService->checkAndAwardBadges(auth()->user(), $totalScore, $totalMap);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $highScores = History::where('userId', auth()->user()->id)->orderBy('score', 'desc')->first();
            $user = User::findOrFail(auth()->user()->id); // Ambil pengguna yang terautentikasi

            return view('games.index', compact('highScores', 'user'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    // public function completeMap(Request $request)
    // {
    //     $user = $request->user();
    //     $totalScore = $user->total_score; // Misalnya total_score disimpan di model User
    //     $totalMap = $user->maps()->count(); // Misalnya ada relasi maps di model User
    //     $lastMap = $request->input('last_map'); // Ambil lokasi terakhir dari request
    //     $difficulty = $request->input('difficulty'); // Ambil tingkat kesulitan dari request

    //     // Panggil service untuk memeriksa dan memberikan badges
    //     $this->badgeService->checkAndAwardBadges($user, $totalScore, $totalMap, $lastMap, $difficulty);

    //     return response()->json(['message' => 'Map completed and badges checked!']);
    // }

    public function gameStart(Request $request)
    {
        session()->forget('answers');
        session()->forget('current_question_index');

        $buildingType = $request->building;
        $difficultyType = $request->difficulty;

        if (!$buildingType || !$difficultyType) {
            return redirect()->route('game.menu')->with('error', 'Please select a building and difficulty.');
        }

        $miniMap = MiniMap::where('name', $buildingType)->first();
        // $data = $questions->where('building', $buildingType)->where('difficulty', $difficultyType)->take(3);
        $data = Question::whereHas('miniMap', function ($query) use ($buildingType) {
                if ($buildingType != 'random') {
                    $query->where('name', $buildingType);
                }
            })
            ->where('difficulty', $difficultyType)
            ->inRandomOrder()
            ->take(3)
            ->get();

        // CHECK IF THE DATA IS EXIST
        if ($data->isEmpty()) {
            return redirect()->route('game.menu')->with('error', 'No questions found for the selected building and difficulty.');
        } else if($data->count() < 3) {
            return redirect()->route('game.menu')->with('error', 'Not enough questions found for the selected building and difficulty.');
        }
        // dd($data);

        session(['questions' => $data->values()->all()]);
        session(['current_question_index' => 0]);
        session(['gameDetails' => ['miniMap' => $miniMap, 'difficulty' => $difficultyType]]);

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

            // Check if currentQuestionIndex is not more than length of the questions on session
            $questions = session('questions', []);
            $currentQuestionIndex = session('current_question_index', 0);
            if ($currentQuestionIndex >= count($questions)) {
                return response()->json(['status' => 'success', 'message' => 'Answer not saved!'], 200);
            }

            // Simpan jawaban ke session atau database
            $answers = session('answers', []);

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
    //YANG AKWAN BISA, YANG KITA GK BISA
    // public function result()
    // {
    //     $answers = session('answers', null);
    //     $questions = session('questions', null);
    //     $gameDetails = session('gameDetails', null);

    //     // Cek apakah sesi 'answers' dan 'questions' ada
    //     if (is_null($answers) || is_null($questions) || is_null($gameDetails)) {
    //         return redirect()->route('game.menu')->with('error', 'Session data is missing. Please start a new game.');
    //     }

    //     $lastQuestion = end($questions);

    //     // Hitung total score
    //     $totalScore = array_reduce($answers, function ($carry, $answer) {
    //         return $carry + $answer['score'];
    //     }, 0);

    //     // Hitung total map
    //     $totalMap = count($questions);
    //     $maxScore = $totalMap * 1000;

    //     // Tentukan pesan berdasarkan skor
    //     $scorePercentage = ($totalScore / $maxScore) * 100;

    //     if ($scorePercentage >= 90) {
    //         $message = "Excellent! You've mastered the game.";
    //     } elseif ($scorePercentage >= 70) {
    //         $message = "Good job! You did well.";
    //     } elseif ($scorePercentage >= 50) {
    //         $message = "Average performance. Keep practicing!";
    //     } else {
    //         $message = "Try again! You'll get better with more practice.";
    //     }

    //     $finalResult = [
    //         'maxScore' => $maxScore,
    //         'totalScore' => $totalScore,
    //         'totalMap' => $totalMap,
    //         'message' => $message,
    //     ];

    //     try {
    //         DB::beginTransaction();

    //         $history = History::create([
    //             'userId' => 2, // auth()->user()->id,
    //             'buildingId' => $gameDetails['miniMap'] ? $gameDetails['miniMap']->id : null,
    //             'difficulty' => $gameDetails['difficulty'],
    //             'datePlayed' => now(),
    //             'score' => $totalScore,
    //         ]);

    //         foreach ($answers as $answer) {
    //             QuestionMapHistory::create([
    //                 'questionId' => $answer['question_id'],
    //                 'historyId' => $history->id,
    //                 'answerX' => $answer['user_answer_x'],
    //                 'answerY' => $answer['user_answer_y'],
    //                 'score' => $answer['score'],
    //             ]);
    //         }

    //         DB::commit();

    //         // Hapus sesi setelah data diproses
    //         session()->forget(['answers', 'questions', 'gameDetails']);

    //         return view('games.result', [
    //             'answers' => $answers,
    //             'questions' => $questions,
    //             'lastQuestion' => $lastQuestion,
    //             'finalResult' => $finalResult,
    //             'gameDetails' => $gameDetails,
    //         ]);
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         dd($th->getMessage());
    //         throw $th;
    //         // return redirect()->back()->with('error', 'Failed to save game result: ' . $th->getMessage());
    //     }
    // }

    public function result()
    {
        $answers = session('answers', null);
        $questions = session('questions', null);
        $gameDetails = session('gameDetails', null);

        if (is_null($answers) || is_null($questions) || is_null($gameDetails)) {
            return redirect()->route('game.menu')->with('error', 'Session data is missing. Please start a new game.');
        }

        $lastQuestion = end($questions);

        $totalScore = array_reduce($answers, function ($carry, $answer) {
            return $carry + $answer['score'];
        }, 0);

        $totalMap = count($questions);
        $maxScore = $totalMap * 1000;

        $scorePercentage = ($totalScore / $maxScore) * 100;

        if ($scorePercentage >= 90) {
            $message = "Excellent! You've mastered the game.";
        } elseif ($scorePercentage >= 70) {
            $message = "Good job! You did well.";
        } elseif ($scorePercentage >= 50) {
            $message = "Average performance. Keep practicing!";
        } else {
            $message = "Try again! You'll get better with more practice.";
        }

        $finalResult = [
            'maxScore' => $maxScore,
            'totalScore' => $totalScore,
            'totalMap' => $totalMap,
            'message' => $message,
        ];

        try {
            DB::beginTransaction();

            $user = User::findOrFail(auth()->user()->id);
            $buildingId = $gameDetails['miniMap'] ? $gameDetails['miniMap']->id : null;

            if (!$user->id) {
                return redirect()->route('game.menu')->with('error', 'Invalid user.');
            }

            // dd($answers, $questions, $gameDetails, $finalResult, $user, $buildingId);

            $history = History::create([
                'userId' => $user->id,
                'buildingId' => $buildingId,
                'difficulty' => $gameDetails['difficulty'],
                'datePlayed' => now(),
                'score' => $totalScore,
            ]);

            foreach ($answers as $answer) {
                QuestionMapHistory::create([
                    'questionId' => $answer['question_id'],
                    'historyId' => $history->id,
                    'answerX' => $answer['user_answer_x'],
                    'answerY' => $answer['user_answer_y'],
                    'score' => $answer['score'],
                ]);
            }

            $building = $gameDetails['miniMap']->name ?? 'random';
            $difficulty = $gameDetails['difficulty'];

            // dd($user, $totalScore, $totalMap, $building, $difficulty);
            $awardedBadges = $this->badgeService->checkAndAwardBadges($user, $totalScore, $totalMap, $building, $difficulty);

            DB::commit();

            // session()->forget(['answers', 'questions', 'gameDetails']);

            return view('games.result', [
                'answers' => $answers,
                'questions' => $questions,
                'lastQuestion' => $lastQuestion,
                'finalResult' => $finalResult,
                'gameDetails' => $gameDetails,
                'awardedBadges' => $awardedBadges,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to save game result: ' . $th->getMessage());
        }
    }
}

// public function result()
    // {
    //     // Dummy data for testing
    //     $answers = [
    //         ['question_id' => 1, 'user_answer_x' => 10, 'user_answer_y' => 20, 'score' => 800],
    //         ['question_id' => 2, 'user_answer_x' => 15, 'user_answer_y' => 25, 'score' => 700],
    //         // Add more dummy answers if needed
    //     ];

    //     $questions = [
    //         ['id' => 1, 'text' => 'Question 1'],
    //         ['id' => 2, 'text' => 'Question 2', 'spotImage' => '(1).jpg'],
    //         // Add more dummy questions if needed
    //     ];

    //     $gameDetails = [
    //         'miniMap' => (object)['id' => 1, 'name' => 'masjid'],
    //         'difficulty' => 'easy'
    //     ];

    //     $lastQuestion = end($questions);

    //     $totalScore = array_reduce($answers, function ($carry, $answer) {
    //         return $carry + $answer['score'];
    //     }, 0);

    //     $totalMap = count($questions);
    //     $maxScore = $totalMap * 1000;

    //     $scorePercentage = ($totalScore / $maxScore) * 100;

    //     if ($scorePercentage >= 90) {
    //         $message = "Excellent! You've mastered the game.";
    //     } elseif ($scorePercentage >= 70) {
    //         $message = "Good job! You did well.";
    //     } elseif ($scorePercentage >= 50) {
    //         $message = "Average performance. Keep practicing!";
    //     } else {
    //         $message = "Try again! You'll get better with more practice.";
    //     }

    //     $finalResult = [
    //         'maxScore' => $maxScore,
    //         'totalScore' => $totalScore,
    //         'totalMap' => $totalMap,
    //         'message' => $message,
    //     ];

    //     // Dummy awarded badges for testing
    //     $awardedBadges = Badge::take(3)->get();

    //     return view('games.result', [
    //         'answers' => $answers,
    //         'questions' => $questions,
    //         'lastQuestion' => $lastQuestion,
    //         'finalResult' => $finalResult,
    //         'gameDetails' => $gameDetails,
    //         'awardedBadges' => $awardedBadges,
    //     ]);
    // }


// $questions = collect([
//     [
//         'id' => 1,
//         'difficulty' => 'easy',
//         'building' => 'masjid',
//         'spotImage' => 'masjid/(1).jpg',
//         'mapImage' => 'masjid_map.png',
//         'answerX' => 100,
//         'answerY' => 200,
//     ],
//     [
//         'id' => 2,
//         'difficulty' => 'easy',
//         'building' => 'asrama',
//         'spotImage' => 'asrama/(1).jpg',
//         'mapImage' => 'asrama_map.png',
//         'answerX' => 265,
//         'answerY' => 109,
//     ],
//     [
//         'id' => 3,
//         'difficulty' => 'easy',
//         'building' => 'asrama',
//         'spotImage' => 'asrama/(6).jpg',
//         'mapImage' => 'asrama_map.png',
//         'answerX' => 120,
//         'answerY' => 220,
//     ],
//     [
//         'id' => 4,
//         'difficulty' => 'easy',
//         'building' => 'asrama',
//         'spotImage' => 'asrama/(5).jpg',
//         'mapImage' => 'asrama_map.png',
//         'answerX' => 120,
//         'answerY' => 220,
//     ],
//     [
//         'id' => 5,
//         'difficulty' => 'easy',
//         'building' => 'lapangan',
//         'spotImage' => 'lapangan/(1).jpg',
//         'mapImage' => 'lapangan_map.png',
//         'answerX' => 140,
//         'answerY' => 240,
//     ],
//     [
//         'id' => 6,
//         'difficulty' => 'medium',
//         'building' => 'masjid',
//         'spotImage' => 'masjid/(2).jpg',
//         'mapImage' => 'masjid_map.png',
//         'answerX' => 160,
//         'answerY' => 260,
//     ],
//     [
//         'id' => 7,
//         'difficulty' => 'medium',
//         'building' => 'asrama',
//         'spotImage' => 'asrama/(2).jpg',
//         'mapImage' => 'asrama_map.png',
//         'answerX' => 180,
//         'answerY' => 280,
//     ],
//     [
//         'id' => 8,
//         'difficulty' => 'medium',
//         'building' => 'lapangan',
//         'spotImage' => 'lapangan/(2).jpg',
//         'mapImage' => 'lapangan_map.png',
//         'answerX' => 200,
//         'answerY' => 300,
//     ],
//     [
//         'id' => 9,
//         'difficulty' => 'hard',
//         'building' => 'masjid',
//         'spotImage' => 'masjid/(3).jpg',
//         'mapImage' => 'masjid_map.png',
//         'answerX' => 220,
//         'answerY' => 320,
//     ],
//     [
//         'id' => 10,
//         'difficulty' => 'hard',
//         'building' => 'asrama',
//         'spotImage' => 'asrama/(3).jpg',
//         'mapImage' => 'asrama_map.png',
//         'answerX' => 240,
//         'answerY' => 340,
//     ],
//     [
//         'id' => 11,
//         'difficulty' => 'hard',
//         'building' => 'lapangan',
//         'spotImage' => 'lapangan/(3).jpg',
//         'mapImage' => 'lapangan_map.png',
//         'answerX' => 260,
//         'answerY' => 360,
//     ],
//     [
//         'id' => 12,
//         'difficulty' => 'hard',
//         'building' => 'masjid',
//         'spotImage' => 'masjid/(4).jpg',
//         'mapImage' => 'masjid_map.png',
//         'answerX' => 280,
//         'answerY' => 380,
//     ],
// ]);