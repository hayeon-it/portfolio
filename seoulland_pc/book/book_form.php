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
    <title>서울랜드 - 예매/예약</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/book.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
    
    <script>
    
      function book_check() {
          
     
       <?
        if(!$userid) {
        ?> 
          
          alert('로그인 후 이용해주세요.');
          location.href="../login/login_form.php";
          
          <?
        }
          else {
              
         ?>
          
          
     
            if (document.book_form.count1.value==0 && document.book_form.count2.value==0 && document.book_form.count3.value==0 ) {
            alert("예매 매수를 선택하세요");    
               return;
            }
          
         

            var conf = confirm("선택한 내용으로 결제를 진행하시겠습니까?"); 
             if(conf == 1) {
                 
                  <?
              
              include "../lib/dbconn.php";   //DB 접속



   $sql = "select * from book where id='$userid'";   // 중복되지 않는 프라이머리 키(id)로 레코드 찾기
   $result = mysql_query($sql, $connect);  // 있으면 1, 없으면 NULL

   $num_match = mysql_num_rows($result);  //1 0

   if($num_match)  
   {
   ?>
             alert('이미 결제하신 내역이 존재합니다. 예매내역 페이지로 이동합니다.');
           location.href="book_confirm.php";
             return;
          
   
        <?
    }
    else if(!$num_match)
    {
  
              ?>
                 
                 
                 
                 document.book_form.submit(); 
          alert("결제가 완료되었습니다. 예매내역 페이지로 이동합니다.");
                 
                <?
    }
              ?>
                 
                 
             } else {
                 alert("취소되었습니다.")
             }
             
     
  
        <?
            }
        ?>
          
          }
    
    </script>
    
   
</head>
<body>
 
 
<? include "../common/sub_head.html" ?>


<!-- MAIN VISUAL -->

    <div class="visual_box"><img src="../sub5/common/images/visual_4.jpg" alt=""></div>

    <!-- SUB NAV -->
    <div class="subnav_box">
        <h3>예매/예약</h3>
       
        <ul class="sub_nav">
            <li><a href="book_form.php" class="current">예매</a></li>
            <li><a href="book_confirm.php">예매내역</a></li>

        </ul>
    </div>
 
  <article id="content">
  
  <div class="title_area">
            <div class="line_map">
                <span>Home </span>&gt;<span> 예매/예약 </span>&gt;<strong> 예매</strong>
            </div>
            <h2>예매</h2>
        </div>
	
     
     
     <div class="content_area">
     
    
     
      <form name="book_form" method="get" action="insert.php" >
       
        
       <div class="book_form">
         
<!--         <p class="">파크이용권 &#40;일반/ALL DAY&#41;</p>-->
         
         <label for="date" class="date">01. 방문일자</label>
         <p class="des">* 서울랜드를 방문하실 날짜를 선택해주세요</p>
         <input type="date" name="date" id="date" />
         
         
           <div class="age_box">
           <p>02. 인원선택</p>
           <p class="des">* 예매하실 인원을 선택해주세요</p>
           
            <ul class="age age1">
                <li>
                
                <label for="fare1">어른</label>
           <input type="number" id="fare1" name="fare1" value="46000"> </li> 
               <li> 
                 <label for="count_minus1" class="hidden">감소</label>
                <input type="button" id="count_minus1" class="m"  value="-">
               
               <label for="count1" class="hidden">매수</label>
               <input type="number" id="count1" name="count1" value="0" readOnly>
               <label for="count_plus1" class="hidden">증가</label>
                <input type="button" id="count_plus1" class="p"  value="+">
               
               </li>
              
              
                 <li>
                 <label for="cfare1">합계</label>
                 <input type="number" id="cfare1" name="cfare1" value="0" />   </li>
                
            </ul> 
          
           
           
                       <ul class="age age2">
                      <li>  
                         
                          <label for="fare2">청소년 </label>
           <input type="number" id="fare2" name="fare2" value="43000">
           </li>
            <li>
             <label for="count_minus2" class="hidden">감소</label>
           <input type="button" id="count_minus2" class="m" value="-"> 
             
              <label for="count2" class="hidden">매수</label>
               <input type="number" id="count2" name="count2" value="0" readOnly>
               
               <label for="count_plus1" class="hidden">증가</label>
            <input type="button" id="count_plus2" class="p"  value="+">
               </li>
         
           
               <li>
               <label for="cfare2">합계</label>
                <input type="number" id="cfare2" name="cfare2" class="p" value="0" /> 
                    </li> 
          </ul>
                           
                    
             
               
             <ul class="age age3">
                     
                   <li> 
                                      
            <label for="fare3">어린이</label>
           <input type="number" id="fare3" name="fare3" value="40000">
           </li>
           <li>
             <label for="count_minus3" class="hidden">감소</label>
           <input type="button" id="count_minus3"  value="-" class="m">
             
              <label for="count3" class="hidden">매수</label>
               <input type="number" id="count3" name="count3" value="0" readOnly>
               
               <label for="count_plus3" class="hidden">증가</label>
          <input type="button" id="count_plus3"  value="+" class="p">
               </li>
           
          
               <li>
               <label for="cfare3">합계</label>
                <input type="number" id="cfare3" name="cfare3" value="0" />        </li> 
                   
                </ul>
                  </div>
                  
                  
                  
                    <div class="total_fare"> 
                    
                     <p></p>
                      <p></p>
                      <p></p>
                       
                       
                       <ul class="total_fee">
                       <li>
                     <label for="total">총 결제금액</label>               </li>
                     <li>
                    <input type="number" id="total" name="total" value="0"> 
                    
                    원</li>
                    </ul>
                    
                     </div>    
                   
                   
                   <div class="pay">
                       <p>03. 결제수단</p>
                       
                       <ul>
                           <li>
                           <img src="images/pay1.png" alt="">
                           
                     
                         <label for="pay1">신용카드</label>
                           <input type="radio" id="pay1" name="pay" value="신용카드" checked>
                         </li>
                          
                           <li>
                           <img src="images/pay2.png" alt="">
                           <label for="pay2">무통장입금</label>
        <input type="radio" id="pay2" name="pay" value="무통장입금"></li>
                          
                           <li>
                           <img src="images/pay3.png" alt="">
                           <label for="pay3">계좌이체</label>
                      <input type="radio" id="pay3" name="pay" value="계좌이체"></li>
                          
                           <li>
                           <img src="images/pay4.png" alt="">
                           <label for="pay4"> 휴대폰결제</label>
                       <input type="radio" id="pay4" name="pay" value="휴대폰결제"></li>
                           
                       </ul>
        	 
                   </div>
                   
                   
                   
                                                                                                                                
                                                                                                                                                                                                      
                                                                                                                   
          <a href="#none" class="book_btn" onclick="book_check()">예매</a>
           
               
          </div>
    </form>
     
     
  
     
     
      </div>

  </article>
  
  <? include "../common/sub_foot.html" ?>
  <script src="js/book.js"></script>

</body>
</html>