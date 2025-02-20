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

/* rendez_vous/edit.html.twig */
class __TwigTemplate_105dd2f1dc26df576f474f2c9b1285a0 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "rendez_vous/edit.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "rendez_vous/edit.html.twig", 1);
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

        yield "Éditer RendezVous";
        
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
            <h2 class=\"text-center\">Éditer le Rendez-vous - ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rendez_vou"]) || array_key_exists("rendez_vou", $context) ? $context["rendez_vou"] : (function () { throw new RuntimeError('Variable "rendez_vou" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    ";
        // line 13
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), 'form_start');
        yield "
                        <div class=\"mb-3\">
                            <label for=\"dateRdv\" class=\"form-label\">Date et Heure</label>
                            ";
        // line 16
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "dateRdv", [], "any", false, false, false, 16), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"statut\" class=\"form-label\">Statut</label>
                            ";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "statut", [], "any", false, false, false, 20), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "patient", [], "any", false, false, false, 24), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "docteur", [], "any", false, false, false, 28), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        </div>

                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                        </div>
                    ";
        // line 34
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 39
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rendez_vous_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i> ⬅️ Retour à la liste
                </a>
            </div>

            ";
        // line 44
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
        return "rendez_vous/edit.html.twig";
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
        return array (  149 => 44,  141 => 39,  133 => 34,  124 => 28,  117 => 24,  110 => 20,  103 => 16,  97 => 13,  89 => 8,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Éditer RendezVous{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center\">Éditer le Rendez-vous - {{ rendez_vou.id }}</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    {{ form_start(form) }}
                        <div class=\"mb-3\">
                            <label for=\"dateRdv\" class=\"form-label\">Date et Heure</label>
                            {{ form_widget(form.dateRdv, {'attr': {'class': 'form-control'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"statut\" class=\"form-label\">Statut</label>
                            {{ form_widget(form.statut, {'attr': {'class': 'form-select'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            {{ form_widget(form.patient, {'attr': {'class': 'form-select'}}) }}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            {{ form_widget(form.docteur, {'attr': {'class': 'form-select'}}) }}
                        </div>

                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                        </div>
                    {{ form_end(form) }}
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_rendez_vous_index') }}\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i> ⬅️ Retour à la liste
                </a>
            </div>

            {{ include('rendez_vous/_delete_form.html.twig') }}
        </div>
    </div>
{% endblock %}
", "rendez_vous/edit.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\rendez_vous\\edit.html.twig");
    }
}
