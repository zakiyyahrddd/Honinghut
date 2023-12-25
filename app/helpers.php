<?php

// use App\Http\Middleware\Student;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\PrivilegeCode;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

function generateFileName($title, $file)
{
    return Str::limit(Str::slug($title), 50, '') . '-' . strtotime('now') . '.' . $file->getClientOriginalExtension();
}

function removeFile($path)
{
    if (file_exists($path)) {
        unlink($path);
    }
}

function dateFormat($date)
{
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $hari = substr($date, 8, 2);
    if ($bulan == '01') {
        $bln = 'Januari';
    } elseif ($bulan == '02') {
        $bln = 'Februari';
    } elseif ($bulan == '03') {
        $bln = 'Maret';
    } elseif ($bulan == '04') {
        $bln = 'April';
    } elseif ($bulan == '05') {
        $bln = 'Mei';
    } elseif ($bulan == '06') {
        $bln = 'Juni';
    } elseif ($bulan == '07') {
        $bln = 'Juli';
    } elseif ($bulan == '08') {
        $bln = 'Agustus';
    } elseif ($bulan == '09') {
        $bln = 'September';
    } elseif ($bulan == '10') {
        $bln = 'Oktober';
    } elseif ($bulan == '11') {
        $bln = 'November';
    } else {
        $bln = 'Desember';
    }
    $tg = "$hari $bln $tahun";
    return $tg;
    // return date('d F Y', strtotime($date));
}

function activeLink($route, $resource = true, $output = 'active')
{
    $listResource = ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'];

    if (is_array($route)) {
        foreach ($route as $r) {
            if ($resource) {
                foreach ($listResource as $list) {
                    if (Route::current()->getName() == $r . '.' . $list)
                        return $output;
                }
            } else {
                if (Route::current()->getName() == $r)
                    return $output;
            }
        }
    } else {
        if ($resource) {
            foreach ($listResource as $list) {
                if (Route::current()->getName() == $route . '.' . $list)
                    return $output;
            }
        } else {
            if (Route::current()->getName() == $route)
                return $output;
        }
    }
}

function user()
{
    return Auth::user();
}

function checkPermission($user, $code)
{
    $privilegecode = PrivilegeCode::where('route_name', $code)->first();
    if ($privilegecode) {
        $permission = Permission::where('role_id', $user->role_id)
            ->where('privilege_code_id', $privilegecode->id)
            ->first();
        if ($permission) {
            return TRUE;
        } else {
            return abort(404);
        }
    } else {
        return abort(404);
    }
}

function getSidebar($code)
{
    $privilegecode = PrivilegeCode::where('route_name', $code)->first();
    if ($privilegecode) {
        $permission = Permission::where('role_id', user()->role_id)
            ->where('privilege_code_id', $privilegecode->id)
            ->first();
        if ($permission) {
            return TRUE;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function layoutSidebar()
{
    $sidebar = '';
    $parent = '';
    $privilegecodes = PrivilegeCode::orderBy('parent', 'ASC')
        ->orderBy('order', 'ASC')
        ->get();
    $permissions = Permission::where('role_id', user()->role_id)
        ->get();
    foreach ($privilegecodes as $privilegecode) {
        foreach ($permissions as $permission) {
            if ($privilegecode->route_name == $permission->privilegecode->route_name) {
                if ($privilegecode->parent != $parent) {
                    $sidebar .= '<li class="menu-header">' . $privilegecode->parent . '</li>';
                    $sidebar .= '<li class="' . activeLink('cp.' . $privilegecode->route_name) . '">';
                    $sidebar .= '<a class="nav-link" href="' . route('cp.' . $privilegecode->route_name . '.index') . '">';
                    $sidebar .= '<i class="' . $privilegecode->icon . '"></i> <span>' . $privilegecode->name . '</span>';
                    $sidebar .= '</a>';
                    $sidebar .= '</li>';
                } else {
                    $sidebar .= '<li class="' . activeLink('cp.' . $privilegecode->route_name) . '">';
                    $sidebar .= '<a class="nav-link" href="' . route('cp.' . $privilegecode->route_name . '.index') . '">';
                    $sidebar .= '<i class="' . $privilegecode->icon . '"></i> <span>' . $privilegecode->name . '</span>';
                    $sidebar .= '</a>';
                    $sidebar .= '</li>';
                }
                $parent = $privilegecode->parent;
            }
        }
    }

    // foreach ($permissions as $permission) {
    //     if ($permission->privilegecode->parent != $parent) {
    //         $sidebar .= '<li class="menu-header">' . $permission->privilegecode->parent . '</li>';
    //         $sidebar .= '<li class="' . activeLink('cp.' . $permission->privilegecode->route_name) . '">';
    //         $sidebar .= '<a class="nav-link" href="' . route('cp.' . $permission->privilegecode->route_name . '.index') . '">';
    //         $sidebar .= '<i class="' . $permission->privilegecode->icon . '"></i> <span>' . $permission->privilegecode->name . '</span>';
    //         $sidebar .= '</a>';
    //         $sidebar .= '</li>';
    //     } else {
    //         $sidebar .= '<li class="' . activeLink('cp.' . $permission->privilegecode->route_name) . '">';
    //         $sidebar .= '<a class="nav-link" href="' . route('cp.' . $permission->privilegecode->route_name . '.index') . '">';
    //         $sidebar .= '<i class="' . $permission->privilegecode->icon . '"></i> <span>' . $permission->privilegecode->name . '</span>';
    //         $sidebar .= '</a>';
    //         $sidebar .= '</li>';
    //     }
    //     $parent = $permission->privilegecode->parent;
    // }
    return $sidebar;
}

// function createRegistrationNumber($id)
// {
//     return 'REG-' . $id . strtotime(now());
// }

// function getPmbTimeActive()
// {
//     $now = date('Y-m-d');
//     $time = PmbTime::where('start_date', '<=', $now)
//         ->where('end_date', '>=', $now)
//         ->first();
//     return $time;
// }

function encrypt_text($string)
{
    return Crypt::encryptString($string);
}

function decrypt_text($string)
{
    try {
        return Crypt::decryptString($string);
    } catch (\Exception $e) {
        return $string;
    }
}

function currencyFormat($str)
{
    $str = number_format($str, 0, ",", ".");
    return $str;
}

// function generateNPM($registrant)
// {
//     $last_student = Student::where('major_id', $registrant->major_id)
//         ->where('generation', substr($registrant->pmbtime->schoolyear->name, 0, 4))
//         ->where('student_type', $registrant->student_type)
//         ->orderBy('id', 'DESC')
//         ->first();
//     if ($last_student) {
//         $npm = $last_student->npm + 1;
//     } else {
//         if ($registrant->student_type == 'Reguler') {
//             $no = 0;
//         } else {
//             $no = 1;
//         }
//         $npm = substr($registrant->pmbtime->schoolyear->name, 0, 4) . $no . $registrant->major->code . '001';
//     }
//     return $npm;
// }

function days()
{
    return [
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
    ];
}

// function semesters($type)
// {
//     $semesters = [
//         'Gasal' => [
//             '1', '3', '5', '7', '9'
//         ],
//         'Genap' => [
//             '2', '4', '6', '8', '10'
//         ]
//     ];
//     return $semesters[$type];
// }

// function getKetua()
// {
//     $user = User::where('role_id', 3)->first();
//     return $user;
// }

// function activeSemester()
// {
//     $semester = Semester::where('start_date', '<=', now())
//         ->where('end_date', '>=', now())
//         ->first();
//     return $semester;
// }

// function getStudentSemester($user)
// {
//     $now = activeSemester();
//     $semester = substr($now->school_year->name, 0, 4) - $user->student->generation;
//     if ($now->name == 'Gasal') {
//         $semester = $semester + 1;
//     } else {
//         $semester = $semester + 2;
//     }
//     return $semester;
// }

// function getSemesterNumber($user, $sem)
// {
//     $semester = substr($sem->school_year->name, 0, 4) - $user->student->generation;
//     if ($sem->name == 'Gasal') {
//         $semester = $semester*2 + 1;
//     } else {
//         $semester = $semester*2 + 2;
//     }
//     return $semester;
// }

// function toRupiah($text)
// {
//     return number_format($text, 0, ',', '.');
// }

// function getPaymentSPP($student_id, $semester_id)
// {
//     $spp = Payment::where('student_id', $student_id)
//         ->where('semester_id', $semester_id)
//         ->whereHas('payment_type', function ($query) {
//             $query->where('name', 'SPP');
//         })
//         ->first();
//     return $spp;
// }

// function getPaymentSKS($student_id, $semester_id)
// {
//     $sks = Payment::where('student_id', $student_id)
//         ->where('semester_id', $semester_id)
//         ->whereHas('payment_type', function ($query) {
//             $query->where('name', 'SKS');
//         })
//         ->first();
//     return $sks;
// }
