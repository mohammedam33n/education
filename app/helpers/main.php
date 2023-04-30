<?php

if (!function_exists('getStudentTypes')) {
    function getStudentTypes()
    {
        return [
            'normal' => 'عادي',
            'dense' => 'مكثف',
        ];
    }
}


if (!function_exists('getMonthNames')) {
    function getMonthNames()
    {
        return [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
    }
}


if (!function_exists('getCurrectMonthName')) {
    function getCurrectMonthName()
    {
        return date('F');
    }
}


if (!function_exists('getPermissionKeys')) {
    function getPermissionKeys()
    {
        return [
            'c' => 'create',
            'u' => 'update',
            'd' => 'delete',
            'e' => 'edit',
            's' => 'show',
            'i' => 'index'
        ];
    }
}

if (!function_exists('getPermissionTables')) {
    function getPermissionTables()
    {
        return [
            'exam',
            'experience',
            'group',
            'groupDay',
            'groupStudent',
            'groupType',
            'lesson',
            'payment',
            'role',
            'student',
            'studentLesson',
            'studentLessonReview',
            'subject',
            'syllabus',
            'syllabusReview',
            'teacher',
            'user',
        ];
    }
}


if (!function_exists('getPermissionsForView')) {
    function getPermissionsForView()
    {
        $keys = getPermissionKeys();
        $tables = getPermissionTables();

        $permissions = [];

        foreach($tables as $table)
        {
            foreach($keys as $key => $value)
            {
                $permissions [$table] []= [
                    'key' => $value,
                    'value' => "$value-$table"
                ];
            }
        }
        return $permissions;
    }
}


if (!function_exists('getPermissionsForSeeder')) {
    function getPermissionsForSeeder()
    {
        $keys = getPermissionKeys();
        $tables = getPermissionTables();

        $permissions = [];

        foreach($tables as $table)
        {
            foreach($keys as $key => $value)
            {
                $permissions [] ['name']= "$value-$table";
            }
        }
        return $permissions;
    }
}