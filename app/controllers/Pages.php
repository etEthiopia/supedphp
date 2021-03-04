<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $this->newsModel = $this->model('News');
      $newslist = $this->newsModel->geLatesttNews();

      $data = [
        'news' => $newslist
      ];
      $this->view('pages/index', $data);
    }

    public function news(){
      $this->newsModel = $this->model('News');
      $data = $this->newsModel->getNews();
      
      $this->view('pages/news', $data);
    }

    public function readnews($id){
      $this->newsModel = $this->model('News');
      $data = $this->newsModel->getNewsById($id);

      $this->view('pages/read_news', $data);
    }

    public function services($section = ''){
     
      if($section == ''){
        $this->view('pages/services', );
      }
     else{
      $this->view('pages/services/'.$section);
     }
    }

    public function gallery($section = ''){
     
      if($section == ''){
        $this->view('pages/gallery', );
      }
     else{
      $this->view('pages/gallery/'.$section);
     }
    }

    public function companyprofile($section = ''){
     
      if($section == ''){
        $this->view('pages/company_profile', );
      }
     else{
      $this->view('pages/company_profile/'.$section);
     }
    }

    public function products($section = ''){
     
      if($section == ''){
        $this->view('pages/products', );
      }
     else{
      $this->view('pages/products/'.$section);
     }
    }

    public function projects($section = ''){
     
      if($section == ''){
        $this->view('pages/projects', );
      }
     else{
      $this->view('pages/projects/'.$section);
     }
    }

    public function projects2($section = ''){
     
      if($section == ''){
        $this->view('pages/projects_2', );
      }
     else{
      $this->view('pages/projects_2/'.$section);
     }
    }

    public function thankyou(){
      $this->view('pages/thank_you');
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
  }