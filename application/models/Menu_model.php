<?php
    class Menu_Model extends MY_Model {
        public function getTreeItems() {
            $query = $this->db
                    ->select('*')
                    ->from('catalog')
                    ->get();
            $arrTree = $query->result();
            $arrTreeById = [];
            $arrItems = [];

            foreach ($arrTree as $objItem) {
                $arrTreeById[$objItem->id] = $objItem;
                $objItem->arrChilds = [];
            }

            foreach($arrTreeById as $objItem) {
                if ($objItem->parent_id == 0) $arrItems[] = $objItem;
                if (isset($arrTreeById[$objItem->parent_id])) $arrTreeById[$objItem->parent_id]->arrChilds[] =  $objItem;
            }
            return $arrItems;
        }
    }
?>
