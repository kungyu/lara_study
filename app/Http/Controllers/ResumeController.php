<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 16-9-19
 * Time: 上午10:25
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Route;

class ResumeController extends Controller{


    public function index(Request $request){
        $education = $gallery = $project = $skill = $work = $user =  null;
        $str = $request->input('id');
        $base = DB::table('user_resume_base')->select("id",'user_id','real_name','locate','work_year','job_status','hope_industry','hope_job',
            'hope_salary','simple_id')->where(['random_str' => $str])->first();
        if(!is_null($base)){
            if(empty($base->simple_id) || intval($base->simple_id) > 5)
                $template = $template = 'resume_tpl.simple_1';
            else
                $template = 'resume_tpl.simple_'.$base->simple_id;
            //TODO cshi yong
//            $template = $template = 'resume_tpl.simple_5';
            $user = DB::table('users')->select('email','phone')->where(['id' => $base->user_id])->first();

            $locate_name = DB::table('region')->select('region_name')->where(['region_id' => $base->locate])->first();
            $base->locate_name = '';
            if(!is_null($locate_name))
            $base->locate_name = $locate_name->region_name;

            $industry_name = DB::table('job_industry')->select('industry_name')->where(['industry_no' => $base->hope_industry])->first();
            $base->industry = '';
            if(!is_null($industry_name))
            $base->industry = $industry_name->industry_name;

            switch ($base->job_status){
                case '1':
                    $status_desc = '在职,看看新机会';
                    break;
                case '2':
                    $status_desc = '在职,急需新工作';
                    break;
                case '3':
                    $status_desc = '在职,暂无跳槽打算';
                    break;
                default:
                    $status_desc = '离职正在找工作';
            }
            $base->job_status_desc = $status_desc;
            $where = ['resume_id' => $base->id, 'status' => 1];
            $education = DB::table('user_resume_education')->where($where)->get();
            $gallery   = DB::table('user_resume_gallery')->where($where)->get();
            $project   = DB::table('user_resume_project')->where($where)->get();
            $skill     = DB::table('user_resume_skill')->where($where)->get();
            $work      = DB::table('user_resume_work')->where($where)->get();
        }else{
            return '未找到简历';
        }
        $record_name = ['1'=>'大专','2'=>'本科','3'=>'硕士','4'=>'博士'];
        $data = ['base'=>$base,'education' =>$education,'gallery'=>$gallery,'project'=>$project,
            'skill'=>$skill,'work'=>$work,'record_name'=>$record_name,'user' =>$user];
        return view($template,$data);
    }
}