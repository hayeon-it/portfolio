<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table
// 수정 => $table, $mode=modify, $num, $page


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>공지사항 - 수정하기</title>
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

    <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 

          <ul>
				<li> 닉네임 </li>   
				<li><?=$usernick?></li>    
			</ul>
			
			<ul>
                <li> 제목</li>
			     <li><input type="text" name="subject" value="<?=$item_subject?>" ></li>
			</ul>
			
			<ul>
                <li> 내용</li>
			     <li><textarea name="content"><?=$item_content?></textarea></li>
			</ul>
			<ul>
			    <li>이미지파일1</li>
			    <li><input type="file" name="upfile[]"></li>
			    
<? 	if ($item_file_0)
	{
?>
			<li class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</li>
<?
	}
?>
			    
			    
			</ul>
			<ul>
			    <li>이미지파일2</li>
			    <li><input type="file" name="upfile[]"></li>
			    <? 	if ($item_file_1)
	{
?>
			<li class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</li>
<?
	}
?>
			</ul>
			<ul>
			    <li>이미지파일3</li>
			    <li><input type="file" name="upfile[]"></li>
			    <? 	if ($item_file_2)
	{
?>
			<li class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</li>
<?
	}
?>
			</ul>
			

	<div class="write_button">
            <input type="button" value="수정" onclick="check_input()">
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록보기</a>
		</div>
		

		</form>
</div>
	
  </article> <!-- end of content -->

<? include "../common/sub_foot.html" ?>

</body>
</html>

