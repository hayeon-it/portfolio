<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "notice";  // 해당 게시판의 테이블명 / 테이블 이름을 변수에 담아서 좀 더 편하게 사용 (게시판을 여러개 만들 때 유리 ""안의 이름만 바꿔주면 되기 때문)
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>리스트</title>
   <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="css/notice.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&?family=Pacifico&family=Noto+Sans+KR:wght@300;400;700&display=swap"
        rel="stylesheet">
         <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/58ed643491.js" crossorigin="anonymous"></script>
    
    
</head>

    

<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=6;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
<body>

<? include "../common/sub_head.html" ?>



 <!-- MAIN VISUAL -->

    <div class="visual_box"><img src="../sub6/common/images/visual4.jpg" alt=""></div>

    <!-- SUB NAV -->
    <div class="subnav_box">
        <h3>고객센터</h3>
       
        <ul class="sub_nav">
            <li><a href="list.php" class="current">공지/이벤트</a></li>
            <li><a href="../sub6/sub6_2.html">FAQ</a></li>

        </ul>
    </div>

 

  <article id="content">


<div class="title_area">
            <div class="line_map">
                <span>Home </span>&gt;<span> 고객센터 </span>&gt;<strong> 공지/이벤트</strong>
            </div>
            <h2>공지/이벤트</h2>
        </div>


	     <div class="content_area">
		
	
		
		
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		
		
		
		<div class="view_list">
            <a href="#none" class="view_type current" title="웹진형 리스트로 보기"><i class="fas fa-list-ul"></i>
 <span class="hidden">웹진형</span></a>
                    <a href="#none" class="view_type" title="갤러리형 리스트로 보기"><i class="fas fa-th-large"></i> <span class="hidden">갤러리형</span></a>
		</div>
		
		
		<ul class="list_search">
			<li>Total <span><?= $total_record ?></span> 건</li>
				
			<li>
                <select name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>보기</option>
                    <option value='3'>3개씩</option>
                    <option value='6'>6개씩</option>
                    <option value='9'>9개씩</option>
                    <option value='12'>12개씩</option>
                </select>
            </li>
			
			<li class="list_search2">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>닉네임</option>
                    <option value='name'>이름</option>
				</select>
               <label for="search" class="hidden">검색창</label>
			    <input type="text" name="search" placeholder="검색할 내용을 입력하세요">
			    <label for="submit" class="hidden">검색버튼</label>
			    <input type="submit" value="&#xf002" id="submit">
		</li>
		</ul>
		
            
             </form>
		
		
<!-- 웹진형 -->

		<div class="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
       
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
       
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
       
       
       $item_content = mb_substr($row[content], 0, 180, 'utf-8')."..";
       
       
       $item_content = str_replace(" ", "&nbsp;", $item_content); 
       
        $item_content = str_replace("&lt;", "<", $item_content);
    $item_content = str_replace("&gt;", ">", $item_content);
       
        
      if($row[file_copied_0]){  // 첫번째 첨부 이미지가 존재하면
        $item_img = 'data/'.$row[file_copied_0];   // 2020_10_12_10_40_53_0.jpg 
      }else{   // 첨부 이미지가 존재하지 않으면
        $item_img = 'data/default.jpg'  ;
      }
      
?>
       
       <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
       <ul class="list_item">
				
				<li>
				    <ul class="subcon">
				        <li><?= $item_subject ?></li>
				        <li><?= $item_content ?></li>
				    </ul>
				    <ul class="admin">
                        <li>No. <?= $number ?></li>
                           
                        <li><i class="far fa-user"></i> <?= $item_nick ?></li>
                        <li><i class="fas fa-calendar-week"></i> <?= $item_date ?>  </li>
                        <li><i class="far fa-eye"></i> <?= $item_hit ?></li>
                    </ul>
				   
				         
				    
				</li>
				
               <li><img src="<?=$item_img?>" alt="" width="300" height="300"></li>
            </ul>
       </a>
   			
<?
   	   $number--;
   }
?>
		<div class="page_button">
				<div class="page_num"> 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b><span> $i </span></b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'><span> $i </span> </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'><span> $i </span></a>";
           }
		}      
   }	
?>			
			
				</div>
				
				<div class="button">
					<a href="list.php?page=1">목록</a>&nbsp;
					
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->

      
      
      
      
      
      <!-- 갤러리형 -->
     
      <div class="list_content gal">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
       
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
       
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
       
       
       $item_content = mb_substr($row[content], 0, 20, 'utf-8')."..";
       
       
       $item_content2 = str_replace(" ", "&nbsp;", $item_content); 
       
       
        $item_content2 = str_replace("&lt;", "<", $item_content);
    $item_content2 = str_replace("&gt;", ">", $item_content);
       
        
      if($row[file_copied_0]){  // 첫번째 첨부 이미지가 존재하면
        $item_img = 'data/'.$row[file_copied_0];   // 2020_10_12_10_40_53_0.jpg 
      }else{   // 첨부 이미지가 존재하지 않으면
        $item_img = 'data/default.jpg'  ;
      }
      
?>
       
       
       
       <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
       <ul class="list_item">
       
          <li><img src="<?=$item_img?>" alt="" width="300" height="300"></li>
				
				<li>
				    <ul class="subcon">
				        <li><?= $item_subject ?></li>
				        <li><?= $item_date ?></li>
				    </ul>
				  
				</li>
				
            
            </ul>
       </a>
   			
<?
   	   $number--;
   }
?>
		<div class="page_button">
				<div class="page_num"> 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b><span> $i </span></b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'><span> $i </span> </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'><span> $i </span></a>";
           }
		}      
   }	
?>			
			
				</div>
				
				<div class="button">
					<a href="list.php?page=1">목록</a>&nbsp;
					
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
      
      

      </div>
  </article> <!-- end of content -->

  <? include "../common/sub_foot.html" ?>
  
  <script>
       $('.view_type').each(function(index) {
       $(this).click(function(){
           $('.list_content').hide();
           $('.list_content').eq(index).show();
            $('.view_list a').removeClass('current');
           $('.view_list a').eq(index).addClass('current');
       })
       
       });
    </script>
  

</body>
</html>
