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

/* dossiers_medicaux/edit.html.twig */
class __TwigTemplate_685922aa5b610f34996aa86b7cc9e5cb extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/edit.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "dossiers_medicaux/edit.html.twig", 1);
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

        yield "Éditer Dossier Médical";
        
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
            <h2 class=\"text-center\">Éditer le Dossier Médical - ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    ";
        // line 13
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), 'form_start', ["attr" => ["enctype" => "multipart/form-data"]]);
        yield "
                        <div class=\"mb-3\">
                            <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                            ";
        // line 16
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "diagnostic", [], "any", false, false, false, 16), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez le diagnostic"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"traitement\" class=\"form-label\">Traitement</label>
                            ";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "traitement", [], "any", false, false, false, 20), 'widget', ["attr" => ["class" => "form-control", "rows" => "4", "placeholder" => "Décrivez le traitement"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"fichier\" class=\"form-label\">Fichier (PDF seulement)</label>
                            ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "fichier", [], "any", false, false, false, 24), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "patient_id", [], "any", false, false, false, 28), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            ";
        // line 32
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "docteur_id", [], "any", false, false, false, 32), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        </div>

                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                        </div>
                    ";
        // line 38
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>

            ";
        // line 48
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
        return "dossiers_medicaux/edit.html.twig";
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
        return array (  156 => 48,  148 => 43,  140 => 38,  131 => 32,  124 => 28,  117 => 24,  110 => 20,  103 => 16,  97 => 13,  89 => 8,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Éditer Dossier Médical{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center\">Éditer le Dossier Médical - {{ dossiers_medicaux.id }}</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    {{ form_start(form, {'attr': {'enctype': 'multipart/form-data'}}) }}
                        <div class=\"mb-3\">
                            <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                            {{ form_widget(form.diagnostic, {'attr': {'class': 'form-control', 'placeholder': 'Entrez le diagnostic'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"traitement\" class=\"form-label\">Traitement</label>
                            {{ form_widget(form.traitement, {'attr': {'class': 'form-control', 'rows': '4', 'placeholder': 'Décrivez le traitement'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"fichier\" class=\"form-label\">Fichier (PDF seulement)</label>
                            {{ form_widget(form.fichier, {'attr': {'class': 'form-control'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            {{ form_widget(form.patient_id, {'attr': {'class': 'form-select'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            {{ form_widget(form.docteur_id, {'attr': {'class': 'form-select'}}) }}
                        </div>

                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                        </div>
                    {{ form_end(form) }}
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_dossiers_medicaux_index') }}\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>

            {{ include('dossiers_medicaux/_delete_form.html.twig') }}
        </div>
    </div>
{% endblock %}
", "dossiers_medicaux/edit.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\dossiers_medicaux\\edit.html.twig");
    }
}
