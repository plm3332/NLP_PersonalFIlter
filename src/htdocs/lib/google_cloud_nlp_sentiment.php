<?php
namespace Google\Cloud\Samples\Language;

require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Language\V1beta2\Document;
use Google\Cloud\Language\V1beta2\Document\Type;
use Google\Cloud\Language\V1beta2\LanguageServiceClient;

/**
 * Find the sentiment in text.
 * ```
 * analyze_sentiment('Do you know the way to San Jose?');
 * ```
 *
 * @param string $text The text to analyze.
 * @param string $projectId (optional) Your Google Cloud Project ID
 *
 */
function analyze_sentiment($text, $projectId = null)
{
    $languageServiceClient = new LanguageServiceClient(['projectId' => $projectId]);
    try {
        // Create a new Document
        $document = new Document();
        // Pass GCS URI and set document type to PLAIN_TEXT
        $document->setContent($text)->setType(Type::PLAIN_TEXT);
        // Call the analyzeSentiment function
        $response = $languageServiceClient->analyzeSentiment($document);
        $document_sentiment = $response->getDocumentSentiment();
        // Print document information
        printf('Document Sentiment:' . PHP_EOL);
        printf('  Magnitude: %s' . PHP_EOL, $document_sentiment->getMagnitude());
        printf('  Score: %s' . PHP_EOL, $document_sentiment->getScore());
        printf(PHP_EOL);
        $sentences = $response->getSentences();
        foreach ($sentences as $sentence) {
            printf('Sentence: %s' . PHP_EOL, $sentence->getText()->getContent());
            printf('Sentence Sentiment:' . PHP_EOL);
            $sentiment = $sentence->getSentiment();
            if ($sentiment) {
                printf('Entity Magnitude: %s' . PHP_EOL, $sentiment->getMagnitude());
                printf('Entity Score: %s' . PHP_EOL, $sentiment->getScore());
            }
            print(PHP_EOL);
        }
    } finally {
        $languageServiceClient->close();
    }
}
?>