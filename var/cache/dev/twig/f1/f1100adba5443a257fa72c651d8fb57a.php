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

/* consultation/index.html.twig */
class __TwigTemplate_7c919444dbbf5166d14292b5a9055d8c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "consultation/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "consultation/index.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "consultation/index.html.twig", 1);
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

        yield "Liste des Consultations";
        
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
            <h2 class=\"text-center text-success\">Liste des Consultations</h2>
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
            <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover mt-4\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th class=\"text-center\" style=\"width: 10%;\">ID</th>
                            <th class=\"text-center\" style=\"width: 10%;\">Date de Consultation</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Statut</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Conseils</th>
                            <th class=\"text-center\" style=\"width: 10%;\">Poids (kg)</th>
                            <th class=\"text-center\" style=\"width: 10%;\">Tension</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["consultations"]) || array_key_exists("consultations", $context) ? $context["consultations"] : (function () { throw new RuntimeError('Variable "consultations" does not exist.', 33, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["consultation"]) {
            // line 34
            yield "                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "id", [], "any", false, false, false, 35), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 36
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "dateConsultation", [], "any", false, false, false, 36)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "dateConsultation", [], "any", false, false, false, 36), "d/m/Y"), "html", null, true)) : (""));
            yield "</td>
                                <td class=\"text-center\">";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "statut", [], "any", false, false, false, 37), "value", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "conseils", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "poids", [], "any", false, false, false, 39), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "tension", [], "any", false, false, false, 40), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">
                                    <a href=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "id", [], "any", false, false, false, 42)]), "html", null, true);
            yield "\">📝</a>
                                    <a href=\"";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "id", [], "any", false, false, false, 43)]), "html", null, true);
            yield "\">✏️</a>
                                </td>
                            </tr>
                        ";
            $context['_iterated'] = true;
        }
        // line 50
        if (!$context['_iterated']) {
            // line 47
            yield "                            <tr>
                                <td colspan=\"7\" class=\"text-center\">Aucune consultation trouvée</td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['consultation'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_new");
        yield "\" class=\"btn btn-ss btn-lg\">Créer une Nouvelle Consultation</a>
            </div>
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
        return "consultation/index.html.twig";
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
        return array (  209 => 56,  202 => 51,  193 => 47,  191 => 50,  183 => 43,  179 => 42,  174 => 40,  170 => 39,  166 => 38,  162 => 37,  158 => 36,  154 => 35,  151 => 34,  146 => 33,  129 => 18,  125 => 16,  116 => 14,  112 => 13,  109 => 12,  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Liste des Consultations{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center text-success\">Liste des Consultations</h2>
            <hr class=\"mb-4\">

            {% if app.flashes('error') %}
                <div class=\"alert alert-danger\">
                    {% for message in app.flashes('error') %}
                        <p class=\"mb-0\">{{ message }}</p>
                    {% endfor %}
                </div>
            {% endif %}

            <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover mt-4\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th class=\"text-center\" style=\"width: 10%;\">ID</th>
                            <th class=\"text-center\" style=\"width: 10%;\">Date de Consultation</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Statut</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Conseils</th>
                            <th class=\"text-center\" style=\"width: 10%;\">Poids (kg)</th>
                            <th class=\"text-center\" style=\"width: 10%;\">Tension</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for consultation in consultations %}
                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">{{ consultation.id }}</td>
                                <td class=\"text-center\">{{ consultation.dateConsultation ? consultation.dateConsultation|date('d/m/Y') : '' }}</td>
                                <td class=\"text-center\">{{ consultation.statut.value }}</td>
                                <td class=\"text-center\">{{ consultation.conseils }}</td>
                                <td class=\"text-center\">{{ consultation.poids }}</td>
                                <td class=\"text-center\">{{ consultation.tension }}</td>
                                <td class=\"text-center\">
                                    <a href=\"{{ path('app_consultation_show', {'id': consultation.id}) }}\">📝</a>
                                    <a href=\"{{ path('app_consultation_edit', {'id': consultation.id}) }}\">✏️</a>
                                </td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"7\" class=\"text-center\">Aucune consultation trouvée</td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_consultation_new') }}\" class=\"btn btn-ss btn-lg\">Créer une Nouvelle Consultation</a>
            </div>
        </div>
    </div>
{% endblock %}
", "consultation/index.html.twig", "C:\\Users\\User\\OneDrive\\Bureau\\Sante\\templates\\consultation\\index.html.twig");
    }
}
