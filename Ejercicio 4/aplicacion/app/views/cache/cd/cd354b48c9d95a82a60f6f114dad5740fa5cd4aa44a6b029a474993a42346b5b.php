<?php

/* turnos.html */
class __TwigTemplate_9b7288c1ae9231c5a87ddbd23ec76326543282f740011af9d7e32f4454ab01e1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html", "turnos.html", 1);
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
        echo "Lista de Turnos";
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
        echo "<h2>Lista de Turnos</h2>
<table border=\"1\">
\t<thead>
\t\t<tr>
\t\t\t<th>Fecha del turno</th>
\t\t\t<th>Hora del turno</th>
\t\t\t<th>Nombre del paciente</th>
\t\t\t<th>Teléfono</th>
\t\t\t<th>Email</th>
\t\t\t<th>Resumen</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["turnos"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["turno"]) {
            // line 29
            echo "\t\t<tr>
\t\t\t<td><time>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "fecha_del_turno", array()), "html", null, true);
            echo "</time></td>
\t\t\t<td><time>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "horario_del_turno", array()), "html", null, true);
            echo "</time></td>
\t\t\t<td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "nombre_del_paciente", array()), "html", null, true);
            echo "</td>
\t\t\t<td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "telefono", array()), "html", null, true);
            echo "</td>
\t\t\t<td>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "email", array()), "html", null, true);
            echo "</td>
\t\t\t<td><a href=\"/turnos/resumen?id=";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["turno"], "id", array()), "html", null, true);
            echo "\">Ver</a></td>
\t\t</tr>\t
\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 38
            echo "\t\t<span>No hay turnos registrados</span>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['turno'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "\t</tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "turnos.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 40,  116 => 38,  108 => 35,  104 => 34,  100 => 33,  96 => 32,  92 => 31,  88 => 30,  85 => 29,  80 => 28,  65 => 15,  62 => 14,  54 => 10,  51 => 9,  44 => 6,  41 => 5,  35 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html\" %}

{% block title %}Lista de Turnos{% endblock %}

{% block header %}
    {{ include('partials/nav.html') }}
{% endblock %}

{% block head %}
    {{ parent() }}
    <meta name=\"keywords\" content=\"PAW,2018,Templates,PHP\">
{% endblock %}

{% block main %}
<h2>Lista de Turnos</h2>
<table border=\"1\">
\t<thead>
\t\t<tr>
\t\t\t<th>Fecha del turno</th>
\t\t\t<th>Hora del turno</th>
\t\t\t<th>Nombre del paciente</th>
\t\t\t<th>Teléfono</th>
\t\t\t<th>Email</th>
\t\t\t<th>Resumen</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t{% for turno in turnos %}
\t\t<tr>
\t\t\t<td><time>{{ turno.fecha_del_turno }}</time></td>
\t\t\t<td><time>{{ turno.horario_del_turno }}</time></td>
\t\t\t<td>{{ turno.nombre_del_paciente }}</td>
\t\t\t<td>{{ turno.telefono }}</td>
\t\t\t<td>{{ turno.email }}</td>
\t\t\t<td><a href=\"/turnos/resumen?id={{ turno.id }}\">Ver</a></td>
\t\t</tr>\t
\t\t{% else %}
\t\t<span>No hay turnos registrados</span>
\t\t{% endfor %}
\t</tbody>
</table>
{% endblock %}
", "turnos.html", "C:\\xampp\\htdocs\\PAW-TP-4\\Ejercicio 4\\aplicacion\\app\\views\\turnos.html");
    }
}
