<?php

class Pagetool
{
    protected $total = 0;  //總數
    protected $perpage = 5;  //一頁顯示幾個
    protected $page = 1;  //默認是第幾頁

    public function __construct($total, $page = false, $perpage = false)
    {
        $this->total = $total;
        if ($perpage) {
            $this->perpage = $perpage;
        }
        if ($page) {
            $this->page = $page;
        }
    }

    public function getPageTotal()
    {
        if ($this->totalpage < 1) {
            return 1;
        }
        return $this->totalpage;
    }

    public function show()
    {
        $cnt = (int)ceil(($this->total / $this->perpage));  //得到總頁數

        $this->page = ($this->page <= $cnt) && ($this->page >= 1) ? $cnt : 1;
        
        $this->totalpage = $cnt;

        $nav = array($this->page);
        
        $left = $this->page - 1;
        $right = $this->page + 1;

        for ($left, $right; ($left >= 1 || $right <= $cnt) && count($nav) < 5; $left--, $right++) {
            if ($left >= 1) {
                array_unshift($nav, $left);
            }
            if ($right <= $cnt) {
                array_push($nav, $right);
            }
        }
        return $nav;
    }

    public function getUrl() 
    {
        $uri = $_SERVER["REQUEST_URI"];

        $parse = parse_url($uri);   //parse_url()  分析URL

        $param = array();
        if (isset($parse["query"])) {  //如果query存在則存在陣列裡
            parse_str($parse["query"], $param);   //將 $parse 下的query 用parse_str 存為陣列
        }
        if (isset($param["page"])) {
            unset($param["page"]);
        }

        $url = $parse["path"] . "?";

        if (!empty($param)) {
            $url = $url . http_build_query($param) . "&";
        }
        return $url;
    }
}
