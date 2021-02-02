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
	<title>회원정보수정</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	<link rel="stylesheet" href="css/modify.css">
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@300;400;700;900&display=swap" rel="stylesheet">
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
	
	<script>

        $(document).ready(function(){
            $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
            var nick = $('#nick').val();

            $.ajax({
                type: "POST",
                url: "../member/check_nick.php",
                data: "nick="+ nick,  
                cache: false, 
                success: function(data)
                {
                     $("#loadtext2").html(data);
                }
            });
        });	
       
        
          $('#eye').toggle(function(){
             $(this).find('.fa-eye').attr('class', 'fas fa-eye-slash');
             $('#pass').attr('type','text');
              $('#eye').attr('title','비밀번호 숨기기');
             $('#pass_confirm').attr('type','text');
         }, function(){
             $(this).find('.fa-eye-slash').attr('class', 'fas fa-eye');
             $('#pass').attr('type','password');
              $('#eye').attr('title','비밀번호 표시');
             $('#pass_confirm').attr('type','password');
         });
            
        });
        </script>
            
         <script>   
        
     
             function passCheck() {

           if(!document.member_form.pass_confirm.value) {
              $('#passtext').text('비밀번호를 확인하세요');
               $('#passtext').css('color','#fe4365');
              return; 
           }
           
           
          if (document.member_form.pass.value != 
                document.member_form.pass_confirm.value)
          {
              $('#passtext').text('!비밀번호가 다릅니다');
              $('#passtext').css('color','#fe4365');
              return;
          }
           
           if (document.member_form.pass.value == 
                document.member_form.pass_confirm.value)
          {
              $('#passtext').text('비밀번호가 일치합니다');
              $('#passtext').css('color','green');
              return;
          }
           
       }
            

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

     
      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }
       
       
       var inText = document.member_form.hp2.value;
           var ret;
 

           for(var i=0; i<inText.length; i++) {
               ret = inText.charCodeAt(i);
           }
       
        if(!(ret>=48 && ret<=57)) {
               alert("휴대폰 중간자리는 숫자만 입력 가능합니다");
            document.member_form.hp2.value = "";
               document.member_form.hp2.focus();
            
              return;
           }
       
       
       var inText2 = document.member_form.hp3.value;
           var ret2;


           for(var j=0; j<inText2.length; j++) {
               ret2 = inText2.charCodeAt(j);
           }
            
  
           if(!(ret2>=48 && ret2<=57)) {
               alert("휴대폰 뒷자리는 숫자만 입력 가능합니다");
               document.member_form.hp3.value = "";
              document.member_form.hp3.focus();
              return;
           }
       

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }
       
       if (!document.member_form.email1.value || !document.member_form.email2.value )
      {
          alert("이메일 주소를 입력하세요");    
          document.member_form.email1.focus();
          return;
      }
       
       
       var emailID = document.member_form.email1.value;
       var ret3;
       for(var k=0; k<emailID.length; k++) {
           ret3 = emailID.charCodeAt(k)
       }
       
       if(!(ret3>=97 && ret3<=122 || ret3 >=65 && ret3 <=90 || ret3 >=48 && ret3<= 57)) {
           alert('이메일 주소는 영문, 숫자로만 구성되어 있어야 합니다');
           document.member_form.email1.value = "";
           document.member_form.email1.focus();
            
          return;
       }
       
       
        
       var emailID2 = document.member_form.email2.value;
       
  
     dotpos = emailID2.lastIndexOf("."); 

     if (dotpos < 1 )   // '.'앞에 최소 1글자 입력하도록
   {
       alert("제대로 된 이메일 형식을 입력하세요");
       document.member_form.email2.focus() ; 
       return ;
   }
       
       
       
       
       
       
       

      document.member_form.submit();
   }

   function reset_form()
   {
//      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
//      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
            
      
</script>

</head>
<?
    //$userid='aaa';   세션변수 userid 값이 넘어옴 (로그인한 그 해당 인류의 아이디)
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0]; //000
    $hp2 = $hp[1]; //0000
    $hp3 = $hp[2]; //0000

    $email = explode("@", $row[email]);   //bini@naver.com
    $email1 = $email[0];  //bini
    $email2 = $email[1];  //naver.com

    mysql_close();
?>


<body>
	
	<div id="wrap">
	
<!--
	<header>
     <h1 class="logo"><a href="../index.html">로고</a></h1>
 </header>
-->
	 
	<article id="content">  
  
     
      <a href="../index.html" class="home">HOME</a>
	  
	  <h2>회원정보수정</h2>
	  <p><i class="fas fa-check-square"></i> 모든 항목은 필수 입력 사항입니다.</p>
	    <img class="bk" src="../login/images/bk.png" alt="">
       <p class="des">회원님의 소중한 정보를<br> 수정해주세요</p>
	  
	  
	  <form name="member_form" method="post" action="modify.php"> 
		
    <ul class="join_form">
      
         <li><span class="lb">아이디</span> <?= $row[id] ?></li>
          <li>
            <label for="pass">비밀번호</label>
             <input type="password" name="pass" id="pass" value="" required>   
        </li>
        <li>
            <label for="pass">비밀번호 확인</label>
             <input type="password" name="pass_confirm" id="pass_confirm" value="" onkeyup="passCheck()" required>  
             <span id="passtext"></span> 
             <a href="#none" title="비밀번호 표시" id="eye"><i class="fas fa-eye"></i></a>
        </li>
        <li>
            <span class="lb">이름</span><?= $row[name] ?>
        </li>
       
        <li>
            <label for="nick">닉네임</label>
            <input type="text" name="nick" id="nick" value="<?= $row[nick]?>" required><span id="loadtext2"></span>
        </li>
        
        <li>
           <span class="lb">핸드폰 번호</span>
            <label class="hidden" for="hp1">전화번호앞3자리</label>
     			<input type="text" id="hp1" name="hp1" value="<?= $hp1 ?>"> 
     			    - 
          <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" id="hp2" name="hp2" value="<?= $hp2 ?>">
            - 
            <label class="hidden" for="hp3">전화번호끝4자리</label>
            <input type="text" id="hp3" name="hp3" value="<?= $hp3 ?>">
        </li>
        
        <li>
          <span class="lb">이메일 주소</span>
           <label class="hidden" for="email1">이메일아이디</label>
     			 <input type="text" id="email1" class="email1" name="email1" value="<?= $email1 ?>"> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2" class="email2"  required> 
        </li>
         <li class="button">
    <a href="#" class="join_btn" onclick="check_input()">정보수정</a>&nbsp;&nbsp;
	<a href="#" class="reset_btn" onclick="reset_form()">다시쓰기</a>
    
    </li>
     
    </ul>
    
    
   
    
    
     

	 </form>
	  
	</article>
	
	</div>
	
</body>
</html>


