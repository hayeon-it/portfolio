<?
    session_start();
   @extract($_GET); 
  @extract($_POST); 
   @extract($_SESSION);  
  
   // $userid / $fare1 / $count1 / $cfare1 / $fare2 / $count2 / $cfare2

  ?>
  
   
   <!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>서울랜드 - 예매내역 확인</title>
    <link href="../common/css/common.css" rel="stylesheet">
     <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/book.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
   
   <?
$total = $cfare1 + $cfare2 + $cfare3;

  
 
        if(!$userid)  // 세션변수가 생성되어 있지 않다면 
            {
        ?> 
          <script>
          alert('로그인 후 이용해주세요.');
          location.href="../login/login_form.php";
          </script>
          <?
        }




   include "../lib/dbconn.php";   //DB 접속



   $sql = "select * from member where id='$userid' and pass=password('$pass')";   // 중복되지 않는 프라이머리 키(id)로 레코드 찾기
   $result = mysql_query($sql, $connect);  // 있으면 1, 없으면 NULL

   $num_match = mysql_num_rows($result);  //1 0

   if(!$num_match)  
   {
     echo("
           <script>
             window.alert('비밀번호가 일치하지 않습니다.');
             history.go(-1);
             exit;
           </script>
         ");
    }
    else   
    {
        
       $sql = "select * from book where id='$userid'";   // 중복되지 않는 프라이머리 키(id)로 레코드 찾기
   $result = mysql_query($sql, $connect);  // 있으면 1, 없으면 NULL

   $num_match = mysql_num_rows($result);  //1 0 
        
          if(!$num_match)  
   {
     echo("
           <script>
             window.alert('예매내역이 존재하지 않습니다.');
             history.go(-1);
             exit;
           </script>
         ");
    }
        
    

            
$sql = "select * from book where id='$userid'"; // 예약 테이블에서 로그인 된 아이디 레코드 찾기

 $result = mysql_query($sql, $connect);  // 실행


$row = mysql_fetch_array($result);  // 레코드 뽑아서 row에 담기
      

if($row[fare1]==46000) {
    $row[age1] = '어른';
} 
if($row[fare2]==43000) {
    $row[age2] = '청소년';
}
if($row[fare3]==40000) {
    $row[age3] = '어린이';
}
        
        
        
    }


      ?>
   
   
   
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
    
 
                <div class='book_box'>
                <p class='booknum'><span>예매번호 :</span>  <?=$row[booknum]?></p>
           <ul class='book2'>
         <li class="info">예매 정보</li>
            <li><span>방문날짜</span> : <?=$row[date]?> </li>
              <li><span>인원</span> : <?=$row[age1]?> <?=$row[count1]?> 인 <?=$row[age2]?> <?=$row[count2]?> 인 <?=$row[age3]?> <?=$row[count3]?> 인</li>

            <li><span>결제수단</span> : <?=$row[pay]?></li>
              <li><span>최종결제금액</span> : <?= $row[total] ?> 원 </li>
                    </ul>
              
    
<?
   
     $sql = "select * from member where id='$userid'";   // 중복되지 않는 프라이머리 키(id)로 레코드 찾기
   $result = mysql_query($sql, $connect);  // 있으면 
        
		 $row = mysql_fetch_array($result); // 레코드 뽑아서 row에 담기
?>

    <ul class="book3">
  <li class="info">예매자 정보</li>
  <li><span>아이디</span> : <?= $row[id] ?></li>
   <li><span>이름</span> : <?= $row[name] ?></li>
           <li><span>핸드폰번호</span> : <?= $row[hp] ?></li>       
            
           </ul>
            
            </div>

        
        </article>
         <? include "../common/sub_foot.html" ?>
        
      </body>  
        
     </html>

