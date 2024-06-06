<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Image Read', ['only' => ['index']]);
        // $this->middleware('permission:Image Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Image Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Image Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $images = Image::all();
        $createdByUsers = $images->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $images->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.images.index', compact('images', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function imagesGet()
    {

        $images = Image::all();
        return Datatables::of($images)

            ->setRowId(function ($image) {
                return $image->id;
            })

            ->editColumn('status', function (Image $image) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($image->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (Image $image) {

                return ucwords($image->CreatedBy->name);
            })


            ->editColumn('updated_by', function (Image $image) {

                return ucwords($image->UpdatedBy->name);
            })
            ->addColumn('created_at', function (Image $image) {
                return $image->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (Image $image) {

                return $image->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (Image $image) {

                $editLink = '<a href="' . route('Images.edit', $image->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (Image $image) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-image" data-image_id="' . $image->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })


            ->rawColumns(['status', 'editLink', 'deleteLink'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:images,code',
            'name' => 'required',
        ]);
        $image = new Image();


        $image->code  = $request->code;
        $image->name = $request->name;


        if ($request->status == 0) {
            $image->status == 0;
        }

        $image->status = $request->status;

        $image->created_by = Auth::user()->id;
        $image->updated_by = Auth::user()->id;

        $image->save();

        return redirect()->route('images.index')
            ->with('message_store', 'Image Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $images = Image::find($id);
        return view('folder.images.edit', compact('images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:images,code,$id",
        ]);
        $image = Image::find($id);


        $image->code  = $request->code;
        $image->name = $request->name;


        if ($request->status == 0) {
            $image->status == 0;
        }

        $image->status = $request->status;

        $image->updated_by = Auth::user()->id;

        $image->save();

        return redirect()->route('images.index')
            ->with('message_store', 'Image Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image  = Image::findOrFail($id);
        $image->delete();

        return redirect()->route('images.index')->with('message_update', 'Image Deleted Successfully');
    }
}
