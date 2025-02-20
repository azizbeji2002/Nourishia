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
class __TwigTemplate_ae52be285817669ad625358dda9cb169 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/edit.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "dossiers_medicaux/edit.html.twig", 1);
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

        yield "Éditer Dossier Médical";
        
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
            <h2 class=\"text-center\">Éditer le Dossier Médical - ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dossiers_medicaux"]) || array_key_exists("dossiers_medicaux", $context) ? $context["dossiers_medicaux"] : (function () { throw new RuntimeError('Variable "dossiers_medicaux" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "</h2>
            <hr class=\"mb-4\">

            <div class=\"mt-4\">
                <div class=\"p-4 bg-light rounded shadow-sm\">
                    ";
        // line 13
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate", "class" => "needs-validation"]]);
        yield "
                    
                    <!-- Diagnostic Field -->
                    <div class=\"mb-3\">
                        <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                        ";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "diagnostic", [], "any", false, false, false, 18), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez le diagnostic"]]);
        yield "
                        ";
        // line 19
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "diagnostic", [], "any", false, false, false, 19), "vars", [], "any", false, false, false, 19), "errors", [], "any", false, false, false, 19)) > 0)) {
            // line 20
            yield "                            <div class=\"text-danger\">
                                ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "diagnostic", [], "any", false, false, false, 21), "vars", [], "any", false, false, false, 21), "errors", [], "any", false, false, false, 21));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 22
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 22), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            yield "                            </div>
                        ";
        }
        // line 26
        yield "                    </div>

                    <!-- Traitement Field -->
                    <div class=\"mb-3\">
                        <label for=\"traitement\" class=\"form-label\">Traitement</label>
                        ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "traitement", [], "any", false, false, false, 31), 'widget', ["attr" => ["class" => "form-control", "rows" => "4", "placeholder" => "Décrivez le traitement"]]);
        yield "
                        ";
        // line 32
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "traitement", [], "any", false, false, false, 32), "vars", [], "any", false, false, false, 32), "errors", [], "any", false, false, false, 32)) > 0)) {
            // line 33
            yield "                            <div class=\"text-danger\">
                                ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "traitement", [], "any", false, false, false, 34), "vars", [], "any", false, false, false, 34), "errors", [], "any", false, false, false, 34));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 35
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 35), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "                            </div>
                        ";
        }
        // line 39
        yield "                    </div>

                    <!-- Fichier Field -->
                    <div class=\"mb-3\">
                        <label for=\"fichier\" class=\"form-label\">Fichier (PDF seulement)</label>
                        ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "fichier", [], "any", false, false, false, 44), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 45
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "fichier", [], "any", false, false, false, 45), "vars", [], "any", false, false, false, 45), "errors", [], "any", false, false, false, 45)) > 0)) {
            // line 46
            yield "                            <div class=\"text-danger\">
                                ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "fichier", [], "any", false, false, false, 47), "vars", [], "any", false, false, false, 47), "errors", [], "any", false, false, false, 47));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 48
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 48), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            yield "                            </div>
                        ";
        }
        // line 52
        yield "                    </div>

                    <!-- Patient Field -->
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
            yield "                            <div class=\"text-danger\">
                                ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "patient_id", [], "any", false, false, false, 60), "vars", [], "any", false, false, false, 60), "errors", [], "any", false, false, false, 60));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 61
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 61), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            yield "                            </div>
                        ";
        }
        // line 65
        yield "                    </div>

                    <!-- Docteur Field -->
                    <div class=\"mb-3\">
                        <label for=\"docteur\" class=\"form-label\">Docteur</label>
                        ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "docteur_id", [], "any", false, false, false, 70), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 71
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "docteur_id", [], "any", false, false, false, 71), "vars", [], "any", false, false, false, 71), "errors", [], "any", false, false, false, 71)) > 0)) {
            // line 72
            yield "                            <div class=\"text-danger\">
                                ";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "docteur_id", [], "any", false, false, false, 73), "vars", [], "any", false, false, false, 73), "errors", [], "any", false, false, false, 73));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 74
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 74), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            yield "                            </div>
                        ";
        }
        // line 78
        yield "                    </div>

                    <!-- New Fields: Groupe Sanguin, Taille, Sexe, Allergie, Contact Urgence -->
                    <div class=\"mb-3\">
                        <label for=\"groupeSanguin\" class=\"form-label\">Groupe Sanguin</label>
                        ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "groupeSanguin", [], "any", false, false, false, 83), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Ex: A+, B-, etc."]]);
        yield "
                        ";
        // line 84
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "groupeSanguin", [], "any", false, false, false, 84), "vars", [], "any", false, false, false, 84), "errors", [], "any", false, false, false, 84)) > 0)) {
            // line 85
            yield "                            <div class=\"text-danger\">
                                ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "groupeSanguin", [], "any", false, false, false, 86), "vars", [], "any", false, false, false, 86), "errors", [], "any", false, false, false, 86));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 87
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 87), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            yield "                            </div>
                        ";
        }
        // line 91
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"taille\" class=\"form-label\">Taille (en cm)</label>
                        ";
        // line 95
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "taille", [], "any", false, false, false, 95), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez la taille en cm"]]);
        yield "
                        ";
        // line 96
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "taille", [], "any", false, false, false, 96), "vars", [], "any", false, false, false, 96), "errors", [], "any", false, false, false, 96)) > 0)) {
            // line 97
            yield "                            <div class=\"text-danger\">
                                ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "taille", [], "any", false, false, false, 98), "vars", [], "any", false, false, false, 98), "errors", [], "any", false, false, false, 98));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 99
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 99), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            yield "                            </div>
                        ";
        }
        // line 103
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"sexeBebe\" class=\"form-label\">Sexe du Bébé</label>
                        ";
        // line 107
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "sexeBebe", [], "any", false, false, false, 107), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 108
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "sexeBebe", [], "any", false, false, false, 108), "vars", [], "any", false, false, false, 108), "errors", [], "any", false, false, false, 108)) > 0)) {
            // line 109
            yield "                            <div class=\"text-danger\">
                                ";
            // line 110
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), "sexeBebe", [], "any", false, false, false, 110), "vars", [], "any", false, false, false, 110), "errors", [], "any", false, false, false, 110));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 111
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 111), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            yield "                            </div>
                        ";
        }
        // line 115
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"allergie\" class=\"form-label\">Allergie</label>
                        ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "allergie", [], "any", false, false, false, 119), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez les allergies si applicable"]]);
        yield "
                        ";
        // line 120
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 120, $this->source); })()), "allergie", [], "any", false, false, false, 120), "vars", [], "any", false, false, false, 120), "errors", [], "any", false, false, false, 120)) > 0)) {
            // line 121
            yield "                            <div class=\"text-danger\">
                                ";
            // line 122
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 122, $this->source); })()), "allergie", [], "any", false, false, false, 122), "vars", [], "any", false, false, false, 122), "errors", [], "any", false, false, false, 122));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 123
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 123), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            yield "                            </div>
                        ";
        }
        // line 127
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"contactUrgence\" class=\"form-label\">Contact d'Urgence</label>
                        ";
        // line 131
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 131, $this->source); })()), "contactUrgence", [], "any", false, false, false, 131), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez un numéro de contact"]]);
        yield "
                        ";
        // line 132
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 132, $this->source); })()), "contactUrgence", [], "any", false, false, false, 132), "vars", [], "any", false, false, false, 132), "errors", [], "any", false, false, false, 132)) > 0)) {
            // line 133
            yield "                            <div class=\"text-danger\">
                                ";
            // line 134
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 134, $this->source); })()), "contactUrgence", [], "any", false, false, false, 134), "vars", [], "any", false, false, false, 134), "errors", [], "any", false, false, false, 134));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 135
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 135), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            yield "                            </div>
                        ";
        }
        // line 139
        yield "                    </div>

                    <!-- Submit Button -->
                    <div class=\"text-center\">
                        <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Mettre à jour</button>
                    </div>
                    
                    ";
        // line 146
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 146, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 151
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>

            ";
        // line 156
        yield Twig\Extension\CoreExtension::include($this->env, $context, "dossiers_medicaux/_delete_form.html.twig");
        yield "
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 161
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 162
        yield "<script>
document.addEventListener(\"DOMContentLoaded\", function () {
    const form = document.querySelector(\"form\");

    form.addEventListener(\"submit\", function (event) {
        let isValid = true;

        document.querySelectorAll(\".form-control\").forEach(function (input) {
            let errorDiv = input.parentElement.querySelector(\".text-danger\");

            if (input.value.trim() === \"\") {
                input.classList.add(\"is-invalid\");
                errorDiv.textContent = \"⚠️ Ce champ est obligatoire\";
                isValid = false;
            } else {
                input.classList.remove(\"is-invalid\");
                errorDiv.textContent = \"\";
            }
        });

        if (!isValid) event.preventDefault();
    });
});
</script>
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
        return array (  493 => 162,  480 => 161,  465 => 156,  457 => 151,  449 => 146,  440 => 139,  436 => 137,  427 => 135,  423 => 134,  420 => 133,  418 => 132,  414 => 131,  408 => 127,  404 => 125,  395 => 123,  391 => 122,  388 => 121,  386 => 120,  382 => 119,  376 => 115,  372 => 113,  363 => 111,  359 => 110,  356 => 109,  354 => 108,  350 => 107,  344 => 103,  340 => 101,  331 => 99,  327 => 98,  324 => 97,  322 => 96,  318 => 95,  312 => 91,  308 => 89,  299 => 87,  295 => 86,  292 => 85,  290 => 84,  286 => 83,  279 => 78,  275 => 76,  266 => 74,  262 => 73,  259 => 72,  257 => 71,  253 => 70,  246 => 65,  242 => 63,  233 => 61,  229 => 60,  226 => 59,  224 => 58,  220 => 57,  213 => 52,  209 => 50,  200 => 48,  196 => 47,  193 => 46,  191 => 45,  187 => 44,  180 => 39,  176 => 37,  167 => 35,  163 => 34,  160 => 33,  158 => 32,  154 => 31,  147 => 26,  143 => 24,  134 => 22,  130 => 21,  127 => 20,  125 => 19,  121 => 18,  113 => 13,  105 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
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
                    {{ form_start(form, {'attr': {'novalidate': 'novalidate', 'class': 'needs-validation'}}) }}
                    
                    <!-- Diagnostic Field -->
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

                    <!-- Traitement Field -->
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

                    <!-- Fichier Field -->
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

                    <!-- Patient Field -->
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

                    <!-- Docteur Field -->
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

                    <!-- New Fields: Groupe Sanguin, Taille, Sexe, Allergie, Contact Urgence -->
                    <div class=\"mb-3\">
                        <label for=\"groupeSanguin\" class=\"form-label\">Groupe Sanguin</label>
                        {{ form_widget(form.groupeSanguin, {'attr': {'class': 'form-control', 'placeholder': 'Ex: A+, B-, etc.'}}) }}
                        {% if form.groupeSanguin.vars.errors|length > 0 %}
                            <div class=\"text-danger\">
                                {% for error in form.groupeSanguin.vars.errors %}
                                    <p>{{ error.message }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"taille\" class=\"form-label\">Taille (en cm)</label>
                        {{ form_widget(form.taille, {'attr': {'class': 'form-control', 'placeholder': 'Entrez la taille en cm'}}) }}
                        {% if form.taille.vars.errors|length > 0 %}
                            <div class=\"text-danger\">
                                {% for error in form.taille.vars.errors %}
                                    <p>{{ error.message }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"sexeBebe\" class=\"form-label\">Sexe du Bébé</label>
                        {{ form_widget(form.sexeBebe, {'attr': {'class': 'form-select'}}) }}
                        {% if form.sexeBebe.vars.errors|length > 0 %}
                            <div class=\"text-danger\">
                                {% for error in form.sexeBebe.vars.errors %}
                                    <p>{{ error.message }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"allergie\" class=\"form-label\">Allergie</label>
                        {{ form_widget(form.allergie, {'attr': {'class': 'form-control', 'placeholder': 'Entrez les allergies si applicable'}}) }}
                        {% if form.allergie.vars.errors|length > 0 %}
                            <div class=\"text-danger\">
                                {% for error in form.allergie.vars.errors %}
                                    <p>{{ error.message }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"contactUrgence\" class=\"form-label\">Contact d'Urgence</label>
                        {{ form_widget(form.contactUrgence, {'attr': {'class': 'form-control', 'placeholder': 'Entrez un numéro de contact'}}) }}
                        {% if form.contactUrgence.vars.errors|length > 0 %}
                            <div class=\"text-danger\">
                                {% for error in form.contactUrgence.vars.errors %}
                                    <p>{{ error.message }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}
                    </div>

                    <!-- Submit Button -->
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

{% block javascripts %}
<script>
document.addEventListener(\"DOMContentLoaded\", function () {
    const form = document.querySelector(\"form\");

    form.addEventListener(\"submit\", function (event) {
        let isValid = true;

        document.querySelectorAll(\".form-control\").forEach(function (input) {
            let errorDiv = input.parentElement.querySelector(\".text-danger\");

            if (input.value.trim() === \"\") {
                input.classList.add(\"is-invalid\");
                errorDiv.textContent = \"⚠️ Ce champ est obligatoire\";
                isValid = false;
            } else {
                input.classList.remove(\"is-invalid\");
                errorDiv.textContent = \"\";
            }
        });

        if (!isValid) event.preventDefault();
    });
});
</script>
{% endblock %}
", "dossiers_medicaux/edit.html.twig", "C:\\Users\\User\\OneDrive\\Bureau\\Sante\\templates\\dossiers_medicaux\\edit.html.twig");
    }
}
