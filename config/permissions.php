<?php
return [

    'Role' => [
        'View' => ['role', 'role.list', 'role.details'],
        'Create' => ['role.store'],
        'Update' => ['role.update'],
        'Delete' => ['role.destroy'],
    ],
    'User' => [
        'View' => ['users', 'user.list', 'user.details', 'users.report', 'user.report.export'],
        'Create' => ['user.store'],
        'Update' => ['user.update'],
        'Delete' => ['user.destroy'],
        'Change Password' => ['user.changepassword'],
    ],
    'Policies' => [
        'View' => ['policy', 'policy.list', 'policy.details', 'policy.report', 'policy.export'],
        'Create' => ['policy.store'],
        'Update' => ['policy.update'],
        'Delete' => ['policy.destroy'],
    ],
    'Technology' => [
        'View' => ['technology', 'technology.list', 'technology.details', 'technology.report', 'technology.export'],
        'Create' => ['technology.store'],
        'Update' => ['technology.update'],
        'Delete' => ['technology.destroy'],
    ],
    'Job Role' => [
        'View' => ['job_role', 'job_role.list', 'job_role.details', 'job_role.report', 'job_role.export'],
        'Create' => ['job_role.store'],
        'Update' => ['job_role.update'],
        'Delete' => ['job_role.destroy'],
    ],
    'Skill' => [
        'View' => ['skill', 'skill.list', 'skill.details', 'skill.report', 'skill.export'],
        'Create' => ['skill.store'],
        'Update' => ['skill.update'],
        'Delete' => ['skill.destroy'],
    ],
    'Designation' => [
        'View' => ['designation', 'designation.list', 'designation.details', 'designation.report', 'designation.export'],
        'Create' => ['designation.store'],
        'Update' => ['designation.update'],
        'Delete' => ['designation.destroy'],
    ],
    'Department' => [
        'View' => ['department', 'department.list', 'department.details', 'department.report', 'department.export'],
        'Create' => ['department.store'],
        'Update' => ['department.update'],
        'Delete' => ['department.destroy'],
    ],
    'LeaveType' => [
        'View' => ['leave_type', 'leave_type.list', 'leave_type.details', 'leave_type.report', 'leave_type.export'],
        'Create' => ['leave_type.store'],
        'Update' => ['leave_type.update'],
        'Delete' => ['leave_type.destroy'],
    ],
    'Employee Category' => [
        'View' => ['employee-categories', 'employee-category.list', 'employee-category.report', 'employee-category.export'],
        'Create' => ['employee-category.store'],
        'Update' => ['employee-category.update'],
        'Delete' => ['employee-category.destroy'],
    ],
    'Sub Category' => [
        'View' => ['sub-categories', 'sub-category.list', 'sub-category.report', 'sub-category.export'],
        'Create' => ['sub-category.store'],
        'Update' => ['sub-category.update'],
        'Delete' => ['sub-category.destroy'],
    ],
    'Notification' => [
        'View' => ['notifications', 'notification.list'],
        'Create' => ['notification.store'],
        'Delete' => ['notification.destroy'],
    ],
    'Site Settings' => [
        'View' => ['site-settings'],
        'Update' => ['site-settings.update'],
    ],

];
