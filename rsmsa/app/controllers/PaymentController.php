<?php
/**
 * This is the driver controller
 * 
 * @author Vincent P. Minde
 *
 */
class PaymentController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Payment::all();
	}

	/**
	 * Get person given the id.
	 *
	 * @return Person
	 */
	public function getPayment($id)
	{
		return Payment::find($id);
	}
	public function saveReceipt(){
		$request = Request::instance();
		$content = $request->getContent();
		$json = json_decode($content,true);
		$receipt = new Receipt();
		$receipt->setValuesByJSON($json);
		$receipt->save();
		return $receipt;
	}
}
