<?php


namespace app\utilities;

use yii\helpers\Markdown;
use yii\base\ViewRenderer;

/**
 * Class MarkdownRenderer
 * @package app\utilities
 */
class MarkdownRenderer extends ViewRenderer
{
    /**
     * @param \yii\base\View $view
     * @param string $file
     * @param array $params
     * @return string|void
     */
    public function render($view, $file, $params)
    {
        return Markdown::process(file_get_contents($file));
    }
}