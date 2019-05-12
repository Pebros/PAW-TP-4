<?php

/* turnos.resumen.html */
class __TwigTemplate_59f9927a2945573e0e01cfe124ec37266772eda4b7413f68a3f35cb820282f76 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html", "turnos.resumen.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'head' => array($this, 'block_head'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Resumen Turno";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        echo twig_include($this->env, $context, "partials/nav.html");
        echo "
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <meta name=\"keywords\" content=\"PAW,2018,Templates,PHP\">
";
    }

    // line 14
    public function block_main($context, array $blocks = array())
    {
        // line 15
        echo "<h2>Resumen Turno</h2>
<dl>
\t<dt><strong>Nombre del Paciente:</strong></dt>
\t<dd>";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "nombre_del_paciente", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Email:</strong></dt>
\t<dd>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "email", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Telefono:</strong></dt>
\t<dd>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "telefono", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Edad:</strong></dt>
\t<dd>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "edad", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Talla de calzado:</strong></dt>
\t<dd>";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "talla_de_calzado", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Altura:</strong></dt>
\t<dd>";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "altura", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Fecha de nacimiento:</strong></dt>
\t<dd>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "fecha_de_nacimiento", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Color de pelo:</strong></dt>
\t<dd>";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "color_de_pelo", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Fecha y hora del turno:</strong></dt>
\t<dd>";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "fecha_del_turno", array()), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["turno"] ?? null), "horario_del_turno", array()), "html", null, true);
        echo "</dd>

\t<dt><strong>Imagen diagnostico: </strong></dt>
\t<dd><img src=\"";
        // line 45
        echo twig_escape_filter($this->env, ($context["pathImage"] ?? null), "html", null, true);
        echo "\" alt=\"Imagen de diagnostico\"/></dd>
</dl>
";
    }

    public function getTemplateName()
    {
        return "turnos.resumen.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 45,  118 => 42,  112 => 39,  106 => 36,  100 => 33,  94 => 30,  88 => 27,  82 => 24,  76 => 21,  70 => 18,  65 => 15,  62 => 14,  54 => 10,  51 => 9,  44 => 6,  41 => 5,  35 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html\" %}

{% block title %}Resumen Turno{% endblock %}

{% block header %}
    {{ include('partials/nav.html') }}
{% endblock %}

{% block head %}
    {{ parent() }}
    <meta name=\"keywords\" content=\"PAW,2018,Templates,PHP\">
{% endblock %}

{% block main %}
<h2>Resumen Turno</h2>
<dl>
\t<dt><strong>Nombre del Paciente:</strong></dt>
\t<dd>{{ turno.nombre_del_paciente }}</dd>

\t<dt><strong>Email:</strong></dt>
\t<dd>{{ turno.email }}</dd>

\t<dt><strong>Telefono:</strong></dt>
\t<dd>{{ turno.telefono }}</dd>

\t<dt><strong>Edad:</strong></dt>
\t<dd>{{ turno.edad }}</dd>

\t<dt><strong>Talla de calzado:</strong></dt>
\t<dd>{{ turno.talla_de_calzado }}</dd>

\t<dt><strong>Altura:</strong></dt>
\t<dd>{{ turno.altura }}</dd>

\t<dt><strong>Fecha de nacimiento:</strong></dt>
\t<dd>{{ turno.fecha_de_nacimiento }}</dd>

\t<dt><strong>Color de pelo:</strong></dt>
\t<dd>{{ turno.color_de_pelo }}</dd>

\t<dt><strong>Fecha y hora del turno:</strong></dt>
\t<dd>{{ turno.fecha_del_turno }} - {{turno.horario_del_turno }}</dd>

\t<dt><strong>Imagen diagnostico: </strong></dt>
\t<dd><img src=\"{{ pathImage }}\" alt=\"Imagen de diagnostico\"/></dd>
</dl>
{% endblock %}
", "turnos.resumen.html", "C:\\xampp\\htdocs\\PAW-TP-4\\Ejercicio 4\\aplicacion\\app\\views\\turnos.resumen.html");
    }
}
