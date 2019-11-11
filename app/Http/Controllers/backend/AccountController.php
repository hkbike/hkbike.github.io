<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use file;



class AccountController extends Controller
{
    public function account(){
    	$account = User::paginate(10);
    	return view('backend.account.account',compact('account'));
    }

    public function postAc(){
        return view('backend.account.them-tai-khoan');
    }
    public function addAccount(Request $req){
    	// dd($req->all());
        $this->validate($req,
            [
            'name'=>'required',

            'email'=>'required|email|unique:users,email',

            'password'=>'required|min:6|max:15',

            'passwordVf'=>'required|same:password',

            'address'=>'required',

            'phone'=>'required|unique:users,phone',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng ...',
            

            'email.required'=>'Bạn chưa nhập email ...',
            'email.email'=>'Email phải có @gmail.com.vn ...',
            'email.unique'=>'Email đã tồn tại ...',

            'password.required'=>'Bạn chưa nhập mật khẩu ...',
            'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự ...',
            'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự ...',

            'passwordVf.required'=>'Bạn chưa nhập lại mật khẩu ...',
            'passwordVf.same'=>'Mật khẩu nhập lại chưa chính xác ...',

            'phone.required'=>'Bạn chưa nhập số điện thoại ...',
            'phone.unique'=>'Số điện thoại đã tồn tại...',

            'address.required'=>'Bạn chưa nhập địa chỉ ...',
        ]);
    	User::create([
    		'name'=>$req->name,
    		'email'=>$req->email,
    		'password'=> bcrypt($req->password),
    		'phone'=>$req->phone,
    		'status'=>$req->status,
    		'address'=>$req->address,
    	]);
        return redirect()->route('account')->with('thong_bao','Đăng ký thành công');
    }

    public function editAc($id){
        $user = User::find($id);
        return view('backend.account.sua-tk',compact('user'));
    }
    public function PeditAc(Request $req,$id){
        $this->validate($req,
            [
            'name'=>'required',

           

           
            'address'=>'required',

            
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng ...',

           

            
            

            'address.required'=>'Bạn chưa nhập địa chỉ ...',
        ]);

        $update = User::find($id);
        $update->name = $req->name;
        $update->phone = $req->phone;
        $update->address = $req->address;
        $update->status = $req->status;
        if($req->changePassword == "on")
        {
             $this->validate($req,
            [
            'password'=>'required|min:6|max:15',

            'passwordVf'=>'required|same:password',
        ],
        [
            'password.required'=>'Bạn chưa nhập mật khẩu ...',
            'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự ...',
            'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự ...',

            'passwordVf.required'=>'Bạn chưa nhập lại mật khẩu ...',
            'passwordVf.same'=>'Mật khẩu nhập lại chưa chính xác ...',

        ]);
            $update->password = bcrypt($req->password);
        }
        // dd($req->all());
        $update->save();
        return redirect()->route('account')->with('thong_bao','sửa thành công...');

    }




    public function deleteAccount($id){
        $ac = User::find($id);

        if ($ac->delete()) {
            return redirect()->route('account')->with('thong_bao','Xóa tài khoản thành công');
        }
    }









    // đăng nhập

   public function getDangnhapAdmin(){
    return view('backend.login');
   }
   public function postDangnhapAdmin(Request $req){

    $this->validate($req,[
        'email'=>'required',
        'password'=>'required|min:3|max:32',
    ],[
        'email.required'=>'Bạn chưa nhập Email...',
        'password.required'=>'Bạn chưa nhập Password',
        'password.min'=>'Password không được nhỏ hơn 3 ký tự',
        'password.max'=>'Password không được lớn hơn 32 ký tự',
    ]);
    
    if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
    {
         return redirect('admin/');
    }
    else{
        return redirect('admin/login')->with('thong_bao','Đăng nhập không nhành công');
    }

   }
   public function getDangXuat(){
    Auth::logout();
    return redirect()->route('login');
   }
}
 ?>