<?php

/**
 * PDF class 
 */

defined('ROOTPATH') or exit('Access Denied!');
use Dompdf\Dompdf;

class PDF
{
	use Controller;

	public function index($id = null)
	{

		
	}

	public function userProfilePDF($id = null)
	{

		$user = new User();

		$data['row'] = $user->first(['id' => $id]);

		$url = ROOT . "/admin/users/pdf/$id";
		$id = extract_id_from_url($url);
		$data['id'] = $id;


		// /*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$dompdf = new Dompdf();

		// /*** RENDER VIEW ***/
		$html = $this->renderView('admin/users/user-profile-pdf');

		$dompdf->loadHtml($html);
		$dompdf->set_option('isRemoteEnabled', true);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream($data['row']->firstname . '_' . $data['row']->surname . '_Profile.pdf', [
			'Attachment' => 0
		]);
	}

	// Helper function to 'payments' function
	private function renderView($viewName)
	{
		ob_start();
		$this->view($viewName);
		$content = ob_get_clean();
		return $content;
	}
}
