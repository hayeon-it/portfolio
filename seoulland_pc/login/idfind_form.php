<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>아이디 찾기</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="css/member.css" rel="stylesheet">
    <link rel="stylesheet" href="css/idfind.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>

   <script>
       $(document).ready(function(){
           $(".find_btn").click(function() {    
            var name = $('#name').val(); 
               var hp1 = $('#hp1').val(); 
                var hp2 = $('#hp2').val(); 
                var hp3 = $('#hp3').val(); 

            $.ajax({
                type: "POST",
                url: "idfind.php",
                data: "name="+ name + "&hp1=" +hp1 + "&hp2=" +hp2 + "&hp3=" +hp3,   
                cache: false,  // cache : 기록 남기는것 -> 느려지므로 false
                success: function(data)
                {
                     $("#loadtext").html(data);    
                }
            });
        }); 
       })
   
</script>

</head>
<body>
    <div id="wrap">
 
 
  <div id="content">
	
      <a href="../index.html" class="logo">로고</a>
       <a href="../index.html" class="home">HOME</a>
       
        <form name="idfind_form" method="post" action="idfind.php"> 
		<h2>FORGOT ID?</h2>
        <img class="bk" src="images/bk.png" alt="">
       <p class="des">아이디를 잊으셨나요?</p>
       
       
		<div id="idfind_form">
		      <ul>
                    <li><label for="name" class="hidden">이름</label><input type="text" id="name" name="name" class="login_input" placeholder="이름를 입력하세요 (test)"></li>
                    
                    <li>
                    <label class="hidden" for="hp1">전화번호앞3자리</label>
                    <input type="text" id="hp1" name="hp1" class="login_input" placeholder="010">
                    -
                    <label class="hidden" for="hp2">전화번호중간3자리</label>
                    <input type="text" id="hp2" name="hp2" class="login_input" placeholder="1234">
                    -
                    <label class="hidden" for="hp3">전화번호뒷3자리</label>
                    <input type="text" id="hp3" name="hp3" class="login_input" placeholder="5678">
                    </li>

                     
                  <li><a class="find_btn" href="#none"><i class="fas fa-search"></i> <span>아이디찾기</span></a></li>
                  
				</ul>		
				
						<span id="loadtext"></span>		
		 
		</div> <!-- end of form_login -->

	    </form>
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>