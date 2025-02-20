<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* rendez_vous/show.html.twig */
class __TwigTemplate_a4138e5e8cb508bfa992e2ccbe0cb2b9 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "test.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "rendez_vous/show.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "rendez_vous/show.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "RendezVous - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center text-success\">Rendez-vous - ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "</h2>
            <hr class=\"mb-4\">

            <table class=\"table table-bordered\">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <th>Date du Rendez-vous</th>
                        <td>";
        // line 19
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 19, $this->source); })()), "dateRdv", [], "any", false, false, false, 19)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 19, $this->source); })()), "dateRdv", [], "any", false, false, false, 19), "d/m/Y H:i:s"), "html", null, true)) : (""));
        yield "</td>
                    </tr>
                    <tr>
                        <th>Statut</th>
                        <td>";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 23, $this->source); })()), "statut", [], "any", false, false, false, 23), "value", [], "any", false, false, false, 23), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <th>Patient</th>
                        <td>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 27, $this->source); })()), "patient", [], "any", false, false, false, 27), "nom", [], "any", false, false, false, 27), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 27, $this->source); })()), "patient", [], "any", false, false, false, 27), "prenom", [], "any", false, false, false, 27), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <th>Docteur</th>
                        <td>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 31, $this->source); })()), "docteur", [], "any", false, false, false, 31), "nom", [], "any", false, false, false, 31), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 31, $this->source); })()), "docteur", [], "any", false, false, false, 31), "prenom", [], "any", false, false, false, 31), "html", null, true);
        yield "</td>
                    </tr>
                </tbody>
            </table>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rendez_vous_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i> ⬅️ Retour à la liste
                </a>
                <a href=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rendez_vous_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 40, $this->source); })()), "id", [], "any", false, false, false, 40)]), "html", null, true);
        yield "\" class=\"btn btn-primary btn-lg ms-3\">Modifier</a>
            </div>

            ";
        // line 43
        yield Twig\Extension\CoreExtension::include($this->env, $context, "rendez_vous/_delete_form.html.twig");
        yield "
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "rendez_vous/show.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  153 => 43,  147 => 40,  141 => 37,  130 => 31,  121 => 27,  114 => 23,  107 => 19,  100 => 15,  90 => 8,  86 => 6,  76 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}RendezVous - {{ rendez_vou.id }}{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center text-success\">Rendez-vous - {{ rendez_vou.id }}</h2>
            <hr class=\"mb-4\">

            <table class=\"table table-bordered\">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ rendez_vou.id }}</td>
                    </tr>
                    <tr>
                        <th>Date du Rendez-vous</th>
                        <td>{{ rendez_vou.dateRdv ? rendez_vou.dateRdv|date('d/m/Y H:i:s') : '' }}</td>
                    </tr>
                    <tr>
                        <th>Statut</th>
                        <td>{{ rendez_vou.statut.value }}</td>
                    </tr>
                    <tr>
                        <th>Patient</th>
                        <td>{{ rendez_vou.patient.nom }} {{ rendez_vou.patient.prenom }}</td>
                    </tr>
                    <tr>
                        <th>Docteur</th>
                        <td>{{ rendez_vou.docteur.nom }} {{ rendez_vou.docteur.prenom }}</td>
                    </tr>
                </tbody>
            </table>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_rendez_vous_index') }}\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i> ⬅️ Retour à la liste
                </a>
                <a href=\"{{ path('app_rendez_vous_edit', {'id': rendez_vou.id}) }}\" class=\"btn btn-primary btn-lg ms-3\">Modifier</a>
            </div>

            {{ include('rendez_vous/_delete_form.html.twig') }}
        </div>
    </div>
{% endblock %}
", "rendez_vous/show.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\rendez_vous\\show.html.twig");
    }
}
