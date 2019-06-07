<?php 
  include "../../lib/db.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
</head>
<body>
<div id="board_area"> 
  <h1>테스트 에타 게시판</h1>
  <h4>Natural Language Processing</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
          $sql = mq("select * from bbs1 order by idx asc limit 0,5");
		  $cnt=1;
            while($board = $sql->fetch_array())
            {
			  $value = "아";
              $title=$board["title"];
              if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]); 
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?=$cnt?></td>
          <td width="500"><a href="view.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo str_replace("양", "사", $board['name'])?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?
		$cnt++;
	  } ?>
    </table>
    <div id="write_btn">
      <a href="/board/bbs1/write.php"><button>글쓰기</button></a>
	  <a href="/board/bbs1/filter.php"><button>필터링</button></a>
    </div>
  </div>
</body>
</html>