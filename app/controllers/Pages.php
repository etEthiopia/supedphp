<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
     
      // $this->newsModel = $this->model('News');
      // $newslist = $this->newsModel->geLatesttNews();

      // $data = [
      //   'news' => $newslist
      // ];
      // $this->view('pages/index', $data);
      $this->view('pages/index');
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

    function reCaptcha($recaptcha){
      $secret = "6LesxksaAAAAABRTqKxxlfCU7WGHzHtBtH11FrF0";
      $ip = $_SERVER['REMOTE_ADDR'];
    
      $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
      $url = "https://www.google.com/recaptcha/api/siteverify";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
      $data = curl_exec($ch);
      curl_close($ch);
    
      return json_decode($data, true);
    }

    public function contactform(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      require APPROOT.'/form/class.phpmailer.php';
      $recaptcha = $_POST['g-recaptcha-response'];
      $res = $this->reCaptcha($recaptcha);
      $res = true;
      if(!$res){
          echo '<script type="text/javascript">
          window.alert("Please Try the reCaptcha Again");
          window.location.href = "";
          </script>';
      }
      else{
      try{
      $mail = new PHPMailer;
      $mail->IsSMTP();								//Sets Mailer to send message using SMTP
      $mail->Host = 'mail.lineaddis.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
      $mail->Port = 100;								//Sets the default SMTP server port
      $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
          // $mail->SMTPDebug = 3;
          // $mail->SMTPKeepAlive = true;   
      $mail->Username = 'hello@lineaddis.com';					//Sets SMTP username
      $mail->Password = 'linehelloaddis2021';					//Sets SMTP password
      $mail->SMTPSecure = '';	
                //Sets connection prefix. Options are "", "ssl" or "tls"
      $mail->From = 'hello@lineaddis.com';					//Sets the From email address for the message
      $mail->FromName = 'SupEd | '.trim($_POST['name']);				//Sets the From name of the message
      $mail->AddAddress('info@suped.org', 'Client');		//Adds a "To" address
      $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
      $mail->IsHTML(true);							//Sets message type to HTML				
      $mail->Subject = "A Message From ".trim($_POST['name']);				//Sets the Subject of the message
      $mail->Body = "Email: ".trim($_POST['email']).'<br/>Phone: '.trim($_POST['phone']). '<br/>Name: '.trim($_POST['name']). '<br/>Source Web-Page: '.trim($_POST['page']).'<br/>Message: '.trim($_POST['textarea']);				//An HTML or plain text message body
      if($mail->Send())								//Send an Email. Return true on success or false on error
      {
        header("Location: ".URLROOT."/pages/thankyou");
        $this->view('pages/thankyou');
      }
      else
      {
         echo '<script type="text/javascript">
          window.alert("Your Submission Was Not Recorded. Please Try Again.");
          window.location.href = "";
          </script>';
         
      }
      }catch (Exception $e) {
          echo '<script type="text/javascript">
          window.alert("Your Submission Was Not Recorded. Please Try Again.");
          window.location.href = "";
          </script>';
      
      }
      }
    }
    else{
      $this->view('pages/index');
    }
    }
  }