<?php


if (!function_exists('permissions')) {

    function permissions()
    {
        return Config::get('permissions', []);
    }
}

if (!function_exists('getPermissionWithRoutePath')) {

    function getPermissionWithRoutePath($route, $permits, $pre_path)
    {

        if (is_array($permits) && count($permits) > 0) {

            foreach ($permits as $key => $value) {

                $temp_path = $pre_path;

                array_push($temp_path, $key);

                if (is_array($value) && count($value) > 0) {
                    $res_path = getPermissionWithRoutePath($route, $value, $temp_path);

                    if ($res_path != null) {
                        return $res_path;
                    }
                } else if ($value == $route) {
                    return $temp_path;
                }
            }
        }

        return null;
    }
}

if (!function_exists('hasPermission')) {

    function hasPermission($route)
    {

        if (config('app.debug', false) && !config('app.permission', true)) {
            return 1;
        }

        $authUser = Auth::user();

        if (!$authUser) {
            return 0;
        }
     
        $role = $authUser->role;


        if (!$role) {
            return 0;
        }

        $role_id = $role->id;

        $permissionKeys = [];


        // if (Cache::has('permissions')) {

        //     $permissionKeys = Cache::get('permissions');


        // } else {

            $permissions = App\Models\RolePermission::all();

            $permissionKeys = [];

            foreach ($permissions as $permission) {
                $permissionKeys[] = $permission->role_id . '|' . $permission->permission;
            }


            Cache::forever('permissions', $permissionKeys);
        // }

        $routePath = getPermissionWithRoutePath($route, permissions(), []);


        if (is_array($routePath)) {
            if (count($routePath) == 3) {

                if (in_array($role_id . '|' . $routePath[0] . '-' . $routePath[1], $permissionKeys)) {
                    return 1;
                }
            }
        }

        return 0;
    }
}