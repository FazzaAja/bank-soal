<?php
    
namespace App\Http\Controllers;
    
use App\Models\Exam;
use App\Models\Lecturer;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
// use App\Http\Requests\ExamStoreRequest;
// use App\Http\Requests\ExamUpdateRequest;
    
class examController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $exams = Exam::with(['lecturer', 'subject'])->latest()->paginate(5);
          
        return view('exam.index', compact('exams'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lecturer = Lecturer::all();
        $subject = Subject::all();
        return view('exam.create', compact('lecturer', 'subject'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {   
        $request->validate([
            'exam' => 'required|mimes:pdf|max:2048', 
            'period' => 'required|string|max:50', 
            'subject_id' => 'required|exists:subjects,id', 
            'lecturer_id' => 'required|exists:lecturers,id', 
            'year' => 'required|integer|digits:4|min:1900|max:' . date('Y'), 
        ]);

        $pdf = $request->file('exam');
        $pdfPath = $pdf->store('uploads', 'public');

        Exam::create([
            'exam' => $pdfPath,
            'period' => $request->input('period'),
            'subject_id' => $request->input('subject_id'),
            'lecturer_id' => $request->input('lecturer_id'),
            'year' => $request->input('year'),
        ]);
           
        return redirect()->route('exam.index')
                         ->with('success', 'exam created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Exam $exam): View
    {
        $exam->load(['lecturer', 'subject']); 

        return view('exam.show',compact('exam'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam): View
    {
        $lecturer = Lecturer::all();
        $subject = Subject::all();
        return view('exam.edit', compact('exam', 'lecturer', 'subject'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam): RedirectResponse
    {
        $request->validate([
            'exam' => 'nullable|mimes:pdf|max:2048', 
            'period' => 'required|string|max:50', 
            'subject_id' => 'required|exists:subjects,id', 
            'lecturer_id' => 'required|exists:lecturers,id', 
            'year' => 'required|integer|digits:4|min:1900|max:' . date('Y'), 
        ]);

        if ($request->hasFile('exam')) {
            if ($exam->exam) {
                Storage::disk('public')->delete($exam->exam);
            }

            $pdf = $request->file('exam');
            $pdfPath = $pdf->store('uploads', 'public');
            $exam->exam = $pdfPath; 
        }

        $exam->period = $request->input('period');
        $exam->subject_id = $request->input('subject_id');
        $exam->lecturer_id = $request->input('lecturer_id');
        $exam->year = $request->input('year');
        $exam->save(); 
          
        return redirect()->route('exam.index')
                        ->with('success','exam updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam): RedirectResponse
    {
        $exam->delete();
           
        return redirect()->route('exam.index')
                        ->with('success','exam deleted successfully');
    }
}