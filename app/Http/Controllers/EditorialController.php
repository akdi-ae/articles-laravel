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
       $validated = $request->validate([
    'title_kk' => 'required|string|max:255',
    'title_ru' => 'required|string|max:255',
    'title_en' => 'required|string|max:255',
    'content'  => 'required|string',
]);

$editorial = new \App\Models\Editorial();
$editorial->title_kk = $validated['title_kk'];
$editorial->title_ru = $validated['title_ru'];
$editorial->title_en = $validated['title_en'];
$editorial->content = $validated['content'];
$editorial->status = 'submitted';
$editorial->user_id = $request->input('user_id') ?? auth()->id(); // берем из формы или текущего пользователя

// Файл
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


    /**
     * Список статей для проверки (для редактора, рецензента или админа).
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('editor')) {
            $editorials = Editorial::where('status', 'submitted')->get();
        } elseif ($user->hasRole('admin')) {
            $editorials = Editorial::whereIn('status', ['editor_approved', 'reviewed'])->get();
        } elseif ($user->hasRole('reviewer')) {
            $editorials = Editorial::where('status', 'admin_approved')->get();
        } else {
            $editorials = collect();
        }

        return view('editorials.admin', compact('editorials'));
    }



    /**
     * Одобрение редактором.
     */
    public function approveByEditor($id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'submitted') {
            $editorial->status = 'editor_approved';
            $editorial->save();
        }

        return back()->with('success', 'Статья одобрена редактором и передана админу.');
    }
public function profile()
{
    $user = auth()->user();

    // Получаем статьи пользователя (если нужно только его статьи)
    $editorials = Editorial::where('user_id', $user->id)->get();

    // Если нужно только одну статью, например первую
    $editorial = $editorials->first();

    return view('profiles', compact('user', 'editorial'));
}

    /**
     * Отклонение редактором.
     */
    public function rejectByEditor(Request $request, $id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'submitted') {
            $editorial->status = 'editor_rejected';
            $editorial->reject_reason = $request->input('reject_reason');
            $editorial->save();
        }

        return back()->with('error', 'Статья отклонена редактором.');
    }

    /**
     * Одобрение админом (первый этап, передача рецензенту).
     */
    public function approveByAdmin($id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'editor_approved') {
            $editorial->status = 'admin_approved';
            $editorial->save();
        }

        return back()->with('success', 'Статья одобрена админом и передана рецензенту.');
    }



    /**
     * Отклонение админом (первый этап).
     */
    public function rejectByAdmin($id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'editor_approved') {
            $editorial->status = 'admin_rejected';
            $editorial->save();
        }

        return back()->with('error', 'Статья отклонена админом.');
    }

    /**
     * Рецензент оставляет оценку.
     */
    public function review(Request $request, $id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'admin_approved') {
            $request->validate([
                'review_score' => 'required|integer|min:0|max:100',
            ]);

            $editorial->review_score = $request->review_score;
            $editorial->status = 'reviewed';
            $editorial->save();
        }

        return back()->with('success', 'Оценка рецензента сохранена.');
    }

    /**
     * Финальное решение админа → публикация.
     */

    public function published()
{
    $editorials = Editorial::where('status', 'published')
        ->latest()
        ->with('user') // подтянет автора, чтобы работало $editorial->user->name
        ->get();

    return view('published', compact('editorials'));
}
    public function publish($id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'reviewed') {
            $editorial->status = 'published';
            $editorial->save();
        }

        return back()->with('success', 'Статья опубликована!');
    }

    /**
     * Финальное решение админа → отклонить после рецензии.
     */
    public function rejectAfterReview($id)
    {
        $editorial = Editorial::findOrFail($id);

        if ($editorial->status === 'reviewed') {
            $editorial->status = 'admin_rejected_after_review';
            $editorial->save();
        }

        return back()->with('error', 'Статья отклонена после рецензии.');
    }



    // Этот метод должен существовать
    public function editorDashboard()
    {
        $editorials = Editorial::where('status', 'submitted')->get();
        return view('editor.dashboard', compact('editorials'));
    }
    public function reviewerDashboard()
{
    $user = auth()->user();

    // Статьи, которые рецензент должен оценить
    $editorials = Editorial::where('status', 'admin_approved')->get();

    return view('reviewer.dashboard', compact('editorials'));
}

// Авторы и публикаций
public function authorsWithPublished(Request $request)
{
    $search = $request->input('search');

    $users = \App\Models\User::with(['editorials' => function ($query) {
            $query->where('status', 'published');
        }])
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('editorials', function ($q) use ($search) {
                    $q->where('title_kk', 'like', "%{$search}%")
                      ->orWhere('title_ru', 'like', "%{$search}%")
                      ->orWhere('title_en', 'like', "%{$search}%");
                });
        })
        ->get();

    return view('person', compact('users', 'search'));
}

}
