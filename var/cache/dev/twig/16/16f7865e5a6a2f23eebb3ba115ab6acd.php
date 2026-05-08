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

/* admin/dashboard.html.twig */
class __TwigTemplate_20dc490836dfa6d43530828cd37ad196 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@EasyAdmin/page/content.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $this->parent = $this->load("@EasyAdmin/page/content.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        yield "    <h1 class=\"mb-4\">Bienvenue dans l'administration</h1>

    <div class=\"row\">

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\DeckCrudController"], "method", false, false, false, 10), "html", null, true);
        yield "\">
                Gérer les Decks
            </a>
        </div>

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\FlashcardCrudController"], "method", false, false, false, 17), "html", null, true);
        yield "\">
                Gérer les Flashcards
            </a>
        </div>

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\TagCrudController"], "method", false, false, false, 24), "html", null, true);
        yield "\">
                Gérer les Tags
            </a>
        </div>

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\UserCrudController"], "method", false, false, false, 31), "html", null, true);
        yield "\">
                Gérer les Utilisateurs
            </a>
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
        return "admin/dashboard.html.twig";
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
        return array (  105 => 31,  95 => 24,  85 => 17,  75 => 10,  67 => 4,  57 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@EasyAdmin/page/content.html.twig' %}

{% block content %}
    <h1 class=\"mb-4\">Bienvenue dans l'administration</h1>

    <div class=\"row\">

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\DeckCrudController') }}\">
                Gérer les Decks
            </a>
        </div>

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\FlashcardCrudController') }}\">
                Gérer les Flashcards
            </a>
        </div>

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\TagCrudController') }}\">
                Gérer les Tags
            </a>
        </div>

        <div class=\"col-md-3\">
            <a class=\"btn btn-primary w-100 mb-3\"
               href=\"{{ ea_url().setController('App\\\\Controller\\\\Admin\\\\UserCrudController') }}\">
                Gérer les Utilisateurs
            </a>
        </div>

    </div>
{% endblock %}
", "admin/dashboard.html.twig", "/var/www/projets/projetl2/templates/admin/dashboard.html.twig");
    }
}
