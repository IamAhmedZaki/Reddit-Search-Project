<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
class EmailController extends Controller
{
    public function send_mail(Request $request)
    {
    //   dd($request->all());
      $data = [
        'mls_number' => $request->mls_number,
        'michael_kang' => $request->michael_kang,
        'name1' => $request->name1,
        'email1' => $request->email1,
        'number1' => $request->number1,
        'address1' => $request->michael_kang,
        'name2' => $request->name2,
        'email2' => $request->email2,
        'number2' => $request->number2,
        'address2' => $request->address2,
        'buyers' => $request->buyers,
        'legal_name' => $request->legal_name,
        'name3' => $request->name3,
        'email3' => $request->email3,
        'number3' => $request->number3,
        'address3' => $request->address3,
        'seller_current_address' => $request->seller_current_address,
        'oor' => $request->oor,
        'dual_agency' => $request->dual_agency,
        'agent' => $request->agent,
        'offer_price' => $request->offer_price,
        'credit_at_closing' => $request->credit_at_closing,
        'credit_at_closing_radio' => $request->credit_at_closing_radio,
        'earning_money_amount' => $request->earning_money_amount,
        'secondary_amount' => $request->secondary_amount,
        'closing_date' => $request->closing_date,
        'proof_of_funds' => $request->proof_of_funds,
        'term_of_loan' => $request->term_of_loan,
        'type_of_loan' => $request->type_of_loan,
        'interest_rate' => $request->interest_rate,
        'discount_point_percentage' => $request->discount_point_percentage,
        'disclosure_form' => $request->disclosure_form,
        'proration_of_taxes' => $request->proration_of_taxes,
        'existing_house' => $request->existing_house,
        'existing_email_address' => $request->existing_email_address,
        'buyer_attorny' => $request->buyer_attorny,
        'current_address' => $request->current_address,
        'buyer_attorny_email' => $request->buyer_attorny_email,
        'buyer_attorny_phone' => $request->buyer_attorny_phone,
        'loan_officer_phone' => $request->loan_officer_phone,
        'loan_officer_email' => $request->loan_officer_email,
        'mls_listing' => $request->mls_listing,
     ];

     $proof_of_funds_file = $request->file('proof_of_funds_file');
     $disclosure_form_file = $request->file('disclosure_form_file');
     $mls_listing_file = $request->file('mls_listing_file');
 
     Mail::to('tc@spacematchinc.com')->send(new ContactMail($data, $proof_of_funds_file, $disclosure_form_file, $mls_listing_file));

     
     
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
