<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\Note\NoteService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;

class NoteController extends Controller
{
    public $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }



    public function index()
    {
        return view('pages.student.notes');
    }

    public function getStaffDetails()
    {
        $data = Student::select(['id', 'name'])->get();

        return response()->json([
            'students' => $data,
            'types'    => Note::TYPE
        ]);
    }

    public function getNotesStaffDetails(Request $request)
    {
        $perPage    = $request->number_products; // 6
        $pageNumber = $request->page_number; // 1

        $query = $this->noteService->getNotesByType($request->type);

        $pagesCount = ceil($query->count() / $perPage);

        $data = $query->offset(($pageNumber - 1) * $perPage)
            ->limit($perPage)
            ->orderBy('id', 'DESC')
            ->get();


        return response()->json([
            'data'       => $data,
            'pagesCount' => $pagesCount
        ]);
    }

    //-------------------------------------------------------------







    public function store(StoreNoteRequest $request)
    {

        Note::create([
            'note' => $request->note,
            'type' => $request->type,

            'notby_type' => Auth::user()::class,
            'notby_id'   => Auth::id(),

            'notable_type' => Student::class,
            'notable_id'   => $request->notable_id, //Student id
        ]);


        return response()->json([
            'alert'    => 'success',
            'title'    => 'نجحت',
            'message'  => 'تمت العملية بنجاح'
        ]);
    }

    public function show(Note $note)
    {
        // $post = Student::find(2);
        // $post->notes;

        // dd($post);
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update([
            'note' => $request->note,
            'type' => $request->type
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.note_students.index'));
    }

    public function delete(Note $note)
    {

        $note->delete();

        return response()->json([
            'alert'    => 'success',
            'title'    => 'نجحت',
            'message'  => 'تمت العملية بنجاح'
        ]);
    }
}
