<?php

namespace App\Http\Controllers\Rgpanel;

use App\Models\ProspectiveStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Feedback\Entities\Feedback;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $firstOfMonth = Carbon::now()->firstOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $prospectiveStudent = ProspectiveStudent::select('id')->whereBetween("created_at", [$firstOfMonth, $endOfMonth])->get();
        $feedbacks = Feedback::select('id')->whereBetween("created_at", [$firstOfMonth, $endOfMonth])->get();
        return view('rgpanel.index', compact('firstOfMonth', 'endOfMonth', 'prospectiveStudent', 'feedbacks'));
    }
}