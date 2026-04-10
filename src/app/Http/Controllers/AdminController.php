<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')
            ->paginate(7);

        return view('admin', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        // 名前検索（姓・名・フルネーム、全部一致・部分一致）
        if (!empty($request->name)) {
            $name = trim($request->name);

            $query->where(function ($q) use ($name) {
                $q->where('last_name', $name)
                  ->orWhere('first_name', $name)
                  ->orWhere('last_name', 'like', "%{$name}%")
                  ->orWhere('first_name', 'like', "%{$name}%")
                  ->orWhereRaw("CONCAT(last_name, first_name) = ?", [$name])
                  ->orWhereRaw("CONCAT(last_name, ' ', first_name) = ?", [$name])
                  ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$name}%"])
                  ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$name}%"]);
            });
        }

        // メールアドレス検索（全部一致・部分一致）
        if (!empty($request->email)) {
            $email = trim($request->email);

            $query->where(function ($q) use ($email) {
                $q->where('email', $email)
                  ->orWhere('email', 'like', "%{$email}%");
            });
        }

        // 性別検索
        if (!empty($request->gender) && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        // お問い合わせ種類検索
        if (!empty($request->type)) {
            $query->where('type', $request->type);
        }

        // 日付検索
        if (!empty($request->date)) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->orderBy('created_at', 'desc')
            ->paginate(7)
            ->appends($request->query());

        return view('search', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function export(Request $request): StreamedResponse
    {
        $query = Contact::query();

        if (!empty($request->name)) {
            $name = trim($request->name);

            $query->where(function ($q) use ($name) {
                $q->where('last_name', $name)
                  ->orWhere('first_name', $name)
                  ->orWhere('last_name', 'like', "%{$name}%")
                  ->orWhere('first_name', 'like', "%{$name}%")
                  ->orWhereRaw("CONCAT(last_name, first_name) = ?", [$name])
                  ->orWhereRaw("CONCAT(last_name, ' ', first_name) = ?", [$name])
                  ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$name}%"])
                  ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$name}%"]);
            });
        }

        if (!empty($request->email)) {
            $email = trim($request->email);

            $query->where(function ($q) use ($email) {
                $q->where('email', $email)
                  ->orWhere('email', 'like', "%{$email}%");
            });
        }

        if (!empty($request->gender) && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if (!empty($request->type)) {
            $query->where('type', $request->type);
        }

        if (!empty($request->date)) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->orderBy('created_at', 'desc')->get();

        $response = new StreamedResponse(function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, [
                'お名前',
                '性別',
                'メールアドレス',
                'お問い合わせの種類',
                'お問い合わせ内容',
                '日付'
            ]);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $this->genderLabel($contact->gender),
                    $contact->email,
                    $this->typeLabel($contact->type),
                    $contact->content,
                    optional($contact->created_at)->format('Y-m-d'),
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }

    public function reset()
    {
        return view('reset');
    }

    private function genderLabel($gender)
    {
        return match ($gender) {
            'male' => '男性',
            'female' => '女性',
            'other' => 'その他',
            default => '',
        };
    }

    private function typeLabel($type)
    {
        return match ($type) {
            'delivery' => '商品のお届けについて',
            'exchange' => '商品の交換について',
            'trouble' => '商品トラブル',
            'shop' => 'ショップへのお問い合わせ',
            'other' => 'その他',
            default => '',
        };
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/delete')->with('message', 'お問い合わせを削除しました');
    }
    
    public function delete()
    {
        return view('delete');
    }
}