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

/* consultation/edit.html.twig */
class __TwigTemplate_b05cdc972cd055698f571df87efe2a25 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "consultation/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "consultation/edit.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "consultation/edit.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Éditer Consultation";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center\">Éditer la Consultation - ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["consultation"]) || array_key_exists("consultation", $context) ? $context["consultation"] : (function () { throw new RuntimeError('Variable "consultation" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    ";
        // line 13
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), 'form_start', ["attr" => ["enctype" => "multipart/form-data"]]);
        yield "
                    
                    <div class=\"mb-3\">
                        <label for=\"dateConsultation\" class=\"form-label\">Date de Consultation</label>
                        ";
        // line 17
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "date_consultation", [], "any", false, false, false, 17), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Sélectionnez la date de consultation"]]);
        yield "
                        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "date_consultation", [], "any", false, false, false, 18), "vars", [], "any", false, false, false, 18), "errors", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 19
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 19), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"patient\" class=\"form-label\">Patient</label>
                        ";
        // line 25
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "patient_id", [], "any", false, false, false, 25), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })()), "patient_id", [], "any", false, false, false, 26), "vars", [], "any", false, false, false, 26), "errors", [], "any", false, false, false, 26));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 27
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 27), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"docteur\" class=\"form-label\">Docteur</label>
                        ";
        // line 33
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "docteur_id", [], "any", false, false, false, 33), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "docteur_id", [], "any", false, false, false, 34), "vars", [], "any", false, false, false, 34), "errors", [], "any", false, false, false, 34));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 35
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 35), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        yield "                    </div>

                    <!-- Add new fields for editing -->
                    <div class=\"mb-3\">
                        <label for=\"conseils\" class=\"form-label\">Conseils</label>
                        ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "conseils", [], "any", false, false, false, 42), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez les conseils"]]);
        yield "
                        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "conseils", [], "any", false, false, false, 43), "vars", [], "any", false, false, false, 43), "errors", [], "any", false, false, false, 43));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 44
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 44), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"poids\" class=\"form-label\">Poids (kg)</label>
                        ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "poids", [], "any", false, false, false, 50), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez le poids en kg"]]);
        yield "
                        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "poids", [], "any", false, false, false, 51), "vars", [], "any", false, false, false, 51), "errors", [], "any", false, false, false, 51));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 52
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 52), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"tension\" class=\"form-label\">Tension</label>
                        ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "tension", [], "any", false, false, false, 58), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez la tension"]]);
        yield "
                        ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), "tension", [], "any", false, false, false, 59), "vars", [], "any", false, false, false, 59), "errors", [], "any", false, false, false, 59));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 60
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 60), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"process_grossesse\" class=\"form-label\">Processus de Grossesse</label>
                        ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "process_grossesse", [], "any", false, false, false, 66), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Sélectionnez la date du processus de grossesse"]]);
        yield "
                        ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "process_grossesse", [], "any", false, false, false, 67), "vars", [], "any", false, false, false, 67), "errors", [], "any", false, false, false, 67));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 68
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 68), "html", null, true);
            yield "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        yield "                    </div>

                    <div class=\"text-center\">
                        <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                    </div>
                    ";
        // line 75
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>

            ";
        // line 85
        yield Twig\Extension\CoreExtension::include($this->env, $context, "consultation/_delete_form.html.twig");
        yield "
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "consultation/edit.html.twig";
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
        return array (  298 => 85,  290 => 80,  282 => 75,  275 => 70,  266 => 68,  262 => 67,  258 => 66,  252 => 62,  243 => 60,  239 => 59,  235 => 58,  229 => 54,  220 => 52,  216 => 51,  212 => 50,  206 => 46,  197 => 44,  193 => 43,  189 => 42,  182 => 37,  173 => 35,  169 => 34,  165 => 33,  159 => 29,  150 => 27,  146 => 26,  142 => 25,  136 => 21,  127 => 19,  123 => 18,  119 => 17,  112 => 13,  104 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Éditer Consultation{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center\">Éditer la Consultation - {{ consultation.id }}</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    {{ form_start(form, {'attr': {'enctype': 'multipart/form-data'}}) }}
                    
                    <div class=\"mb-3\">
                        <label for=\"dateConsultation\" class=\"form-label\">Date de Consultation</label>
                        {{ form_widget(form.date_consultation, {'attr': {'class': 'form-control', 'placeholder': 'Sélectionnez la date de consultation'}}) }}
                        {% for error in form.date_consultation.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"patient\" class=\"form-label\">Patient</label>
                        {{ form_widget(form.patient_id, {'attr': {'class': 'form-select'}}) }}
                        {% for error in form.patient_id.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"docteur\" class=\"form-label\">Docteur</label>
                        {{ form_widget(form.docteur_id, {'attr': {'class': 'form-select'}}) }}
                        {% for error in form.docteur_id.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <!-- Add new fields for editing -->
                    <div class=\"mb-3\">
                        <label for=\"conseils\" class=\"form-label\">Conseils</label>
                        {{ form_widget(form.conseils, {'attr': {'class': 'form-control', 'placeholder': 'Entrez les conseils'}}) }}
                        {% for error in form.conseils.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"poids\" class=\"form-label\">Poids (kg)</label>
                        {{ form_widget(form.poids, {'attr': {'class': 'form-control', 'placeholder': 'Entrez le poids en kg'}}) }}
                        {% for error in form.poids.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"tension\" class=\"form-label\">Tension</label>
                        {{ form_widget(form.tension, {'attr': {'class': 'form-control', 'placeholder': 'Entrez la tension'}}) }}
                        {% for error in form.tension.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"process_grossesse\" class=\"form-label\">Processus de Grossesse</label>
                        {{ form_widget(form.process_grossesse, {'attr': {'class': 'form-control', 'placeholder': 'Sélectionnez la date du processus de grossesse'}}) }}
                        {% for error in form.process_grossesse.vars.errors %}
                            <div class=\"invalid-feedback\">{{ error.message }}</div>
                        {% endfor %}
                    </div>

                    <div class=\"text-center\">
                        <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                    </div>
                    {{ form_end(form) }}
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_consultation_index') }}\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>

            {{ include('consultation/_delete_form.html.twig') }}
        </div>
    </div>
{% endblock %}
", "consultation/edit.html.twig", "C:\\Users\\User\\OneDrive\\Bureau\\Sante\\templates\\consultation\\edit.html.twig");
    }
}
