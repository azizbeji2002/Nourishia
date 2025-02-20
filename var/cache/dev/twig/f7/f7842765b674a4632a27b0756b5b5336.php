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

/* rendez_vous/newFront.html.twig */
class __TwigTemplate_6fb83e4485d41b85391137ed703c5062 extends Template
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
        return "testFront.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "rendez_vous/newFront.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "rendez_vous/newFront.html.twig"));

        $this->parent = $this->loadTemplate("testFront.html.twig", "rendez_vous/newFront.html.twig", 1);
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

        yield "Créer un Rendez-vous";
        
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
            <h2 class=\"text-center\">Prendre Rendez-vous</h2>
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
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_start', ["attr" => ["enctype" => "multipart/form-data", "novalidate" => "novalidate", "id" => "newRendezVousForm"]]);
        yield "

                        <div class=\"mb-3\">
                            <label for=\"dateRdv\" class=\"form-label\">Date et Heure du Rendez-vous</label>
                            ";
        // line 25
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "dateRdv", [], "any", false, false, false, 25), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Sélectionnez la date et l'heure", "id" => "dateRdv"]]);
        yield "
                            <div class=\"text-danger mt-1\" style=\"color: red;\">

                            ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "dateRdv", [], "any", false, false, false, 28), 'errors', ["attr" => ["style" => "color: red;"]]);
        yield "
                            </div>
                        </div>

                       
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "patient", [], "any", false, false, false, 35), 'widget', ["attr" => ["class" => "form-select", "id" => "patient"]]);
        yield "
                            ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "patient", [], "any", false, false, false, 36), 'errors');
        yield "
                        </div>

                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "docteur", [], "any", false, false, false, 41), 'widget', ["attr" => ["class" => "form-select", "id" => "docteur"]]);
        yield "
                            ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "docteur", [], "any", false, false, false, 42), 'errors', ["attr" => ["style" => "color: red;"]]);
        yield "
                        </div>
                        


                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\" id=\"submitBtn\">✅ Créer</button>
                        </div>

                    ";
        // line 51
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), 'form_end');
        yield "
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction de validation du formulaire
        document.getElementById('newRendezVousForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Validation de la date du rendez-vous
            const dateRdv = document.getElementById('dateRdv');
            if (!dateRdv.value) {
                dateRdv.classList.add('is-invalid');
                isValid = false;
            } else {
                dateRdv.classList.remove('is-invalid');
            }

            // Validation du statut
            const statut = document.getElementById('statut');
            if (!statut.value) {
                statut.classList.add('is-invalid');
                isValid = false;
            } else {
                statut.classList.remove('is-invalid');
            }

            // Validation du patient
            const patient = document.getElementById('patient');
            if (!patient.value) {
                patient.classList.add('is-invalid');
                isValid = false;
            } else {
                patient.classList.remove('is-invalid');
            }

            // Validation du docteur
            const docteur = document.getElementById('docteur');
            if (!docteur.value) {
                docteur.classList.add('is-invalid');
                isValid = false;
            } else {
                docteur.classList.remove('is-invalid');
            }

            // Si un champ est invalide, empêcher la soumission
            if (!isValid) {
                event.preventDefault();
            }
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
        return "rendez_vous/newFront.html.twig";
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
        return array (  185 => 51,  173 => 42,  169 => 41,  161 => 36,  157 => 35,  147 => 28,  141 => 25,  134 => 21,  129 => 18,  125 => 16,  116 => 14,  112 => 13,  109 => 12,  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'testFront.html.twig' %}

{% block title %}Créer un Rendez-vous{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center\">Prendre Rendez-vous</h2>
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
                    {{ form_start(form, {'attr': {'enctype': 'multipart/form-data', 'novalidate': 'novalidate', 'id': 'newRendezVousForm'}}) }}

                        <div class=\"mb-3\">
                            <label for=\"dateRdv\" class=\"form-label\">Date et Heure du Rendez-vous</label>
                            {{ form_widget(form.dateRdv, {'attr': {'class': 'form-control', 'placeholder': 'Sélectionnez la date et l\\'heure', 'id': 'dateRdv'}}) }}
                            <div class=\"text-danger mt-1\" style=\"color: red;\">

                            {{ form_errors(form.dateRdv , {'attr': {'style': 'color: red;'}}) }}
                            </div>
                        </div>

                       
                        <div class=\"mb-3\">
                            <label for=\"patient\" class=\"form-label\">Patient</label>
                            {{ form_widget(form.patient, {'attr': {'class': 'form-select', 'id': 'patient'}}) }}
                            {{ form_errors(form.patient) }}
                        </div>

                        <div class=\"mb-3\">
                            <label for=\"docteur\" class=\"form-label\">Docteur</label>
                            {{ form_widget(form.docteur, {'attr': {'class': 'form-select', 'id': 'docteur'}}) }}
                            {{ form_errors(form.docteur, {'attr': {'style': 'color: red;'}}) }}
                        </div>
                        


                        <div class=\"text-center\">
                            <button type=\"submit\" class=\"btn btn-primary btn-lg\" id=\"submitBtn\">✅ Créer</button>
                        </div>

                    {{ form_end(form) }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction de validation du formulaire
        document.getElementById('newRendezVousForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Validation de la date du rendez-vous
            const dateRdv = document.getElementById('dateRdv');
            if (!dateRdv.value) {
                dateRdv.classList.add('is-invalid');
                isValid = false;
            } else {
                dateRdv.classList.remove('is-invalid');
            }

            // Validation du statut
            const statut = document.getElementById('statut');
            if (!statut.value) {
                statut.classList.add('is-invalid');
                isValid = false;
            } else {
                statut.classList.remove('is-invalid');
            }

            // Validation du patient
            const patient = document.getElementById('patient');
            if (!patient.value) {
                patient.classList.add('is-invalid');
                isValid = false;
            } else {
                patient.classList.remove('is-invalid');
            }

            // Validation du docteur
            const docteur = document.getElementById('docteur');
            if (!docteur.value) {
                docteur.classList.add('is-invalid');
                isValid = false;
            } else {
                docteur.classList.remove('is-invalid');
            }

            // Si un champ est invalide, empêcher la soumission
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
{% endblock %}
", "rendez_vous/newFront.html.twig", "C:\\Users\\User\\OneDrive\\Bureau\\Sante\\templates\\rendez_vous\\newFront.html.twig");
    }
}
