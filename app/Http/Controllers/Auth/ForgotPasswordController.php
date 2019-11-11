<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Mail;
use App\Http\Request\RequestResetPassword;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getFormResetPass(){
       return view('backend.email');
    }
    public function sendCodeResetPass(Request $req){
        $email = $req->email;

        $checkUser = User::where('email',$email)->first();

        if(!$checkUser)
        {
            return redirect()->back()->with('thong_bao','email không tồn tại');
        }

        $code = bcrypt(md5(time().$email));
        
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('link-resetpas',['code'=>$checkUser->code,'email'=>$email]);

        $data =[
            'route' =>$url
        ];

       Mail::send('backend.email.resetpas',$data,function($mess) use($checkUser){
        $mess->from('ph1906ij@gmail.com');
        $mess->to($checkUser->email,'Visitor')->subject('Lấy lại mật khẩu');
      });

        return redirect()->back()->with('thong_bao','link lấy lại mật khẩu đã được gửi vào email của bạn');
    }
    public function resetPassword(Request $req)
    {
        $code = $req->code;
        $email = $req->email;

        // dd($req->all());

        $checkUser = User::where([
            'code'=> $code,
            'email'=> $email,

        ])->first();

        if (!$checkUser) 
        {
            return redirect()->with('thong_bao','Xin lỗi đường dẫn không đúng vui lòng thử lại sau');   
        }

        return view('backend.resetpas');
    }
    public function saveResetPassword(Request $req){
        $this->validate($req,[
            'password' => 'required',
            'passwordVf' => 'required|same:password',
        ],[
            'password.required' => 'MK không được để trống',
            'passwordVf.required' => 'Yêu cầu nhập lại MK',
            'passwordVf.same' => 'Mk xác nhận không đúng',
        ]);
        if($req->password)
        {

        $code = $req->code;
        $email = $req->email;

        // dd($req->all());

        $checkUser = User::where([
            'code'=> $code,
            'email'=> $email,

        ])->first();

        if (!$checkUser) 
        {
            return redirect()->with('thong_bao','Xin lỗi đường dẫn không đúng vui lòng thử lại sau');   
        }
        $checkUser->password = bcrypt($req->password);
        // dd($req->all());
        $checkUser->save();

        return redirect()->route('login')->with('thong_bao','Đổi mật khẩu thành công... Mời bạn đăng nhập');

        }
    }
}
