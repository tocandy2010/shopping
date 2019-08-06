<?php

class Helper
{
    private $errorInfo = [];

    public function checkForm($arr, $verification)
    {
        $errordata = [];
        $this->getVerification($arr, $verification);

        $message = [
            'length' => '輸入長度有誤',
            'notempty' => '不可空白',
            'email' => '請輸入正確email',
            'phone' => '手機號碼錯誤',
            'between' => "超過數字範圍"
        ];

        if (!empty($this->errorInfo)) {
            foreach ($this->errorInfo as $errorkey => $errorval) {
                if (array_key_exists($errorval, $message)) {
                    $errordata[$errorkey] = $message[$errorval];
                }
            }
        }
        return $errordata;
    }

    private function getVerification($arr, $verification)  //自動驗證
    {
        if (empty($arr)) {
            $this->errorInfo['empty'] = 'array is empty';
            return false;
        }
        foreach ($verification as $key => $value) {
            if (array_key_exists($key, $arr)) {
                foreach ($value as $k => $v) {
                    if (!$this->checkVerification($k, $arr[$key], $v)) {
                        if (!array_key_exists($key, $this->errorInfo)) {
                            $this->errorInfo[$key] = "{$k}";
                        }
                    }
                }
            }
        }
    }

    private function checkVerification($key, $data, $v)  //自動驗證檢查
    {
        switch ($key) 
        {
            case 'length':
                $len = mb_strlen($data);
                $res = explode('~', $v);
                return ($len >= $res[0] && $len <= $res[1]); //驗證字串長度
                break;
            case 'notempty':
                return !empty($data); //驗證是否為空
                break;
            case 'email':
                return !filter_var($data, FILTER_VALIDATE_EMAIL) === false; //驗證是否為email格式
                break;
            case 'between':
                $res = explode('~', $v);
                return ($data >= $res[0] && $data <= $res[1]); //驗證是否為email格式
                break;
            case 'phone':
                return !(preg_match_all('/[0][9][0-9]{8}$/', $data) === 0);
        }
    }

    public function removeAllSpace($str)
    {
        return str_replace( " ", "",$str);
    }

}
