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

/* dossiers_medicaux/show.html.twig */
class __TwigTemplate_92800fc9a53a7b73742dd48270f1e3d9 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/show.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "dossiers_medicaux/show.html.twig", 1);
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

        yield "Dossier Médical - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        
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
            <h2 class=\"text-center text-success\">Dossier Médical - ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "</h2>
            <hr class=\"mb-4\">

            <table class=\"table table-bordered\">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <th>Date de Création</th>
                        <td>";
        // line 19
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 19, $this->source); })()), "dateCreation", [], "any", false, false, false, 19)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 19, $this->source); })()), "dateCreation", [], "any", false, false, false, 19), "d/m/Y"), "html", null, true)) : (""));
        yield "</td>
                    </tr>
                    <tr>
                        <th>Diagnostic</th>
                        <td>";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 23, $this->source); })()), "diagnostic", [], "any", false, false, false, 23), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <th>Traitement</th>
                        <td>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 27, $this->source); })()), "traitement", [], "any", false, false, false, 27), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <th>Fichier</th>
                        <td>
                            ";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 32, $this->source); })()), "fichier", [], "any", false, false, false, 32)) {
            // line 33
            yield "                                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 33, $this->source); })()), "fichier", [], "any", false, false, false, 33))), "html", null, true);
            yield "\" target=\"_blank\" class=\"btn btn-info btn-sm\">Voir Fichier</a>
                            ";
        } else {
            // line 35
            yield "                                <span class=\"text-danger\">Aucun fichier</span>
                            ";
        }
        // line 37
        yield "                        </td>
                    </tr>
                </tbody>
            </table>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i> ⬅️ Retour à la liste
                </a>
                <a href=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 46, $this->source); })()), "id", [], "any", false, false, false, 46)]), "html", null, true);
        yield "\" class=\"btn btn-primary btn-lg ms-3\">Modifier</a>
            </div>

            ";
        // line 49
        yield Twig\Extension\CoreExtension::include($this->env, $context, "dossiers_medicaux/_delete_form.html.twig");
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
        return "dossiers_medicaux/show.html.twig";
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
        return array (  161 => 49,  155 => 46,  149 => 43,  141 => 37,  137 => 35,  131 => 33,  129 => 32,  121 => 27,  114 => 23,  107 => 19,  100 => 15,  90 => 8,  86 => 6,  76 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Dossier Médical - {{ dossiers_medicaux.id }}{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center text-success\">Dossier Médical - {{ dossiers_medicaux.id }}</h2>
            <hr class=\"mb-4\">

            <table class=\"table table-bordered\">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ dossiers_medicaux.id }}</td>
                    </tr>
                    <tr>
                        <th>Date de Création</th>
                        <td>{{ dossiers_medicaux.dateCreation ? dossiers_medicaux.dateCreation|date('d/m/Y') : '' }}</td>
                    </tr>
                    <tr>
                        <th>Diagnostic</th>
                        <td>{{ dossiers_medicaux.diagnostic }}</td>
                    </tr>
                    <tr>
                        <th>Traitement</th>
                        <td>{{ dossiers_medicaux.traitement }}</td>
                    </tr>
                    <tr>
                        <th>Fichier</th>
                        <td>
                            {% if dossiers_medicaux.fichier %}
                                <a href=\"{{ asset('uploads/' ~ dossiers_medicaux.fichier) }}\" target=\"_blank\" class=\"btn btn-info btn-sm\">Voir Fichier</a>
                            {% else %}
                                <span class=\"text-danger\">Aucun fichier</span>
                            {% endif %}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_dossiers_medicaux_index') }}\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i> ⬅️ Retour à la liste
                </a>
                <a href=\"{{ path('app_dossiers_medicaux_edit', {'id': dossiers_medicaux.id}) }}\" class=\"btn btn-primary btn-lg ms-3\">Modifier</a>
            </div>

            {{ include('dossiers_medicaux/_delete_form.html.twig') }}
        </div>
    </div>
{% endblock %}
", "dossiers_medicaux/show.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\dossiers_medicaux\\show.html.twig");
    }
}
