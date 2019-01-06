<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class MY_Model extends CI_Model {

	// Ten table
		var $table = '';

		// Key chinh cua table
		var $key = 'id';

		// Order mac dinh (VD: $order = array('id', 'desc))
		var $order = '';

		// Cac field select mac dinh khi get_list (VD: $select = 'id, name')
		var $select = '';

		var $blog_id = 'blog_id';

		/**
		 * Them row moi
		 * $data : du lieu ma ta can them
		 */
		function create($data = array())
		{
			if($this->db->insert($this->table, $data))
			{
			   return TRUE;
			}else{
				return FALSE;
			}
		}

		/**
		 *return last_id
		*/

		function getLastId()
		{
			return $this->db->insert_id();
		}

		/**
		 * Cap nhat row tu id
		 * $id : khoa chinh cua bang can sua
		 * $data : mang du lieu can sua
		 */
		function update($id, $data)
		{
			if (!$id)
			{
				return FALSE;
			}

			$where = array();
		 	$where[$this->key] = $id;
		    $this->update_rule($where, $data);

		 	return TRUE;
		}

		/**
		 * Cap nhat row tu dieu kien
		 * $where : dieu kien
		 * $data : mang du lieu can cap nhat
		 */
		function update_rule($where, $data)
		{
			if (!$where)
			{
				return FALSE;
			}

		 	$this->db->where($where);
		 	$this->db->update($this->table, $data);

		 	return TRUE;
		}

		/**
		 * Xoa row tu id
		 * $id : gia tri cua khoa chinh
		 */
		function delete($id)
		{
			if (!$id)
			{
				return FALSE;
			}
			//neu la so
			if(is_numeric($id))
			{
				$where = array($this->key => $id);
			}else
			{
			    //$id = 1,2,3...
				$where = $this->key . " IN (".$id.") ";
			}
		 	$this->del_rule($where);

			return TRUE;
		}


		function deleteBlogTagByBlogId($blog_id)
		{
			if(!$blog_id) {
				return false;
			}
			if(is_numeric($blog_id)) {
				$where = array($this->blog_id => $blog_id);
			}
			$this->del_rule($where);
			return TRUE;
		}


		/**
		 * Xoa row tu dieu kien
		 * $where : mang dieu kien de xoa
		 */
		function del_rule($where)
		{
			if (!$where)
			{
				return FALSE;
			}

		 	$this->db->where($where);
			$this->db->delete($this->table);

			return TRUE;
		}

		/**
		 * Thực hiện câu lệnh query
		 * $sql : cau lenh sql
		 */
		function query($sql){
			$rows = $this->db->query($sql);
			return $rows->result;
		}
		function getDataLogin($usename,$password){
			$sql = "SELECT a.username,a.password,a.admin_group_id FROM admin a LEFT JOIN admin_group b ON a.admin_group_id = b.id WHERE a.username = ? AND a.password = ? LIMIT 0,1";
			$query = $this->db->query($sql, array($usename,$password));
			return $query->result();
		}

		/**
		 * Lay thong tin cua row tu id
		 * $id : id can lay thong tin
		 * $field : cot du lieu ma can lay
		 */
		function get_info($id, $field = '')
		{
			if (!$id)
			{
				return FALSE;
			}

		 	$where = array();
		 	$where[$this->key] = $id;

		 	return $this->get_info_rule($where, $field);
		}


		function getTagsBlog($id) {
			if (!$id)
			{
				return FALSE;
			}

		 	$sql = "SELECT c.value FROM blogs a INNER JOIN blog_tag b ON a.id = b.blog_id LEFT JOIN tags c ON b.tag_id = c.id WHERE a.id = ? ";
		 	$query = $this->db->query($sql, $id);
		 	return $query->result();
		}

		/**
		 * Lay thong tin cua row tu dieu kien
		 * $where: Mảng điều kiện
		 * $field: Cột muốn lấy dữ liệu
		 */
		function get_info_rule($where = array(), $field= '')
		{
		    if($field)
		    {
		        $this->db->select($field);
		    }
			$this->db->where($where);
			$query = $this->db->get($this->table);
			if ($query->num_rows())
			{
				return $query->row();
			}

			return FALSE;
		}

		/**
		 * Lay tong so
		 */
		function get_total($input = array())
		{
			$this->get_list_set_input($input);

			$query = $this->db->get($this->table);

			return $query->num_rows();
		}

		/**
		 * Lay tong so
		 * $field: cot muon tinh tong
		 */
		function get_sum($field, $where = array())
		{
			$this->db->select_sum($field);//tinh rong
			$this->db->where($where);//dieu kien
			$this->db->from($this->table);

			$row = $this->db->get()->row();
			foreach ($row as $f => $v)
			{
				$sum = $v;
			}
			return $sum;
		}

		/**
		 * Lay 1 row
		 */
		function get_row($input = array()){
			$this->get_list_set_input($input);

			$query = $this->db->get($this->table);

			return $query->row();
		}

		/**
		 * Lay danh sach
		 * $input : mang cac du lieu dau vao
		 */
		function get_list($input = array())
		{
		    //xu ly ca du lieu dau vao
			$this->get_list_set_input($input);

			//thuc hien truy van du lieu
			$query = $this->db->get($this->table);
			//echo $this->db->last_query();
			return $query->result();
		}

		function get_list_ignore($input = array()) {
			$this->get_list_set_input($input);

			//thuc hien truy van du lieu
			$query = $this->db->get($this->table);
			//echo $this->db->last_query();
			return $query->result();
		}

		/**
		 * Gan cac thuoc tinh trong input khi lay danh sach
		 * $input : mang du lieu dau vao
		 */

		protected function get_list_set_input($input = array())
		{

			// Thêm điều kiện cho câu truy vấn truyền qua biến $input['where']
			//(vi du: $input['where'] = array('email' => 'hocphp@gmail.com'))
			if ((isset($input['where'])) && $input['where'])
			{
				$this->db->where($input['where']);
			}

			if (((isset($input['where_not_in'])) && $input['where_not_in']))
			{
				//$where_parentid = 0;
				$this->db->where($input['where_parentid']);
				$this->db->where_not_in('id',$input['where_not_in']);
			}

			//tim kiem like
			// $input['like'] = array('name' => 'abc');
		    if ((isset($input['like'])) && $input['like'])
			{
				$this->db->like($input['like'][0], $input['like'][1]);
			}

			// Thêm sắp xếp dữ liệu thông qua biến $input['order']
			//(ví dụ $input['order'] = array('id','DESC'))
			if (isset($input['order'][0]) && isset($input['order'][1]))
			{
				$this->db->order_by($input['order'][0], $input['order'][1]);
			}
			else
			{
				//mặc định sẽ sắp xếp theo id giảm dần
				$order = ($this->order == '') ? array($this->table.'.'.$this->key, 'desc') : $this->order;
				$this->db->order_by($order[0], $order[1]);
			}

			// Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit']
			//(ví dụ $input['limit'] = array('10' ,'0'))
			if (isset($input['limit'][0]) && isset($input['limit'][1]))
			{
				$this->db->limit($input['limit'][0], $input['limit'][1]);
			}

		}

		/**
		 * kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
		 * $where : mang du lieu dieu kien
		 */
	    function check_exists($where = array())
	    {
		    $this->db->where($where);
		    //thuc hien cau truy van lay du lieu
			$query = $this->db->get($this->table);

			if($query->num_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
?>
