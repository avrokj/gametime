<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getBySbId($sbId)
    {
        $apiData = Api::where('sb_id', $sbId)->first();
        if ($apiData) {
            $responseData = [
                'last_command' => $apiData->last_command,
                'home_score' => $apiData->home_score,
                'away_score' => $apiData->away_score,
            ];
            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'No data found for given scoreboard'], 404);
        }
    }

    public function updateApi(Request $request)
    {
        $apiData = Api::where('sb_id', $request->input('sb_id'))->first();
        //dd ($request);
        if ($apiData) {
            $apiData->away_score = $request->input('away_score');
            $apiData->home_score = $request->input('home_score');
            $apiData->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Device not found']);
    }
}
