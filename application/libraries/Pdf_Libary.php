<?php

/**
 * Description of Pdf
 *
 * @author frlramos
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf_Libary extends TCPDF {

    function __construct() {
        parent::__construct();
    }

}
