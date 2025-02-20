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

/* dossiers_medicaux/new.html.twig */
class __TwigTemplate_c5aadb9ff3519cd2b789c9d15a664965 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/new.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "dossiers_medicaux/new.html.twig", 1);
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

        yield "Créer un Dossier Médical";
        
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
            <h2 class=\"text-center\">Créer un Nouveau Dossier Médical</h2>
            <hr class=\"mb-4\">
            
            ";
        // line 11
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "flashes", ["error"], "method", false, false, false, 11)) {
            // line 12
            yield "                <div class=\"alert alert-danger\">
                    ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "flashes", ["error"], "method", false, false, false, 13));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 14
                yield "                        <p class=\"mb-0\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "</p>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            yield "                </div>
            ";
        }
        // line 18
        yield "
            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    ";
        // line 21
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_start', ["attr" => ["enctype" => "multipart/form-data"]]);
        yield "
                        <div class=\"mb-3\">
                            <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                            ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "diagnostic", [], "any", false, false, false, 24), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez le diagnostic"]]);
        yield "
                            ";
        // line 25
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "diagnostic", [], "any", false, false, false, 25), "vars", [], "any", false, false, false, 25), "errors", [], "any", false, false, false, 25)) > 0)) {
            // line 26
            yield "                                <div class=\"text-danger\">
                                    ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "diagnostic", [], "any", false, false, false, 27), "vars", [], "any", false, false, false, 27), "errors", [], "any", false, false, false, 27));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 28
                yield "                                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 28), "html", null, true);
                yield "</p>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "                                </div>
                            ";
        }
        // line 32
        yield "                        </div>
                        <div class=\"mb-3\">
                            <label for=\"traitement\" class=\"form-label\">Traitement</label>
                            ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "traitement", [], "any", false, false, false, 35), 'widget', ["attr" => ["class" => "form-control", "rows" => "4", "placeholder" => "Décrivez le traitement"]]);
        yield "
                            ";
        // line 36
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "traitement", [], "any", false, false, false, 36), "vars", [], "any", false, false, false, 36), "errors", [], "any", false, false, false, 36)) > 0)) {
            // line 37
            yield "                                <div class=\"text-danger\">
                                    ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "traitement", [], "any", false, false, false, 38), "vars", [], "any", false, false, false, 38), "errors", [], "any", false, false, false, 38));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 39
                yield "                                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 39), "html", null, true);
                yield "</p>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            yield "                                </div>
                            ";
        }
        // line 43
        yield "                        </div>
                        <div class=\"mb-3\">
                            <label for=\"fichier\" class=\"form-label\">Fichier (PDF seulement)</label>
                            ";
        // line 46
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), "fichier", [], "any", false, false, false, 46), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            ";
        // line 47
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "fichier", [], "any", false, false, false, 47), "vars", [], "any", false, false, false, 47), "errors", [], "any", false, false, false, 47)) > 0)) {
            // line 48
            yield "                                <div class=\"text-danger\">
                                    ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "fichier", [], "any", false, false, false, 49), "vars", [], "any", false, false, false, 49), "errors", [], "any", false, false, false, 49));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 50
                yield "                                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 50), "html", null, true);
                yield "</p>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            yield "                                </div>
                            ";
        }
        // line 54
        yield "                        </div>
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "patient_id", [], "any", false, false, false, 57), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                            ";
        // line 58
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "patient_id", [], "any", false, false, false, 58), "vars", [], "any", false, false, false, 58), "errors", [], "any", false, false, false, 58)) > 0)) {
            // line 59
            yield "                                <div class=\"text-danger\">
                                    ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "patient_id", [], "any", false, false, false, 60), "vars", [], "any", false, false, false, 60), "errors", [], "any", false, false, false, 60));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 61
                yield "                                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 61), "html", null, true);
                yield "</p>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            yield "                                </div>
                            ";
        }
        // line 65
        yield "                        </div>
                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "docteur_id", [], "any", false, false, false, 68), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                            ";
        // line 69
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "docteur_id", [], "any", false, false, false, 69), "vars", [], "any", false, false, false, 69), "errors", [], "any", false, false, false, 69)) > 0)) {
            // line 70
            yield "                                <div class=\"text-danger\">
                                    ";
            // line 71
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "docteur_id", [], "any", false, false, false, 71), "vars", [], "any", false, false, false, 71), "errors", [], "any", false, false, false, 71));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 72
                yield "                                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 72), "html", null, true);
                yield "</p>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            yield "                                </div>
                            ";
        }
        // line 76
        yield "                        </div>
                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Créer</button>
                        </div>
                    ";
        // line 80
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>
            
            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 85
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>
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
        return "dossiers_medicaux/new.html.twig";
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
        return array (  289 => 85,  281 => 80,  275 => 76,  271 => 74,  262 => 72,  258 => 71,  255 => 70,  253 => 69,  249 => 68,  244 => 65,  240 => 63,  231 => 61,  227 => 60,  224 => 59,  222 => 58,  218 => 57,  213 => 54,  209 => 52,  200 => 50,  196 => 49,  193 => 48,  191 => 47,  187 => 46,  182 => 43,  178 => 41,  169 => 39,  165 => 38,  162 => 37,  160 => 36,  156 => 35,  151 => 32,  147 => 30,  138 => 28,  134 => 27,  131 => 26,  129 => 25,  125 => 24,  119 => 21,  114 => 18,  110 => 16,  101 => 14,  97 => 13,  94 => 12,  92 => 11,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Créer un Dossier Médical{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center\">Créer un Nouveau Dossier Médical</h2>
            <hr class=\"mb-4\">
            
            {% if app.flashes('error') %}
                <div class=\"alert alert-danger\">
                    {% for message in app.flashes('error') %}
                        <p class=\"mb-0\">{{ message }}</p>
                    {% endfor %}
                </div>
            {% endif %}

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    {{ form_start(form, {'attr': {'enctype': 'multipart/form-data'}}) }}
                        <div class=\"mb-3\">
                            <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                            {{ form_widget(form.diagnostic, {'attr': {'class': 'form-control', 'placeholder': 'Entrez le diagnostic'}}) }}
                            {% if form.diagnostic.vars.errors|length > 0 %}
                                <div class=\"text-danger\">
                                    {% for error in form.diagnostic.vars.errors %}
                                        <p>{{ error.message }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"traitement\" class=\"form-label\">Traitement</label>
                            {{ form_widget(form.traitement, {'attr': {'class': 'form-control', 'rows': '4', 'placeholder': 'Décrivez le traitement'}}) }}
                            {% if form.traitement.vars.errors|length > 0 %}
                                <div class=\"text-danger\">
                                    {% for error in form.traitement.vars.errors %}
                                        <p>{{ error.message }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"fichier\" class=\"form-label\">Fichier (PDF seulement)</label>
                            {{ form_widget(form.fichier, {'attr': {'class': 'form-control'}}) }}
                            {% if form.fichier.vars.errors|length > 0 %}
                                <div class=\"text-danger\">
                                    {% for error in form.fichier.vars.errors %}
                                        <p>{{ error.message }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            {{ form_widget(form.patient_id, {'attr': {'class': 'form-select'}}) }}
                            {% if form.patient_id.vars.errors|length > 0 %}
                                <div class=\"text-danger\">
                                    {% for error in form.patient_id.vars.errors %}
                                        <p>{{ error.message }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            {{ form_widget(form.docteur_id, {'attr': {'class': 'form-select'}}) }}
                            {% if form.docteur_id.vars.errors|length > 0 %}
                                <div class=\"text-danger\">
                                    {% for error in form.docteur_id.vars.errors %}
                                        <p>{{ error.message }}</p>
                                    {% endfor %}
                                </div>
                            {% endif %}
                        </div>
                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Créer</button>
                        </div>
                    {{ form_end(form) }}
                </div>
            </div>
            
            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_dossiers_medicaux_index') }}\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>
        </div>
    </div>
{% endblock %}
", "dossiers_medicaux/new.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\dossiers_medicaux\\new.html.twig");
    }
}
