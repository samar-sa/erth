<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mineral;
use Illuminate\Support\Facades\File;

class MineralController extends Controller
{
    public function index()
    {
        $minerals = Mineral::all();
        return view('minerals.index', compact('minerals'));
    }

    public function create()
    {
        return view('minerals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'يجب إدخال اسم المعدن.',
            'type.required' => 'يرجى تحديد نوع المعدن.',
            'color.required' => 'يجب إدخال لون المعدن.',
            'description.required' => 'الوصف ضروري لتوثيق المعدن.',
            'image.required' => 'لا يمكن إتمام التوثيق بدون صورة المعدن.',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Mineral::create([
            'name' => $request->name,
            'type' => $request->type,
            'color' => $request->color,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('minerals.index')->with('success', 'تم حفظ المعدن بنجاح');
    }

    public function show($id)
    {
        $mineral = Mineral::findOrFail($id);
        return view('minerals.show', compact('mineral'));
    }

    public function edit($id)
    {
        $mineral = Mineral::findOrFail($id);
        return view('minerals.edit', compact('mineral'));
    }

    public function update(Request $request, $id)
    {
        $mineral = Mineral::findOrFail($id);
        $imageName = $mineral->image;

        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/' . $mineral->image))) {
                File::delete(public_path('images/' . $mineral->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $mineral->update([
            'name' => $request->name,
            'type' => $request->type,
            'color' => $request->color,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('minerals.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function delete($id)
    {
        $mineral = Mineral::findOrFail($id);
        if (File::exists(public_path('images/' . $mineral->image))) {
            File::delete(public_path('images/' . $mineral->image));
        }
        $mineral->delete();
        return back()->with('success', 'تم حذف المعدن بنجاح');
    }
}