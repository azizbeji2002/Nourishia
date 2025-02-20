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

/* dossiers_medicaux/index.html.twig */
class __TwigTemplate_061e3c329828737a161a96bf4321ca2d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dossiers_medicaux/index.html.twig"));

        $this->parent = $this->loadTemplate("test.html.twig", "dossiers_medicaux/index.html.twig", 1);
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

        yield "Liste des Dossiers Médicaux";
        
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
            <h2 class=\"text-center text-success\">Liste des Dossiers Médicaux</h2>
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
                            <th class=\"text-center\" style=\"width: 15%;\">Date de Création</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Diagnostic</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Traitement</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Fichier</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["dossiers_medicauxes"]) || array_key_exists("dossiers_medicauxes", $context) ? $context["dossiers_medicauxes"] : (function () { throw new RuntimeError('Variable "dossiers_medicauxes" does not exist.', 32, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["dossiers_medicaux"]) {
            // line 33
            yield "                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "id", [], "any", false, false, false, 34), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 35
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "dateCreation", [], "any", false, false, false, 35)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "dateCreation", [], "any", false, false, false, 35), "d/m/Y"), "html", null, true)) : (""));
            yield "</td>
                                <td class=\"text-center\">";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "diagnostic", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "traitement", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
                                <td class=\"text-center\">
                                    ";
            // line 39
            if (CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "fichier", [], "any", false, false, false, 39)) {
                // line 40
                yield "                                        <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "fichier", [], "any", false, false, false, 40))), "html", null, true);
                yield "\" target=\"_blank\" class=\"btn btn-info btn-sm\">Voir Fichier</a>
                                    ";
            } else {
                // line 42
                yield "                                        <span class=\"text-danger\">Aucun fichier</span>
                                    ";
            }
            // line 44
            yield "                                </td>
                                <td class=\"text-center\">
                                    <a href=\"";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "id", [], "any", false, false, false, 46)]), "html", null, true);
            yield "\">📝</a>
                                    <a href=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["dossiers_medicaux"], "id", [], "any", false, false, false, 47)]), "html", null, true);
            yield "\" > ✏️</a>
                                </td>
                            </tr>
                        ";
            $context['_iterated'] = true;
        }
        // line 54
        if (!$context['_iterated']) {
            // line 51
            yield "                            <tr>
                                <td colspan=\"6\" class=\"text-center\">Aucun dossier trouvé</td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['dossiers_medicaux'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        yield "                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 60
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_medicaux_new");
        yield "\" class=\"btn btn-ss btn-lg\">Créer un Nouveau Dossier</a>
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
        return "dossiers_medicaux/index.html.twig";
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
        return array (  201 => 60,  194 => 55,  185 => 51,  183 => 54,  175 => 47,  171 => 46,  167 => 44,  163 => 42,  157 => 40,  155 => 39,  150 => 37,  146 => 36,  142 => 35,  138 => 34,  135 => 33,  130 => 32,  114 => 18,  110 => 16,  101 => 14,  97 => 13,  94 => 12,  92 => 11,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Liste des Dossiers Médicaux{% endblock %}

{% block body %}
    <div class=\"container mt-5\">
        <div class=\"card shadow-lg p-4 border-0 rounded\">
            <h2 class=\"text-center text-success\">Liste des Dossiers Médicaux</h2>
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
                            <th class=\"text-center\" style=\"width: 15%;\">Date de Création</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Diagnostic</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Traitement</th>
                            <th class=\"text-center\" style=\"width: 15%;\">Fichier</th>
                            <th class=\"text-center\" style=\"width: 20%;\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for dossiers_medicaux in dossiers_medicauxes %}
                            <tr class=\"table-row-hover\">
                                <td class=\"text-center\">{{ dossiers_medicaux.id }}</td>
                                <td class=\"text-center\">{{ dossiers_medicaux.dateCreation ? dossiers_medicaux.dateCreation|date('d/m/Y') : '' }}</td>
                                <td class=\"text-center\">{{ dossiers_medicaux.diagnostic }}</td>
                                <td class=\"text-center\">{{ dossiers_medicaux.traitement }}</td>
                                <td class=\"text-center\">
                                    {% if dossiers_medicaux.fichier %}
                                        <a href=\"{{ asset('uploads/' ~ dossiers_medicaux.fichier) }}\" target=\"_blank\" class=\"btn btn-info btn-sm\">Voir Fichier</a>
                                    {% else %}
                                        <span class=\"text-danger\">Aucun fichier</span>
                                    {% endif %}
                                </td>
                                <td class=\"text-center\">
                                    <a href=\"{{ path('app_dossiers_medicaux_show', {'id': dossiers_medicaux.id}) }}\">📝</a>
                                    <a href=\"{{ path('app_dossiers_medicaux_edit', {'id': dossiers_medicaux.id}) }}\" > ✏️</a>
                                </td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"6\" class=\"text-center\">Aucun dossier trouvé</td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>

            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_dossiers_medicaux_new') }}\" class=\"btn btn-ss btn-lg\">Créer un Nouveau Dossier</a>
            </div>
        </div>
    </div>
{% endblock %}
", "dossiers_medicaux/index.html.twig", "C:\\Users\\amela\\Desktop\\Moncef\\Sante\\templates\\dossiers_medicaux\\index.html.twig");
    }
}
