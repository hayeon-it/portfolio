<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  

    // 세션변수 4개가 넘어옴 $userid, $username, $usernick, $userlevel
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>서울랜드 - 예매내역</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/book.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
  
</head>
<body>
 
 
<? include "../common/sub_head.html" ?>


<!-- MAIN VISUAL -->

    <div class="visual_box"><img src="../sub5/common/images/visual_4.jpg" alt=""></div>

    <!-- SUB NAV -->
    <div class="subnav_box">
        <h3>예매/예약</h3>
       
        <ul class="sub_nav">
            <li><a href="book_form.php" >예매</a></li>
            <li><a href="book_confirm.php" class="current">예매내역</a></li>

        </ul>
    </div>

  <article id="content">
  
  <div class="title_area">
            <div class="line_map">
                <span>Home </span>&gt;<span> 예매/예약 </span>&gt;<strong> 예매내역</strong>
            </div>
            <h2>예매내역</h2>
        </div>

<form  name="book_confirm" method="post" action="book1.php"> 
		
      
		      <div class="confirm">
             
             <p>예매내역 확인을 위해 패스워드를 한 번 더 입력해주세요.</p>
              
                   <ul>
                    <li>
                    <label for="pass" class="hidden">비밀번호</label>
                    <input type="password" id="pass" name="pass" class="login_input" placeholder="패스워드를 입력하세요"><a href="#none" title="비밀번호 표시" id="eye"><i class="fas fa-eye"></i></a></li>
                    
                    <li>
                    <label for="submit" class="hidden">확인</label>
                    <input type="submit" value="확인" class="login_btn" id="submit"></li>
                  </ul>
				</div>						
	

	    </form>
	    
	   
	  </article>
  
  <? include "../common/sub_foot.html" ?>
   <script>
        $(document).ready(function(){
            $('#eye').toggle(function(){
                 $(this).find('.fa-eye').attr('class', 'fas fa-eye-slash');
                 $('#pass').attr('type','text');
                  $('#eye').attr('title','비밀번호 숨기기');
             }, function(){
                 $(this).find('.fa-eye-slash').attr('class', 'fas fa-eye');
                 $('#pass').attr('type','password');
                  $('#eye').attr('title','비밀번호 표시');
             });
        })
    </script>

</body>
</html>  
	 
	