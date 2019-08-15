<?php

class Pagetool
{
    ## 總件數
    protected $total = 0;
    
    ## 一頁顯示幾個
    protected $perpage = 5;  //

    ## 默認是第幾頁
    protected $page = 1;

    ## 一次顯示幾個頁碼
    protected $showpagelength = 5; 

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
    /*
     * 返回總頁數
     */
    public function getPageTotal()
    {
        if ($this->totalpage < 1) {
            return 1;
        }
        return $this->totalpage;
    }

    /*
     * 計算分頁碼
     */
    public function show()
    {
        $cnt = ceil(($this->total / $this->perpage));  //得到總頁數

        // $this->page = ($this->page >= $cnt) && ($this->page >= 1) ? $cnt : 1;
        $this->page = $this->page >= $cnt ? $cnt : $this->page;
        $this->page = $this->page <= 1 ? 1 : $this->page;
        
        $this->totalpage = $cnt;

        $nav = array($this->page);
        
        $left = $this->page - 1;
        $right = $this->page + 1;

        for ($left, $right; ($left >= 1 || $right <= $cnt) && count($nav) < $this->showpagelength; $left--, $right++) {
            if ($left >= 1) {
                array_unshift($nav, $left);
            }
            if ($right <= $cnt) {
                array_push($nav, $right);
            }
        }
        return $nav;
    }

    /*
     * 去除url的page參數 返回url
     */
    public function getUrl() 
    {
        $uri = $_SERVER["REQUEST_URI"];

        ## 分析URL
        $parse = parse_url($uri);   //parse_url()  

        $param = array();

        ## 如果query存在則存在陣列裡將 $parse 下的query 用parse_str 存為陣列
        if (isset($parse["query"])) {  //
            parse_str($parse["query"], $param);
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
