<?php
# Includes the autoloader for libraries installed with composer
require_once __DIR__ . '/lib/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;

//$env:GOOGLE_APPLICATION_CREDENTIALS="C:/xampp/htdocs/lib/credential.json"

# Your Google Cloud Platform project ID
$projectId = 'YOUR_PROJECT_ID';

# Instantiates a client
$language = new LanguageClient([
    'projectId' => $projectId
]);

# The text to analyze
$text = '조오오오옹나';

# Detects the sentiment of the text
$annotation = $language->analyzeSentiment($text);
$sentiment = $annotation->sentiment();

echo 'Text: ' . $text . '
Sentiment: ' . $sentiment['score'] . ', ' . $sentiment['magnitude'];
?>