<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Application extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('brand_model');
        $this->load->model('catalog_model');
        $this->load->model('menu_model');
        $this->load->model('config_model');

        $_datafooter['catalog'] = $this->createTree($this->menu_model->getTreeItems());
        $data['brands'] = $this->brand_model->get_list();
        $configs = $this->config_model->get_list();

        $data['title'] = $configs[0]->title;
        $this->load->vars($_datafooter);
        $this->load->vars($data);
    }

    function createTree($arrData, $level = 0) {
            $str = "";
            $strUlClass ='hidden-xs';
            if (count($arrData) > 0) {
                if($level == 0) {
                    $strLiClass = 'level0 parent drop-menu';
                }
                else {
                    $strLiClass = 'level1 first';
                }
                foreacH($arrData as $objItem) {
                    $str.= '<li class="'.$strLiClass.'"><a href="#"><span>'.$objItem->name.'</span></a>';
                    if (isset($objItem->arrChilds) && count($objItem->arrChilds) > 0) {
                        $str.= '<ul class="level1">';
                        $str.= $this->createTree($objItem->arrChilds,$level+1);
                        $str.= '</li>';
                        $str.= '</ul>';
                    }
                    $str.= '</a>';
                    $str.= '</li>';
                }
            }
            return $str;
        }

}

?>
