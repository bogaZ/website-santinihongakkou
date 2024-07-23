<?php

namespace Modules\Feedback\Http\Controllers;

use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Modules\Feedback\Entities\Feedback;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    use ResponseAjax;
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        $title = __('feedback::wording.feedbacks');
        return view('feedback::index', compact('feedbacks', 'title'));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|string|max:50',
            'message' => 'string|max:100'
        ]);
        if ($validation->fails()) {
            return redirect('/#contact-us')->withErrors($validation)->withInput();
        }
        $feedback = new Feedback;
        $feedback->name = $request->name;
        $feedback->subject = $request->subject;
        $feedback->email = $request->email;
        $feedback->body = $request->message;
        $feedback->save();
        Cache::forget('homePage');
        return redirect('/#contact-us')->with('success', __('message.message_sent_successfully'));
    }
    public function destroy($locale, Feedback $feedback)
    {
        try {
            DB::beginTransaction();
            $feedback->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
}
