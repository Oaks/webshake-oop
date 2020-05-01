<?php

namespace MyProject\View;

class adminView
{
    private $templatesPath;
    private $layout;

    private $extraVars = [];
    private $extraTemplate = [];

    public function __construct(string $layout)
    {
        $this->templatesPath = (require __DIR__ . '/../../settings.php')['templates'];
        $this->layout = $this->templatesPath . '/' . ltrim($layout, '/');

        $this->extraTemplate['style'] = '';
        $this->extraTemplate['script'] = '';
    }

    public function setTemplate(string $name, $value): void
    {
        $this->extraTemplate[$name] = $value;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200): void
    {
        http_response_code($code);

        echo $this->getRenderedLayout($this->layout, [
            'content' => $this->renderPHP($templateName, $vars),
            'style' => $this->extraTemplate['style'],
            'script' => $this->extraTemplate['script']
        ]);
    }

    private function renderPHP(string $templateName, array $vars = []): string {
        extract($this->extraVars);
        extract($vars);

        ob_start();
        include $this->templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }

    protected function getRenderedLayout($file, $data)
    {
        $template = file_get_contents($file);

        foreach($data as $key => $value)
        {
            $template = str_replace('{{'.$key.'}}', $value, $template);
        }

        return $template;
    }
}

