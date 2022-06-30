<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApiRequest;
use App\Models\Template;

class ApiController extends Controller
{
    // Validations are done in ApiRequest
    public function index(ApiRequest $request){
        
        $template_details = Template::where('id', $request->template_id)->first();

        if($template_details){ 
          $template_data=$template_details->email_template;
          $template_data=str_replace("#name",$request->name,$template_data);
          $template_data=str_replace("#email_id",$request->email,$template_data);
          $template_data=str_replace("#phone_no",$request->phone_no,$template_data);

          //USING @ the rate as it will display the error message if the email is not sent
          if(@mail($request->email,$template_details->title,$template_data)){
            $msg = "Email has been sent to the ".$request->email;
            echo json_encode(array('success_msg'=>$msg));
          }else{
            $msg = "Error is sending email to ".$request->email;
            echo json_encode(array('error'=>$msg));
          }
        }else{
          $error_message = array('error'=>'Template ID not found');  
          return json_encode($error_message);
        }
        
    }


}
