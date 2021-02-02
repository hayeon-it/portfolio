<?
    session_start();
?>
<meta charset="utf-8">
<?
   @extract($_GET); 
  @extract($_POST); 
   @extract($_SESSION);  
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   // $id=>입력id값    $pass=>입력 pass값이 POST 방식으로 넘어옴! 
   
  
   if(!$name) {   //아이디 NULL값 체크
     echo("
           <script>
             window.alert('이름을 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$hp1 || !$hp2 || !$hp3 ) {  //패스워드 NULL값 체크 
     echo("
           <script>
             window.alert('핸드폰 번호를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

 
   include "../lib/dbconn.php";   //DB 접속



   $sql = "select * from member where name='$name'";   // 중복되지 않는 프라이머리 키(id)로 레코드 찾기
   $result = mysql_query($sql, $connect);  // 있으면 1, 없으면 NULL

   $num_match = mysql_num_rows($result);  //1 0

   if(!$num_match)  // 아이디 검색 결과가 없음
   {
     echo("
           <script>
             window.alert('등록되지 않은 이름입니다.');
             history.go(-1);
           </script>
         ");
    }
    else    // 아이디 검색 결과가 있으면
    {
        $hp = $hp1."-".$hp2."-".$hp3; 
        
		 $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where name='$name' and hp='$hp'";
        
        
        
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result);
     
  

        if(!$num_match)  
        {
           echo("
              <script>
                window.alert('해당 이름에 등록된 핸드폰 번호가 아닙니다');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else    // 아이디와 패스워드가 모두 일치한다면..
        {
           
            $result = mysql_query($sql, $connect);
            
            echo 
                "
                <div class='idfind_box'>
                <p class='idfind1'>아이디 찾기 성공!</p>
           <ul class='idfind2'>
              <li>$row[name] 님의 가입 정보</li>
               <li>아이디 : $row[id] </li>
               <li>이름 : $row[name] </li>
               <li>휴대폰 번호 : $row[hp] </li>
               <li>등록일시 : $row[regist_day]</li>
           </ul>
                    
           <ul>
             <li><a href='login_form.php' class='idf'>로그인</a>
                    <a href='passfind_form.php' class='psf'>비밀번호 찾기</a>
                  </li>
            </ul>
            
            </div>
            ";
            
            
        }
   }          
?>
