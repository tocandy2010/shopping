<html>
<head>
<meta charset="utf-8">

</head>
<script>
</script>
<style>



</style>
<body>



<?php






class cat extends model{
	protected $table = 'category';
	public function add($data){
		return $this->db->autoExecute($this->table,$data);
	}
	
	public function update($data,$cat_id){
		$this->db->autoExecute($this->table,$data,'update',' where cat_id = '.$cat_id);
		return  $this->db->affected_rows();
	}
	
	public function select(){
		$sql = 'select cat_id,cat_name,intro,parent_id from '.$this->table." order by cat_name desc";
		return $this->db->getAll($sql);
	}
	
	public function getcattree($arr,$id=0,$lev=0 ){
		
		$tree = array();  //不可使用靜態方法   因為如果同業面調用此2方2次將造成錯誤
		
		foreach($arr as $v){
			if($v['parent_id']==$id){
				$v['lev'] = $lev;
				$tree[] = $v;
				$tree = array_merge($tree,$this->getcattree($arr,$v['cat_id'],$lev+1));
			}
		}
		return $tree;
	}
	
	public function family($arr,$id = 0){
		static $data = array();
		
		foreach($arr as $v){
			if($v['parent_id'] == $id){
				$data[] = $v;
				}
			}
		return $data;			
		}
	
	public function gettree($id){
		$cats = $this->select();
		$son = array();
		foreach($cats as $v){
			if($v['cat_id']== $id){
				$son[] = $v;
				$son = array_merge($son,$this->gettree($v['parent_id']));
			}
		}
		return array_reverse($son);
	}
	
	public function delete($cat_id = 0){
		$sql = 'delete from '.$this->table.' where cat_id = '.$cat_id;
		$this->db->query($sql);
		return $this->db->affected_rows();   //判斷是否真實影響資料庫 
	}
	
	
	public function findd($cat_id){
		$sql = 'select * from '.$this->table." where cat_id = ".$cat_id;
		return $this->db->getrow($sql);
	}
	
}




?>


</table>

</body>
</html>