<?php

/* turnos.create.html */
class __TwigTemplate_7b3e0caffec5a531b0fc795c9a578ca417ada05f66460f68a6f53387a5a2961b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html", "turnos.create.html", 1);
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
        echo "Crear Turno Nuevo";
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
        echo "<h2>Crear Turno</h2>

<form action=\"/turnos/save\" method=\"POST\" enctype=\"multipart/form-data\">
\t<fieldset>
\t\t<legend>Solicitud de turno</legend>
\t\t<label for=\"nombre_del_paciente\"> Nombre del Paciente: </label>
\t\t<input type=\"text\" name=\"nombre_del_paciente\" id=\"nombre_del_paciente\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"email\">Email: </label>
\t\t<input type=\"email\" name=\"email\" id=\"email\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"telefono\">Telefono: </label>
\t\t<input type=\"number\" name=\"telefono\" id=\"telefono\" min=\"1\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"edad\">Edad: </label>
\t\t<input type=\"number\" name=\"edad\" id=\"edad\" min=\"0\">
\t\t<br>
\t\t<br>
\t\t<label for=\"talla_de_calzado\">Talla de calzado: </label>
\t\t<input type=\"number\" name=\"talla_de_calzado\" id=\"talla_de_calzado\" min=\"20\" max=\"45\">
\t\t<br>
\t\t<br>
\t\t<label for=\"altura\">Altura: </label>
\t\t<input type=\"range\" name=\"altura\"  id=\"altura\" min=\"0\" max=\"3.00\" step=\"0.01\">
\t\t<br>
\t\t<br>
\t\t<label for=\"fecha_de_nacimiento\">Fecha de nacimiento: </label>
\t\t<input type=\"date\" name=\"fecha_de_nacimiento\" id=\"fecha_de_nacimiento\" max=\"";
        // line 45
        echo twig_escape_filter($this->env, ($context["today"] ?? null), "html", null, true);
        echo "\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"color_de_pelo\">Color de pelo: </label>
\t\t<select name=\"color_de_pelo\" id=\"color_de_pelo\">
\t\t    <option>Claro</option>
\t\t    <option>Oscuro</option>
\t\t</select>
\t\t<br>
\t\t<br>
\t\t<label for=\"fecha_del_turno\">Fecha del turno: </label>
\t\t<input type=\"date\" name=\"fecha_del_turno\" id=\"fecha_del_turno\" min=\"";
        // line 56
        echo twig_escape_filter($this->env, ($context["today"] ?? null), "html", null, true);
        echo "\" required=\"true\">
\t\t<label for=\"horario_del_turno\">Horario del turno: </label>
\t\t<input type=\"time\" name=\"horario_del_turno\" id=\"horario_del_turno\" min=\"08:00\" max=\"17:00\" step=\"900\">
\t\t<br>
\t\t<br>
\t\t<label for=\"imagen_diagnostico\">Cargar diagnostico</label>
\t\t<input type=\"file\" name=\"imagen_diagnostico\" id=\"imagen_diagnostico\" multiple='multiple' accept=\"image/gif , image/jpeg\"/>
\t\t<br>
\t\t<br>
\t\t<input type=\"submit\" value=\"Enviar\">
\t\t<input type=\"reset\" value=\"Limpiar\">
\t</fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "turnos.create.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 56,  97 => 45,  65 => 15,  62 => 14,  54 => 10,  51 => 9,  44 => 6,  41 => 5,  35 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html\" %}

{% block title %}Crear Turno Nuevo{% endblock %}

{% block header %}
    {{ include('partials/nav.html') }}
{% endblock %}

{% block head %}
    {{ parent() }}
    <meta name=\"keywords\" content=\"PAW,2018,Templates,PHP\">
{% endblock %}

{% block main %}
<h2>Crear Turno</h2>

<form action=\"/turnos/save\" method=\"POST\" enctype=\"multipart/form-data\">
\t<fieldset>
\t\t<legend>Solicitud de turno</legend>
\t\t<label for=\"nombre_del_paciente\"> Nombre del Paciente: </label>
\t\t<input type=\"text\" name=\"nombre_del_paciente\" id=\"nombre_del_paciente\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"email\">Email: </label>
\t\t<input type=\"email\" name=\"email\" id=\"email\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"telefono\">Telefono: </label>
\t\t<input type=\"number\" name=\"telefono\" id=\"telefono\" min=\"1\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"edad\">Edad: </label>
\t\t<input type=\"number\" name=\"edad\" id=\"edad\" min=\"0\">
\t\t<br>
\t\t<br>
\t\t<label for=\"talla_de_calzado\">Talla de calzado: </label>
\t\t<input type=\"number\" name=\"talla_de_calzado\" id=\"talla_de_calzado\" min=\"20\" max=\"45\">
\t\t<br>
\t\t<br>
\t\t<label for=\"altura\">Altura: </label>
\t\t<input type=\"range\" name=\"altura\"  id=\"altura\" min=\"0\" max=\"3.00\" step=\"0.01\">
\t\t<br>
\t\t<br>
\t\t<label for=\"fecha_de_nacimiento\">Fecha de nacimiento: </label>
\t\t<input type=\"date\" name=\"fecha_de_nacimiento\" id=\"fecha_de_nacimiento\" max=\"{{ today }}\" required=\"true\">
\t\t<br>
\t\t<br>
\t\t<label for=\"color_de_pelo\">Color de pelo: </label>
\t\t<select name=\"color_de_pelo\" id=\"color_de_pelo\">
\t\t    <option>Claro</option>
\t\t    <option>Oscuro</option>
\t\t</select>
\t\t<br>
\t\t<br>
\t\t<label for=\"fecha_del_turno\">Fecha del turno: </label>
\t\t<input type=\"date\" name=\"fecha_del_turno\" id=\"fecha_del_turno\" min=\"{{ today }}\" required=\"true\">
\t\t<label for=\"horario_del_turno\">Horario del turno: </label>
\t\t<input type=\"time\" name=\"horario_del_turno\" id=\"horario_del_turno\" min=\"08:00\" max=\"17:00\" step=\"900\">
\t\t<br>
\t\t<br>
\t\t<label for=\"imagen_diagnostico\">Cargar diagnostico</label>
\t\t<input type=\"file\" name=\"imagen_diagnostico\" id=\"imagen_diagnostico\" multiple='multiple' accept=\"image/gif , image/jpeg\"/>
\t\t<br>
\t\t<br>
\t\t<input type=\"submit\" value=\"Enviar\">
\t\t<input type=\"reset\" value=\"Limpiar\">
\t</fieldset>
</form>
{% endblock %}
", "turnos.create.html", "C:\\xampp\\htdocs\\PAW-TP-4\\Ejercicio 4\\aplicacion\\app\\views\\turnos.create.html");
    }
}
