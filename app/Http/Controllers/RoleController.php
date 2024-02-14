<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */

    public function index(Request $request)
    {
        $permissions = permissions();
        return view('admin.role.index', compact('permissions'));

    }
    public function get_roles(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $status = "";

        if ($request->status != '') {
            $_SESSION['searchValEmpStat'] = $status = $request->status;
        } else if (isset($_SESSION['searchValEmpStat'])) {
            $status = $_SESSION['searchValEmpStat'];
        }
        if (empty($columnIndex_arr)) {
            $columnName = "id";
            $columnSortOrder = "desc";
        } else {
            // Column index
            $columnIndex = $columnIndex_arr[0]['column'];
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir'];
        }
        if (isset($search_arr['value'])) {
            $_SESSION['searchValEmp'] = $search_arr['value'];
        } else if (isset($_SESSION['searchValEmp'])) {
            $search_arr['value'] = $_SESSION['searchValEmp'];
        }
        $searchValue = $search_arr['value']; // Search value
        $role = new Role;
        // Total records
        $totalRecords = $role->get_count();
        $totalRecordswithFilter = $role->get_count($searchValue, $status);

        $records = $role->get_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status);

        $data_arr = array();

        foreach ($records as $record) {
            $edit_action = $delete_action = $view_action = '';

            $role_name = $record->name;
            $role_desc = $record->description;
            if (hasPermission('role.update')) {

                $edit_action = ' <span><a href="#roleEditForm" class="edit-item edit_role_btn"  title="Edit"
                data-id="' . Crypt::encrypt($record->id) . '" data-type="editrole" data-bs-toggle="offcanvas"
                href="#userEditForm" role="button" aria-controls="offcanvasExample1">
                <i class=" icon-close   fas fa-edit"></i></a></span>';
            }
            if (hasPermission('role.destroy') && $record->id>3) {

                $delete_action = '<span> <a
            href="#" class="delete-item delete_role_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
            }
            if (hasPermission('role.list')) {

                $view_action = '<span> <a href="#"
            class="delete-item view_role_btn" data-bs-toggle="modal" data-bs-target="#viewroleModal" title="View" data-id="' . Crypt::encrypt($record->id) . '"data-type="viewrole"> <i class="fa fa-eye eye-icon"></i></a></span>';
            }
            $data_arr[] = array(
                "name" => $role_name,
                "description" => $role_desc,
                "action" => $edit_action . ' ' . $delete_action . ' ' . $view_action,

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

    public function check_role_unique(Request $request)
    {
        $role = new Role;
        $role_details = $role->check_role_unique($request->name, $request->id);
        (count($role_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }

    public function getRoleDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->role_id);
            $role = Role::with('rolePermissions')->find($id);
            $role_permissions = $role->rolePermissions->pluck('permission');
            if ($role) {

                return response()->json([
                    'success' => true,
                    'data' => $role,
                    'permissions' => permissions(),
                    'role_permissions' => $role_permissions,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Role not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:60|unique:roles,name',
            'description' => 'required|min:3|max:80',

        ], [
            'name.required' => 'Please enter the Role name',
            'description.required' => 'please enter the description',
        ]);

        // DB::beginTransaction();

        try {
            $input = $request->only(['name', 'description']);
            $permissions_arr = $request->only(['permissions']);

            $role_id = Role::create($input)->id;
            if (count($permissions_arr) > 0) {

                foreach ($permissions_arr['permissions'] as $permission) {
                    RolePermission::create(['role_id' => $role_id, 'permission' => $permission]);
                }
            }
            Cache::forget('permissions');

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('role')->with('error', 'Something went wrong.');

        }

        return redirect()->route('role')->with('success', 'New Role successfully added.');

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
        $id = Crypt::decrypt($request->role_id);

        $this->validate($request, [
            'name' => 'required|min:3|max:60|unique:roles,name,' . $id,
            'description' => 'required|min:3|max:80',
        ], [
            'name.required' => 'Please enter the Role name',
            'description.required' => 'Please enter the description',
        ]);

        $input = $request->only(['name', 'description']);
        $permissions_arr = $request->only(['permissions']);

        try {
            $role = Role::find($id);
            $role->update($input);

            RolePermission::where('role_id', $role->id)->delete();
            if (count($permissions_arr) > 0) {

                foreach ($permissions_arr['permissions'] as $permission) {
                    RolePermission::create(['role_id' => $role->id, 'permission' => $permission]);
                }
            }
            Cache::forget('permissions');

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('role')->with('error', 'Something went wrong.');
        }
        return redirect()->route('role')->with('success', 'Role successfully Updated.');

    }

    public function destroy(Request $request)
    {

        try {
            $id = Crypt::decrypt($request->role_id);
            $user_details = User::where('role_id', $id)->exists();
            if ($user_details) {
                return redirect()->route('role')->with('error', "Can't delete the role because it is associated with a user.");
            }
            $role = Role::find($id);
            $role->delete();
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('role')->with('error', 'Something went wrong.');

        }

        return redirect()->route('role')->with('success', 'Role successfully deleted.');

    }
}
