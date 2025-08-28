<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editorial;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\StorageAttributes;

class EditorialController extends Controller
{
   public function create()
   {
   $users = User::all(); // все авторы
    return view('editorials.create', compact('users'));
   }
   public function store(Request $request)
{
    $request->validate([
        "title_kk" => "required|string|max:255",
        "title_ru" => "nullable|string|max:255",
        "title_en" => "nullable|string|max:255",
        'user_id'  => 'required|exists:users,id',
        "content"  => "required|string",
        "file"     => "nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048"
    ]);

    $editorial = new Editorial();
    $editorial->title_kk = $request->input('title_kk');
    $editorial->title_ru = $request->input('title_ru');
    $editorial->title_en = $request->input('title_en');
    $editorial->user_id = $request->user_id;
    $editorial->content = $request->input('content');
    $editorial->status = 'submitted';

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();


        $path = $file->storeAs('editorials', $filename, 'public');

        $editorial->file_path = $path;

    }

    $editorial->save();

    return redirect()->route('editorials.thankyou')
        ->with('success', 'Запись добавлена');


}
    public function thankyou()
    {
        return view('editorials.thankyou');
    }


    public function index()
    {
       $editorials = Editorial::where('status', 'published')
        ->latest()
        ->get();

    return view('editorials.index', compact('editorials'));
}
    public function end($id)
{
    $editorial = Editorial::findOrFail($id);
    return view('editorials.end', compact('editorial'));
}
public function show($id)
{
    $editorial = Editorial::findOrFail($id);

    // Если есть файл, получаем публичный URL
   $fileUrl = $editorial->file_path ? Storage::disk('public')->url($editorial->file_path) : null;
    return view('editorials.show', compact('editorial', 'fileUrl'));
    }

    public function redac()
{
    $users = User::all(); // все авторы
    return view('redac', compact('users'));
}
public function updateStatus(Request $request, Editorial $editorial)
{
    $request->validate([
        'status' => 'required|string|in:editor_approved,revision,admin_approved,reviewed,published',
        'review_score' => 'nullable|integer|min:0|max:100',
    ]);

    $user = auth()->user();

    // Проверка: редактор может только editor_approved или revision
    if ($user->hasRole('editor') && !in_array($request->status, ['editor_approved', 'revision'])) {
        return back()->withErrors(['status' => 'Редактор не может установить этот статус']);
    }

    // Админ может только admin_approved или published
    if ($user->hasRole('admin') && !in_array($request->status, ['admin_approved', 'published'])) {
        return back()->withErrors(['status' => 'Админ не может установить этот статус']);
    }

    // Рецензент может только reviewed
    if ($user->hasRole('reviewer') && $request->status !== 'reviewed') {
        return back()->withErrors(['status' => 'Рецензент не может установить этот статус']);
    }

    $editorial->status = $request->status;

    // Если рецензент оставляет оценку
    if ($request->status === 'reviewed' && $request->filled('review_score')) {
        $editorial->review_score = $request->review_score;
        $editorial->reviewer_id = $user->id;
    }

    $editorial->save();

    return back()->with('success', 'Статус обновлен');
}
public function editorList()
{
    $editorials = Editorial::where('status', 'submitted')->latest()->get();
    return view('editorials.editor', compact('editorials'));
}
public function adminList()
{
    $editorials = Editorial::where('status', 'editor_approved')->latest()->get();
    return view('editorials.admin', compact('editorials'));
}
public function reviewerList()
{
    $editorials = Editorial::where('status', 'admin_approved')->latest()->get();
    return view('editorials.reviewer', compact('editorials'));
}
public function authorList()
{
    $editorials = Editorial::where('user_id', auth()->id())
        ->latest()
        ->get(['id', 'title_kk', 'status', 'review_score', 'created_at']);

    return view('editorials.author', compact('editorials'));

}

}
