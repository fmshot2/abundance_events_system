<?php

if (!function_exists('res_success')) {
    function res_auth_success($message, $data, $auth_token)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => '000',
            'message' => $message,
            'auth_token' => $auth_token,
            'data' => $data
        ], 200);
    }
}


if (!function_exists('res_success')) {
    function res_success($message, $data)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => '000',
            'message' => $message,
            'data' => $data
        ], 200);
    }
}

if (!function_exists('res_created')) {
    function res_created($message, $data)
    {
        return response()->json([
            'status' => 'created',
            'status_code' => '001',
            'message' => $message,
            'data' => $data
        ], 201);
    }
}

if (!function_exists('res_completed')) {
    function res_completed($message)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => '017',
            'message' => $message,
        ], 200);
    }
}

if (!function_exists('res_new_otp_sent')) {
    function res_new_otp_sent($message)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => '018',
            'message' => $message,
        ], 200);
    }
}

if (!function_exists('res_bad_request')) {
    function res_bad_request($message)
    {
        return response()->json([
            'status' => 'created',
            'status_code' => '011',
            'message' => $message,
            'error' => 'Bad Request.'
        ], 400);
    }
}

if (!function_exists('res_unauthorized')) {
    function res_unauthorized($message)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => '012',
            'message' => $message,
            'error' => 'Unauthorized.'
        ], 401);
    }
}

if (!function_exists('res_not_found')) {
    function res_not_found($message)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => '013',
            'message' => $message,
            'error' => 'Not Found.'
        ], 404);
    }
}

if (!function_exists('res_token_mismatch')) {
    function res_token_mismatch($message)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => '014',
            'message' => $message,
            'error' => 'Token Mismatch.'
        ], 419);
    }
}

if (!function_exists('res_unprocess_entity')) {
    function res_unprocess_entity($message)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => '015',
            'message' => $message,
            'error' => 'Unproccessable Entity.'
        ], 422);
    }
}

if (!function_exists('res_wrong_value')) {
    function res_wrong_value($message)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => '016',
            'message' => $message,
            'error' => 'Wrong value provided.'
        ], 400);
    }
}

if (!function_exists('res_general_error')) {
    function res_general_error($message, $code)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => '050',
            'message' => $message,
        ], $code);
    }
}
