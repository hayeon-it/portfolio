<? 
	session_start(); 

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원탈퇴</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	<link rel="stylesheet" href="css/modify.css">
	<link rel="stylesheet" href="css/delete.css">
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@300;400;700;900&display=swap" rel="stylesheet">
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
	
	

</head>



<body>
	
	<div id="wrap">
	

	 
	<article id="content">  
  
      <a href="../index.html" class="home">HOME</a>
	  
	  <h2>회원탈퇴</h2>
	 
	    <img class="bk" src="../login/images/bk.png" alt="">
       <p class="des">회원탈퇴 페이지입니다</p>
	  
	  
	  <form name="member_form" method="post" action="delete.php"> 
		
    <ul class="join_form">
      
         
          <li>
            <label for="pass" class="hidden">비밀번호</label>
             <input type="password" name="pass" id="pass"  placeholder="비밀번호를 입력해주세요" required>   
        </li>
      
        
         <li>
         <label for="leave" class="hidden">회원탈퇴</label>
 <input type="submit" id="leave" value="회원탈퇴">
	
    
    </li>
     
    </ul>
    
    
   
    
    
     

	 </form>
	  
	</article>
	
	</div>
	
</body>
</html>


