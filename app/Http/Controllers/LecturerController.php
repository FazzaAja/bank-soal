<?php
    
namespace App\Http\Controllers;
    
use App\Models\Lecturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\LecturerStoreRequest;
use App\Http\Requests\LecturerUpdateRequest;
    
class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $lecturers = Lecturer::latest()->paginate(5);
          
        return view('lecturer.index', compact('lecturers'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    // public function create(): View
    // {
    //     return view('lecturer.create');
    // }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(LecturerStoreRequest $request): RedirectResponse
    {   
        Lecturer::create($request->validated());
           
        return redirect()->route('lecturer.index')
                         ->with('success', 'Lecturer created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    // public function show(Lecturer $lecturer): View
    // {
    //     return view('lecturer.show',compact('lecturer'));
    // }
  
    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Lecturer $lecturer): View
    // {
    //     return view('lecturer.edit',compact('lecturer'));
    // }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(LecturerUpdateRequest $request, Lecturer $lecturer): RedirectResponse
    {
        $lecturer->update($request->validated());
          
        return redirect()->route('lecturer.index')
                        ->with('success','Lecturer updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer): RedirectResponse
    {
        $lecturer->delete();
           
        return redirect()->route('lecturer.index')
                        ->with('success','Lecturer deleted successfully');
    }
}