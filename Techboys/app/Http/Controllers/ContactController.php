<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('phone', 'like', "%$search%");
    }

    $contacts = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.contact.index', compact('contacts'));
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
    public function show(Contact $contact)
    {
        //
    }

    public function detail($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.contact_detail', compact('contact'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
    return redirect()->route('admin.contact.index')->with('success', 'Đã xoá liên hệ!');

    }
    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,11',
            'email' => 'nullable|email',
            'message' => 'required|string|max:1000',
        ]);
    
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);
    
        $emailData = $request->only('name', 'email', 'phone', 'message');
        Mail::to($request->email)->send(new ContactFormMail($emailData));
    
        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi phản hồi!');
    
    }
}
