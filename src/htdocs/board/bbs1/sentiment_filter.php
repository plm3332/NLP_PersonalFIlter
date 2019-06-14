<?php 
  include "../../lib/db.php";
  include "../../lib/sentiment_test_lib.php"
?>
<!doctype html>
<head>
<meta charset="UTF-8">
  <title>감정 분석</title>
  <link rel="stylesheet" type="text/css" href="../../css/style.css" />
</head>
<body>
<div id="board_area"> 
  	<h1>테스트 에타 게시판</h1>
  	<h4 style="margin-top:30px;"><a href="../../index.php">홈으로</a></h4>
    <table class="list-table">
      	<thead>
          	<tr>
              	<th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
                <th width="100">Sentiment</th>
                <th width="100">Magnitude</th>
            </tr>
        </thead>
        <?php
            if(isset($_GET['page'])){
              	$page = $_GET['page'];
                }else{
                	$page = 1;
                }
                	$sql = mq("select * from bbs1");
                	$row_num = mysqli_num_rows($sql); 
                	$list = 10; 
                	$block_ct = 10; 

                	$block_num = ceil($page/$block_ct); 
                	$block_start = (($block_num - 1) * $block_ct) + 1; 
                	$block_end = $block_start + $block_ct - 1; 

                	$total_page = ceil($row_num / $list); 
                	if($block_end > $total_page) $block_end = $total_page; 
                	$total_block = ceil($total_page/$block_ct); 
                	$start_num = ($page-1) * $list; 

                	$sql2 = mq("select * from bbs1 order by idx desc limit $start_num, $list");  
                	while($bbs1 = $sql2->fetch_array()){
                	$title=$bbs1["title"]; 
                    if(strlen($title)>30)
                    { 
                    	$title=str_replace($bbs1["title"], mb_substr($bbs1["title"],0,30,"utf-8")."...", $bbs1["title"]);
                    }
		?>
      	<tbody>
        	<tr>
            
        		  <td width="70"><?php echo $bbs1['idx']; ?></td>
          		<td width="500"><a href="sentiment_view.php?idx=<?php echo $bbs1["idx"];?>"><?php echo $title;?></a></td>
          		<td width="120"><?php echo $bbs1['name']?></td>
          		<td width="100"><?php echo $bbs1['date']?></td>
          		<td width="100"><?php echo $bbs1['hit']?></td>
              <td width="100"><?php analyze_sent($bbs1['content'])?></td>
              <td width="100"><?php analyze_mag($bbs1['content'])?></td>
        	</tr>
      	</tbody>
    <?php } ?>
    </table>
    <div id="page_num">
        <?php
          	if($page <= 1)
          	{ 
            	echo "<span class='fo_re'>처음</span>";  
          	}else{
            	echo "<a href='?page=1'>처음</a>"; 
          	}
          	if($page <= 1)
          	{ 
          	}else{
          	$pre = $page-1; 
            	echo "<a href='?page=$pre'>이전</a>"; 
          	}
          	for($i=$block_start; $i<=$block_end; $i++){ 
            	if($page == $i){ 
              		echo "<span class='fo_re'>[$i]</span>";
            	}else{
              		echo "<a href='?page=$i'>[$i]</a>"; 
            	}
          	}
          	if($block_num >= $total_block){ 
          	}else{
            	$next = $page + 1; 
            	echo "<a href='?page=$next'>다음</a>"; 
          	}
          	if($page >= $total_page){ 
            	echo "<span class='fo_re'>마지막</span>"; 
          	}else{
            	echo "<a href='?page=$total_page'>마지막</a>"; 
          	}
        ?>
    </div>
    <div id="write_btn">
      	<a href="sentiment_filter.php"><button>감정필터</button></a>
    </div>
	<div id="search_box">
    	<form action="filter_result.php" method="get">
      		<select name="catgo">
        		<option value="title">제목</option>
        		<option value="name">글쓴이</option>
        		<option value="content">내용</option>
      		</select>
      		<input type="text" name="filter" size="40" required="required" /> <button>필터</button>
    	</form>
    </div>
</div>
</body>
</html>