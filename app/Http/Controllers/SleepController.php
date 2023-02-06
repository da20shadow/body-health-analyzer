<?php

namespace App\Http\Controllers;

use App\Models\Sleep;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;

class SleepController extends Controller
{
    public function index()
    {
        //TODO: return the current info for this day
    }

    public function store(Request $request): JsonResponse
    {
        $user_id = auth()->user()->getAuthIdentifier();
        $result = self::getTodaySleepRecord($user_id);

        if ($result !== null) {
            $result = self::update($request, $result['id']);
            if ($result['error']) {
                return response()->json(['error' => $result['message']],401);
            }
            return response()->json(['message' => $result['message']]);
        } else {

            $fields = $request->validate([
                'start_sleep' => ['date'],
                'end_sleep' => ['date'],
                'additional_start_sleep' => ['date'],
                'additional_end_sleep' => ['date'],
            ]);

            $sleep = null;
            if ($fields['start_sleep']) {
                $sleep = Sleep::create(['start_sleep' => $fields['start_sleep']]);
            } else if ($fields['end_sleep']) {
                $sleep = Sleep::create(['end_sleep' => $fields['end_sleep']]);
            } else if ($fields['additional_start_sleep']) {
                $sleep = Sleep::create(['additional_start_sleep' => $fields['additional_start_sleep']]);
            } else if ($fields['additional_end_sleep']) {
                $sleep = Sleep::create(['additional_end_sleep' => $fields['additional_end_sleep']]);
            }

            if ($sleep) {
                return response()->json($sleep);
            }

            return response()->json(['error' => 'An Error occur please, try again!'], 401);
        }

    }

    public function show(Sleep $sleep)
    {
        //
    }

    public function update(Request $request, int $record_id): array
    {
        $fields = $request->validate([
            'start_sleep' => ['date'],
            'end_sleep' => ['date'],
            'additional_start_sleep' => ['date'],
            'additional_end_sleep' => ['date'],
        ]);

        $sleep = null;

        if ($fields['start_sleep']) {
            $sleep = DB::table('sleeps')
                ->where('id', $record_id)
                ->update(['start_sleep' => $fields['start_sleep']]);
        } else if ($fields['end_sleep']) {
            $sleep = DB::table('sleeps')
                ->where('id', $record_id)
                ->update(['end_sleep' => $fields['end_sleep']]);
        } else if ($fields['additional_start_sleep']) {
            $sleep = DB::table('sleeps')
                ->where('id', $record_id)
                ->update(['additional_start_sleep' => $fields['additional_start_sleep']]);
        } else if ($fields['additional_end_sleep']) {
            $sleep = DB::table('sleeps')
                ->where('id', $record_id)
                ->update(['additional_end_sleep' => $fields['additional_end_sleep']]);
        }

        if ($sleep) {
            return ['error' => false, 'message' => 'Успешно добавихте запис!'];
        }

        return ['error' => true, 'message' => 'Възникна грешка, моля опитай отново!'];
    }

    public function destroy(Sleep $sleep)
    {
        //
    }

    private static function getTodaySleepRecord(int $user_id): ?array
    {
        $result = null;
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        try {
            $result = DB::select(DB::raw("
            SELECT * FROM sleeps
            WHERE (user_id = $user_id
                       AND YEAR(start_sleep) = $year
                       AND MONTH(start_sleep) = $month
                       AND DAY(start_sleep) = $day)
            "));
        } catch (QueryException $exception) {
            //TODO: log the error
        }

        return $result;
    }

}
