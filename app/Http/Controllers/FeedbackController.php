<?php

namespace App\Http\Controllers;
use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
{
    $feedbacks = Feedback::all();
    return view('dashboard.feedbacks.index', compact('feedbacks'));
}


public function create()
{
    return view('dashboard.feedbacks.create');
}


public function store(Request $request)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    Feedback::create([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'message' => $request->message,
        'user_id' =>1, // الحصول على user_id من المستخدم المسجل
    ]);

    return redirect()->route('feedback.index')->with('success', 'Feedback created successfully.');
}


public function update(Request $request, $id_feedback)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    $feedback = Feedback::findOrFail($id_feedback);
    $feedback->update([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    return redirect()->route('feedback.index')->with('success', 'Feedback updated successfully.');
}


public function destroy($id_feedback)
{
    $feedback = Feedback::findOrFail($id_feedback);
    $feedback->delete();

    return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully.');
}

}
