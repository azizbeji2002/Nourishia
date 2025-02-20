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

/* rendez_vous/index.html.twig */
class __TwigTemplate_a45d637c488b9bf405d304a9b26b1f17 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "rendez_vous/index.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "rendez_vous/index.html.twig", 1);
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

        yield "Liste des Rendez-vous";
        
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
            <h2 class=\"text-center text-success\">Liste des Rendez-vous</h2>
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
                            <th class=\"text-center\" style=\"width: 20%;\">Date de Rendez-vous</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Statut</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Patient</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Docteur</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rendez_vouses"]) || array_key_exists("rendez_vouses", $context) ? $context["rendez_vouses"] : (function () { throw new RuntimeError('Variable "rendez_vouses" does not exist.', 32, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["rendez_vou"]) {
            // line 33
            yield "                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "id", [], "any", false, false, false, 34), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 35
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "dateRdv", [], "any", false, false, false, 35)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "dateRdv", [], "any", false, false, false, 35), "d/m/Y H:i"), "html", null, true)) : (""));
            yield "</td>
                                <td class=\"text-center\">";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "statut", [], "any", false, false, false, 36), "value", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 37
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "patient", [], "any", false, false, false, 37)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "patient", [], "any", false, false, false, 37), "nom", [], "any", false, false, false, 37), "html", null, true)) : ("Non spécifié"));
            yield "</td>
                                <td class=\"text-center\">";
            // line 38
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "docteur", [], "any", false, false, false, 38)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "docteur", [], "any", false, false, false, 38), "nom", [], "any", false, false, false, 38), "html", null, true)) : ("Non spécifié"));
            yield "</td>
                                <td class=\"text-center\">
                                    <a href=\"";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rendez_vous_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "id", [], "any", false, false, false, 40)]), "html", null, true);
            yield "\" class=\"btn btn-info btn-sm\">📝</a>
                                    <a href=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rendez_vous_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["rendez_vou"], "id", [], "any", false, false, false, 41)]), "html", null, true);
            yield "\" class=\"btn btn-warning btn-sm\">✏️</a>
                                </td>
                            </tr>
                        ";
            $context['_iterated'] = true;
        }
        // line 48
        if (!$context['_iterated']) {
            // line 45
            yield "                            <tr>
                                <td colspan=\"6\" class=\"text-center\">Aucun rendez-vous trouvé</td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['rendez_vou'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        yield "                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rendez_vous_new");
        yield "\" class=\"btn btn-primary btn-lg\">Créer un Nouveau Rendez-vous</a>
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
        return "rendez_vous/index.html.twig";
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
        return array (  189 => 54,  182 => 49,  173 => 45,  171 => 48,  163 => 41,  159 => 40,  154 => 38,  150 => 37,  146 => 36,  142 => 35,  138 => 34,  135 => 33,  130 => 32,  114 => 18,  110 => 16,  101 => 14,  97 => 13,  94 => 12,  92 => 11,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Liste des Rendez-vous{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center text-success\">Liste des Rendez-vous</h2>
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
                            <th class=\"text-center\" style=\"width: 20%;\">Date de Rendez-vous</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Statut</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Patient</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Docteur</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for rendez_vou in rendez_vouses %}
                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">{{ rendez_vou.id }}</td>
                                <td class=\"text-center\">{{ rendez_vou.dateRdv ? rendez_vou.dateRdv|date('d/m/Y H:i') : '' }}</td>
                                <td class=\"text-center\">{{ rendez_vou.statut.value }}</td>
                                <td class=\"text-center\">{{ rendez_vou.patient ? rendez_vou.patient.nom : 'Non spécifié' }}</td>
                                <td class=\"text-center\">{{ rendez_vou.docteur ? rendez_vou.docteur.nom : 'Non spécifié' }}</td>
                                <td class=\"text-center\">
                                    <a href=\"{{ path('app_rendez_vous_show', {'id': rendez_vou.id}) }}\" class=\"btn btn-info btn-sm\">📝</a>
                                    <a href=\"{{ path('app_rendez_vous_edit', {'id': rendez_vou.id}) }}\" class=\"btn btn-warning btn-sm\">✏️</a>
                                </td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"6\" class=\"text-center\">Aucun rendez-vous trouvé</td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_rendez_vous_new') }}\" class=\"btn btn-primary btn-lg\">Créer un Nouveau Rendez-vous</a>
            </div>
        </div>
    </div>
{% endblock %}
", "rendez_vous/index.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\rendez_vous\\index.html.twig");
    }
}
