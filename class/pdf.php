<?php

//pdf.php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
	public function __construct()
	{
		parent::__construct();
	}
}


?>