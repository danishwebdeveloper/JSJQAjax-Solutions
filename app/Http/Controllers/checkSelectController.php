<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class checkSelectController extends Controller
{

    public function index(){


if(isset($_POST['clist'])) {
            $data = [];
            $action = $_POST['clist'];
            $parts = explode('-', $action);
            $field = $parts[0];
            $newValue = $parts[1];
            foreach ($_POST['peid'] as $pid => $val) {
                $projectEnd = Projectend::byId($pid);
                $projectEnd->$field = $newValue;
//                echo "storaing $field with $newValue of $pid ... ";
                $projectEnd->save();
                if ($projectEnd) {
                    $data['success'] = 1;
                    $data['message'] = "Updated Successfully!";
                } else {
                    $data['success'] = 2;
                    $data['message'] = "Not Updated!";
                }
            }
            echo json_encode($data);
            return "";
        }
    }
 }
