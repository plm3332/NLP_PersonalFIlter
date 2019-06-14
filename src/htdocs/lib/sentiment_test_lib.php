<?php
# Includes the autoloader for libraries installed with composer
require_once __DIR__ . '/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;

#$env:GOOGLE_APPLICATION_CREDENTIALS="C:/xampp/htdocs/lib/credential.json"

function analyze_sent($text)
{
	$projectId = 'YOUR_PROJECT_ID';

	$language = new LanguageClient(['projectId' => $projectId]);
	try {
		$annotation = $language->analyzeSentiment($text);
		$sentiment = $annotation->sentiment();

	return $sentiment['score'];
	}finally{

	}
}

function analyze_mag($text)
{
	$projectId = 'YOUR_PROJECT_ID';

	$language = new LanguageClient(['projectId' => $projectId]);
	try {
		$annotation = $language->analyzeSentiment($text);
		$sentiment = $annotation->sentiment();

	return $sentiment['magnitude'];
	}finally{
		
	}
}
?>