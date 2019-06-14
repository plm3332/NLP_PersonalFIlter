<?php
	include "lib/db.php";
	include "lib/sentiment_test_lib.php";

	$sql2 = mq("select * from bbs1 order by idx desc");

	while($bbs1 = $sql2->fetch_array()){
		$title=$bbs1["title"];
		$content=$bbs1["content"];
		
		$sent_content=analyze_sent($bbs1['content']);
    	$sent_title=analyze_sent($bbs1['title']);
    	$mag=analyze_mag($bbs1['content']);
    	
    	$sent_content += $sent_content;
    }

    $sent_content = $sent_content/3500;

    echo 'EveryTime Average Sentiment: ' . $sent_content;
?>