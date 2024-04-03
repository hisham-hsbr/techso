<?php

namespace App\Http\Controllers\fixancare;

use App\Models\Fixancare\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $images = Image::all();
        $image_types = $images->sortBy('type')->pluck('type')->unique();
        $image_groups = $images->sortBy('group')->pluck('group')->unique();
        $image_parents = $images->sortBy('parent')->pluck('parent')->unique();
        return view('back_end.fixancare.images.index',compact('images','image_types','image_groups','image_parents'))->with('i');
    }

    public function imagesGet()
    {

        $images = Image::all();
        return Datatables::of($images)

        ->setRowId(function ($image) {
            return $image->id;
            })

            ->editColumn('status', function (Image $image) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($image->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
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

            $editLink ='<a href="'. route('images.edit', $image->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (Image $image) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-image" data-image_id="'.$image->id.'" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
               return $deleteLink;
        })


       ->rawColumns(['status','editLink','deleteLink'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.fixancare.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'code' => 'required|unique:images,code',
            'title' => 'required',
            'name' => 'required',
            'url' => 'required',
            'type' => 'required',
            'group' => 'required',
            'parent' => 'required',
            'posting_date' => 'required',
        ]);
        $image = new Image();


        $image->code  = $request->code;
        $image->title = $request->title;
        $image->name = $request->name;
        $image->posting_date = $request->posting_date;
        $image->starting_date = $request->starting_date;
        $image->ending_date = $request->ending_date;

        $file_name=$request->code.'.jpg';
        $file=$request->file('url');
        $folder=$request->type;
        $path = Storage::disk('public')->putFileAs('images/fixancare/'.$folder,$file,$file_name);

        // dd($file);
        $image->url = $path;
        $image->type = $request->type;
        $image->group = $request->group;
        $image->parent = $request->parent;
        $image->description = $request->description;


        if ($request->status==0)
            {
                $image->status==0;
            }

        $image->status = $request->status;

        $image->created_by = Auth::user()->id;
        $image->updated_by = Auth::user()->id;

        $image->save();

        return redirect()->route('images.index')
                        ->with('message_store', 'Image Created Successfully');




        // if($old_image = $request->user()->avatar){
        //     Storage::disk('public')->delete($old_image);
        // }
        // $file_name=Auth::user()->email.'.jpg';

        // $file=$request->file('avatar');

        // $path = Storage::disk('public')->putFileAs('images/avatars/users',$file,$file_name);
        // $id=Auth::user()->id;
        // $user  = User::findOrFail($id);
        // $user->avatar=$path;
        // $user->update();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = Image::find($id);
        return view('back_end.fixancare.images.show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('back_end.fixancare.images.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => "required|unique:images,code,$id",
            'title' => 'required',
            'name' => 'required',
            'type' => 'required',
            'group' => 'required',
            'parent' => 'required',
            'posting_date' => 'required',
        ]);
        $image = Image::find($id);


        $image->code  = $request->code;
        $image->title = $request->title;
        $image->name = $request->name;
        $image->posting_date = $request->posting_date;
        $image->starting_date = $request->starting_date;
        $image->ending_date = $request->ending_date;

        if($request->has('url')){

            $old_image = $image->url;
            Storage::disk('public')->delete($old_image);

            $file_name=$request->code.'.jpg';
            $file=$request->file('url');
            $folder=$request->type;
            $path = Storage::disk('public')->putFileAs('images/fixancare/'.$folder,$file,$file_name);
            $image->url = $path;
        }

        $image->type = $request->type;
        $image->group = $request->group;
        $image->parent = $request->parent;
        $image->description = $request->description;


        if ($request->status==0)
            {
                $image->status==0;
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
        $old_image = $image->url;
            Storage::disk('public')->delete($old_image);

        return redirect()->route('images.index')
                ->with('message_update', 'Image Deleted Successfully');
    }
}
