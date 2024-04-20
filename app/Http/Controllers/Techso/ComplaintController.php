<?php

namespace App\Http\Controllers\Techso;

use Illuminate\Http\Request;
use App\Imports\ComplaintImport;
use App\Models\Techso\Complaint;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');

         $this->middleware('permission:Complaint Read', ['only' => ['index']]);
         $this->middleware('permission:Complaint Create', ['only' => ['create','store']]);
         $this->middleware('permission:Complaint Edit', ['only' => ['Edit','Update']]);
         $this->middleware('permission:Complaint Delete', ['only' => ['destroy']]);

     }

     public function index()
     {
         $complaints = Complaint::all();
         $createdByUsers = $complaints->sortBy('createdBy')->pluck('createdBy')->unique();
         $updatedByUsers = $complaints->sortBy('updatedBy')->pluck('updatedBy')->unique();
         return view('back_end.techso.masters.complaints.index',compact('complaints','createdByUsers','updatedByUsers'))->with('i');
     }

     public function complaintsGet()
     {

         $complaints = Complaint::all();
         return Datatables::of($complaints)

         ->setRowId(function ($complaint) {
             return $complaint->id;
             })

             ->editColumn('status', function (Complaint $complaint) {

                 $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                 $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                 $activeId = ($complaint->status);

                     if($activeId==1){
                         $activeId = $active;
                     }
                     else {
                         $activeId = $inActive;
                     }
                     return $activeId;
             })


         ->editColumn('created_by', function (Complaint $complaint) {

             return ucwords($complaint->CreatedBy->name);
         })


         ->editColumn('updated_by', function (Complaint $complaint) {

             return ucwords($complaint->UpdatedBy->name);
         })
         ->addColumn('created_at', function (Complaint $complaint) {
             return $complaint->created_at->format('d-M-Y h:m');
         })
         ->addColumn('updated_at', function (Complaint $complaint) {

             return $complaint->updated_at->format('d-M-Y h:m');
         })

         ->addColumn('editLink', function (Complaint $complaint) {

             $editLink ='<a href="'. route('complaints.edit', $complaint->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
         })
         ->addColumn('deleteLink', function (Complaint $complaint) {
            $CSRFToken = "csrf_field()";
             $deleteLink ='
                         <button class="btn btn-link delete-complaint" data-complaint_id="'.$complaint->id.'" type="submit"><i
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
         return view('back_end.techso.masters.complaints.create');
     }

     public function complaintsImport()
      {
          return view('back_end.techso.masters.complaints.import');
      }

      public function complaintsDownload()
      {
          $path=public_path('downloads/sample_excels/complaints_import_sample.xlsx');
          return response()->download($path);
      }

      public function complaintsUpload(Request $request)
      {
         $request->validate([
             'data'=>'required'
         ]);

         try {
             Excel::import(new ComplaintImport,$request->file('data'));
             return redirect()->route('complaints.index')
             ->with('message_store', 'complaints Import Successfully');
         } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
              $failures = $e->failures();
              return redirect()->back()->with('import_errors',$failures);
         }
      }

     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         $this->validate($request, [
             'code' => 'required|unique:complaints,code',
             'name' => 'required',
         ]);
         $complaint = new Complaint();


         $complaint->code  = $request->code;
         $complaint->name = $request->name;


         if ($request->status==0)
             {
                 $complaint->status==0;
             }

         $complaint->status = $request->status;

         $complaint->created_by = Auth::user()->id;
         $complaint->updated_by = Auth::user()->id;

         $complaint->save();

         return redirect()->route('complaints.index')
                         ->with('message_store', 'Complaint Created Successfully');
     }

     /**
      * Display the specified resource.
      */
     public function show(Complaint $complaint)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit($id)
     {
         $complaint = Complaint::find($id);
         return view('back_end.techso.masters.complaints.edit',compact('complaint'));
     }

     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, $id)
     {
         $this->validate($request, [
             'name' => 'required',
             'code' => "required|unique:complaints,code,$id",
         ]);
         $complaint = Complaint::find($id);


         $complaint->code  = $request->code;
         $complaint->name = $request->name;


         if ($request->status==0)
             {
                 $complaint->status==0;
             }

         $complaint->status = $request->status;

         $complaint->updated_by = Auth::user()->id;

         $complaint->save();

         return redirect()->route('complaints.index')
                         ->with('message_store', 'Complaint Updated Successfully');
     }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         $complaint  = Complaint::findOrFail($id);
         $complaint->delete();

         return redirect()->route('complaints.index')->with('message_update', 'Complaint Deleted Successfully');

     }
}
