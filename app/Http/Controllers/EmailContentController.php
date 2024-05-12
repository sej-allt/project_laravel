<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailContent;

class EmailContentController extends Controller
{
    public function create()
    {
        return view('emails.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'link' => 'nullable|url',
            'conclusion' => 'nullable|string',
        ]);

        // Create a new EmailContent instance
        $emailContent = EmailContent::updateOrCreate(
            ['type' => $request->input('type')],
            [
                'subject' => $request->input('subject'),
                'body' => $request->input('body'),
                'link' => $request->input('link'),
                'conclusion' => $request->input('conclusion'),
            ]
        );

        return redirect()->route('email.create')->with('success', 'Email content saved successfully!');
    }
}
