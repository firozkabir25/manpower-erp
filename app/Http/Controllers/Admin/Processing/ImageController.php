<?php

namespace App\Http\Controllers\Admin\Processing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processing\Image;

class ImageController extends Controller
{

    private function upload($request, $field)
    {
        if ($request->hasFile($field)) {
            return $request->file($field)
                ->store('worker-images', 'public');
        }
        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::with('user')
        ->latest()
        ->paginate(10);

    return view('admin.processing.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.processing.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'passport_no'  => 'required|string|max:150',
            'project_code' => 'required|string|max:150',

            'picture'           => 'nullable|image|max:2048',
            'visa_copy'         => 'nullable|image|max:2048',
            'passport_copy'     => 'nullable|image|max:2048',
            'vaccine_card'      => 'nullable|image|max:2048',
            'driving_license'   => 'nullable|image|max:2048',
            'cirtificate_one'   => 'nullable|image|max:2048',
            'cirtificate_two'   => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['passport_no','project_code']);
        $data['user_id'] = auth()->id();

        foreach ([
            'picture',
            'visa_copy',
            'passport_copy',
            'vaccine_card',
            'driving_license',
            'cirtificate_one',
            'cirtificate_two'
        ] as $file) {
            $data[$file] = $this->upload($request, $file);
        }

        Image::create($data);

        return redirect()
            ->back()
            ->with('success', 'Images uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
