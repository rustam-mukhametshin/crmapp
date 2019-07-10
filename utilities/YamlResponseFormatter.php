<?php


namespace app\utilities;

use Symfony\Component\Yaml\Yaml;
use yii\web\ResponseFormatterInterface;

/**
 * Class YamlResponseFormatter
 * @package app\utilities
 */
class YamlResponseFormatter implements ResponseFormatterInterface
{
    const FORMAT = 'yaml';

    /**
     * @param \yii\web\Response $response
     */
    public function format($response)
    {
        $response->headers->set('Content-Type: application/yaml');
        $response->headers->set('Content-Disposition: inline');
        $response->content = Yaml::dump($response->data);
    }
}