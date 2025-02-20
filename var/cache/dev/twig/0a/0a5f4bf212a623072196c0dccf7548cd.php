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
class __TwigTemplate_6ed073ae22942cd07d96389a7d2b6520 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/new.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "dossiers_medicaux/new.html.twig", 1);
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

        yield "Créer un Dossier Médical";
        
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
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate", "class" => "needs-validation"]]);
        yield "
                    
                    <!-- Diagnostic Field -->
                    <div class=\"mb-3\">
                        <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                        ";
        // line 26
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })()), "diagnostic", [], "any", false, false, false, 26), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez le diagnostic"]]);
        yield "
                        ";
        // line 27
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "diagnostic", [], "any", false, false, false, 27), "vars", [], "any", false, false, false, 27), "errors", [], "any", false, false, false, 27)) > 0)) {
            // line 28
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "diagnostic", [], "any", false, false, false, 29), "vars", [], "any", false, false, false, 29), "errors", [], "any", false, false, false, 29));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 30
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 30), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "                            </div>
                        ";
        }
        // line 34
        yield "                    </div>

                    <!-- Traitement Field -->
                    <div class=\"mb-3\">
                        <label for=\"traitement\" class=\"form-label\">Traitement</label>
                        ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "traitement", [], "any", false, false, false, 39), 'widget', ["attr" => ["class" => "form-control", "rows" => "4", "placeholder" => "Décrivez le traitement"]]);
        yield "
                        ";
        // line 40
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "traitement", [], "any", false, false, false, 40), "vars", [], "any", false, false, false, 40), "errors", [], "any", false, false, false, 40)) > 0)) {
            // line 41
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "traitement", [], "any", false, false, false, 42), "vars", [], "any", false, false, false, 42), "errors", [], "any", false, false, false, 42));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 43
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 43), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            yield "                            </div>
                        ";
        }
        // line 47
        yield "                    </div>

                   

                    <!-- New Fields: Groupe Sanguin, Taille, Sexe, Allergie, Contact Urgence -->
                    <div class=\"mb-3\">
                        <label for=\"groupeSanguin\" class=\"form-label\">Groupe Sanguin</label>
                        ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "groupeSanguin", [], "any", false, false, false, 54), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Ex: A+, B-, etc."]]);
        yield "
                        ";
        // line 55
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "groupeSanguin", [], "any", false, false, false, 55), "vars", [], "any", false, false, false, 55), "errors", [], "any", false, false, false, 55)) > 0)) {
            // line 56
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "groupeSanguin", [], "any", false, false, false, 57), "vars", [], "any", false, false, false, 57), "errors", [], "any", false, false, false, 57));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 58
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 58), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            yield "                            </div>
                        ";
        }
        // line 62
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"taille\" class=\"form-label\">Taille (en cm)</label>
                        ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "taille", [], "any", false, false, false, 66), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez la taille en cm"]]);
        yield "
                        ";
        // line 67
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "taille", [], "any", false, false, false, 67), "vars", [], "any", false, false, false, 67), "errors", [], "any", false, false, false, 67)) > 0)) {
            // line 68
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "taille", [], "any", false, false, false, 69), "vars", [], "any", false, false, false, 69), "errors", [], "any", false, false, false, 69));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 70
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 70), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            yield "                            </div>
                        ";
        }
        // line 74
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"sexeBebe\" class=\"form-label\">Sexe du Bébé</label>
                        ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "sexeBebe", [], "any", false, false, false, 78), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 79
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "sexeBebe", [], "any", false, false, false, 79), "vars", [], "any", false, false, false, 79), "errors", [], "any", false, false, false, 79)) > 0)) {
            // line 80
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "sexeBebe", [], "any", false, false, false, 81), "vars", [], "any", false, false, false, 81), "errors", [], "any", false, false, false, 81));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 82
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 82), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "                            </div>
                        ";
        }
        // line 86
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"allergie\" class=\"form-label\">Allergie</label>
                        ";
        // line 90
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 90, $this->source); })()), "allergie", [], "any", false, false, false, 90), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez les allergies si applicable"]]);
        yield "
                        ";
        // line 91
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), "allergie", [], "any", false, false, false, 91), "vars", [], "any", false, false, false, 91), "errors", [], "any", false, false, false, 91)) > 0)) {
            // line 92
            yield "                            <div class=\"text-danger\"style=\"color: red;\">
                                ";
            // line 93
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "allergie", [], "any", false, false, false, 93), "vars", [], "any", false, false, false, 93), "errors", [], "any", false, false, false, 93));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 94
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 94), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            yield "                            </div>
                        ";
        }
        // line 98
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"contactUrgence\" class=\"form-label\">Contact d'Urgence</label>
                        ";
        // line 102
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 102, $this->source); })()), "contactUrgence", [], "any", false, false, false, 102), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Entrez un numéro de contact"]]);
        yield "
                        ";
        // line 103
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 103, $this->source); })()), "contactUrgence", [], "any", false, false, false, 103), "vars", [], "any", false, false, false, 103), "errors", [], "any", false, false, false, 103)) > 0)) {
            // line 104
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 105, $this->source); })()), "contactUrgence", [], "any", false, false, false, 105), "vars", [], "any", false, false, false, 105), "errors", [], "any", false, false, false, 105));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 106
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 106), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            yield "                            </div>
                        ";
        }
        // line 110
        yield "                    </div>
                     <!-- Fichier Field -->
                    <div class=\"mb-3\">
                        <label for=\"fichier\" class=\"form-label\">Fichier (PDF seulement)</label>
                        ";
        // line 114
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 114, $this->source); })()), "fichier", [], "any", false, false, false, 114), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 115
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 115, $this->source); })()), "fichier", [], "any", false, false, false, 115), "vars", [], "any", false, false, false, 115), "errors", [], "any", false, false, false, 115)) > 0)) {
            // line 116
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 117
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 117, $this->source); })()), "fichier", [], "any", false, false, false, 117), "vars", [], "any", false, false, false, 117), "errors", [], "any", false, false, false, 117));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 118
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 118), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 120
            yield "                            </div>
                        ";
        }
        // line 122
        yield "                    </div>

                    <!-- Patient Field -->
                    <div class=\"mb-3\">
                        <label for=\"patient\" class=\"form-label\">Patient</label>
                        ";
        // line 127
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 127, $this->source); })()), "patient_id", [], "any", false, false, false, 127), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 128
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 128, $this->source); })()), "patient_id", [], "any", false, false, false, 128), "vars", [], "any", false, false, false, 128), "errors", [], "any", false, false, false, 128)) > 0)) {
            // line 129
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 130
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 130, $this->source); })()), "patient_id", [], "any", false, false, false, 130), "vars", [], "any", false, false, false, 130), "errors", [], "any", false, false, false, 130));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 131
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 131), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            yield "                            </div>
                        ";
        }
        // line 135
        yield "                    </div>

                    <!-- Docteur Field -->
                    <div class=\"mb-3\">
                        <label for=\"docteur\" class=\"form-label\">Docteur</label>
                        ";
        // line 140
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 140, $this->source); })()), "docteur_id", [], "any", false, false, false, 140), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                        ";
        // line 141
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 141, $this->source); })()), "docteur_id", [], "any", false, false, false, 141), "vars", [], "any", false, false, false, 141), "errors", [], "any", false, false, false, 141)) > 0)) {
            // line 142
            yield "                            <div class=\"text-danger\" style=\"color: red;\">
                                ";
            // line 143
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 143, $this->source); })()), "docteur_id", [], "any", false, false, false, 143), "vars", [], "any", false, false, false, 143), "errors", [], "any", false, false, false, 143));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 144
                yield "                                    <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 144), "html", null, true);
                yield "</p>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            yield "                            </div>
                        ";
        }
        // line 148
        yield "                    </div>

                    <!-- Submit Button -->
                    <div class=\"text-center\">
                        <button type=\"submit\" class=\"btn btn-primary btn-lg\">✅ Créer</button>
                    </div>
                    
                    ";
        // line 155
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 155, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>
            
            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 160
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_index");
        yield "\" class=\"btn btn-outline-secondary btn-lg\">
                    <i class=\"bi bi-arrow-left\"></i>⬅️ Retour à la liste
                </a>
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 168
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

        // line 169
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
        return array (  511 => 169,  498 => 168,  480 => 160,  472 => 155,  463 => 148,  459 => 146,  450 => 144,  446 => 143,  443 => 142,  441 => 141,  437 => 140,  430 => 135,  426 => 133,  417 => 131,  413 => 130,  410 => 129,  408 => 128,  404 => 127,  397 => 122,  393 => 120,  384 => 118,  380 => 117,  377 => 116,  375 => 115,  371 => 114,  365 => 110,  361 => 108,  352 => 106,  348 => 105,  345 => 104,  343 => 103,  339 => 102,  333 => 98,  329 => 96,  320 => 94,  316 => 93,  313 => 92,  311 => 91,  307 => 90,  301 => 86,  297 => 84,  288 => 82,  284 => 81,  281 => 80,  279 => 79,  275 => 78,  269 => 74,  265 => 72,  256 => 70,  252 => 69,  249 => 68,  247 => 67,  243 => 66,  237 => 62,  233 => 60,  224 => 58,  220 => 57,  217 => 56,  215 => 55,  211 => 54,  202 => 47,  198 => 45,  189 => 43,  185 => 42,  182 => 41,  180 => 40,  176 => 39,  169 => 34,  165 => 32,  156 => 30,  152 => 29,  149 => 28,  147 => 27,  143 => 26,  135 => 21,  130 => 18,  126 => 16,  117 => 14,  113 => 13,  110 => 12,  108 => 11,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
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
                    {{ form_start(form, {'attr': {'novalidate': 'novalidate', 'class': 'needs-validation'}}) }}
                    
                    <!-- Diagnostic Field -->
                    <div class=\"mb-3\">
                        <label for=\"diagnostic\" class=\"form-label\">Diagnostic</label>
                        {{ form_widget(form.diagnostic, {'attr': {'class': 'form-control', 'placeholder': 'Entrez le diagnostic'}}) }}
                        {% if form.diagnostic.vars.errors|length > 0 %}
                            <div class=\"text-danger\" style=\"color: red;\">
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
                            <div class=\"text-danger\" style=\"color: red;\">
                                {% for error in form.traitement.vars.errors %}
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
                            <div class=\"text-danger\" style=\"color: red;\">
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
                            <div class=\"text-danger\" style=\"color: red;\">
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
                            <div class=\"text-danger\" style=\"color: red;\">
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
                            <div class=\"text-danger\"style=\"color: red;\">
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
                            <div class=\"text-danger\" style=\"color: red;\">
                                {% for error in form.contactUrgence.vars.errors %}
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
                            <div class=\"text-danger\" style=\"color: red;\">
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
                            <div class=\"text-danger\" style=\"color: red;\">
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
                            <div class=\"text-danger\" style=\"color: red;\">
                                {% for error in form.docteur_id.vars.errors %}
                                    <p>{{ error.message }}</p>
                                {% endfor %}
                            </div>
                        {% endif %}
                    </div>

                    <!-- Submit Button -->
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
", "dossiers_medicaux/new.html.twig", "C:\\Users\\User\\OneDrive\\Bureau\\Sante\\templates\\dossiers_medicaux\\new.html.twig");
    }
}
