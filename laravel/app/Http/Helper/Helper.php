<?php

namespace App\Http\Helper;


Class Helper {

    public function response($status, $code_error = null, $data = null, $message = null){
        return response()->json([
            "status"  => $status,
            "data"    => $data,
            "message" => $message
        ], $code_error);
    }
}
