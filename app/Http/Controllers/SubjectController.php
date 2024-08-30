<?php
    
namespace App\Http\Controllers;
    
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Requests\SubjectUpdateRequest;
    
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subjects = Subject::latest()->paginate(5);
          
        return view('subject.index', compact('subjects'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('subject.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectStoreRequest $request): RedirectResponse
    {   
        Subject::create($request->validated());
           
        return redirect()->route('subject.index')
                         ->with('success', 'Subject created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Subject $subject): View
    {
        return view('subject.show',compact('subject'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject): View
    {
        return view('subject.edit',compact('subject'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectUpdateRequest $request, Subject $subject): RedirectResponse
    {
        $subject->update($request->validated());
          
        return redirect()->route('subject.index')
                        ->with('success','Subject updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();
           
        return redirect()->route('subject.index')
                        ->with('success','Subject deleted successfully');
    }
}