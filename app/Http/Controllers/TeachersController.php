<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    //
    public function index(Request $request)
    {
        $teachers = Teachers::with('images')
            ->when($request->search, function ($query) use ($request) {
                return $query->whereAny([
                    'name',
                    'email',
                    'phone',
                ], 'like', '%' . $request->search . '%');
            })->paginate(10);;
        return view('teachers.index', compact('teachers'));
        // return ;
    }

    public function add()
    {
        $item = new Teachers();
        $item->name = 'Test Name';
        $item->save();

        return 'Added Successfully';
    }

    public function show($id)
    {
        $item = Teachers::findOrFail($id);

        return $item;
    }

    public function update($id)
    {
        $item = Teachers::findOrFail($id);
        $item->name = 'Updated Teacher';
        $item->update();

        return 'updated Successfully';
    }

    public function delete($id)
    {
        $item = Teachers::findOrFail($id);
        $item->delete();

        return 'Deleted Successfully';
    }
}
