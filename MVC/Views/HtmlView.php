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
		<br />
		<a href=""				
	</body>
	</html>
	HTML;

    protected $replacements,
        $titles, $bodies;

    public function __construct($decorator)
    {
        foreach ($decorator->title() as $title){
            $this->titles[] = $title;
        }
        foreach ($decorator->body() as $body){
            $this->bodies[] = $body;
        }
        $this->replacementsInit();
    }

    private function replacementsInit($page = null)
    {
        if(is_null($page)){
            $page = 0;
        }
        $this->replacements = [
            '{{{title}}}' => $this->titles[$page],
            '{{{body}}}' => $this->bodies[$page]
        ];
    }

    public function render($page = null)
    {
        $this->replacementsInit($page);

        return str_replace(
            array_keys($this->replacements),
            array_values($this->replacements),
            self::LAYOUT
        );
    }
}
