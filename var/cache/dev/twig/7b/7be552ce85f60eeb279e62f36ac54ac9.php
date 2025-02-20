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
class __TwigTemplate_93a7460b5188142cabaf922b7a91a598 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "consultation/index.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "consultation/index.html.twig", 1);
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

        yield "Liste des Consultations";
        
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
                            <th class=\"text-center\" style=\"width: 15%;\">Date de Consultation</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Statut</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["consultations"]) || array_key_exists("consultations", $context) ? $context["consultations"] : (function () { throw new RuntimeError('Variable "consultations" does not exist.', 30, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["consultation"]) {
            // line 31
            yield "                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "id", [], "any", false, false, false, 32), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 33
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "dateConsultation", [], "any", false, false, false, 33)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "dateConsultation", [], "any", false, false, false, 33), "d/m/Y"), "html", null, true)) : (""));
            yield "</td>
                                <td class=\"text-center\">";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "statut", [], "any", false, false, false, 34), "value", [], "any", false, false, false, 34), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">
                                    <a href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "id", [], "any", false, false, false, 36)]), "html", null, true);
            yield "\" \">
                                                                📝                                    </a>
                                    <a href=\"";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["consultation"], "id", [], "any", false, false, false, 38)]), "html", null, true);
            yield "\" > ✏️
                                    </a>
                                </td>
                            </tr>
                        ";
            $context['_iterated'] = true;
        }
        // line 46
        if (!$context['_iterated']) {
            // line 43
            yield "                            <tr>
                                <td colspan=\"4\" class=\"text-center\">Aucune consultation trouvée</td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['consultation'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        yield "                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_consultation_new");
        yield "\" class=\"btn btn-ss btn-lg\">Créer une Nouvelle Consultation</a>
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
        return array (  181 => 52,  174 => 47,  165 => 43,  163 => 46,  154 => 38,  149 => 36,  144 => 34,  140 => 33,  136 => 32,  133 => 31,  128 => 30,  114 => 18,  110 => 16,  101 => 14,  97 => 13,  94 => 12,  92 => 11,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
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
                            <th class=\"text-center\" style=\"width: 15%;\">Date de Consultation</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Statut</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for consultation in consultations %}
                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">{{ consultation.id }}</td>
                                <td class=\"text-center\">{{ consultation.dateConsultation ? consultation.dateConsultation|date('d/m/Y') : '' }}</td>
                                <td class=\"text-center\">{{ consultation.statut.value }}</td>
                                <td class=\"text-center\">
                                    <a href=\"{{ path('app_consultation_show', {'id': consultation.id}) }}\" \">
                                                                📝                                    </a>
                                    <a href=\"{{ path('app_consultation_edit', {'id': consultation.id}) }}\" > ✏️
                                    </a>
                                </td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"4\" class=\"text-center\">Aucune consultation trouvée</td>
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
", "consultation/index.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\consultation\\index.html.twig");
    }
}
