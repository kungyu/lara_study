<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Route;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*if(is_wechat_browser()) {
            $wxopenid = $this->get_wxopenid_cookie();
            if (!empty($wxopenid)) {
                $login_id = DB::table("users")->select('id')->where(['wxopenid' => $wxopenid])->first();
                if (!is_null($login_id))
                    Auth::loginUsingId($login_id->id);
            }
        }*/
        $this->middleware('auth');
    }


    public function get_wxopenid_cookie(Request $request){

        $cookie = $request->cookie('wxopenid');
        return $cookie;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $where = ['user_id' => $user_id];
        $resume_base = DB::table('user_resume_base')->select('*')->where($where)->first();
        if(is_object($resume_base)){
            $resume_base->locate_name = '';
            $region = DB::table('region')->select('region_name')->where(['region_id' => $resume_base->locate])->first();
            if(is_object($region))
                $resume_base->locate_name = $region->region_name;
            Session::put('resume_id', $resume_base->id);
        }
        return view('resume/index',['base' => $resume_base]);
    }

    public function base_info(Request $request){
        $result = array(
            'state' => 1,
            'info'  => '基本信息保存成功'
        );
        $user = $request->user();
        $user_id = $user->id;
        $real_name = trim($request->input('real_name'));
        $birth = trim($request->input('birth'));
        $work = trim($request->input('work'));
        $locate_name = trim($request->input('locate_name'));
        $locate = intval(trim($request->input('locate')));
        $salary = floatval(trim($request->input('salary')));
        $job_status = intval(trim($request->input('job_status')));
        $created_at = date("Y-m-d H:i:s");
        $random_str = $this->getRandChar(12);

        if(!$this->check_year($birth)){
            $result = array(
                'state' => 2,
                'info'  => '请输入正确的出生年份'
            );
        }

        if(!$this->check_year($work))
            $result = array(
                'state' => 2,
                'info'  => '请输入正确的工作年份'
            );

        if(!$this->check_region($locate,$locate_name))
            $result = array(
                'state' => 2,
                'info'  => '请正确选择地区'
            );

        if(!in_array($job_status,array(1,2,3,4)))
            $result = array(
                'state' => 2,
                'info'  => '请正确选择求职状态'
            );

        if($result['state'] == 1){
            $where = ['user_id'=>$user_id];
            $region = DB::table('user_resume_base')->select('id')->where($where)->first();
            if(is_object($region) && $region->id){
                $res = DB::table('user_resume_base')
                    ->where($where)
                    ->update(['real_name' => $real_name, 'birth_year' => $birth, 'work_year' => $work,
                        'locate' => $locate, 'salary_year' => $salary, 'job_status' => $job_status]);
                if($res == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '基本信息保存失败'
                    );

            }else{
                $random_str = $this->check_random($random_str);
                $id = DB::table('user_resume_base')->insertGetId(
                    ['user_id' => $user_id, 'random_str' => $random_str, 'real_name' => $real_name, 'birth_year' => $birth, 'work_year' => $work,
                        'locate' => $locate, 'salary_year' => $salary, 'job_status' => $job_status, 'created_at' => $created_at]
                );
                if(intval($id) > 0)
                    Session::put('resume_id', $id);
                else
                    $result = array(
                        'state' => 2,
                        'info'  => '基本信息保存失败'
                    );
            }

        }
        echo json_encode($result);
        exit;
    }

    public function work(Request $request)
    {
        $user= $request->user();
        $user_id = $user->id;
        $work_where = ['user_id' => $user_id, 'status' => 1];
        $works = DB::table('user_resume_work')->where($work_where)->get();
        return view('resume/work',['works' => $works]);
    }

    public function work_add(){
        return view('resume.work_add');
    }

    public function work_edit(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $where = ['id'=>$id,'status' => 1];
        $work = DB::table('user_resume_work')->select('*')->where($where)->first();
        if(is_null($work) || $work->user_id != $user_id){
            return redirect()->action('HomeController@work');
            exit;
        }
        if($work->end_time == '至今')
            $work->end_time = date("Y-m-d");
        return view('resume.work_add',['work'=>$work]);
    }

    public function work_del(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $result = ['state' => 1, 'info' => '工作经历删除成功'];
        $where = ['id' => $id, 'user_id' => $user_id];
        $row = DB::table('user_resume_work')->where($where)->update(['status' => 2]);
        if($row == 0)
            $result = ['state' => 2, 'info' => '工作经历删除失败'];
        echo json_encode($result);
        exit;
    }

    public function workAdd(Request $request){
        $result = array(
            'state' => 1,
            'info'  => '工作经验保存成功'
        );

        $startTime = trim($request->input('starttime'));
        $endTime   = trim($request->input('endtime'));
        $company   = trim($request->input('company'));
        $job_name  = trim($request->input('name'));
        $job_content = trim($request->input('job_content'));
        $work_id   = intval(trim($request->input('work_id')));

        if(($endTime < $startTime) || !$this->check_date($startTime) || !$this->check_date($endTime)){
            $result = array(
                'state' => 2,
                'info'  => '请选择正确的起始时间'
            );
        }

        if($startTime == '' || $endTime == '' || $company == '' ){
            $result = array(
                'state' => 2,
                'info'  => '必填项不能为空'
            );
        }

        if($endTime == date("Y-m-d"))
            $endTime = '至今';
        $user = $request->user();
        $user_id = $user->id;
        $resume_id = $this->get_resume_id($user_id);
        if(empty($resume_id)){
            $resume_where = ['user_id' => $user_id];
            $resume_base = DB::table('user_resume_base')->select('id')->where($resume_where)->first();
            if(is_object($resume_base) && $resume_base->id)
                $resume_id = $resume_base->id;
        }

        if(!$resume_id)
            $result = array(
                'state' => 2,
                'info'  => '请先填写基本信息表'
            );
        else
            Session::put('resume_id', $resume_id);

        if($result['state'] == 1){
            if($work_id != 0){
                $where = ['id' => $work_id,'status' => 1];
                $work = DB::table('user_resume_work')->where($where)->first();
                if(is_null($work) || $work->user_id != $user_id)
                    $work_id = 0;
            }
            if($work_id == 0){
                $id = DB::table('user_resume_work')->insertGetId(
                    ['user_id' => $user_id, 'resume_id' => $resume_id, 'company' => $company, 'job_name' => $job_name,
                        'job_content' => $job_content, 'start_time' => $startTime, 'end_time' => $endTime]
                );
                if(intval($id) == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '工作信息保存失败'
                    );
            }else{
                $res = DB::table('user_resume_work')
                    ->where($where)
                    ->update(['company' => $company, 'job_name' => $job_name,
                        'job_content' => $job_content, 'start_time' => $startTime, 'end_time' => $endTime]);
                if($res == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '工作信息保存失败'
                    );
            }

        }
        echo json_encode($result);
        exit;
    }

    public function project(Request $request){
        $user= $request->user();
        $user_id = $user->id;
        $work_where = ['user_id' => $user_id, 'status' => 1];
        $works = DB::table('user_resume_project')->where($work_where)->get();
        return view('resume/project',['works'=>$works]);
    }

    public function project_add(){
        return view('resume.project_add');
    }
    
    public function projectAdd(Request $request){
        $result = array(
            'state' => 1,
            'info'  => '项目经验保存成功'
        );

        $startTime = trim($request->input('starttime'));
        $endTime   = trim($request->input('endtime'));
        $project_name  = trim($request->input('project_name'));
        $project_content = trim($request->input('project_content'));
        $project_id   = intval(trim($request->input('project_id')));

        if(($endTime < $startTime) || !$this->check_date($startTime) || !$this->check_date($endTime)){
            $result = array(
                'state' => 2,
                'info'  => '请选择正确的起始时间'
            );
        }

        if($startTime == '' || $endTime == '' || $project_name == '' || $project_content == ''){
            $result = array(
                'state' => 2,
                'info'  => '必填项不能为空'
            );
        }

        $user = $request->user();
        $user_id = $user->id;
        $resume_id = $this->get_resume_id($user_id);
        if(empty($resume_id)){
            $resume_where = ['user_id' => $user_id];
            $resume_base = DB::table('user_resume_base')->select('id')->where($resume_where)->first();
            if(is_object($resume_base) && $resume_base->id)
                $resume_id = $resume_base->id;
        }

        if(!$resume_id)
            $result = array(
                'state' => 2,
                'info'  => '请先填写基本信息表'
            );
        else
            Session::put('resume_id', $resume_id);

        if($endTime == date("Y-m-d"))
            $endTime = '至今';
        if($result['state'] == 1){
            if($project_id != 0){
                $where = ['id' => $project_id,'status' => 1];
                $work = DB::table('user_resume_project')->where($where)->first();
                if(is_null($work) || $work->user_id != $user_id)
                    $project_id = 0;
            }
            if($project_id == 0){
                $id = DB::table('user_resume_project')->insertGetId(
                    ['user_id' => $user_id, 'resume_id' => $resume_id, 'project_name' => $project_name,
                        'project_content' => $project_content, 'start_time' => $startTime, 'end_time' => $endTime]
                );
                if(intval($id) == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '项目信息保存失败'
                    );
            }else{
                $res = DB::table('user_resume_project')
                    ->where($where)
                    ->update(['project_name' => $project_name,
                        'project_content' => $project_content, 'start_time' => $startTime, 'end_time' => $endTime]);
                if($res == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '项目信息保存失败'
                    );
            }

        }
        echo json_encode($result);
        exit;
    }

    public function project_edit(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $where = ['id'=>$id,'status' => 1];
        $work = DB::table('user_resume_project')->select('*')->where($where)->first();
        if(is_null($work) || $work->user_id != $user_id){
            return redirect()->action('HomeController@project');
            exit;
        }
        if($work->end_time == '至今')
            $work->end_time = date("Y-m-d");
        return view('resume.project_add',['work'=>$work]);
    }

    public function project_del(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $result = ['state' => 1, 'info' => '项目经验删除成功'];
        $where = ['id' => $id, 'user_id' => $user_id];
        $row = DB::table('user_resume_project')->where($where)->update(['status' => 2]);
        if($row == 0)
            $result = ['state' => 2, 'info' => '项目经验删除失败'];
        echo json_encode($result);
        exit;
    }
    
    public function education(Request $request){
        $user= $request->user();
        $user_id = $user->id;
        $work_where = ['user_id' => $user_id, 'status' => 1];
        $works = DB::table('user_resume_education')->where($work_where)->get();
        return view('resume/education',['works' => $works]);
    }

    public function edu_add(){
        return view('resume.edu_add');
    }

    public function eduAdd(Request $request){
        $result = array(
            'state' => 1,
            'info'  => '教育经历保存成功'
        );

        $startTime = trim($request->input('starttime'));
        $endTime   = trim($request->input('endtime'));
        $school  = trim($request->input('school_name'));
        $major = trim($request->input('major_name'));
        $record = trim($request->input('record'));
        $edu_id   = intval(trim($request->input('edu_id')));

        if(($endTime < $startTime) || !$this->check_date($startTime) || !$this->check_date($endTime)){
            $result = array(
                'state' => 2,
                'info'  => '请选择正确的始终时间'
            );
        }

        if($startTime == '' || $endTime == '' || $school == '' || $major == ''){
            $result = array(
                'state' => 2,
                'info'  => '必填项不能为空'
            );
        }

        if(!in_array($record,[1,2,3,4]))
            $result = array(
                'state' => 2,
                'info'  => '请正确选择学历'
            );

        $user = $request->user();
        $user_id = $user->id;
        $resume_id = $this->get_resume_id($user_id);
        if(empty($resume_id)){
            $resume_where = ['user_id' => $user_id];
            $resume_base = DB::table('user_resume_base')->select('id')->where($resume_where)->first();
            if(is_object($resume_base) && $resume_base->id)
                $resume_id = $resume_base->id;
        }

        if(!$resume_id)
            $result = array(
                'state' => 2,
                'info'  => '请先填写基本信息表'
            );
        else
            Session::put('resume_id', $resume_id);

        if($result['state'] == 1){
            if($edu_id != 0){
                $where = ['id' => $edu_id,'status' => 1];
                $work = DB::table('user_resume_education')->where($where)->first();
                if(is_null($work) || $work->user_id != $user_id)
                    $edu_id = 0;
            }
            if($edu_id == 0){
                $date_time = date("Y-m-d");
                $id = DB::table('user_resume_education')->insertGetId(
                    ['user_id' => $user_id, 'resume_id' => $resume_id, 'school' => $school, 'major' => $major,
                        'record' => $record, 'start_time' => $startTime, 'end_time' => $endTime, 'created_at'=>$date_time]
                );
                if(intval($id) == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '教育经历保存失败'
                    );
            }else{
                $res = DB::table('user_resume_education')
                    ->where($where)
                    ->update(['school' => $school, 'major' => $major,
                        'record' => $record, 'start_time' => $startTime, 'end_time' => $endTime]);
                if($res == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '教育经历保存失败'
                    );
            }

        }
        echo json_encode($result);
        exit;
    }

    public function edu_edit(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $where = ['id'=>$id,'status' => 1];
        $work = DB::table('user_resume_education')->select('*')->where($where)->first();
        if(is_null($work) || $work->user_id != $user_id){
            return redirect()->action('HomeController@project');
            exit;
        }
        return view('resume.edu_add',['work'=>$work]);
    }

    public function edu_del(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $result = ['state' => 1, 'info' => '教育经历删除成功'];
        $where = ['id' => $id, 'user_id' => $user_id];
        $row = DB::table('user_resume_education')->where($where)->update(['status' => 2]);
        if($row == 0)
            $result = ['state' => 2, 'info' => '教育经历删除失败'];
        echo json_encode($result);
        exit;
    }
    
    public function skills(Request $request){
        $user= $request->user();
        $user_id = $user->id;
        $work_where = ['user_id' => $user_id, 'status' => 1];
        $works = DB::table('user_resume_skill')->where($work_where)->get();
        return view('resume.skills',['works' => $works]);
    }
    
    public function skill_add(){
        return view('resume.skill_add');
    }

    public function skillAdd(Request $request){
        $result = array(
            'state' => 1,
            'info'  => '专业技能保存成功'
        );

        $skill  = trim($request->input('skill'));
        $proficiency = intval(trim($request->input('proficiency')));
        $skill_id  = intval(trim($request->input('skill_id')));

        if($skill == '' ){
            $result = array(
                'state' => 2,
                'info'  => '专业技能不能为空'
            );
        }

        $user = $request->user();
        $user_id = $user->id;
        $resume_id = $this->get_resume_id($user_id);
        if(empty($resume_id)){
            $resume_where = ['user_id' => $user_id];
            $resume_base = DB::table('user_resume_base')->select('id')->where($resume_where)->first();
            if(is_object($resume_base) && $resume_base->id)
                $resume_id = $resume_base->id;
        }

        if(!$resume_id)
            $result = array(
                'state' => 2,
                'info'  => '请先填写基本信息表'
            );
        else
            Session::put('resume_id', $resume_id);

        if($result['state'] == 1){
            if($skill_id != 0){
                $where = ['id' => $skill_id,'status' => 1];
                $work = DB::table('user_resume_skill')->where($where)->first();
                if(is_null($work) || $work->user_id != $user_id)
                    $edu_id = 0;
            }
            if($skill_id == 0){
                $date_time = date("Y-m-d");
                $id = DB::table('user_resume_skill')->insertGetId(
                    ['user_id' => $user_id, 'resume_id' => $resume_id, 'skill_name' => $skill,
                        'proficiency' => $proficiency, 'created_at'=>$date_time]
                );
                if(intval($id) == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '专业技能保存失败'
                    );
            }else{
                $res = DB::table('user_resume_skill')
                    ->where($where)
                    ->update(['skill_name' => $skill,
                        'proficiency' => $proficiency]);
                if($res == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '专业技能保存失败'
                    );
            }

        }
        echo json_encode($result);
        exit;
    }

    public function skill_edit(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $where = ['id'=>$id,'status' => 1];
        $work = DB::table('user_resume_skill')->select('*')->where($where)->first();
        if(is_null($work) || $work->user_id != $user_id){
            return redirect()->action('HomeController@skills');
            exit;
        }
        return view('resume.skill_add',['work'=>$work]);
    }

    public function skill_del(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $result = ['state' => 1, 'info' => '专业技能删除成功'];
        $where = ['id' => $id, 'user_id' => $user_id];
        $row = DB::table('user_resume_skill')->where($where)->update(['status' => 2]);
        if($row == 0)
            $result = ['state' => 2, 'info' => '专业技能删除失败'];
        echo json_encode($result);
        exit;
    }
    
    public function intention(Request $request){
        $industry = DB::table('job_industry')->select('*')->where(['parent_no' => 0])->get();
        $industry_son = DB::table('job_industry')->select('*')->where('parent_no','>', '0')->get();
        $user_id = $request->user()->id;
        $where = ['user_id' => $user_id];
        $resume_base = DB::table('user_resume_base')->select('*')->where($where)->first();
        if(is_object($resume_base)){
            $resume_base->locate_name = '';
            $region = DB::table('region')->select('region_name')->where(['region_id' => $resume_base->locate])->first();
            if(is_object($region))
                $resume_base->locate_name = $region->region_name;
            Session::put('resume_id', $resume_base->id);
        }
        return view('resume.intention',['base' => $resume_base,'industry' => $industry, 'industry_son'=>$industry_son]);
    }
    
    public function intention_add(Request $request){
        $result = array(
            'state' => 1,
            'info'  => '期望信息保存成功'
        );
        $user_id = $request->user()->id;
        $hope_industry = intval(trim($request->input('hope_industry')));
        $hope_job = trim($request->input('hope_job'));
        $hope_salary = floatval(trim($request->input('hope_salary')));
        $random_str = $this->getRandChar(12);

        if($hope_job == '' || $hope_industry == '' || $hope_salary ==''){
            $result = array(
                'state' => 2,
                'info'  => '期望信息不能为空'
            );
        }

        if($result['state'] == 1){
            $where = ['user_id'=>$user_id];
            $region = DB::table('user_resume_base')->select('id')->where($where)->first();
            if(is_object($region) && $region->id){
                $res = DB::table('user_resume_base')
                    ->where($where)
                    ->update(['hope_industry' => $hope_industry, 'hope_job' => $hope_job, 'hope_salary' => $hope_salary]);
                if($res == 0)
                    $result = array(
                        'state' => 2,
                        'info'  => '期望信息保存失败'
                    );

            }else{
                $id = DB::table('user_resume_base')->insertGetId(
                    ['user_id' => $user_id, 'random_str' => $random_str, 'hope_industry' => $hope_industry, 'hope_job' => $hope_job, 'hope_salary' => $hope_salary, 'created_at' => $created_at]
                );
                if(intval($id) > 0)
                    Session::put('resume_id', $id);
                else
                    $result = array(
                        'state' => 2,
                        'info'  => '期望信息保存失败'
                    );
            }

        }
        echo json_encode($result);
        exit;
    }

    public function gallery(Request $request){
        $user= $request->user();
        $user_id = $user->id;
        $work_where = ['user_id' => $user_id, 'status' => 1];
        $works = DB::table('user_resume_gallery')->where($work_where)->get();
        return view('resume.gallery',['works'=>$works]);
    }

    /**
     * 上传图片
     * @param Request $request
     */
    public function imgup(Request $request){
        $result = array('status' => 0);
        $extend_limit = array('.gif','.png','.jpg','.jpeg');
        $type_limit = array("image/gif","image/jpeg","image/pjpeg","image/png");
        $user_id = $request->user()->id;
        $resume_id = $this->get_resume_id($user_id);
        if($resume_id != 0) {
            if (isset($_FILES['image'])) {
                if ($_FILES['image']['error'] == 0) {
                    $dot_pos = strripos($_FILES['image']['name'], '.');
                    $file_extend = substr($_FILES['image']['name'], $dot_pos);
                    //&&  ($_FILES["image"]["size"] < 100000)
                    if (in_array($file_extend, $extend_limit) && in_array($_FILES['image']['type'], $type_limit)) {
                        $image_name = $this->getRandChar(5) . time();
                        $real_file_name = $image_name . $file_extend;
                        $thumb_name = $image_name . '_thumb' . $file_extend;
                        $sys_path = $this->get_sys_path($user_id);
                        $real_file_path = $sys_path['sys_path'] . '/' . $real_file_name;
                        $thumb_file_path = $sys_path['sys_path'] . '/' . $thumb_name;
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $real_file_path)) {
                            $url_path = $sys_path['url_path'];
                            $file_url_path = $url_path . '/' . $real_file_name;
                            $thumb_url_path = $url_path . '/' . $thumb_name;
                            $this->mkThumbnail($real_file_path,140,140,$thumb_file_path);
                            $id = DB::table('user_resume_gallery')->insertGetId(
                                ['user_id' => $user_id, 'resume_id' => $resume_id, 'image_url' => $file_url_path, 'thumb_url' => $thumb_url_path, 'created_at' => date('Y-m-d')]
                            );
                            if(intval($id) == 0)
                                $result = array(
                                    'status' => 2,
                                    'desc'  => '期望信息保存失败'
                                );
                            else
                                $result = array(
                                    'status' => 1,
                                    'imgurl'  => $thumb_url_path
                                );
                        } else {
                            $result['status'] = 4;
                            $result['desc'] = '图片上传失败';
                        }
                    } else {
                        $result['status'] = 3;
                        $result['desc'] = '请选择图片文件上传';
                    }
                } else {
                    $result['status'] = 2;
                    $result['desc'] = '文件上传失败';
                }
            }else{
                $result['status'] = 3;
                $result['desc'] = '未发现上传文件';
            }
        }else
            $result = array('status' => 5,'desc'=>'请先填写基本信息');
        echo json_encode($result);
        exit;
    }

    public function get_gallery(Request $request){
        $data = $result = array();
        $user_id = $request->user()->id;
        $gallery = DB::table('user_resume_gallery')->where(['user_id'=>$user_id,'status' => 1])->get();
//        var_dump($gallery);
        if(!is_null($gallery)){
            foreach ($gallery as $gallery_item){
                $data_son = array(
                    'alt' => '作品图片',
                    'pid' => $gallery_item->resume_id,
                    'src' => $gallery_item->image_url,
                    'thumb' => $gallery_item->image_url,
                );
                $data[] = $data_son;
            }
            $result = array(
                'title' => '作品图片',
                'id'    => $user_id,
                'start' => 0,
                'data'  => $data
            );
        }
        echo json_encode($result);
        exit;
    }

    public function img_del(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $user_id = $request->user()->id;
        $result = ['state' => 1, 'info' => '作品删除成功'];
        $where = ['id' => $id, 'user_id' => $user_id];
        $row = DB::table('user_resume_gallery')->where($where)->update(['status' => 2]);
        if($row == 0)
            $result = ['state' => 2, 'info' => '作品删除失败'];
        echo json_encode($result);
        exit;
    }

    /**
     * 查找城市和城市id
     * @param Request $request
     */
    public function get_region(Request $request){
        $result = ['region_id' => 0, 'region_name' => ''];
        $region_name = mb_substr(trim($request->input('name')),0,2,'utf-8');
        $region = DB::table('region')->select('region_id','region_name')->where('region_name','like',"%".$region_name."%")->first();
        if(is_object($region))
            $result = ['region_id' => $region->region_id, 'region_name' => $region->region_name];
        echo json_encode($result);
        exit;
    }
    
    public function temp_select(Request $request){
        $user_id = $request->user()->id;
        $where = ['user_id' => $user_id];
        $data['random_str'] = '';
        $random_str = DB::table('user_resume_base')->select('random_str')->where($where)->first();
        if(!is_null($random_str))
            $data['random_str'] = $random_str->random_str;
        return view('resume.temp_select',$data);
    }

    public function set_tpl(Request $request){
        $id = Route::input('id');
        $id = intval($id);
        $data = ['simple_id'=>$id];
        $user_id = $request->user()->id;
        $where = ['user_id' => $user_id];
        $result = ['state' => 1, 'info' => '简历模板设置成功'];
        $res = DB::table('user_resume_base')->where($where)->update($data);
        if($res == 0)
            $result = ['state' => 2, 'info' => '简历模板设置失败'];
        echo json_encode($result);
        exit;
    }

    private function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        return $str;
    }

    private function get_sys_path($user_id){

        $md5_16 = substr(md5('user_'.$user_id),8,16);

        $sys_file_path = public_path().'/upload_image/'.$md5_16;
        if(!is_dir($sys_file_path)){
            mkdir($sys_file_path,0777);
        }
        return $result = ['sys_path' => $sys_file_path,'url_path' => '/public/upload_image/'.$md5_16];
    }

    /**
     * 检查年份输入在1970年以后
     * @param $year
     * @return bool
     */
    private function check_year($year=0){
        $result = true;
        if(!is_numeric($year))
            $result = false;
        if(strlen($year) != 4)
            $result = false;
        if(substr($year,0,3) < 197)
            $result = false;
        return $result;
    }

    /**
     * 检查地区是否匹配
     * @param int $region_id
     * @param string $region_name
     * @return bool
     */
    private function check_region($region_id=0,$region_name=''){
        $result = true;
        $where = ['region_id'=>$region_id];
        $region = DB::table('region')->select('region_name')->where($where)->first();
        if($region->region_name != $region_name)
            $result = false;
        return $result;
    }

    /**
     * 验证日期是否正确
     * @param string $date
     * @return bool
     */
    private function check_date($date = ''){
        $result = true;
        list($y,$m,$d)=explode('-',$date);
        if(!is_numeric($y) || !is_numeric($m) || !is_numeric($d))
            $result = false;
        else
            $result = checkdate($m,$d,$y);
        return $result;
    }

    /**
     * 检查随机字符串是否已经存在
     * @param $random_str
     * @return null|string
     */
    private function check_random($random_str){
        $res = DB::table('user_resume_base')->where(['random_str' => $random_str])->first();
        if(!is_null($res)){
            $random_str = $this->getRandChar(12);
            $random_str = $this->check_random($random_str);
        }
        return $random_str;
    }

    /**
     * 获取resumeid
     * @param Request $request
     * @return mixed
     */
    private function get_resume_id($user_id){
        $resume_id = Session::get('resume_id', '0');
        if($resume_id == 0){
            $resume_base = DB::table('user_resume_base')->select('id')->where(['user_id'=>$user_id])->first();
            if(!is_null($resume_base)){
                $resume_id = $resume_base->id;
                Session::put('resume_id', $resume_id);
            }
        }
        return $resume_id;
    }

    private function mkThumbnail($src, $width = null, $height = null, $filename = null) {
        if (!isset($width) && !isset($height))
            return false;
        if (isset($width) && $width <= 0)
            return false;
        if (isset($height) && $height <= 0)
            return false;

        $size = getimagesize($src);
        if (!$size)
            return false;

        list($src_w, $src_h, $src_type) = $size;
        $src_mime = $size['mime'];
        switch($src_type) {
            case 1 :
                $img_type = 'gif';
                break;
            case 2 :
                $img_type = 'jpeg';
                break;
            case 3 :
                $img_type = 'png';
                break;
            case 15 :
                $img_type = 'wbmp';
                break;
            default :
                return false;
        }

        if (!isset($width))
            $width = $src_w * ($height / $src_h);
        if (!isset($height))
            $height = $src_h * ($width / $src_w);

        $imagecreatefunc = 'imagecreatefrom' . $img_type;
        $src_img = $imagecreatefunc($src);
        $dest_img = imagecreatetruecolor($width, $height);
        imagecopyresampled($dest_img, $src_img, 0, 0, 0, 0, $width, $height, $src_w, $src_h);

        $imagefunc = 'image' . $img_type;
        if ($filename) {
            $imagefunc($dest_img, $filename);
        } else {
            header('Content-Type: ' . $src_mime);
            $imagefunc($dest_img);
        }
        imagedestroy($src_img);
        imagedestroy($dest_img);
        return true;
    }
}
