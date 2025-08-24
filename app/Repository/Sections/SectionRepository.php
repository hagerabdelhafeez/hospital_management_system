<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::all();

        return view('dashboard.sections.index', compact('sections'));
    }

    public function store($requset)
    {
        Section::create([
            'name' => $requset->name,
        ]);
        session()->flash('add');

        return redirect()->route('sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->name,
        ]);
        session()->flash('edit');

        return redirect()->route('sections.index');
    }

    public function destroy($request)
    {
        $section = Section::findOrFail($request->id)->delete();
        session()->flash('delete');

        return redirect()->route('sections.index');
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        $doctors = $section->doctors;

        return view('dashboard.sections.show_doctors', compact('section', 'doctors'));
    }
}
