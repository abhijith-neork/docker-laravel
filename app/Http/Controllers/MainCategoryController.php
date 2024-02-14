<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MainCategoryController extends Controller
{

    private Category $category;

    public function __construct(Category $category)
    {
        $this->categoryData = $category;
        session_start();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.main_category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_code' => [
                'required',
                'min:3',
                'max:10',
                Rule::unique('categories', 'category_code')->where(function ($query) {
                    $query->where('parent_category_id', null);
                }),
            ],
            'category_name' => [
                'required',
                'min:3',
                'max:60',
                Rule::unique('categories', 'category_name')->where(function ($query) {
                    $query->where('parent_category_id', null);
                }),
            ],
            'status' => 'required',
        ]);

        // DB::beginTransaction();

        try {
            $input = $request->only(['category_code', 'category_name', 'status']);
            $input['created_by'] = Auth::user()->id;

            $category_id = Category::create($input)->id;

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('employee-categories')->with('error', 'Something went wrong.');

        }

        return redirect()->route('employee-categories')->with('success', 'New Employee Category successfully added.');
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
    public function update(Request $request)
    {
        $id = Crypt::decrypt($request->cat_id);

        $this->validate($request, [
            'category_code' => [
                'required',
                'min:3',
                'max:10',
                Rule::unique('categories', 'category_code')->where(function ($query) use ($id) {
                    $query->where('parent_category_id', null)->where('id', '!=', $id);

                }),
            ],
            'category_name' => [
                'required',
                'min:3',
                'max:60',
                Rule::unique('categories', 'category_name')->where(function ($query) use ($id) {
                    $query->where('parent_category_id', null)->where('id', '!=', $id);
                }),
            ],
            'status' => 'required',
        ]);

        $input = $request->only(['category_code', 'category_name', 'status']);

        try {
            $category = Category::find($id);
            $category->update($input);

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('employee-categories')->with('error', 'Something went wrong.');
        }
        return redirect()->route('employee-categories')->with('success', 'Employee category successfully Updated.');

    }

    public function destroy(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->cat_id);
            $child_cats = Category::where('parent_category_id', $id)->exists();
            if ($child_cats) {
                return redirect()->route('employee-categories')->with('error', 'You cannot delete this category because it has child categories associated.');

            }

            $category = Category::find($id);
            $category->delete();
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('employee-categories')->with('error', 'Something went wrong.');

        }

        return redirect()->route('employee-categories')->with('success', 'Employee Category successfully deleted.');
    }

    public function get_main_categories(Request $request, $is_list)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        if (empty($columnIndex_arr)) {
            $columnName = "id";
            $columnSortOrder = "desc";
        } else {
            // Column index
            $columnIndex = $columnIndex_arr[0]['column'];
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir'];
        }
        if ($search_arr['value'] != '') {
            $_SESSION['searchValMainCat'] = $search_arr['value'];
        } else if (isset($_SESSION['searchValMainCat'])) {
            $search_arr['value'] = $_SESSION['searchValMainCat'];
        }
        $searchValue = $search_arr['value']; // Search value
        $status = $request->status;
        if ($request->status != '') {
            $_SESSION['searchValMainCatStat'] = $request->status;
        } else if (isset($_SESSION['searchValMainCatStat'])) {
            $status = $_SESSION['searchValMainCatStat'];
        }
        $main_cat = new Category;
        // Total records
        $totalRecords = $main_cat->get_main_cat_count();
        $totalRecordswithFilter = $main_cat->get_main_cat_count($searchValue, $status);

        // Fetch records
        $records = $main_cat->get_main_cat_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status);

        $data_arr = array();
        foreach ($records as $record) {
            $main_cat_code = $record->category_code;
            $main_cat_name = $record->category_name;
            $status = ($record->status == 1) ? 'Active' : 'Inactive';

            $data_arr[] = array(
                "category_code" => $main_cat_code,
                "category_name" => $main_cat_name,
                "status" => $status,
                'action' => view('admin/main_category/actions', compact('record'))->render(),

            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        return response()->json($response);
    }

    public function getcategoryDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->cat_id);
            $category = Category::find($id);
            if ($category) {

                return response()->json([
                    'success' => true,
                    'data' => $category,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function maincategoryReport(Request $request)
    {
        return view('admin.main_category.report');

    }

    public function check_maincat_code(Request $request)
    {
        $cat = new Category;
        $cat_details = $cat->get_maincat_code($request->main_cat_code, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
    public function check_maincat_name(Request $request)
    {
        $cat = new Category;
        $cat_details = $cat->get_maincat_name($request->main_cat_name, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
}
