<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\IndexRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(IndexRequest $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'type',
            'content'
        ]);

        return view('confirm', $contact);
    }

    public function store(Request $request)
    {
        $genderMap = [
            'male' => 1,
            'female' => 2,
            'other' => 3,
        ];

        $categoryMap = [
            'delivery' => 1,
            'exchange' => 2,
            'trouble' => 3,
            'shop' => 4,
            'other' => 5,
        ];

        $contact = [
            'category_id' => $categoryMap[$request->type] ?? null,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $genderMap[$request->gender] ?? null,
            'email' => $request->email,
            'tell' => $request->tel1 . $request->tel2 . $request->tel3,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->content,
        ];

        Contact::create($contact);

        return view('thanks');
    }
}
