<?php
	class Blog_model extends MY_Model {
		var $table = 'blogs';

		public function getLastestBlogAtHome() {
			$this->db->order_by("created_at", "desc");
			$this->db->limit(3);
			$query = $this->db->get($this->table);
			return $query->result();
		}

		public function getBlogByAlias($alias)
		{
			$query = $this->db->get_where($this->table, array('alias' => $alias));			
        	return $query->row_array();
		}

	}
?>
