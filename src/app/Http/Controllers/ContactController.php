<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $fromConfirm = $request->query('from') === 'confirm';
        if (! $fromConfirm) {
            session()->forget('draft_contact');
        }
        $contact = $fromConfirm
            ? session('draft_contact', [])
            : [];
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('contacts.index', compact('contacts', 'categories', 'contact'));
    }


    public function confirm(ContactRequest $request)
    {
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $contact = $request->only(['category_id','first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail' ,'tel1', 'tel2', 'tel3']);
        $contact['tel'] = $tel;
        $category = Category::find($contact['category_id']);
        $contact['content'] = $category->content;
        session(['draft_contact' => $contact]);
        return view('confirm', ['contact' => $contact, 'telephone' => $tel,'category'=>$category,]);
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name','last_name','gender','email','tel','address','building', 'category_id','detail']);
        // dd($contact);
        Contact::create($contact);
        return view('thanks');
    }
    
}
