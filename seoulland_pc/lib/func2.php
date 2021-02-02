<?
   function latest_article($table, $loop, $char_limit, $char_limit2) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                 $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

            
            $len_content = mb_strlen($row[content], 'utf-8');
			$content = $row[content];
             

			if ($len_content > $char_limit)
			{
				 $content = str_replace( "&#039;", "'", $content);               
                 $content = mb_substr($content, 0, $char_limit2, 'utf-8');
				$content = $content."...";
                
                
			}
            
            
            
            
			$regist_day = substr($row[regist_day], 0, 10);

            
            
            
            if($table == 'notice') {
             //목록 이미지 경로 불러오기
			$img_name = $row[file_copied_2];   // 첨부된 첫번째 이미지 
            
			if($img_name){   // 첨부된 첫번째 이미지가 있으면
				$img_name = "./$table/data/".$img_name;
			}else{
				$img_name = "./$table/data/default.jpg"; 
			}
            }
            
       
            echo "    
            <li>
                <a href='./$table/view.php?table=$table&num=$num'>
             <img src='$img_name' width='339' height='190'>
				<dl>
                 <dt>$subject</dt>
                 <dd>$content</dd>
                </dl>
                </a>
            
            </li>
            			
			";
            
             
            
            
            
            /* 
            <img src="images/info_1.jpg" alt="" />
                <dl>
                  <dt>긴급재난지원금 사용 관련 안내</dt>
                  <dd>
                    안녕하세요, 행복을 드리는 서울랜드 입니다. 긴급재난지원금
                    사용과 관련해 안내 드립니다. 고객님의 주민등록상 거주지가
                    경기도인 경기도민의 경우...
                  </dd>
                </dl>
            
            */
            
            
            
            
            
                
		}
		mysql_close();
   }
?>