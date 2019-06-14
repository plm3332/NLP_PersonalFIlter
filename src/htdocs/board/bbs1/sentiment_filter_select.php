<!doctype html>
<head>
	<meta charset="UTF-8">
	<title>필터 선택</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/slider.css"/>
</head>
<body>
<div id="board_read">
	<h1>테스트 에타 게시판</h1>
	<h4>필터</h4>
		<div id="user_info">
			<div id="bo_line"></div>
		</div>
		<div id="bo_content">
			<div id="search_box2">
    			<form action="sentiment_result.php" method="get">
    				<div>
      					단어 입력: <input type="text" name="keyword1" size="20"/>
      					강한 부정 
      					<input name="sentiment1" id="sentiment1" type="range" min="-1" value="0" max="1" step="0.1"
      					oninput="Output1.value = sentiment1.value"/> 강한 긍정
						<output id="Output1" class="output">0</output>
					</div>
      				<div>
      					단어 입력: <input type="text" name="keyword2" size="20"/>
      					강한 부정 
      					<input name="sentiment2" id="sentiment2" type="range" min="-1" value="0" max="1" step="0.1"
      					oninput="Output2.value = sentiment2.value"/> 강한 긍정
						<output id="Output2" class="output">0</output>
      				</div>
      				<div>
      					단어 입력: <input type="text" name="keyword3" size="20"/>
      					강한 부정 
      					<input name="sentiment3" id="sentiment3" type="range" min="-1" value="0" max="1" step="0.1"
      					oninput="Output3.value = sentiment3.value"/> 강한 긍정
						<output id="Output3" class="output">0</output>
      				</div>
      				<div id="filter_btn">
      					<input type="submit" value="필터"/>
      				</div>
    			</form>
    		</div>
		</div>
	<div id="bo_ser">
		<ul>
			<li><a href="../../index.php">[목록으로]</a></li>
		</ul>
	</div>
</div>
</body>
</html