<?php

/* base.html */
class __TwigTemplate_00dbe24a4e11b03d1d2d9dceef4a180f09f03b165eeb39fab4fac4f416ccea18 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'nav' => array($this, 'block_nav'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "</head>
<body>
    <header>";
        // line 10
        $this->displayBlock('header', $context, $blocks);
        echo "</header>
    <nav>";
        // line 11
        $this->displayBlock('nav', $context, $blocks);
        echo "</nav>
    <main>";
        // line 12
        $this->displayBlock('main', $context, $blocks);
        echo "</main>
    <footer>";
        // line 13
        $this->displayBlock('footer', $context, $blocks);
        echo "</footer>
</body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "        <meta charset=\"utf-8\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - PAW 2018</title>
    ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
    }

    // line 11
    public function block_nav($context, array $blocks = array())
    {
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
    }

    // line 13
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function getDebugInfo()
    {
        return array (  91 => 13,  86 => 12,  81 => 11,  76 => 10,  66 => 6,  63 => 5,  60 => 4,  52 => 13,  48 => 12,  44 => 11,  40 => 10,  36 => 8,  34 => 4,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    {% block head %}
        <meta charset=\"utf-8\">
        <title>{% block title %}{% endblock %} - PAW 2018</title>
    {% endblock %}
</head>
<body>
    <header>{% block header %}{% endblock %}</header>
    <nav>{% block nav %}{% endblock %}</nav>
    <main>{% block main %}{% endblock %}</main>
    <footer>{% block footer %}{% endblock %}</footer>
</body>
</html>
", "base.html", "C:\\xampp\\htdocs\\PAW-TP-4\\Ejercicio 4\\aplicacion\\app\\views\\base.html");
    }
}
