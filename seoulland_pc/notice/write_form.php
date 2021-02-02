<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table
// 수정 => $table, $mode=modify, $num, $page


	include "../lib/dbconn.php";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>공지사항 - 글쓰기</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="css/notice.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&?family=Pacifico&family=Noto+Sans+KR:wght@300;400;700&display=swap"
        rel="stylesheet">
         <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
    
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>

<body>

<? include "../common/sub_head.html" ?>


<!-- MAIN VISUAL -->

    <div class="visual_box"><img src="../sub6/common/images/visual4.jpg" alt=""></div>

    <!-- SUB NAV -->
    <div class="subnav_box">
        <h3>고객센터</h3>
       
        <ul class="sub_nav">
            <li><a href="list.php" class="current">공지사항</a></li>
            <li><a href="../sub6/sub6_2.html">FAQ</a></li>

        </ul>
    </div>
    


<article id="content">
  
     <div class="title_area">
            <div class="line_map">
                <span>Home </span>&gt;<span> 고객센터 </span>&gt;<strong> 공지사항</strong>
            </div>
            <h2>공지사항</h2>
        </div>

  
<div class="write_form"> 



		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 

            <ul>
				<li> 닉네임 </li>   
				<li><?=$usernick?></li>    
				<li><input type="checkbox" name="html_ok" value="y" id="html_ok"> <label for="html_ok">HTML 쓰기</label></li>
			</ul>
			
			<ul>
                <li> 제목</li>
			     <li><input type="text" name="subject" value="<?=$item_subject?>"></li>
			</ul>
			
			<ul>
                <li> 내용</li>
			     <li><textarea name="content"></textarea></li>
			</ul>
        
        <ul>
			    <li>이미지파일1</li>
			    <li><input type="file" name="upfile[]"></li>
            </ul>
            
              <ul>
			    <li>이미지파일2</li>
			    <li><input type="file" name="upfile[]"></li>
            </ul>
            
              <ul>
			    <li>이미지파일3</li>
			    <li><input type="file" name="upfile[]"></li>
            </ul>
        

        <div class="write_button">
            <input type="button" value="작성" onclick="check_input()">&nbsp;
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록보기</a>
		</div>
		</form>
		
		</div> 

     
	


            </article>
            
              <? include "../common/sub_foot.html" ?>

</body>
</html>