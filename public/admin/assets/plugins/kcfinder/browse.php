<?php
ob_start();
$temp_system_path = '../../../../../system';
$temp_application_folder = '../../../../../application';
include('../../../../../index.php');
//indclue(config/index.php);
ob_end_clean();
$CI =& get_instance();
$CI->load->library('session');
/** This file is part of KCFinder project
  *
  *   @desc Browser calling script
  *   @package KCFinder
  *   @version 3.12
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
  *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
  *      @link http://kcfinder.sunhater.com
  */

require "core/bootstrap.php";
$browser = "kcfinder\\browser"; // To execute core/bootstrap.php on older
$browser = new $browser();      // PHP versions (even PHP 4)
$browser->action();

?>
