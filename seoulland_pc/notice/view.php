<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

// $table, $num, $page 값이 넘어옴!!


	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];


// 첩부 파일 실제 이름 / 배열로 만들어서 넣는게 유리하다 for문 돌릴 수 있으므로

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


// 날짜/시간으로 변환된 이름

	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];


    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
        
	}

if ($is_html=="y")
	{
  $item_content = str_replace("&lt;", "<", $item_content);
    $item_content = str_replace("&gt;", ">", $item_content);
}


	
// 0~2 첨부된 이미지 파일 처리를 위한 반복문 (최대 너비를 지정하기 위함 / 게시판의 너비보다 크지 않도록)
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(실제 서버에 업로드된 파일 경로 안의 파일명) => 값이 여러개일때는 배열형태로 리턴됨!! (파일의 너비, 높이, 종류가 리턴됨)
              // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류 (jpg/png/gif 등)

            if ($image_width[$i] > 785)
                
				$image_width[$i] = 785;   // ** 게시판의 폭보다 넓을 때만 게시판 너비로 바꿔주기 (최대 폭 너비를 지정)
            
		}
		else    // 업로드된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
     <title>공지사항 - 글보기</title>
      <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="css/notice.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&?family=Pacifico&family=Noto+Sans+KR:wght@300;400;700&display=swap"
        rel="stylesheet">
         <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
    
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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


<ul class="view_title">
			<li><?= $item_subject ?></li>
            <li>
            <a href="#none" title="글쓴이"><i class="far fa-user"></i> <?= $item_nick ?></a> 
            <a href="#none" title="조회수"><i class="far fa-eye"></i>  <?= $item_hit ?></a> 
            <a href="#none" title="작성시간"> <i class="far fa-clock"></i> <?= $item_date ?></a>
            </li>	
		</ul>






		<div class="view_content">
<?
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width' alt=''>"."<br>";
            // css로 처리가 불가능 $img_width로 처리하기 때문에 / w3c에서 에러나도 그냥 넘어가라
            
            
		}
	}
?>
			<?= $item_content ?>
			
		</div>
		
		
		
		
		<ul class="view_button">
				<li class="btn1"><a href="list.php?table=<?=$table?>&page=<?=$page?>">목록보기</a></li>
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")   // 본인(세션변수 아이디와 지금 num에 해당하는 아이디가 같은지 비교해서 알아냄) 과 관리자만 가능   
	{
?>                
            <li>
                <ul class="md">
                    <li class="btn2"><a href="modify_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a></li>
				<li class="btn3"><a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a></li>
                </ul>
            </li>
               
				
<?
	}
?>
<? 
	if($userid )  //로그인이 되면 글쓰기
	{
?>
				<li class="btn4"><a href="write_form.php?table=<?=$table?>">글쓰기</a></li>
				
            
<?
	}
?>
		</ul>
		
		
    </article>
    
      <? include "../common/sub_foot.html" ?>
    
</body>
</html>