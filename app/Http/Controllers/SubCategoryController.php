<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
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
        $parent_catergories = $this->categoryData->where('parent_category_id', null)->get();
        return view('admin.sub_category.index', compact('parent_catergories'));
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
                    $query->where('parent_category_id', '!=', null);
                }),
            ],
            'category_name' => [
                'required',
                'min:3',
                'max:60',
                Rule::unique('categories', 'category_name')->where(function ($query) {
                    $query->where('parent_category_id', '!=', null);
                }),
            ],
            'parent_category' => 'required',
            'status' => 'required',
        ]);

        try {
            $input = $request->only(['category_code', 'category_name', 'status']);
            $input['parent_category_id'] = $request->parent_category;
            $input['created_by'] = Auth::user()->id;

            $category_id = Category::create($input)->id;

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('sub-categories')->with('error', 'Something went wrong.');

        }

        return redirect()->route('sub-categories')->with('success', 'New Sub Category successfully added.');
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
                    $query->where('parent_category_id', '!=', null)->where('id', '!=', $id);

                }),
            ],
            'category_name' => [
                'required',
                'min:3',
                'max:60',
                Rule::unique('categories', 'category_name')->where(function ($query) use ($id) {
                    $query->where('parent_category_id', '!=', null)->where('id', '!=', $id);
                }),
            ],
            'parent_category' => [
                'required',
                function ($attribute, $value, $fail) use ($id) {
                    if ($value == $id) {
                        $fail($attribute . ' must be different from the current category.');
                    }
                },
            ],
            'status' => 'required',
        ]);

        $input = $request->only(['category_code', 'category_name', 'status']);
        $input['parent_category_id'] = $request->parent_category;

        try {
            $category = Category::find($id);
            $category->update($input);

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('sub-categories')->with('error', 'Something went wrong.');
        }
        return redirect()->route('sub-categories')->with('success', 'Sub category successfully Updated.');

    }

    public function destroy(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->cat_id);
            $child_cats = Category::where('parent_category_id', $id)->exists();
            if ($child_cats) {
                return redirect()->route('sub-categories')->with('error', 'You cannot delete this category because it has child categories associated.');

            }

            $category = Category::find($id);
            $category->delete();
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('sub-categories')->with('error', 'Something went wrong.');

        }

        return redirect()->route('sub-categories')->with('success', 'Sub Category successfully deleted.');
    }

    public function get_sub_categories(Request $request, $is_list)
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
            $_SESSION['searchValSubCat'] = $search_arr['value'];
        } else if (isset($_SESSION['searchValSubCat'])) {
            $search_arr['value'] = $_SESSION['searchValSubCat'];
        }
        $searchValue = $search_arr['value']; // Search value
        $status = $request->status;
        if ($request->status != '') {
            $_SESSION['searchValSubCatStat'] = $request->status;
        } else if (isset($_SESSION['searchValSubCatStat'])) {
            $status = $_SESSION['searchValSubCatStat'];
        }
        $sub_cat = new Category;
        // Total records
        $totalRecords = $sub_cat->get_sub_cat_count();
        $totalRecordswithFilter = $sub_cat->get_sub_cat_count($searchValue, $status);

        // Fetch records
        $records = $sub_cat->get_sub_cat_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status);

        $data_arr = array();
        foreach ($records as $record) {
            $sub_cat_code = $record->category_code;
            $sub_cat_name = $record->category_name;
            $sub_parent_category = $record->parentCategory->category_name;
            $status = ($record->status == 1) ? 'Active' : 'Inactive';

            $data_arr[] = array(
                "category_code" => $sub_cat_code,
                "category_name" => $sub_cat_name,
                "parent_category_name" => $sub_parent_category,

                "status" => $status,
                'action' => view('admin/sub_category/actions', compact('record'))->render(),

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
        return view('admin.sub_category.report');

    }

    public function check_subcat_code(Request $request)
    {
        $cat = new Category;
        $cat_details = $cat->get_subcat_code($request->sub_cat_code, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }
    public function check_subcat_name(Request $request)
    {
        $cat = new Category;
        $cat_details = $cat->get_subcat_name($request->sub_cat_name, $request->id);
        (count($cat_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }

    public function checkparentCategory(Request $request)
    {
        $catId = Crypt::decrypt($request->cat_id);
        $parentCategory = $request->input('parent_category');
        ($catId == $parentCategory) ? $data['status'] = 1 : $data['status'] = 0;

        return json_encode($data);

    }
}
