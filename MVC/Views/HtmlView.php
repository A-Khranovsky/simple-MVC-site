<?php

namespace MVC\Views;

class HtmlView extends ViewFactory
{
    const LAYOUT = <<<HTML
	<!DOCTYPE html>
	<html lang="ru">
	<head>
		<title>{{{title}}}</title>
		<meta charset="utf-8">
	</head>
	<body>
		{{{body}}}
	</body>
	</html>
	HTML;

    protected $replacements;

    public function __construct($decorator)
    {
        $this->replacements = [
            '{{{title}}}' => $decorator->title(),
            '{{{body}}}' => $decorator->body()
        ];
    }

    public function render()
    {
//        var_dump($this->replacements['{{{body}}}']); exit;
//        foreach ($this->replacements['{{{title}}}'] as $title){
//
//        }
        $content = [];
        foreach ($this->replacements['{{{body}}}'] as $body){
            $content[] = str_replace(array_keys($this->replacements), $body, self::LAYOUT);
        }
        return $content[0];
//        return str_replace(
//            array_keys($this->replacements),
//            array_values($this->replacements),
//            self::LAYOUT
//        );
    }
}
