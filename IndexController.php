<?php

namespace App\Http\Controllers;

//use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Model\PageInfo;
use App\Model\PeopleInfo;
use App\Model\Feedback;
use App\Model\ServiceInfo;
use App\Model\Portfolio;
use App\Model\FrCoBlock;
use App\Model\CompanyInfo;
use Auth;
use App\Model\PortfolioPhoto;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\CheckEmailRequest;

class IndexController extends Controller{
    private $pagination = 9;
    private $data       = array();

    public function index(Request $request, PageInfo $pageInfoModel, PortfolioPhoto $portfolioPhotoModel, PeopleInfo $peopleInfoModel, FrCoBlock $FrCoBlock){
        $this->data['login'] = (Auth::user()) ? true : false;
        $this->data['menu'] = $pageInfoModel->getMenuItems();

        foreach($this->data['menu'] as $value){
            $this->data['blocks'][$value->tag]['mainContent'] = $pageInfoModel->getBlockContent($value->tag);
        }

        //---------------отрисовываем меню конец ------------------------------

        if(isset($this->data['blocks']['team'])){
            $this->data['blocks']['team']['peoples'] = $peopleInfoModel->infoWithProfession();
        }
        if(isset($this->data['blocks']['about'])){
            $this->data['blocks']['about']['feedback'] = Feedback::orderByRaw('RAND()')->get();
        }
        if(isset($this->data['blocks']['services'])){
            $this->data['blocks']['services']['serves'] = ServiceInfo::all();
        }
        if(isset($this->data['blocks']['contact'])){
            $this->data['blocks']['contact']['contactAll'] = CompanyInfo::all();
        }

        if(isset($this->data['blocks']['frCoBlock'])){
            $this->data['blocks']['frCoBlock']['FrCoBlockAllNegativ'] = $FrCoBlock->getNegativ();
            $this->data['blocks']['frCoBlock']['FrCoBlockAllPozetiv'] = $FrCoBlock->getPozetiv();
        }


        if(isset($this->data['blocks']['portfolio'])){
            $this->data['blocks']['portfolio']['portfolioPhotoAll'] = $portfolioPhotoModel::orderBy('is_main', 'desc')->get();

        }
        return $this->connectView('index');
    }

    public function sendEmail(CheckEmailRequest $request){
        $this->data = $request->except('_token');
        $this->data['companyInfo'] = CompanyInfo::find(1)->get(['email'])->toArray();

        Mail::send(array('text' => 'email.contact'), $this->data, function ($message) {
            $message->to('info@seanetix.com')->cc('polosina.nika@gmail.com')->subject('New contact form email - '.$this->data['subject']);
        });

         $response['success'] = true;
        return response()->json($response);
    }

    private function connectView($name){
        if(view()->exists($name)){
            return view($name)->with('data', $this->data);
        }else{
            die('Surprise, you are here !!!');
        }
    }

    public function test(){
        $this->data['name'] = 'gusetieog';
        $this->data['email'] = 'polosina.nika@gmail.com';
        $this->data['subject'] = 'polosina.nika@gmail.com';
        $this->data['content'] = 'polosina.nika@gmail.com';
        $this->data['companyInfo'] = CompanyInfo::find(1)->get(['email'])->toArray();

        Mail::send(array('text' => 'email.contact'), $this->data, function ($message) {
//            $message->to('polosina.nika@gmail.com')->subject('New contact form email');
            $message->to('polosina.nika@gmail.com')->cc('info@seanetix.com')->subject('New contact form email');
        });




        die('Surprise, you are here !!!');
    }

}
