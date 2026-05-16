<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artifact;
use Illuminate\Support\Facades\File;

class ArtifactController extends Controller
{
    public function index(Request $request)
{
    $query = Artifact::query();

    if ($request->has('era') && $request->era != '') {
        $query->where('era', $request->era);
    }

    if ($request->has('location') && $request->location != '') {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    $artifacts = $query->get();

    return view('artifacts.index', compact('artifacts'));
}
    
    public function create()
    {
        return view('artifacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'era' => 'required|string',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'يجب إدخال اسم المعلم الأثري.',
            'location.required' => 'يرجى تحديد الموقع.',
            'era.required' => 'يجب اختيار العصر التاريخي.',
            'description.required' => 'الوصف ضروري لتوثيق المعلم.',
            'description.min' => 'الوصف يجب ألا يقل عن 10 حروف.',
            'image.required' => 'لا يمكن إتمام التوثيق بدون صورة المعلم.',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Artifact::create([
            'name' => $request->name,
            'location' => $request->location,
            'era' => $request->era,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('artifacts.index')->with('success', 'تم حفظ الأثر بنجاح');
    }

    public function show($id)
    {
        $artifact = Artifact::findOrFail($id);
        return view('artifacts.show', compact('artifact'));
    }

    public function edit($id)
    {
        $artifact = Artifact::findOrFail($id);
        return view('artifacts.edit', compact('artifact'));
    }

    public function update(Request $request, $id)
    {
        $artifact = Artifact::findOrFail($id);
        $imageName = $artifact->image;

        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/' . $artifact->image))) {
                File::delete(public_path('images/' . $artifact->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $artifact->update([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'era' => $request->era,
            'image' => $imageName,
        ]);

        return redirect()->route('artifacts.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

   public function delete($id)
{
    $artifact = Artifact::findOrFail($id);
    
    if (\Illuminate\Support\Facades\File::exists(public_path('images/' . $artifact->image))) {
        \Illuminate\Support\Facades\File::delete(public_path('images/' . $artifact->image));
    }
        $artifact->delete();
        return back()->with('success', 'تم حذف القطعة بنجاح');
    }
}