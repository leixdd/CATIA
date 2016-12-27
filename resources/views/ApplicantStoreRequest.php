<?php
namespace CATIA\Http\Requests;
use CATIA\Http\Requests\Request;
class ApplicantStoreRequest extends Request
{
	public function authorize()
	{
		return true;
	}
	public function rules()
	{
		return [
		'last_name' => 'required',
		'first_name' => 'required',
		'middle_name' => 'required',
		'num_street' => 'required',
		'barangay' => 'required',
		'district' => 'required',
		'city' => 'required',
		'province' => 'required',
		'region' => 'required',
		'email' => 'required|email',
		'contact' => 'required',
		'nationality' => 'required',
		'sex' => 'required',
		'cv_status' => 'required',
		'emp_status' => 'required',
		'bdate_month' => 'required',
		'bdate_day' => 'required',
		'bdate_year' => 'required',
		'age' => 'required',
		'bplace_city' => 'required',
		'bplace_province' => 'required',
		'bplace_region' => 'required',
		'educ_attain' => 'required',
		'classification' => 'required',
		'course' => 'required',
		'payment' => 'required'
		];
	}
}
?>