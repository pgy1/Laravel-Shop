<?php namespace App\Services;

/*
作用是返回如下格式：
{
    code: "0"
    result: {

    }
}
在controller中的调用方式：AjaxResponse::success();
整套步骤为：创建Service（服务）->Providers（数据提供）->Facades(门面)->修改app.php
*/

class AjaxResponse{
    protected function ajaxResponse($code, $message, $data = null)
    {
        $out = [
            'code' => $code,
            'message' => $message,
        ];

        if ($data !== null) {
            $out['result'] = $data;
        }

        return response()->json($out);
    }

    public function success($data = null)
    {
        $code = ResultCode::Success;
        return $this->ajaxResponse(0, '', $data);
    }

    public function fail($message, $extra = [])
    {
        return $this->ajaxResponse(1, $message, $extra);
    }
}

?>