<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\manpower_profile;

class UpdateApplicantCommand extends Command implements SelfHandling
{
    public $id;
    public $image_href;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $num_street;
    public $barangay;
    public $district;
    public $city;
    public $province;
    public $region;
    public $email;
    public $contact;
    public $nationality;
    public $payment;
    public $course_id;
    public $batch;

    public function __construct($id, $image_href, $last_name, $first_name, $middle_name, $num_street, $barangay, $district, $city, $province, $region, $email, $contact, $nationality, $payment, $course_id, $batch)
    {
        $this->id = $id;
        $this->image_href = $image_href;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->num_street = $num_street;
        $this->barangay = $barangay;
        $this->district = $district;
        $this->city = $city;
        $this->province = $province;
        $this->region = $region;
        $this->email = $email;
        $this->contact = $contact;
        $this->nationality = $nationality;
        $this->payment = $payment;
        $this->course_id = $course_id;
        $this->batch = $batch;
    }

    public function handle()
    {
        return manpower_profile::where('id', $this->id)->update(array(

            'image_href' => $this->image_href,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'num_street' => $this->num_street,
            'barangay' => $this->barangay,
            'district' => $this->district,
            'city' => $this->city,
            'province' => $this->province,
            'region' => $this->region,
            'email' => $this->email,
            'contact' => $this->contact,
            'nationality' => $this->nationality,
            'payment' => $this->payment,
            'course_id' => $this->course_id,
            'batch' => $this->batch

        ));
    }
}
